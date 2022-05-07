@extends('layout')
@section('title', 'بحث')
@section('main')
<div class="news-detalis-area mt-120 mb-65">
    <div class="container">
        <div class="row">
            <div class="col-xl-4 col-lg-4">
                <div class="news-sidebar pl-10">
                    @livewire('search')
                </div>
            </div>
            <div class="col-xl-8 col-lg-8">
                @livewire('searching')
            </div>

        </div>
    </div>
</div>
@endsection
