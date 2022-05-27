<?php

namespace App\Http\Livewire\User\Cart;

use App\Http\Livewire\Comparing;
use App\Http\Livewire\Products;
use App\Http\Livewire\Searching;
use App\Models\Product;
use App\Models\User;
use Livewire\Component;

class Add extends Component
{
    public $product,$qty, $user, $cart;
    public function mount($p_id) {
        $this->product = Product::whereId($p_id)->first();
        $this->qty = 1;
        $this->user = User::whereId(auth('user')->user()->id)->first();
        $this->cart = $this->user->openCart();
    }




    public function plus() {
        if($this->qty < ($this->product->qty - $this->product->productqty()))
            $this->qty++;
    }

    public function minus() {
        if($this->qty > 1)
            $this->qty--;
    }

    public function add() {
        $t = $this->product->qty - $this->product->productqty();
        $data = $this->validate(
            ['qty' => ['required','numeric','gt:0','lte:'.$t]] ,
            [
                'gt' => 'لابد ان يكون اكبر من 0',
                'required' => 'هذا الحقل مطلوب',
                'lte' => 'لا بد ان يكون الرقم اصغر من او يساوى '.$t
            ]
        );

        $total = $this->qty * $this->product->price;
        $this->cart->products()->attach($this->product->id,['qty' => $this->qty]);
        $this->cart->update(['total' => $this->cart->total + $total]);
        session()->flash('success', 'تم طلبك بنجاح');
        $this->qty = 1;

        $this->emitTo(Products::class,'refresh');
        $this->emitTo(Searching::class,'refresh');
        $this->emitTo(Comparing::class,'refresh');

    }
    public function render()
    {
        return view('livewire.user.cart.add');
    }
}
