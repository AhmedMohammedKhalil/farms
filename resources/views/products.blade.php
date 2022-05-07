@extends('layout')
@section('title', 'المنتجات')
@section('main')
    <!-- shop-area-start -->
    @include('common.products',['col'=>'col-lg-4 col-md-12','products'=>$products])
    <!-- shop modal end -->
@endsection
