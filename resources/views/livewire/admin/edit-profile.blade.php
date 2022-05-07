<form wire:submit.prevent='edit'>
    @if (session()->has('error'))
        <div class="col-lg-12 alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <div class="checkout-form-list">
        <label>الاسم<span class="required">*</span></label>
        <input type="text"  wire:model.lazy='name' placeholder="الاسم" />
        @error('name') <span class="text-danger error">{{ $message }}</span>@enderror
    </div>
    <div class="checkout-form-list">
        <label>الإيميل<span class="required">*</span></label>
        <input type="email"  wire:model.lazy='email' placeholder="الايميل" />
        @error('email') <span class="text-danger error">{{ $message }}</span>@enderror

    </div>

    <div id="cbox_info" class="checkout-form-list">
        <label>الصورة الشخصية</label>
        <input type="file" wire:model.lazy='image' placeholder="الصورة الشخصية" />
        @error('image') <span class="text-danger error">{{ $message }}</span>@enderror

    </div>

    <div id="cbox_info" class="checkout-form-list">
        <label>الباسورد</label>
        <input type="password" wire:model.lazy='password' placeholder="الباسورد" />
        @error('password') <span class="text-danger error">{{ $message }}</span>@enderror

    </div>
    <div id="cbox_info" class="checkout-form-list">
        <label>اعد الباسورد</label>
        <input type="password" wire:model.lazy='confirm_password' placeholder="اعد الباسورد" />
        @error('confirm_password') <span class="text-danger error">{{ $message }}</span>@enderror

    </div>


    <div class="order-button-payment mt-20">
        <button type="submit" class="tp-btn-h1">حفظ التغييرات</button>
    </div>
</form>