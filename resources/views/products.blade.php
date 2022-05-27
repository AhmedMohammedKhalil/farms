@extends('layout')
@section('title', 'المنتجات')
@push('css')
    <style>
        main {
            background-image: url('{{ asset('assets/img/bg/bg2.png') }}')
        }
    </style>
@endpush
@section('main')
    <!-- shop-area-start -->
    @include('common.products',['col'=>'col-lg-4 col-md-12','products'=>$products])
    <!-- shop modal end -->
@endsection
