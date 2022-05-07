<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class Compare extends Component
{

    public $product1_id,$product2_id,$initialProducts;

    protected $rules = [

        'product1_id' => ['required','gt:0'],
        'product2_id' => ['required','gt:0'],

    ];

    protected $messages = [
        'required' => 'ممنوع ترك الحقل فارغاَ',
        'gt' => 'لابد من اختيار منتج'
    ];

    public function compare() {
        $data = $this->validate();
        $ids = [$this->product1_id,$this->product2_id];
        $this->emitTo(Comparing::class,'showCompareResult',$data);
    }
    public function render()
    {
        $this->initialProducts = Product::all();
        return view('livewire.compare');
    }
}
