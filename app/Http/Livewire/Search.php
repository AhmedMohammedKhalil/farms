<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Farm;
use App\Models\Product;
use Livewire\Component;

class Search extends Component
{

    public $search;
    public $products;
    public $categories;
    public $farms;

    public function searchByValue() {
        if($this->search != "") {
            $this->products = Product::where('name','like','%'.$this->search.'%')->get();
        } else {
            $this->products = Product::all();
        }
        $this->emitTo(Searching::class,'showResult',$this->products);

    }

    public function searchByCategory($id) {
        $this->products = Product::where('category_id',$id)->get();
        $this->search = "";
        $this->emitTo(Searching::class,'showResult',$this->products);

    }

    public function searchByFarm($id) {
        $this->products = Product::where('farm_id',$id)->get();
        $this->search = "";
        $this->emitTo(Searching::class,'showResult',$this->products);

    }
    public function render()
    {
        $this->categories = Category::all();
        $this->farms = Farm::all();
        return view('livewire.search');
    }
}
