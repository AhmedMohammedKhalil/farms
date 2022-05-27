<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Products extends Component
{
    public $products,$col;
    public function mount($col,$products) {
        $this->col = $col;
        $this->products = $products;

        //dd($this->products);
    }

    protected $listeners = [
        'refresh' => 'makeRefresh'
    ];

    public function makeRefresh() {
        $this->emit('refreshProduct');
        $this->emit('$refresh');
    }
    public function render()
    {
        return view('livewire.products');
    }
}
