<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index() {
        $products = Product::where('farm_id',auth('farm')->user()->id)->get();
        return view('farms.products.index',compact('products'));
    }


    public function create() {
        return view('farms.products.add');
    }


    public function edit(Request $r) {
        $product = Product::find($r->id);
        return view('farms.products.edit',compact('product'));
    }


    public function delete(Request $r) {
        Product::destroy($r->id);
        return redirect()->route('farm.products');
    }
}
