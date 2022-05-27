<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Farm;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $categories = Category::all();
        $farms = Farm::where('status',1)->get();
        return view('home',compact('categories','farms'));
    }


    public function showProducts(Request $r) {
        $products = Product::where('available',1)->get();
        if($r->type) {
            if($r->type == 'category')
            {
                $products = Product::where('category_id',$r->id)->where('available',1)->get();
            }
            else
            {
                $products = Product::where('farm_id',$r->id)->where('available',1)->get();
            }
        }
        return view('products',compact('products'));
    }


    public function search() {
        return view('search');
    }

    public function showAbout() {
        return view('about');
    }


    public function showCompare() {
        return view('compare');
    }
}
