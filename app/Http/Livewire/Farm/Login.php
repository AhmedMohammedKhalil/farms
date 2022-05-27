<?php

namespace App\Http\Livewire\Farm;

use App\Models\Farm;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{
    public $email;
    public $password;

    protected $rules = [
        'email'   => 'required|email|exists:farms,email',
        'password' => 'required|min:8'
    ];

    protected $messages = [
        'required' => 'ممنوع ترك الحقل فارغاَ',
        'min' => 'لابد ان يكون الحقل مكون على الاقل من 8 خانات',
        'email' => 'هذا الإيميل غير صحيح',
        'exists' => 'هذا الايميل غير مسجل فى الموقع'
    ];

    public function login()
    {
        $validatedData = $this->validate();
        $data = array_merge(
            $validatedData,
            ['status' => 1]
        );
        if (Auth::guard('farm')->attempt($data)) {
            session()->flash('message', "تم تسجيل الدخول بنجاح");
            return redirect()->route('home');
        } else {
            $farm = Farm::where('email',$this->email)->first();
            if($farm->status == 0)
                session()->flash('error', 'عذرا لا يتم الموافقه عليك الى الان');
            else if($farm->status == 2)
                session()->flash('error', 'عذرا تم رفضك من قبل المسئولين');
            else
                session()->flash('error', 'الايميل او كلمة السر غير صحيح');
        }
    }
    public function render()
    {
        return view('livewire.farm.login');
    }
}
