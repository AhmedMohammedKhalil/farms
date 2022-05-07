<?php

namespace App\Http\Livewire\User;

use App\Models\Cart;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Register extends Component
{
    public $name, $email, $password, $confirm_password,$phone,$address;


    protected $rules = [
        'name' => ['required', 'string', 'max:50'],
        'email'   => 'required|email|unique:users,email',
        'password' => ['required', 'string', 'min:8'],
        'confirm_password' => ['required', 'string', 'min:8', 'same:password'],
        'phone' => ['required', 'string', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'min:8', 'max:8'],
        'address' => ['required', 'string'],
    ];

    protected $messages = [
        'required' => 'ممنوع ترك الحقل فارغاَ',
        'min' => 'لابد ان يكون الحقل مكون على الاقل من 8 خانات',
        'max' => 'لابد ان يكون الحقل مكون على الاكثر من 50 خانة',
        'email' => 'هذا الإيميل غير صحيح',
        'unique' => 'هذا الايميل مسجل فى الموقع' ,
        'same' => 'لابد ان يكون الباسورد متطابق',
        'phone.max' => 'لابد ان يكون الحقل لايزيد عن 8',
        'regex' => 'لا بد ان يكون الحقل ارقام فقط',

    ];

    public function register()
    {
        $validatedData = $this->validate();
        $data = array_merge(
            $validatedData,
            [
                'password' => Hash::make($this->password),
            ],
        );
        User::create($data);
        if (Auth::guard('user')->attempt($validatedData)) {
            $user = auth('user')->user();
            Cart::create([
                'status' => 'open',
                'user_id' => $user->id,
                'total' => 0
            ]);
            session()->flash('message', "تم إنشاء الحساب بنجاح");
            return redirect()->route('home');
        }
    }
    public function render()
    {
        return view('livewire.user.register');
    }
}
