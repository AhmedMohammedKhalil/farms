<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showLogin()
    {
        return view('users.login');
    }


    public function showRegister()
    {
        return view('users.register');
    }


    public function profile()
    {
        return view('users.profile');
    }

    public function settings()
    {
        return view('users.settings');
    }

    public function showCart() {
        $cart = User::find(auth('user')->user()->id)->openCart();
        return view('users.cart',compact('cart'));
    }

    public function showCarts() {
        $carts = User::find(auth('user')->user()->id)->closeCarts();
        return view('users.closeCarts',compact('carts'));
    }

    public function showOrders(Request $r) {
        $cart = Cart::find($r->id);
        return view('users.orders',compact('cart'));
    }

    public function delOrder(Request $r) {
        $user = User::find(auth('user')->user()->id);
        $order = Order::find($r->id);
        $total = $order->qty * $order->product->price;
        // $user->update(['balance' => $user->balance + $total]);
        $user->openCart()->update(['total' => $user->openCart()->total - $total]);
        $order->delete();
        return redirect()->route('user.cart');
    }

    public function checkout() {

        $user = User::find(auth('user')->user()->id);
        $user->openCart()->update(['status' => 'close']);
        Cart::create([
            'status' => 'open',
            'user_id' => $user->id,
            'total' => 0
        ]);
        return redirect()->route('user.carts');

    }


    public function logout(Request $request)
    {
        auth('user')->logout();
        $request->session()->invalidate();
        return redirect()->route('home');
    }
}
