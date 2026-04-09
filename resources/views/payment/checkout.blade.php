<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Secure Checkout</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 h-screen flex items-center justify-center antialiased">
    
    <div class="bg-white max-w-md w-full rounded-2xl shadow-sm border border-gray-100 p-8">
        <div class="mb-8 text-center">
            <h2 class="text-2xl font-semibold text-gray-800">Complete Payment</h2>
            <p class="text-gray-500 text-sm mt-1">Securely powered by Razorpay</p>
        </div>

        <div class="bg-gray-50 rounded-xl p-5 mb-8 border border-gray-100">
            <div class="flex justify-between items-center mb-3">
                <span class="text-gray-600">Product Subscription</span>
                <span class="text-gray-800 font-medium">₹500.00</span>
            </div>
            <div class="h-px bg-gray-200 w-full my-4"></div>
            <div class="flex justify-between items-center">
                <span class="text-gray-800 font-semibold">Total Amount</span>
                <span class="text-xl font-bold text-indigo-600">₹500.00</span>
            </div>
        </div>

        <button 
            id="pay-btn"
            class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-3 px-4 rounded-xl transition-colors duration-200 flex items-center justify-center space-x-2 disabled:opacity-75 disabled:cursor-wait"
        >
            <span id="btn-text">Pay Now</span>
        </button>
    </div>

    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
        const payBtn = document.getElementById('pay-btn');
        const btnText = document.getElementById('btn-text');
        
        const toggleLoading = (isLoading) => {
            payBtn.disabled = isLoading;
            btnText.textContent = isLoading ? 'Processing...' : 'Pay Now';
        };

        const verifyPayment = async (razorpayResponse) => {
            try {
                const response = await fetch("{{ route('payment.verify') }}", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify(razorpayResponse)
                });
                
                const result = await response.json();
                
                if (result.success) {
                    window.location.href = result.redirect_url;
                } else {
                    alert(result.message || 'Payment verification failed. Please contact support.');
                    toggleLoading(false);
                }
            } catch (error) {
                alert('A server error occurred during verification.');
                toggleLoading(false);
            }
        };

        payBtn.addEventListener('click', async () => {
            toggleLoading(true);

            try {
                const orderReq = await fetch("{{ route('payment.order.create') }}", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify({ amount: 500 }) // Adjust amount dynamically as needed
                });

                const paymentData = await orderReq.json();

                if (!paymentData.success) {
                    throw new Error(paymentData.message);
                }

                const options = {
                    key: paymentData.key,
                    amount: paymentData.amount,
                    currency: "INR",
                    name: "{{ config('app.name', 'My Application') }}",
                    description: "Payment for Order",
                    order_id: paymentData.order_id,
                    handler: function (response) {
                        verifyPayment(response);
                    },
                    prefill: {
                        name: "{{ auth()->user()->name ?? '' }}",
                        email: "{{ auth()->user()->email ?? '' }}"
                    },
                    theme: {
                        color: "#4f46e5"
                    },
                    modal: {
                        ondismiss: function() {
                            toggleLoading(false);
                        }
                    }
                };

                const rzp = new Razorpay(options);
                
                rzp.on('payment.failed', function (response) {
                    toggleLoading(false);
                });

                rzp.open();

            } catch (error) {
                alert(error.message || 'Failed to initialize payment.');
                toggleLoading(false);
            }
        });
    </script>
</body>
</html>
