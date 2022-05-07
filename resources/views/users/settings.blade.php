
@extends('users.layout')
@section('title', 'الإعدادات')
@section('article')
<section class="checkout-area pb-70">
    <div class="container">
            <div class="row">
                <div class="col-lg-6 m-auto">
                    <div class="checkbox-form">
                        <div class="row">
                            @livewire('user.edit-profile')
                        </div>
                    </div>
                </div>
            </div>
    </div>
</section>
@endsection
