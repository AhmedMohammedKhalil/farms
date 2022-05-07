<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Order;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function showLogin()
    {
        return view('admins.login');
    }

    public function showRegister()
    {
        return view('admins.register');
    }


    public function profile()
    {
        return view('admins.profile');
    }

    public function settings()
    {
        return view('admins.settings');
    }

    public function logout(Request $request)
    {
        auth('admin')->logout();
        $request->session()->invalidate();
        return redirect()->route('home');
    }


    public function showOrders() {

        $orders = Order::all();
        return view('admins.orders',compact('orders'));
    }
}
