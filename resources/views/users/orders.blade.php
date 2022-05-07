@extends('layout')
@section('title', 'المشتريات')
@section('main')
<section class="cart-area pt-100 pb-100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                    <div class="table-content table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="product-thumbnail">صورة المنتج</th>
                                    <th class="cart-product-name">اسم المنتج</th>
                                    <th class="cart-product-name">اسم المزرعة</th>
                                    <th class="product-price">سعر المنتج</th>
                                    <th class="product-quantity">الكمية</th>
                                    <th class="product-subtotal">الإجمالى</th>
                                </tr>
                                @if($cart->orders->count() == 0)
                                    <tr>
                                        <th colspan="6">لا يوجد مشتريات</th>
                                    </tr>
                                @endif
                            </thead>
                            <tbody>
                                @foreach ($cart->orders as $order)
                                    <tr>
                                        <td class="product-thumbnail">
                                            @if($order->product->image)
                                                <img src="{{ asset('assets/img/products/'.$order->product->id.'/'.$order->product->image) }}" alt="" style="width:100px;height:100px">
                                            @else
                                                <img src="{{ asset('assets/img/products/default.jpg') }}" alt="" style="width:100px;height:100px">
                                            @endif
                                        </td>
                                        <td class="product-name">{{ $order->product->name }}</td>
                                        <td class="product-name">{{ $order->product->farm->name }}</td>
                                        <td class="product-price">{{ $order->product->price }} دينار كويتى </td>
                                        <td class="product-quantity">{{ $order->qty }}</td>
                                        <td class="product-subtotal">{{ $order->product->price * $order->qty }} دينار كويتى </td>
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </div>


                    <div class="row justify-content-end">
                        <div class="col-md-5">
                            <div class="cart-page-total">
                                <h2>إجمالى الفاتورة</h2>
                                <ul class="mb-20">
                                    <li>{{ $cart->total }} دينار كويتى </li>
                                </ul>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</section>
@endsection
