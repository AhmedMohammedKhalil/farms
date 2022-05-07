<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() {
        $categories = Category::all();
        return view('admins.categories.index',compact('categories'));
    }


    public function create() {
        return view('admins.categories.add');
    }


    public function edit(Request $r) {
        $category = Category::find($r->id);
        return view('admins.categories.edit',compact('category'));
    }


    public function delete(Request $r) {
        Category::destroy($r->id);
        return redirect()->route('admin.categories');
    }
}
