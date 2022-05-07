<form wire:submit.prevent='login'>
    @if (session()->has('error'))
        <div class="col-lg-12 alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <div class="checkout-form-list">
        <label>الإيميل<span class="required">*</span></label>
        <input type="email"  wire:model.lazy='email' placeholder="الايميل" />
        @error('email') <span class="text-danger error">{{ $message }}</span>@enderror

    </div>
    <div id="cbox_info" class="checkout-form-list">
        <label>الباسورد<span class="required">*</span></label>
        <input type="password" wire:model.lazy='password' placeholder="الباسورد" />
        @error('password') <span class="text-danger error">{{ $message }}</span>@enderror

    </div>
    <div class="order-button-payment mt-20">
        <button type="submit" class="tp-btn-h1">تسجيل دخول</button>
    </div>
</form>
