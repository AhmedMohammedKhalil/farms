
@extends('farms.layout')
@section('title', 'تعديل منتج جديد')
@section('article')
<section class="checkout-area pb-70">
    <div class="container">
            <div class="row">
                <div class="col-lg-6 m-auto">
                    <div class="checkbox-form">
                        <div class="row">
                            @livewire('farm.product.edit',['product_id' => $product->id])
                        </div>
                    </div>
                </div>
            </div>
    </div>
</section>
@endsection
