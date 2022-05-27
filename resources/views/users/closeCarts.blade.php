@extends('layout')
@section('title', 'جميع الفواتير')
@section('main')
<section class="cart-area pt-100 pb-100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                    <div class="table-content table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>عدد المشتريات</th>
                                    <th>الإجمالى</th>
                                    <th>عرض</th>
                                </tr>
                                @if($carts->count() == 0)
                                    <tr>
                                        <th colspan="4">لا يوجد فواتير</th>
                                    </tr>
                                @endif
                            </thead>
                            <tbody>
                                @foreach ($carts as $cart)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $cart->orders->count() }}</td>
                                        <td>{{ round($cart->total, 2) }} دينار كويتى </td>
                                        <td><a href="{{ route('user.orders',['id' => $cart->id]) }}"><i class="fa fa-eye"></i></a></td>
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
