<form wire:submit.prevent='add'>
    @if (session()->has('error'))
        <div class="col-lg-12 alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <div class="checkout-form-list">
        <label>اسم المنتج<span class="required">*</span></label>
        <input type="text"  wire:model.lazy='name' placeholder="اسم المنتج" />
        @error('name') <span class="text-danger error">{{ $message }}</span>@enderror
    </div>
    <div class="checkout-form-list">
        <label>سعر المنتج<span class="required">*</span></label>
        <input type="number" value="{{ $price }}" step="0.01" min="0.01" wire:model.lazy='price' class="form-control"/>
        @error('price') <span class="text-danger error">{{ $message }}</span>@enderror
    </div>

    <div class="checkout-form-list">
        <label>الكمية<span class="required">*</span></label>
        <input type="number" value="{{ $qty }}"  min="1" wire:model.lazy='qty'  class="form-control"/>
        @error('qty') <span class="text-danger error">{{ $message }}</span>@enderror
    </div>

    <div class="checkout-form-list">
        <label>نوع المنتج<span class="required">*</span></label>
        <select  wire:model.lazy='category_id' placeholder="نوع المنتج" class="form-control">
            @foreach ($categories as $c)
                <option value="{{ $c->id }}">{{ $c->title }}</option>
            @endforeach
        </select>
        @error('category_id') <span class="text-danger error">{{ $message }}</span>@enderror
    </div>

    <div id="cbox_info" class="checkout-form-list">
        <label>صورة المنتج</label>
        <input type="file" wire:model.lazy='image' placeholder="صورة المنتج" />
        @error('image') <span class="text-danger error">{{ $message }}</span>@enderror

    </div>

    <div class="checkout-form-list">
        <label>التفاصيل<span class="required">*</span></label>
        <textarea id="checkout-mess" wire:model.lazy='details' class="form-control" rows="5" placeholder="اكتب التفاصيل هنا"></textarea>
        @error('details') <span class="text-danger error">{{ $message }}</span>@enderror

    </div>



    <div class="order-button-payment mt-20">
        <button type="submit" class="tp-btn-h1">إضافة</button>
    </div>
</form>
