<?php

namespace App\Http\Controllers;

use App\Models\wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please login to view your wishlist');
        }
        $wishlists = wishlist::with('product')->where('user_id', Auth::id())->get();
        return view('website.wishlist', compact('wishlists'));
    }

    public function store(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please login to add items to wishlist');
        }
        
        $request->validate([
            'product_id' => 'required|exists:products,id'
        ]);

        $exists = wishlist::where('user_id', Auth::id())
                    ->where('product_id', $request->product_id)
                    ->exists();

        if (!$exists) {
            wishlist::create([
                'user_id' => Auth::id(),
                'product_id' => $request->product_id,
            ]);
        }

        return redirect()->back()->with('success', 'Product added to wishlist successfully!');
    }

    public function destroy($id)
    {
        $wishlist = wishlist::where('id', $id)->where('user_id', Auth::id())->first();
        if ($wishlist) {
            $wishlist->delete();
        }
        return redirect()->back()->with('success', 'Product removed from wishlist!');
    }

    public function adminIndex()
    {
        $wishlists = wishlist::with(['product', 'user'])->latest()->get();
        return view('admin.admin_wishlist', compact('wishlists'));
    }

    public function adminDestroy($id)
    {
        wishlist::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Wishlist record deleted successfully!');
    }
}
