<form wire:submit.prevent='add'>
    <div class="pro-quan-area d-lg-flex align-items-center">
        <div class="product-quantity mr-20 mb-25">
            <div class="mycart-plus-minus p-relative">
                <div class="dec qtybutton" wire:click='minus'>-</div>
                <input type="text" wire:model='qty' value="1" />
                <div class="inc qtybutton" wire:click='plus'>+</div>
            </div>
        </div>
        <div class="pro-cart-btn mb-25">
            <button class="tp-btn-h1" type="submit">أضف للعربة</button>
        </div>
    </div>
    @if (session()->has('success'))
        <div class="col-lg-12 alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if (session()->has('error'))
    <div class="col-lg-12 alert alert-danger">
        {{ session('error') }}
    </div>
@endif
</form>
