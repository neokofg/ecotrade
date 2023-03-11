{{--        <div class="container mt-5">--}}
{{--            <div class="col d-inline-flex mb-5">--}}
{{--                <h2 style="margin:0">{{$product->name}}</h2>--}}
{{--                @for($a = 0;$a < $midAriphStar;$a++)--}}
{{--                    @if($a == 0)--}}
{{--                        <span class="material-symbols-outlined align-self-center ms-4" style="color:gold">star</span>--}}
{{--                    @else--}}
{{--                        <span class="material-symbols-outlined align-self-center" style="color:gold">star</span>--}}
{{--                    @endif--}}
{{--                @endfor--}}
{{--            </div>--}}
{{--            <div class="row mx-auto">--}}
{{--                <div class="col align-self-start">--}}
{{--                    <div id="carouselExampleIndicators" class="carousel slide">--}}
{{--                        <div class="carousel-indicators">--}}
{{--                            @foreach($images as $key => $value)--}}
{{--                                @if ($loop->first)--}}
{{--                                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{$key}}" class="active" aria-current="true" aria-label="Slide{{$key}}"></button>--}}
{{--                                @else--}}
{{--                                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{$key}}" aria-label="Slide{{$key}}"></button>--}}
{{--                                @endif--}}
{{--                            @endforeach--}}
{{--                        </div>--}}
{{--                        <div class="carousel-inner">--}}
{{--                            @foreach($images as $key => $value)--}}
{{--                                @if($loop->first)--}}
{{--                                    <div class="carousel-item active">--}}
{{--                                        <img src="/images/{{$value['name']}}" height="400" class="d-block w-100 rounded">--}}
{{--                                    </div>--}}
{{--                                @else--}}
{{--                                    <div class="carousel-item">--}}
{{--                                        <img src="/images/{{$value['name']}}" height="400" class="d-block w-100 rounded">--}}
{{--                                    </div>--}}
{{--                                @endif--}}
{{--                            @endforeach--}}
{{--                        </div>--}}
{{--                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">--}}
{{--                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>--}}
{{--                            <span class="visually-hidden">Previous</span>--}}
{{--                        </button>--}}
{{--                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">--}}
{{--                            <span class="carousel-control-next-icon" aria-hidden="true"></span>--}}
{{--                            <span class="visually-hidden">Next</span>--}}
{{--                        </button>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col">--}}
{{--                    <div class="card">--}}
{{--                        <div class="card-body">--}}
{{--
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col" style="height:250px">--}}
{{--                    <div class="card">--}}
{{--                        <div class="card-body">--}}
{{--                            <h3>{{$product->price}} ₽ <span class="badge bg-secondary"><del>{{$product->price + 5000}}</del></span></h3>--}}
{{--                                <div class="row">--}}
{{--                                    <form class="col" action="{{route('cart.addToCart')}}" method="GET">--}}
{{--                                        @csrf--}}
{{--                                        <input type="text" style="display:none" name="id" value="{{$product->id}}">--}}
{{--                                        @if(Auth::check())--}}
{{--                                            @foreach($cartIds as $cartId)--}}
{{--                                                @if($cartId == $product->id)--}}
{{--                                                    <a href="{{route('cart.GetCart')}}"><button type="button" class="btn btn-primary text-nowrap fw-lighter">Оно в вашей корзине!</button></a>--}}
{{--                                                    @php($i = 1)--}}
{{--                                                @endif--}}
{{--                                            @endforeach--}}
{{--                                            @if($i == 0)--}}
{{--                                                <button type="submit" class="btn btn-primary text-nowrap fw-lighter ">Добавить в корзину</button>--}}
{{--                                            @endif--}}
{{--                                        @else--}}
{{--                                            <a href="{{route('login')}}"><button type="button" class="btn btn-primary text-nowrap fw-lighter">Добавить в корзину</button></a>--}}
{{--                                        @endif--}}
{{--                                    </form>--}}
{{--                                    <form name="favForm" class="col align-self-center" action="{{route('cart.addToFavs')}}" method="GET">--}}
{{--                                        @csrf--}}
{{--                                        <input type="hidden" name="id" value="{{$product->id}}">--}}
{{--                                        @if(Auth::check())--}}
{{--                                            @php($a = 0)--}}
{{--                                            @foreach($favsIds as $favsId)--}}
{{--                                                @if($favsId == $product->id)--}}
{{--                                                    <a href="{{route('cart.GetFavs')}}"><span class="material-symbols-outlined" style="color:red;cursor:pointer">favorite</span></a>--}}
{{--                                                    @php($a = 1)--}}
{{--                                                @endif--}}
{{--                                            @endforeach--}}
{{--                                            @if($a == 0)--}}
{{--                                                <span onclick="favForm.submit()" class="material-symbols-outlined " style="color:gray;cursor:pointer">favorite</span>--}}
{{--                                            @endif--}}
{{--                                        @else--}}
{{--                                            <a href="{{route('login')}}"><span class="material-symbols-outlined " style="color:gray;cursor:pointer">favorite</span></a>--}}
{{--                                        @endif--}}
{{--                                    </form>--}}
{{--                                </div>--}}

{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="card mt-5">--}}
{{--                        <div class="card-body">--}}
{{--                            Осталось {{$product->available}} шт.--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="row mx-auto mt-5">--}}
{{--                <div class="col">--}}
{{--                    <div class="card">--}}
{{--                        <div class="card-body">--}}
{{--                            {{$product->description}}--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    <div class="container mt-5">--}}
{{--        <div class="row mx-auto">--}}
{{--            <div class="col">--}}
{{--                <div class="row">--}}
{{--                    <h3 class="col-3">Комментарии:</h3>--}}
{{--                </div>--}}
{{--                <div class="card">--}}
{{--                    <div class="card-body">--}}
{{--                        <form action="{{route('newComment')}}" method="POST" enctype="multipart/form-data">--}}
{{--                            @csrf--}}
{{--                            <input type="hidden" value="{{$product->id}}" name="product_id">--}}
{{--                            <div class="input-group">--}}
{{--                                <textarea name="comment" placeholder="Комментарий" rows="5" class="form-control" aria-label="With textarea"></textarea>--}}
{{--                            </div>--}}
{{--                            <div class="d-flex col-3 mt-3 text-center">--}}
{{--                                <input name="stars" class="form-range col" id="range" type="range" min="1" max="5" step="1">--}}
{{--                                <span class="col d-flex justify-content-center">--}}
{{--                                    <p class="text-dark" id="rangeValue">3</p>--}}
{{--                                    <span class="material-symbols-outlined" style="color:gold">star</span>--}}
{{--                                </span>--}}
{{--                            </div>--}}
{{--                            <div class="input-group mb-3">--}}
{{--                                <input name="image" type="file" class="form-control" id="inputGroupFile02">--}}
{{--                            </div>--}}
{{--                            @if(Auth::Check())--}}
{{--                                <button type="submit" class="btn btn-secondary">Отправить</button>--}}
{{--                            @else--}}
{{--                                <a href="{{route('login')}}"><button type="button" class="btn btn-secondary">Отправить</button></a>--}}
{{--                            @endif--}}
{{--                        </form>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        @foreach($comments as $comment)--}}
{{--        <div class="row mx-auto mt-5">--}}
{{--                <div class="col">--}}
{{--                    <div class="card" style="height: 300px">--}}
{{--                        <div class="card-body">--}}
{{--                            <div class="row h-100">--}}
{{--                                <div class="col-3 align-self-center ">--}}
{{--                                    <img class="rounded object-fit-contain img-fluid img-thumbnail" style="height:250px;width:100%" src="/images/{{$comment->image}}" alt="{{$comment->stars}}">--}}
{{--                                </div>--}}
{{--                                <div class="col">--}}
{{--                                    <div class="d-flex justify-content-between">--}}
{{--                                        <h3 class="text-dark">{{$comment->user->name}}:</h3>--}}
{{--                                        <div class="d-inline-flex justify-content-start">--}}
{{--                                            @for($i = 0;$i < $comment->stars;$i++)--}}
{{--                                                <span class="material-symbols-outlined" style="color:gold">star</span>--}}
{{--                                            @endfor--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <p class="text-dark mt-3">{{$comment->comment}}</p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--        </div>--}}
{{--        @endforeach--}}
{{--    </div>--}}
{{--<x-footer></x-footer>--}}
<!DOCTYPE html>
<html class="no-js" lang="ru">
<x-head></x-head>
<body>

<x-navbar></x-navbar>
<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="/" rel="nofollow"><i class="fi-rs-home mr-5"></i>Главная</a>
                <span></span> {{$product->name}}
            </div>
        </div>
    </div>
    <div class="container mb-30">
        <div class="row">
            <div class="col-xl-10 col-lg-12 m-auto">
                <div class="product-detail accordion-detail">
                    <div class="row mb-50 mt-30">
                        <div class="col-md-6 col-sm-12 col-xs-12 mb-md-0 mb-sm-5">
                            <div class="detail-gallery">
                                <!-- MAIN SLIDES -->
                                <div class="product-image-slider slick-initialized slick-slider">
                                    <div class="slick-list draggable"><div class="slick-track" style="opacity: 1; width: 7710px; transform: translate3d(-514px, 0px, 0px);"><figure class="border-radius-10 slick-slide slick-cloned" data-slick-index="-1" id="" aria-hidden="true" tabindex="-1" style="width: 514px;">
                                                <img src="{{asset('assets/imgs/shop/product-16-7.jpg')}}" alt="product image">
                                            </figure><figure class="border-radius-10 slick-slide slick-current slick-active" data-slick-index="0" aria-hidden="false" tabindex="0" style="width: 514px;">
                                                <img src="{{asset('assets/imgs/shop/product-16-2.jpg')}}" alt="product image">
                                            </figure><figure class="border-radius-10 slick-slide" data-slick-index="1" aria-hidden="true" tabindex="-1" style="width: 514px;">
                                                <img src="{{asset('assets/imgs/shop/product-16-1.jpg')}}" alt="product image">
                                            </figure><figure class="border-radius-10 slick-slide" data-slick-index="2" aria-hidden="true" tabindex="-1" style="width: 514px;">
                                                <img src="{{asset('assets/imgs/shop/product-16-3.jpg')}}" alt="product image">
                                            </figure><figure class="border-radius-10 slick-slide" data-slick-index="3" aria-hidden="true" tabindex="-1" style="width: 514px;">
                                                <img src="{{asset('assets/imgs/shop/product-16-4.jpg')}}" alt="product image">
                                            </figure><figure class="border-radius-10 slick-slide" data-slick-index="4" aria-hidden="true" tabindex="-1" style="width: 514px;">
                                                <img src="{{asset('assets/imgs/shop/product-16-5.jpg')}}" alt="product image">
                                            </figure><figure class="border-radius-10 slick-slide" data-slick-index="5" aria-hidden="true" tabindex="-1" style="width: 514px;">
                                                <img src="{{asset('assets/imgs/shop/product-16-6.jpg')}}" alt="product image">
                                            </figure><figure class="border-radius-10 slick-slide" data-slick-index="6" aria-hidden="true" tabindex="-1" style="width: 514px;">
                                                <img src="{{asset('assets/imgs/shop/product-16-7.jpg')}}" alt="product image">
                                            </figure><figure class="border-radius-10 slick-slide slick-cloned" data-slick-index="7" id="" aria-hidden="true" tabindex="-1" style="width: 514px;">
                                                <img src="{{asset('assets/imgs/shop/product-16-2.jpg')}}" alt="product image">
                                            </figure><figure class="border-radius-10 slick-slide slick-cloned" data-slick-index="8" id="" aria-hidden="true" tabindex="-1" style="width: 514px;">
                                                <img src="{{asset('assets/imgs/shop/product-16-1.jpg')}}" alt="product image">
                                            </figure><figure class="border-radius-10 slick-slide slick-cloned" data-slick-index="9" id="" aria-hidden="true" tabindex="-1" style="width: 514px;">
                                                <img src="{{asset('assets/imgs/shop/product-16-3.jpg')}}" alt="product image">
                                            </figure><figure class="border-radius-10 slick-slide slick-cloned" data-slick-index="10" id="" aria-hidden="true" tabindex="-1" style="width: 514px;">
                                                <img src="{{asset('assets/imgs/shop/product-16-4.jpg')}}" alt="product image">
                                            </figure><figure class="border-radius-10 slick-slide slick-cloned" data-slick-index="11" id="" aria-hidden="true" tabindex="-1" style="width: 514px;">
                                                <img src="{{asset('assets/imgs/shop/product-16-5.jpg')}}" alt="product image">
                                            </figure><figure class="border-radius-10 slick-slide slick-cloned" data-slick-index="12" id="" aria-hidden="true" tabindex="-1" style="width: 514px;">
                                                <img src="{{asset('assets/imgs/shop/product-16-6.jpg')}}" alt="product image">
                                            </figure><figure class="border-radius-10 slick-slide slick-cloned" data-slick-index="13" id="" aria-hidden="true" tabindex="-1" style="width: 514px;">
                                                <img src="{{asset('assets/imgs/shop/product-16-7.jpg')}}" alt="product image">
                                            </figure></div></div>
                                </div>
                                <!-- THUMBNAILS -->
                                <div class="slider-nav-thumbnails slick-initialized slick-slider"><button type="button" class="slick-prev slick-arrow" style=""><i class="fi-rs-arrow-small-left"></i></button>
                                    <div class="slick-list draggable">
                                        <div class="slick-track" style="opacity: 1; width: 2412px; transform: translate3d(-536px, 0px, 0px);">
                                            <div class="slick-slide slick-cloned" data-slick-index="-4" id="" aria-hidden="true" tabindex="-1" style="width: 114px;">
                                                <img src="{{asset('assets/imgs/shop/thumbnail-6.jpg')}}" alt="product image">
                                            </div>
                                            <div class="slick-slide slick-cloned" data-slick-index="-3" id="" aria-hidden="true" tabindex="-1" style="width: 114px;">
                                                <img src="{{asset('assets/imgs/shop/thumbnail-7.jpg')}}" alt="product image">
                                            </div>
                                            <div class="slick-slide slick-cloned" data-slick-index="-2" id="" aria-hidden="true" tabindex="-1" style="width: 114px;">
                                                <img src="{{asset('assets/imgs/shop/thumbnail-8.jpg')}}" alt="product image">
                                            </div>
                                            <div class="slick-slide slick-cloned" data-slick-index="-1" id="" aria-hidden="true" tabindex="-1" style="width: 114px;">
                                                <img src="{{asset('assets/imgs/shop/thumbnail-9.jpg')}}" alt="product image">
                                            </div>
                                            <div class="slick-slide slick-current" data-slick-index="0" aria-hidden="false" tabindex="0" style="width: 114px;">
                                                <img src="{{asset('assets/imgs/shop/thumbnail-3.jpg')}}" alt="product image">
                                            </div>
                                            <div class="slick-slide" data-slick-index="1" aria-hidden="false" tabindex="0" style="width: 114px;">
                                                <img src="{{asset('assets/imgs/shop/thumbnail-4.jpg')}}" alt="product image">
                                            </div>
                                            <div class="slick-slide" data-slick-index="2" aria-hidden="false" tabindex="0" style="width: 114px;">
                                                <img src="{{asset('assets/imgs/shop/thumbnail-5.jpg')}}" alt="product image">
                                            </div>
                                            <div class="slick-slide" data-slick-index="3" aria-hidden="false" tabindex="0" style="width: 114px;">
                                                <img src="{{asset('assets/imgs/shop/thumbnail-6.jpg')}}" alt="product image">
                                            </div>
                                            <div class="slick-slide" data-slick-index="4" aria-hidden="true" tabindex="-1" style="width: 114px;">
                                                <img src="{{asset('assets/imgs/shop/thumbnail-7.jpg')}}" alt="product image">
                                            </div>
                                            <div class="slick-slide" data-slick-index="5" aria-hidden="true" tabindex="-1" style="width: 114px;">
                                                <img src="{{asset('assets/imgs/shop/thumbnail-8.jpg')}}" alt="product image">
                                            </div>
                                            <div class="slick-slide" data-slick-index="6" aria-hidden="true" tabindex="-1" style="width: 114px;">
                                                <img src="{{asset('assets/imgs/shop/thumbnail-9.jpg')}}" alt="product image">
                                            </div>
                                            <div class="slick-slide slick-cloned" data-slick-index="7" id="" aria-hidden="true" tabindex="-1" style="width: 114px;">
                                                <img src="{{asset('assets/imgs/shop/thumbnail-3.jpg')}}" alt="product image">
                                            </div>
                                            <div class="slick-slide slick-cloned" data-slick-index="8" id="" aria-hidden="true" tabindex="-1" style="width: 114px;">
                                                <img src="{{asset('assets/imgs/shop/thumbnail-4.jpg')}}" alt="product image">
                                            </div>
                                            <div class="slick-slide slick-cloned" data-slick-index="9" id="" aria-hidden="true" tabindex="-1" style="width: 114px;">
                                                <img src="{{asset('assets/imgs/shop/thumbnail-5.jpg')}}" alt="product image">
                                            </div>
                                            <div class="slick-slide slick-cloned" data-slick-index="10" id="" aria-hidden="true" tabindex="-1" style="width: 114px;">
                                                <img src="{{asset('assets/imgs/shop/thumbnail-6.jpg')}}" alt="product image">
                                            </div>
                                            <div class="slick-slide slick-cloned" data-slick-index="11" id="" aria-hidden="true" tabindex="-1" style="width: 114px;">
                                                <img src="{{asset('assets/imgs/shop/thumbnail-7.jpg')}}" alt="product image">
                                            </div>
                                            <div class="slick-slide slick-cloned" data-slick-index="12" id="" aria-hidden="true" tabindex="-1" style="width: 114px;">
                                                <img src="{{asset('assets/imgs/shop/thumbnail-8.jpg')}}" alt="product image">
                                            </div>
                                            <div class="slick-slide slick-cloned" data-slick-index="13" id="" aria-hidden="true" tabindex="-1" style="width: 114px;">
                                                <img src="{{asset('assets/imgs/shop/thumbnail-9.jpg')}}" alt="product image">
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" class="slick-next slick-arrow" style=""><i class="fi-rs-arrow-small-right"></i></button></div>
                            </div>
                            <!-- End Gallery -->
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="detail-info pr-30 pl-30">
                                <span class="stock-status in-stock"> В наличии {{$product->available}}</span>
                                <h2 class="title-detail">{{$product->name}}</h2>
                                <!-- <div class="product-detail-rating">
                                    <div class="product-rate-cover text-end">
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width: 90%"></div>
                                        </div>
                                        <span class="font-small ml-5 text-muted"> (32 Отзывов)</span>
                                    </div>
                                </div> -->
                                <div class="clearfix product-price-cover">
                                    <div class="product-price primary-color float-left">
                                        <span class="current-price text-brand">₽{{$product->price}}.00</span>
                                    </div>
                                </div>
                                <div class="short-desc mb-30">
                                    <p class="font-lg">{{$product->description}}</p>
                                </div>
                                <div class="attr-detail attr-size mb-30">
                                    <strong class="mr-10">Поставщик:</strong>
                                    <a href="">СХПК ЯКУТИЯ</a>
                                </div>
                                <div class="detail-extralink mb-50">
                                    <div class="product-extra-link2">
                                        <button type="submit" class="button button-add-to-cart"><i class="fi-rs-shopping-cart"></i>Добавить в корзину</button>
                                    </div>
                                </div>
                            </div>
                            <!-- Detail Info -->
                        </div>
                    </div>
                    <div class="product-info">
                        <div class="tab-style3">


                            <div class="tab-pane fade show active" id="Description">

                                <h4 >Описание</h4>
                                <ul class="product-more-infor mt-30">
                                    <p>
                                        {{$product->description}}
                                    </p>
                                </ul>

                                <h4 class="mt-30">Поставщик</h4>
                                <ul class="product-more-infor mt-20">
                                    <a href="">СХПК ЯКУТИЯ</a>
                                </ul>

                                <h4 class="mt-30">Хактеристики</h4>
                                <ul class="product-more-infor mt-30">
                                    <ul class="">
                                        @foreach($decodedChars as $chars => $value)
                                            <li class="mb-5">{{$chars}}:<span class="text-brand">{{$value}}</span></li>
                                        @endforeach
                                    </ul>
                                </ul>

                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<x-footer></x-footer>

<!-- Preloader Start -->

<!-- Vendor JS-->
</body>

</html>
</html>
