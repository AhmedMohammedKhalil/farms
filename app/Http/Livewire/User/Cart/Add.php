<?php

namespace App\Http\Livewire\User\Cart;

use App\Http\Livewire\User\Balance;
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
            $this->qty++;
    }

    public function minus() {
        if($this->qty > 1)
            $this->qty--;
    }

    public function add() {
        $total = $this->qty * $this->product->price;
        $this->cart->products()->attach($this->product->id,['qty' => $this->qty]);
        $this->cart->update(['total' => $this->cart->total + $total]);
        session()->flash('success', 'تم طلبك بنجاح');
        $this->qty = 1;

        //$this->user->update(['balance' => $this->user->balance - $total]);
        //$this->emitTo(Balance::class,'changeBalance',$this->user->balance);
        // if($this->user->balance >= $total)
        // {
        //     session()->flash('success', 'تم طلبك بنجاح');
        // } else {
        //     $this->qty = 1;
        //     session()->flash('error', 'لايوجد نقود كافية لإتمام طلبك');
        // }

    }
    public function render()
    {
        return view('livewire.user.cart.add');
    }
}
