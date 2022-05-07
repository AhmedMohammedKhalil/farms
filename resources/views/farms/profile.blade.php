@extends('farms.layout')
@section('title','البروفايل')
@section('article')
<div class="team-member-info">
    <div class="container">
        <div class="row align-items-center flex-column">
            <div class="col-xl-6 col-lg-6">
                <div class="member-d-image mb-30">
                    @if(auth('farm')->user()->image)
                        <img src="{{ asset('assets/img/farms/'.auth('farm')->user()->id.'/'.auth('farm')->user()->image) }}" alt="" class="img-fluid rounded-circle">
                    @else
                        <img src="{{ asset('assets/img/farms/default.png') }}" alt="" class="img-fluid rounded-circle">
                    @endif
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 text-center">
                <h2>{{ auth('farm')->user()->name }}</h2>
                <h2>{{ auth('farm')->user()->owner_name }}</h2>
                <h4>{{ auth('farm')->user()->email }}</h4>
                <h4>{{ auth('farm')->user()->phone }}</h4>
                <p>{{ auth('farm')->user()->address }}</p>
                <p>{{ auth('farm')->user()->details }}</p>


            </div>
        </div>
    </div>
</div>
@endsection
