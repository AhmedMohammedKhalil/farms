<?php

namespace App\Http\Livewire\User;

use Livewire\Component;

class Balance extends Component
{
    public $balance;
    public $flag = false;
    protected $listeners = [
        'changeBalance',
    ];

    public function changeBalance($balance) {
        $this->flage = true;
        $this->balance =$balance;
    }
    public function render()
    {
        $this->balance = $this->flag == true ? $this->balance : auth('user')->user()->balance;
        return view('livewire.user.balance');
    }
}
