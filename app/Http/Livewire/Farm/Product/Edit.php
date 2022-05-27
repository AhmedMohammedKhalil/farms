<?php

namespace App\Http\Livewire\Farm\Product;

use App\Models\Category;
use App\Models\Product;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\File;
use Livewire\Component;

class Edit extends Component
{

    use WithFileUploads;

    public $name,$price,$qty,$details,$image,$product,$category_id,$categories;

    public function mount($product_id) {
        $this->product = Product::whereId($product_id)->first();
        $this->name = $this->product->name;
        $this->price = $this->product->price;
        $this->qty = $this->product->qty;
        $this->details = $this->product->details;
        $this->category_id = $this->product->category->id;
    }

    protected $rules = [
        'name' => ['required', 'string', 'max:100'],
        'price' => ['required','numeric','gt:0'],
        'details' => ['required', 'string'],
        'category_id' => ['required']

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

    public function edit() {
        $gt = $this->product->productqty() > 0 ? $this->product->productqty() : -1;

        $data = $this->validate(array_merge(
            $this->rules,
            [
                'qty' => ['required','numeric','gt:'.$gt],
            ]
            ),
            array_merge(
                $this->messages,
                [
                    'qty.gt' => 'لا بد ان يكون اكبر من '.$gt
                ]
            )
        );
        $imagename = "";
        if($this->image) {
            $imagename = $this->image->getClientOriginalName();
            $data = array_merge($data,['image' => $imagename]);
        }
        if($this->qty == 0) {
            $data = array_merge(
                $data,
                ['available' => 0]
            );
        } else {
            $data = array_merge(
                $data,
                ['available' => 1]
            );
        }
        Product::whereId($this->product->id)->update($data);
        if($this->image) {
            $dir = public_path('img/products/'.$this->product->id);
            if(file_exists($dir))
                File::deleteDirectories($dir);
            else
                mkdir($dir);
            $this->image->storeAs('products/'.$this->product->id,$imagename);
            File::deleteDirectory(public_path('img/livewire-tmp'));
        }
        session()->flash('message', "تم تعديل المنتج بنجاح");
        return redirect()->route('farm.products');
    }
    public function render()
    {
        $this->categories = Category::all();
        return view('livewire.farm.product.edit');
    }
}
