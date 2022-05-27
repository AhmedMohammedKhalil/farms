<form wire:submit.prevent='register'>
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
        <label>صاحب المزرعة<span class="required">*</span></label>
        <input type="text"  wire:model.lazy='owner_name' placeholder="صاحب المزرعة" />
        @error('owner_name') <span class="text-danger error">{{ $message }}</span>@enderror
    </div>
    <div class="checkout-form-list">
        <label>الإيميل<span class="required">*</span></label>
        <input type="email"  wire:model.lazy='email' placeholder="الايميل" />
        @error('email') <span class="text-danger error">{{ $message }}</span>@enderror

    </div>
    <div class="checkout-form-list">
        <label>الموبايل<span class="required">*</span></label>
        <input type="text" wire:model.lazy='phone' placeholder="الموبايل" />
        @error('phone') <span class="text-danger error">{{ $message }}</span>@enderror

    </div>
    <div id="cbox_info" class="checkout-form-list">
        <label>الصورة الشخصية</label>
        <input type="file" wire:model.lazy='image' placeholder="الصورة الشخصية" />
        @error('image') <span class="text-danger error">{{ $message }}</span>@enderror

    </div>
    <div class="checkout-form-list">
        <label>العنوان<span class="required">*</span></label>
        <textarea id="checkout-mess" wire:model.lazy='address' class="form-control" rows="5" placeholder="اكتب عنوانك هنا"></textarea>
        @error('address') <span class="text-danger error">{{ $message }}</span>@enderror

    </div>
    <div class="checkout-form-list">
        <label>التفاصيل<span class="required">*</span></label>
        <textarea id="checkout-mess" wire:model.lazy='details' class="form-control" rows="5" placeholder="اكتب التفاصيل هنا"></textarea>
        @error('details') <span class="text-danger error">{{ $message }}</span>@enderror

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
        <button type="submit" class="tp-btn-h1">إنشاء حساب</button>
    </div>
</form>
