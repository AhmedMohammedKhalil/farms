<?php

namespace App\Http\Livewire\Farm;

use App\Models\Farm;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Register extends Component
{
    use WithFileUploads;
    public $name, $email, $image, $password, $confirm_password, $phone, $address, $details, $owner_name;
    protected $messages = [
        'required' => 'ممنوع ترك الحقل فارغاَ',
        'min' => 'لابد ان يكون الحقل مكون على الاقل من 8 خانات',
        'email' => 'هذا الإيميل غير صحيح',
        'name.max' => 'لابد ان يكون الحقل مكون على الاكثر من 50 خانة',
        'owner_name.max' => 'لابد ان يكون الحقل مكون على الاكثر من 50 خانة',
        'unique' => 'هذا الايميل مسجل فى الموقع',
        'same' => 'لابد ان يكون الباسورد متطابق',
        'image'=> 'لابد ان يكون المف صورة',
        'mimes'=> 'لابد ان يكون الصورة jpeg,jpg,png',
        'image.max' => 'يجب ان تكون الصورة اصغر من 2 ميجا',
        'phone.max' => 'لابد ان يكون الحقل لايزيد عن 8',
        'regex' => 'لا بد ان يكون الحقل ارقام فقط',

    ];

    protected $rules = [
        'name' => ['required', 'string', 'max:50'],
        'owner_name' => ['required', 'string', 'max:50'],
        'phone' => ['required', 'string', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'min:8', 'max:8'],
        'password' => ['min:8'],
        'confirm_password' => ['min:8', 'same:password'],
        'email'   => ['required', 'email', "unique:farms,email"],
        'address' => ['required', 'string'],
        'details' => ['required', 'string'],
    ];

    public function updatedImage()
    {
        $validatedata = $this->validate(
            ['image' => ['image', 'mimes:jpeg,jpg,png', 'max:2048']]
        );
    }


    public function register()
    {
        $validatedata = $this->validate();
        $validatedata = array_merge(
            $validatedata,
            ['password' => Hash::make($this->password)]
        );


        if($this->image) {
            $imagename = $this->image->getClientOriginalName();
            $validatedata = array_merge($validatedata,['image' => $imagename]);
        }

        $farm = Farm::Create($validatedata);


        if($this->image) {
            $dir = public_path('img/farms/'.$farm->id);
            if(file_exists($dir))
                File::deleteDirectories($dir);
            else
                mkdir($dir);
            $this->image->storeAs('farms/'.$farm->id,$imagename);
            File::deleteDirectory(public_path('img/livewire-tmp'));
        }
        session()->flash('verify_message', "تم التسجيل بنجاح. يرجى الانتظار لكى يتم الموافقه عليك");
        return redirect()->route('home');
    }
    public function render()
    {
        return view('livewire.farm.register');
    }
}
