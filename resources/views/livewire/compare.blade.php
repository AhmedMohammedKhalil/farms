<form wire:submit.prevent='compare'>
    @if (session()->has('error'))
        <div class="col-lg-12 alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <div class="row">
        <div class="checkout-form-list  col-lg-6 col-md-12">
            <label>المنتج الاول<span class="required">*</span></label>
            <select  wire:model.lazy='product1_id' placeholder="المنتج" class="form-control">
                <option value="0">اختر منتج</option>
                @foreach ($initialProducts as $p)
                    <option value="{{ $p->id }}" @if($product1_id == $p->id) selected @endif>{{ $p->farm->name.' - '.$p->name }}</option>
                @endforeach
            </select>
            @error('product1_id') <span class="text-danger error">{{ $message }}</span>@enderror
        </div>

        <div class="checkout-form-list  col-lg-6 col-md-12">
            <label>المنتج الثانى<span class="required">*</span></label>
            <select  wire:model.lazy='product2_id' placeholder="المنتج" class="form-control">
                <option value="0">اختر منتج</option>
                @foreach ($initialProducts as $p)
                    <option value="{{ $p->id }}" @if($product2_id == $p->id) selected @endif>{{ $p->farm->name.' - '.$p->name }}</option>
                @endforeach
            </select>
            @error('product2_id') <span class="text-danger error">{{ $message }}</span>@enderror
        </div>

        <div class="order-button-payment mt-20 col-lg-4 col-md-12 m-auto">
            <button type="submit" class="tp-btn-h1">مقارنة</button>
        </div>
    </div>

</form>
