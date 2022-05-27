@extends('layouts.app')
@section('content')
            <!-- page__title -start -->
            <div class="page__title align-items-center theme-bg-primary-h1 pt-140 pb-135" style=" background-image : url('{{ asset('assets/img/bg/layout.jpg') }}');background-size:cover">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="page__title-content text-center">
                                <h3 class="breadcrumb-title breadcrumb-title-sd mt-30">@yield('title')</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- page__title -end -->
            @yield('main')
@endsection
