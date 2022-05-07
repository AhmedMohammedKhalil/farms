@extends('layouts.app')
@section('content')
    <!-- banner-area-start -->
    <div class="banner-area pt-200 pb-180" data-background="{{ asset('assets/img/bg/hero-2.jpg')}}" dir="ltr">
        <div class="container">
            <div class="row justify-content-start">
                <div class="col-xl-5 col-lg-7 col-md-9 col-12 col-xm">
                    <div class="banner-content banner-content-2"  style="padding-top: 63px;">
                        <div class="banner-info text-center">
                            <div class="baner-icon">
                                <i class="flaticon-grass"></i>
                            </div>
                            <h3 class="banner-title-h1 banner-title">Farms National</h3>
                        </div>
                        <div class="banner-shape-bg">
                            <img src="{{ asset('assets/img/bg/banner-bg-shape.png') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="tp-supporter__area pt-120">
        <div class="container">
            <div class="tp-section-wrap text-center">
                <span><i class="flaticon-grass"></i></span>
                <h3 class="tp-section-title">انواع المحاصيل</h3>
            </div>
            <div class="row no-gutters mt-50">
                <div class="col-xl-12">
                    <div class="row text-center">


                        @foreach ($categories as $c)
                            <div class="tp-supporter__thumb col-3 mb-50">
                                <a href="{{ route('products',['id'=>$c->id , 'type' => 'category']) }}">
                                    @if($c->image != null)
                                        <img style="width: 150px; height:150px;border-radius:20px" src="{{ asset('assets/img/categories/'.$c->id.'/'.$c->image) }}" alt="client-1" ><br>
                                    @else
                                        <img style="width: 150px; height:150px;border-radius:20px" src="{{ asset('assets/img/categories/default.jpg') }}" alt="client-1"><br>
                                    @endif
                                    <span>{{ $c->title }}</span>
                                </a>
                            </div>
                        @endforeach




                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- company-features-start -->
    <div class="company-features pt-120 pb-90">
        <div class="container">
            <div class="tp-section-wrap text-center">
                <span><i class="flaticon-grass"></i></span>
                <h3 class="tp-section-title">مزارعنا</h3>
            </div>
            <div class="company-features-list mt-50">
                <div class="row">

                    @foreach ($farms as $f)
                        <div class="col-xl-4 col-lg-4 col-md-6">
                            <div class="company-features-item mb-30">
                                <div class="features-item text-center">
                                    @if($f->image != null)
                                        <img style="width:100%;height:250px;border-radius:20px" src="{{ asset('assets/img/farms/'.$f->id.'/'.$f->image) }}" alt="farms" ><br>
                                    @else
                                        <img style="width:100%;height:250px;border-radius:20px" src="{{ asset('assets/img/farms/default.png') }}" alt="farms"><br>
                                    @endif
                                    <h4 class="features-item-title">{{ $f->name }}</h4>
                                    <h5 class="">{{ $f->owner_name }}</h5>
                                    <h6 class="">{{ $f->phone }}</h6>
                                    <p>{{ $f->address }}</p>
                                </div>
                                <div class="features-item-btton">
                                    <a href="{{ route('products',['id'=>$f->id , 'type' => 'farm']) }}" class="features-btn">منتجاتنا<i class="fal fa-arrow-left"></i></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection
