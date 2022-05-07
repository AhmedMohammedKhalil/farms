@extends('admins.layout')
@section('title','البروفايل')
@section('article')
<div class="team-member-info">
    <div class="container">
        <div class="row align-items-center flex-column">
            <div class="col-xl-6 col-lg-6">
                <div class="member-d-image mb-30">
                    @if(auth('admin')->user()->image)
                        <img src="{{ asset('assets/img/admins/'.auth('admin')->user()->id.'/'.auth('admin')->user()->image) }}" alt="" class="img-fluid rounded-circle">
                    @else
                        <img src="{{ asset('assets/img/admins/default.jpg') }}" alt="" class="img-fluid rounded-circle">
                    @endif
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 text-center">
                <h2>{{ auth('admin')->user()->name }}</h2>
                <h4>{{ auth('admin')->user()->email }}</h4>
            </div>
        </div>
    </div>
</div>
@endsection
