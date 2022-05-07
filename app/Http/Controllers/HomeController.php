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
        $farms = Farm::all();
        return view('home',compact('categories','farms'));
    }


    public function showProducts(Request $r) {
        $products = Product::all();
        if($r->type) {
            if($r->type == 'category')
            {
                $products = Product::where('category_id',$r->id)->get();
            }
            else
            {
                $products = Product::where('farm_id',$r->id)->get();
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
