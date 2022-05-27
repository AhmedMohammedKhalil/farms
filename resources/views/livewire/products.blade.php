
    <div class="shop-area pt-50 pb-120" style="min-height: 80vh">
        @if($products->count() > 0)
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="shop-content">
                        <div class="product-items mb-40 ">
                            <div class="row portfolio">
                                @foreach ($products as $p)
                                    @if($p->qty - $p->productqty() > 0)
                                        <div class="{{ $col }}">
                                            <div class="box" title="عرض تفاصيل المنتج">
                                                <a href="{{ '#productmodel_'.$p->id }}" data-bs-toggle="modal" data-bs-target="{{ '#productmodel_'.$p->id }}">
                                                    @if($p->image != null)
                                                        <img style="width: 100%;height:300px;border-radius:15px" src="{{ asset('assets/img/products/'.$p->id.'/'.$p->image) }}" alt="product-image">
                                                    @else
                                                        <img style="width: 100%;height:300px;border-radius:15px" src="{{ asset('assets/img/products/default.jpg') }}" alt="product-image">
                                                    @endif
                                                    <div class="caption">
                                                        <h4>{{ $p->name }}</h4>
                                                        <p>{{ $p->price }}  دينار كويتى</p>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        @endif
        @if($products->count() == 0)
            <div>
                <span class="d-block text-center">لايوجد</span>
            </div>
        @endif


        @foreach ($products as $p)
            @if($p->qty - $p->productqty() > 0)
                <div class="modal fade" id="{{ 'productmodel_'.$p->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered product__modal" role="document">
                        <div class="modal-content" >
                            <div class="product__modal-wrapper p-relative">
                                <div class="product__modal-close p-absolute">
                                    <button data-bs-dismiss="modal"><i class="fal fa-times"></i></button>
                                </div>
                                <div class="product__modal-inner">
                                    <div class="row" style="align-items: center;">
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                            <div class="product__modal-box">
                                                <div class="tab-content" >
                                                    <div class="tab-pane fade show active">
                                                        <div class="product__modal-img w-img">
                                                            @if($p->image)
                                                                <img style="width: 397px;height:397px;border-radius:20px" src="{{ asset('assets/img/products/'.$p->id.'/'.$p->image) }}" alt="product-image">
                                                            @endif
                                                            @if(!$p->image)
                                                                <img style="width: 397px;height:397px;border-radius:20px" src="{{ asset('assets/img/products/default.jpg') }}" alt="product-image">
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                            <div class="product__modal-content">
                                                <h4><a href="javascript:void(0)">{{ $p->name }}</a></h4>
                                                <div class="product__stock">
                                                    <span>الحالة : </span>
                                                    <span>@if($p->available == 1) متوفر@else غير متوفر الأن @endif</span>
                                                </div>

                                                <div class="product__stock">
                                                    <span>الكمية المتاحة : </span>
                                                    <span>{{ $p->qty }}</span>
                                                </div>

                                                <div class="product__stock">
                                                    <span>المزرعة : </span>
                                                    <span>{{ $p->farm->name }}</span>
                                                </div>

                                                <div class="product__stock">
                                                    <span>النوع : </span>
                                                    <span>{{ $p->category->title }}</span>
                                                </div>

                                                <div class="product__price">
                                                    <span>{{ $p->price }} دينار كويتى </span>
                                                </div>

                                                <div class="product__modal-des">
                                                    <span>التفاصيل : </span>
                                                    <p>{{ $p->details }}</p>
                                                </div>

                                                <div class="product__modal-form">
                                                    @auth('user')
                                                        @livewire('user.cart.add', ['p_id' => $p->id], key('cart_'.$p->id))
                                                    @endauth

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>


