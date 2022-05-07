<form wire:submit.prevent='add'>
    @if (session()->has('error'))
        <div class="col-lg-12 alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <div class="checkout-form-list">
        <label>الاسم<span class="required">*</span></label>
        <input type="text"  wire:model.lazy='title' placeholder="الاسم" />
        @error('title') <span class="text-danger error">{{ $message }}</span>@enderror
    </div>


    <div id="cbox_info" class="checkout-form-list">
        <label>صورة نوع المحصول</label>
        <input type="file" wire:model.lazy='image' placeholder="صورة نوع المحصول" />
        @error('image') <span class="text-danger error">{{ $message }}</span>@enderror

    </div>




    <div class="order-button-payment mt-20">
        <button type="submit" class="tp-btn-h1">إضافة</button>
    </div>
</form>
