<?php

namespace App\Http\Livewire\Admin\Category;

use App\Models\Category;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\File;
use Livewire\Component;

class Add extends Component
{
    use WithFileUploads;
    public $title,$image;

    protected $rules = [
        'title' => ['required', 'string', 'max:100'],
    ];

    public function updatedimage()
    {
            $validatedata = $this->validate(
                ['image' => ['image','mimes:jpeg,jpg,png','max:2048']]
            );
    }

    protected $messages = [
        'required' => 'ممنوع ترك الحقل فارغاَ',
        'image' => 'لابد ان يكون المف صورة',
        'mimes' => 'لابد ان يكون الصورة jpeg,jpg,png',
        'image.max' => 'يجب ان تكون الصورة اصغر من 2 ميجا',
        'max' => 'لابد ان يكون الحقل مكون على الاكثر من 100 خانة',
    ];

    public function add() {
        $data = $this->validate();
        $imagename = "";
        if($this->image) {
            $imagename = $this->image->getClientOriginalName();
            $data = array_merge($data,['image' => $imagename]);
        }
        $category = Category::create($data);
        if($this->image) {
            $dir = public_path('img/categories/'.$category->id);
            if(file_exists($dir))
                File::deleteDirectories($dir);
            else
                mkdir($dir);
            $this->image->storeAs('categories/'.$category->id,$imagename);
            File::deleteDirectory(public_path('img/livewire-tmp'));
        }
        session()->flash('message', "تم إضافة النوع بنجاح");
        return redirect()->route('admin.categories');
    }

    public function render()
    {
        return view('livewire.admin.category.add');
    }
}
