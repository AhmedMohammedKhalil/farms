<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class Searching extends Component
{

    public $products;
    public $flag = false;

    protected $listeners = [
        'showResult',
    ];

    public function showResult($products) {
        $this->flag = true;
        if($products) {
            $ids = [];
            foreach($products as $p) {
                $ids[] = $p['id'];
            }
            $this->products = Product::find($ids);
        } else {
            $this->products = '';
        }
    }
    public function render()
    {
        $this->products = $this->flag == true ? $this->products : Product::all();
        return view('livewire.searching');
    }
}
