
@extends('admins.layout')
@section('title', 'تعديل نوع جديد')
@section('article')
<section class="checkout-area pb-70">
    <div class="container">
            <div class="row">
                <div class="col-lg-6 m-auto">
                    <div class="checkbox-form">
                        <div class="row">
                            @livewire('admin.category.edit',['category_id' => $category->id])
                        </div>
                    </div>
                </div>
            </div>
    </div>
</section>
@endsection
