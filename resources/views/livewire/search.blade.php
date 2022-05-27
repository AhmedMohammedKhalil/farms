<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="widget">
            <h6 class="sidebar-title"> إبحث هنا</h6>
            <div class="n-sidebar-search">
                <a href="javascript:void(0)" wire:click='searchByValue' style="left:0; right:unset"><i class="fal fa-search"></i></a>
                <input type="text" wire:model.lazy='search' style="padding-left: 0;padding-right:5px"  placeholder="بحث">
            </div>
        </div>
    </div>
    <div class="col-lg-12 col-md-6">
        <div class="widget">
            <h6 class="sidebar-title">انواع المحاصيل</h6>
            <ul class="n-sidebar-categories">
                @foreach ($categories as $c)
                    <li>
                        <a href="javascript:void(0)" wire:click='searchByCategory({{ $c->id }})'>
                            <div class="single-category p-relative mb-10">
                                {{ $c->title }}
                                <span class="category-number">{{ $c->products->count() }}</span>
                            </div>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="col-lg-12 col-md-6">
        <div class="widget">
            <h6 class="sidebar-title">المزارع</h6>
            <div class="tags">
                @foreach ($farms as $f)
                    <a class="single-tag" href="javascript:void(0)" wire:click='searchByFarm({{ $f->id }})'>{{ $f->name }}</a>
                @endforeach

            </div>
        </div>
    </div>

</div>
