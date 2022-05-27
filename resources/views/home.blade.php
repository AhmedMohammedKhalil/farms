@extends('layouts.app')

@section('content')
    <!-- banner-area-start -->
    <div class="banner-area pt-200 pb-180" data-background="{{ asset('assets/img/bg/13.jpg')}}" dir="ltr" style="height: 726px">
        <div class="container">
            <div class="d-flex justify-content-center pt-100">
                    <h1 class="landing-title" style="font-size: 115px; color:#31512A">National Farms</h1>
            </div>
        </div>
        <div class="bottom"></div>
    </div>
    @if (session()->has('verify_message'))
    <div class="container">
        <div class="row ">
            <div class="col-lg-12 alert alert-success">
                {{ session('verify_message') }}
            </div>
        </div>
    </div>
    @endif






    <div class="tp-supporter__area pt-120" >
        <div class="container">
            <div class="tp-section-wrap text-center">
                <span><i class="flaticon-grass"></i></span>
                <h3 class="tp-section-title">انواع المحاصيل</h3>
            </div>

            <div class="articles" id="articles">
                <div class="container">
                    @foreach ($categories as $c)
                        <div class="box">
                            @if($c->image != null)
                                <img style="height:150px" src="{{ asset('assets/img/categories/'.$c->id.'/'.$c->image) }}" alt="client-1" ><br>
                            @else
                                <img style="height:150px" src="{{ asset('assets/img/categories/default.jpg') }}" alt="client-1"><br>
                            @endif
                            <div class="content">
                                <h3>{{ $c->title }}</h3>
                            </div>
                            <div class="info">
                                <a href="{{ route('products',['id'=>$c->id , 'type' => 'category']) }}">عرض المنتجات</a>
                                <i class="fas fa-long-arrow-alt-left"></i>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>


        </div>
    </div>


    <!-- company-features-start -->
    <div class="company-features pt-120 pb-90">
        <div class="container">
            <div class="tp-section-wrap text-center">
                <span><i class="flaticon-grass"></i></span>
                <h2 class="tp-section-title">مزارعنا</h2>
            </div>
            <div class="features" id="features">
                <div class="container">
                @foreach ($farms as $f)
                    <div class="box farm">
                        <div class="img-holder">
                            @if($f->image != null)
                                <img style="width:100%;height:300px;" src="{{ asset('assets/img/farms/'.$f->id.'/'.$f->image) }}" alt="farms" ><br>
                            @else
                                <img style="width:100%;height:300px;" src="{{ asset('assets/img/farms/default.png') }}" alt="farms"><br>
                            @endif
                        </div>
                        <h2>{{ $f->name }}</h2>
                        <div>
                            <h4 class="">{{ $f->owner_name }}</h4>
                            <h4 class="">{{ $f->phone }}</h4>
                            <p>{{ $f->address }}</p>
                        </div>

                        <a href="{{ route('products',['id'=>$f->id , 'type' => 'farm']) }}">منتجاتنا</a>
                    </div>
                @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection
