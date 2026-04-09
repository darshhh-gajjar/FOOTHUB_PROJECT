<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Razorpay\Api\Api;
use Exception;

class PaymentController extends Controller
{
    private Api $api;

    public function __construct()
    {
        $this->api = new Api(
            config('services.razorpay.key'),
            config('services.razorpay.secret')
        );
    }

    public function checkout()
    {
        return view('payment.checkout');
    }

    public function createOrder(Request $request): JsonResponse
    {
        $request->validate([
            'amount' => 'required|numeric|min:1',
        ]);

        try {
            $amountInPaise = (int) ($request->amount * 100);

            $orderData = [
                'receipt'         => 'rcpt_' . uniqid(),
                'amount'          => $amountInPaise,
                'currency'        => 'INR',
                'payment_capture' => 1 
            ];

            $razorpayOrder = $this->api->order->create($orderData);

            Payment::create([
                'user_id'  => Auth::id(),
                'order_id' => $razorpayOrder['id'],
                'amount'   => $request->amount,
                'currency' => 'INR',
                'status'   => 'created',
            ]);

            return response()->json([
                'success'  => true,
                'order_id' => $razorpayOrder['id'],
                'amount'   => $amountInPaise,
                'key'      => config('services.razorpay.key'),
            ]);

        } catch (Exception $e) {
            Log::error('Razorpay Order Creation Error: ' . $e->getMessage());
            
            return response()->json([
                'success' => false,
                'message' => 'Unable to initiate payment. Please try again later.'
            ], 500);
        }
    }

    public function verifyPayment(Request $request): JsonResponse
    {
        $request->validate([
            'razorpay_order_id'   => 'required|string',
            'razorpay_payment_id' => 'required|string',
            'razorpay_signature'  => 'required|string',
        ]);

        try {
            $this->api->utility->verifyPaymentSignature([
                'razorpay_order_id'   => $request->razorpay_order_id,
                'razorpay_payment_id' => $request->razorpay_payment_id,
                'razorpay_signature'  => $request->razorpay_signature
            ]);

            $payment = Payment::where('order_id', $request->razorpay_order_id)->firstOrFail();
            
            $payment->update([
                'payment_id' => $request->razorpay_payment_id,
                'status'     => 'successful',
                'response'   => $request->all(),
            ]);

            return response()->json([
                'success'      => true,
                'message'      => 'Payment verified successfully.',
                'redirect_url' => route('payment.success')
            ]);

        } catch (Exception $e) {
            Log::error('Razorpay Verification Error: ' . $e->getMessage());

            $payment = Payment::where('order_id', $request->razorpay_order_id)->first();
            
            if ($payment) {
                $payment->update([
                    'payment_id' => $request->razorpay_payment_id ?? null,
                    'status'     => 'failed',
                    'response'   => $request->all(),
                ]);
            }

            return response()->json([
                'success' => false,
                'message' => 'Payment verification failed.'
            ], 400);
        }
    }

    public function webhook(Request $request): JsonResponse
    {
        $webhookSecret = config('services.razorpay.webhook_secret');
        $webhookSignature = $request->header('X-Razorpay-Signature');

        try {
            $this->api->utility->verifyWebhookSignature(
                $request->getContent(), 
                $webhookSignature, 
                $webhookSecret
            );
            
            $payload = $request->all();

            if (isset($payload['event']) && $payload['event'] === 'payment.captured') {
                $paymentId = $payload['payload']['payment']['entity']['id'];
                $orderId   = $payload['payload']['payment']['entity']['order_id'];

                Payment::where('order_id', $orderId)->update([
                    'payment_id' => $paymentId,
                    'status'     => 'successful',
                ]);
            }

            return response()->json(['status' => 'success']);

        } catch (Exception $e) {
            Log::error('Razorpay Webhook Error: ' . $e->getMessage());
            return response()->json(['error' => 'Invalid signature'], 400);
        }
    }
}
