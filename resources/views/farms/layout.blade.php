@extends('layout')
@section('main')
<div class="services-details-area mt-120 mb-40">
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-4">
                <div class="services-sidebar">
                    <div class="sidebar-widget mb-40">
                        @include('farms.menu')
                    </div>
                </div>
            </div>
            <div class="col-xl-9 col-lg-8">
                @yield('article')
            </div>
        </div>
    </div>
</div>
@endsection
