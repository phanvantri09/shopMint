@extends('home.index')
@section('content')
<!-- Hero Section End -->

<!-- Categories Section Begin -->
<!-- Categories Section End -->

<!-- Featured Section Begin -->
<section class="featured spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Featured Product</h2>
                </div>
                <div class="featured__controls">
                    <ul>
                        @if (Route::has('home'))
                        <li class="active" data-filter="*"><a href="{{ route('home') }}">All*</a></li>
                        @else
                        <li   data-filter="*"><a href="{{ route('home') }}">All*</a></li>
                        @endif
                        @foreach ($category as $item)
                        @if (Route::has('category'))
                        <li class="active" data-filter="*"><a href="{{ route('category',['id'=>$item->id]) }}">{{$item->name}}</a></li>
                        @else
                        <li data-filter="*"><a href="{{ route('category',['id'=>$item->id]) }}">{{$item->name}}</a></li>
                        @endif
                        
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="row featured__filter" id="MixItUp659F19">
            @foreach ($dataProduct as $item)
            <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                <div class="featured__item">
                    <div class="featured__item__pic set-bg" data-setbg='{{ asset("./imgProduct/$item->img") }}' style="background-image: url(&quot;img/featured/feature-1.jpg&quot;);">
                        <ul class="featured__item__pic__hover">
                            {{-- <li><a href="#"><i class="fa fa-heart"></i></a></li> --}}
                            {{-- <li><a href="#"><i class="fa fa-retweet"></i></a></li> --}}
                            <li><a href="{{ route('product', ['id'=>$item->id]) }}"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                    </div>
                    <div class="featured__item__text">
                        <h6><a href="#">{{$item->name}}</a></h6>
                        <h5>{{$item->price}}</h5>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<form method="POST" action="" id="formDelete">
    @csrf @method('DELETE')
</form>
<!-- Blog Section End -->
@endsection