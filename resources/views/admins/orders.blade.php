@extends('admins.layout')
@section('title', 'جميع الاوردرات')
@section('article')
<section class="cart-area pt-100 pb-100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                    <div class="table-content table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="product-thumbnail">صورة المشترى</th>
                                    <th class="cart-product-name">اسم المشترى</th>
                                    <th class="cart-product-name">اسم المنتج</th>
                                    <th class="product-price">سعر المنتج</th>
                                    <th class="product-quantity">الكمية</th>
                                    <th class="product-subtotal">الإجمالى</th>
                                </tr>
                                @if($orders->count() == 0)
                                    <tr>
                                        <th colspan="6">لا يوجد مبيعات</th>
                                    </tr>
                                @endif
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td class="product-thumbnail">
                                            @if($order->cart->user->image)
                                                <img src="{{ asset('assets/img/users/'.$order->cart->user->id.'/'.$order->cart->user->image) }}" alt="" style="width:100px;height:100px">
                                            @else
                                                <img src="{{ asset('assets/img/users/default.jpg') }}" alt="" style="width:100px;height:100px">
                                            @endif
                                        </td>
                                        <td class="product-name">{{ $order->cart->user->name }}</td>
                                        <td class="product-name">{{ $order->product->name }}</td>
                                        <td class="product-price">{{ $order->product->price }} دينار كويتى </td>
                                        <td class="product-quantity">{{ $order->qty }}</td>
                                        <td class="product-subtotal">{{ $order->product->price * $order->qty }} دينار كويتى </td>
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </div>
            </div>
        </div>
    </div>
</section>
@endsection
