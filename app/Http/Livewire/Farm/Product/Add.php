<?php

namespace App\Http\Livewire\Farm\Product;

use App\Models\Category;
use App\Models\Product;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\File;
use Livewire\Component;

class Add extends Component
{
    use WithFileUploads;

    public $name,$price,$details,$image,$category_id,$categories;

    protected $rules = [
        'name' => ['required', 'string', 'max:100'],
        'price' => ['required','numeric','gt:0'],
        'details' => ['required', 'string'],
        'category_id' => ['required'],
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
        'gt' => 'لابد ان يكون الرقم اكبر من 0',
        'numeric' => 'لابد ان يكون الحقل رقم'
    ];

    public function add() {
        $data = $this->validate();
        $data = array_merge($data,['farm_id' => auth('farm')->user()->id]);
        $imagename = "";
        if($this->image) {
            $imagename = $this->image->getClientOriginalName();
            $data = array_merge($data,['image' => $imagename]);
        }
        $product = Product::create($data);
        if($this->image) {
            $dir = public_path('img/products/'.$product->id);
            if(file_exists($dir))
                File::deleteDirectories($dir);
            else
                mkdir($dir);
            $this->image->storeAs('products/'.$product->id,$imagename);
            File::deleteDirectory(public_path('img/livewire-tmp'));
        }
        session()->flash('message', "تم إضافة المنتج بنجاح");
        return redirect()->route('farm.products');
    }

    public function render()
    {
        $this->categories = Category::all();
        return view('livewire.farm.product.add');
    }
}
