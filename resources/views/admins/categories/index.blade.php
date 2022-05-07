@extends('admins.layout')
@section('title', 'جميع أنواع المحاصيل')
@section('article')

<section class="cart-area pt-100 pb-100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <a href="{{ route('admin.categories.create') }}" class="btn btn-add">إضافة نوع جديد</a>
            </div>
            <div class="col-12">
                    <div class="table-content table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>الصورة</th>
                                    <th>الإسم</th>
                                    <th>الإعدادات</th>
                                </tr>
                                @if($categories->count() == 0)
                                    <tr>
                                        <th colspan="4">لا يوجد انواع</th>
                                    </tr>
                                @endif
                            </thead>
                            <tbody>
                                @foreach ($categories as $c)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            @if($c->image)
                                                <img src="{{ asset('assets/img/categories/'.$c->id.'/'.$c->image) }}" alt="" style="width:100px;height:100px">
                                            @else
                                                <img src="{{ asset('assets/img/categories/default.jpg') }}" alt="" style="width:100px;height:100px">
                                            @endif
                                        </td>
                                        <td>{{ $c->title }}</td>

                                        <td>
                                            <a href="{{ route('admin.categories.edit',['id' => $c->id]) }}"><i class="fa fa-edit"></i></a>
                                            @if($c->products->count() == 0)
                                                <a href="{{ route('admin.categories.delete',['id' => $c->id]) }}"><i class="fa fa-trash-alt"></i></a>
                                            @endif

                                        </td>
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </div>
            </div>
        </div>
    </div>
</section>
@endsection
