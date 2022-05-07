<?php

namespace App\Http\Controllers;

use App\Models\Farm;
use App\Models\Order;
use Illuminate\Http\Request;

class FarmController extends Controller
{
    public function showLogin()
    {
        return view('farms.login');
    }


    public function showRegister()
    {
        return view('farms.register');
    }


    public function profile()
    {
        return view('farms.profile');
    }

    public function settings()
    {
        return view('farms.settings');
    }


    public function showOrders() {

        $products = auth('farm')->user()->products;
        $ids = [];
        foreach($products as $p)
            array_push($ids,$p->id);
        $orders = Order::whereIn('product_id',$ids)->get();
        return view('farms.orders',compact('orders'));
    }

    public function logout(Request $request)
    {
        auth('farm')->logout();
        $request->session()->invalidate();
        return redirect()->route('home');
    }




    public function index() {
        $farms = Farm::all();
        return view('admins.farms.index',compact('farms'));
    }


    public function create() {
        return view('admins.farms.add');
    }


    public function edit(Request $r) {
        $farm = Farm::find($r->id);
        return view('admins.farms.edit',compact('farm'));
    }


    public function delete(Request $r) {
        Farm::destroy($r->id);
        return redirect()->route('admin.farms');
    }



}
