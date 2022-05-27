<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class Comparing extends Component
{
    public $products;
    public $flag = false;

    protected $listeners = [
        'showCompareResult',
        'refresh'=>'makeRefresh'
    ];

    public function showCompareResult($ids) {
        $this->flag = true;
        if($ids) {
            $this->products = Product::find($ids);
        } else {
            $this->products = '';
        }
    }

    public function makeRefresh() {
        $this->emit('refreshProduct');
        $this->emit('$refresh');
    }

    public function render()
    {
        $this->products = $this->flag == true ? $this->products : '';
        return view('livewire.comparing');
    }
}
