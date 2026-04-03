<?php

namespace App\Http\Controllers;

use App\Models\cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please login to view your cart');
        }
        $carts = cart::with('product')->where('user_id', Auth::id())->get();
        return view('website.cart', compact('carts'));
    }

    public function store(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please login to add items to cart');
        }
        
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'nullable|integer|min:1'
        ]);

        $cart = cart::where('user_id', Auth::id())
                    ->where('product_id', $request->product_id)
                    ->where('size', $request->size)
                    ->first();

        if ($cart) {
            $cart->quantity += $request->quantity ?? 1;
            $cart->save();
        } else {
            cart::create([
                'user_id' => Auth::id(),
                'product_id' => $request->product_id,
                'quantity' => $request->quantity ?? 1,
                'size' => $request->size,
                'color' => $request->color,
            ]);
        }

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function destroy($id)
    {
        $cart = cart::where('id', $id)->where('user_id', Auth::id())->first();
        if ($cart) {
            $cart->delete();
        }
        return redirect()->back()->with('success', 'Product removed from cart!');
    }

    public function adminIndex()
    {
        $carts = cart::with(['product', 'user'])->latest()->get();
        return view('admin.admin_cart', compact('carts'));
    }

    public function adminDestroy($id)
    {
        cart::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Cart record deleted successfully!');
    }
}
