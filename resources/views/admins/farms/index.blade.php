
@extends('admins.layout')
@section('title', 'جميع المزارع')
@section('article')
<section class="cart-area pt-100 pb-100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <a href="{{ route('admin.farms.create') }}" class="btn btn-add">إضافة مزرعة جديد</a>
            </div>
            <div class="col-12">
                    <div class="table-content table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>الصورة</th>
                                    <th>إسم المزرعة</th>
                                    <th>صاحب المزرعة</th>
                                    <th>الموبايل</th>
                                    <th>الإعدادات</th>
                                </tr>
                                @if($farms->count() == 0)
                                    <tr>
                                        <th colspan="4">لا يوجد مزارع</th>
                                    </tr>
                                @endif
                            </thead>
                            <tbody>
                                @foreach ($farms as $f)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            @if($f->image)
                                                <img src="{{ asset('assets/img/farms/'.$f->id.'/'.$f->image) }}" alt="" style="width:100px;height:100px">
                                            @else
                                                <img src="{{ asset('assets/img/farms/default.png') }}" alt="" style="width:100px;height:100px">
                                            @endif
                                        </td>
                                        <td>{{ $f->name }}</td>
                                        <td>{{ $f->owner_name }}</td>
                                        <td>{{ $f->phone }}</td>
                                        <td>
                                            <a href="{{ route('admin.farms.edit',['id' => $f->id]) }}"><i class="fa fa-edit"></i></a>
                                            @if($f->products->count() == 0)
                                                <a href="{{ route('admin.farms.delete',['id' => $f->id]) }}"><i class="fa fa-trash-alt"></i></a>
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
