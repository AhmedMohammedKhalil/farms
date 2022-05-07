@extends('layout')
@section('title', 'إنشاء حساب')
@section('main')
<section class="checkout-area pb-70 pt-70">
    <div class="container">
            <div class="row">
                <div class="col-lg-6 m-auto">
                    <div class="checkbox-form">
                        <div class="row">
                            @livewire('user.register')
                        </div>
                    </div>
                </div>
            </div>
    </div>
</section>
@endsection
