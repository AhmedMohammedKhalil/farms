@extends('layout')
@section('title', 'تسجيل دخول')
@section('main')
<section class="checkout-area pb-70 pt-70" >
    <div class="container">
            <div class="row">
                <div class="col-lg-6 m-auto">
                    <div class="checkbox-form">
                        <div class="row">
                            <div class="col-md-12">
                                @livewire('user.login')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</section>
@endsection
