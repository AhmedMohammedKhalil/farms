<?php

namespace App\Http\Livewire\Farm;

use App\Models\Farm;
use Livewire\WithFileUploads;
use Livewire\TemporaryUploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class EditProfile extends Component
{
    use WithFileUploads;
    public $name,$owner_name, $email, $image, $password, $confirm_password, $phone, $address, $details, $farm_id;


    public function mount()
    {
        $this->farm_id = Auth::guard('farm')->user()->id;
        $this->name = Auth::guard('farm')->user()->name;
        $this->owner_name = Auth::guard('farm')->user()->owner_name;
        $this->email = Auth::guard('farm')->user()->email;
        $this->phone = Auth::guard('farm')->user()->phone;
        $this->address = Auth::guard('farm')->user()->address;
        $this->details = Auth::guard('farm')->user()->details;


    }


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
        'address' => ['required', 'string'],
        'details' => ['required', 'string'],
    ];

    public function updatedImage()
    {
        $validatedata = $this->validate(
            ['image' => ['image', 'mimes:jpeg,jpg,png', 'max:2048']]
        );
    }

    public function updatedPassword()
    {
        $validatedata = $this->validate(
            [
                'password' => ['min:8'],
                'confirm_password' => ['min:8', 'same:password']
            ]
        );
    }

    public function edit()
    {
        $validatedata = $this->validate(
            array_merge(
                $this->rules,
                [
                    'email'   => ['required', 'email', "unique:farms,email," . $this->farm_id],
                ]
            )
        );
        if ($this->password) {
            $this->updatedPassword();
            $validatedata = array_merge(
                $validatedata,
                ['password' => Hash::make($this->password)]
            );
        }
        if (!$this->image)
            Farm::whereId($this->farm_id)->update($validatedata);
        if ($this->image) {
            $this->updatedImage();
            $imagename = $this->image->getClientOriginalName();
            Farm::whereId($this->farm_id)->update(array_merge($validatedata, ['image' => $imagename]));
            $dir = public_path('assets/img/farms/' . $this->farm_id);
            if (file_exists($dir))
                File::deleteDirectories($dir);
            else
                mkdir($dir);
            $this->image->storeAs('farms/' . $this->farm_id, $imagename);
            File::deleteDirectory(public_path('assets/img/livewire-tmp'));
        }
        session()->flash('message', "تم إتمام العملية بنجاح");
        return redirect()->route('farm.profile');
    }
    public function render()
    {
        return view('livewire.farm.edit-profile');
    }
}
