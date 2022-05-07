@extends('users.layout')
@section('title','البروفايل')
@section('article')
<div class="team-member-info">
    <div class="container">
        <div class="row align-items-center flex-column">
            <div class="col-xl-6 col-lg-6">
                <div class="member-d-image mb-30">
                    @if(auth('user')->user()->image)
                        <img src="{{ asset('assets/img/users/'.auth('user')->user()->id.'/'.auth('user')->user()->image) }}" alt="" class="img-fluid rounded-circle">
                    @else
                        <img src="{{ asset('assets/img/users/default.jpg') }}" alt="" class="img-fluid rounded-circle">
                    @endif
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 text-center">
                <h2>{{ auth('user')->user()->name }}</h2>
                <h4>{{ auth('user')->user()->email }}</h4>
                <h4>{{ auth('user')->user()->phone }}</h4>
                <h4>نقودك : {{ auth('user')->user()->balance }}</h4>
                <p>{{ auth('user')->user()->address }}</p>

            </div>
        </div>
    </div>
</div>
@endsection
