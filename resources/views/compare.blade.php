@extends('layout')
@section('title', 'مقارنة')
@section('main')
<div class="news-detalis-area mt-65 mb-65" style="min-height:40vh">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <section class="checkout-area">
                    <div class="container">
                            <div class="row">
                                <div class="col-lg-12 m-auto">
                                    <div class="checkbox-form">
                                        <div class="row">
                                            @livewire('compare')
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </section>
            </div>
            <div class="col-xl-12 col-lg-12">
                @livewire('comparing')
            </div>

        </div>
    </div>
</div>
@endsection
