<?php

namespace App\Http\Livewire\Admin\Category;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\File;

class Edit extends Component
{
    use WithFileUploads;
    public $title, $image,$cat;


    public function mount($category_id)
    {
        $this->cat = Category::find($category_id);
        $this->title = $this->cat->title;
    }


    protected $rules = [
        'title' => ['required', 'string', 'max:100'],
    ];

    public function updatedimage()
    {
            $validatedata = $this->validate(
                ['iamge' => ['image','mimes:jpeg,jpg,png','max:2048']]
            );
    }

    protected $messages = [
        'required' => 'ممنوع ترك الحقل فارغاَ',
        'image' => 'لابد ان يكون المف صورة',
        'mimes' => 'لابد ان يكون الصورة jpeg,jpg,png',
        'image.max' => 'يجب ان تكون الصورة اصغر من 2 ميجا',
        'max' => 'لابد ان يكون الحقل مكون على الاكثر من 100 خانة',
    ];



    public function edit()
    {
        $validatedata = $this->validate();
        if (!$this->image)
            Category::whereId($this->cat->id)->update($validatedata);
        if ($this->image) {
            $this->updatedImage();
            $imagename = $this->image->getClientOriginalName();
            Category::whereId($this->cat->id)->update(array_merge($validatedata, ['image' => $imagename]));
            $dir = public_path('assets/img/categories/' . $this->cat->id);
            if (file_exists($dir))
                File::deleteDirectories($dir);
            else
                mkdir($dir);
            $this->image->storeAs('categories/' . $this->cat->id, $imagename);
            File::deleteDirectory(public_path('assets/img/livewire-tmp'));
        }
        session()->flash('message', "تم إتمام العملية بنجاح");
        return redirect()->route('admin.categories');
    }
    public function render()
    {
        return view('livewire.admin.category.edit');
    }
}
