<!doctype html>
<html lang="en">
<x-head></x-head>
<style>
    .material-symbols-outlined {
        font-variation-settings:
            'FILL' 0,
            'wght' 400,
            'GRAD' 0,
            'opsz' 48
    }
    body{
        opacity: 0;
        transition: opacity 0.5s;
    }
</style>

<body onload="document.body.style.opacity='1'">
<x-navbar></x-navbar>
        <div class="container mt-5">
            <div class="col d-inline-flex mb-5">
                <h2 style="margin:0">{{$product->name}}</h2>
                @for($a = 0;$a < $midAriphStar;$a++)
                    @if($a == 0)
                        <span class="material-symbols-outlined align-self-center ms-4" style="color:gold">star</span>
                    @else
                        <span class="material-symbols-outlined align-self-center" style="color:gold">star</span>
                    @endif
                @endfor
            </div>
            <div class="row mx-auto">
                <div class="col align-self-start">
                    <div id="carouselExampleIndicators" class="carousel slide">
                        <div class="carousel-indicators">
                            @foreach($images as $key => $value)
                                @if ($loop->first)
                                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{$key}}" class="active" aria-current="true" aria-label="Slide{{$key}}"></button>
                                @else
                                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{$key}}" aria-label="Slide{{$key}}"></button>
                                @endif
                            @endforeach
                        </div>
                        <div class="carousel-inner">
                            @foreach($images as $key => $value)
                                @if($loop->first)
                                    <div class="carousel-item active">
                                        <img src="/images/{{$value['name']}}" height="400" class="d-block w-100 rounded">
                                    </div>
                                @else
                                    <div class="carousel-item">
                                        <img src="/images/{{$value['name']}}" height="400" class="d-block w-100 rounded">
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <p class="text-dark">Характеристики:</p>
                                </li>
                                @foreach($decodedChars as $chars => $value)
                                <li class="list-group-item">
                                    <div class="justify-content-between d-flex">
                                        <p class="text-secondary">{{$chars}}</p>
                                        <p class="text-dark">{{$value}}</p>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col" style="height:250px">
                    <div class="card">
                        <div class="card-body">
                            <h3>{{$product->price}} ₽ <span class="badge bg-secondary"><del>{{$product->price + 5000}}</del></span></h3>
                                <div class="row">
                                    <form class="col" action="{{route('cart.addToCart')}}" method="GET">
                                        @csrf
                                        <input type="text" style="display:none" name="id" value="{{$product->id}}">
                                        @if(Auth::check())
                                            @foreach($cartIds as $cartId)
                                                @if($cartId == $product->id)
                                                    <a href="{{route('cart.GetCart')}}"><button type="button" class="btn btn-primary text-nowrap fw-lighter">Оно в вашей корзине!</button></a>
                                                    @php($i = 1)
                                                @endif
                                            @endforeach
                                            @if($i == 0)
                                                <button type="submit" class="btn btn-primary text-nowrap fw-lighter ">Добавить в корзину</button>
                                            @endif
                                        @else
                                            <a href="{{route('login')}}"><button type="button" class="btn btn-primary text-nowrap fw-lighter">Добавить в корзину</button></a>
                                        @endif
                                    </form>
                                    <form name="favForm" class="col align-self-center" action="{{route('cart.addToFavs')}}" method="GET">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$product->id}}">
                                        @if(Auth::check())
                                            @php($a = 0)
                                            @foreach($favsIds as $favsId)
                                                @if($favsId == $product->id)
                                                    <a href="{{route('cart.GetFavs')}}"><span class="material-symbols-outlined" style="color:red;cursor:pointer">favorite</span></a>
                                                    @php($a = 1)
                                                @endif
                                            @endforeach
                                            @if($a == 0)
                                                <span onclick="favForm.submit()" class="material-symbols-outlined " style="color:gray;cursor:pointer">favorite</span>
                                            @endif
                                        @else
                                            <a href="{{route('login')}}"><span class="material-symbols-outlined " style="color:gray;cursor:pointer">favorite</span></a>
                                        @endif
                                    </form>
                                </div>

                        </div>
                    </div>
                    <div class="card mt-5">
                        <div class="card-body">
                            Осталось {{$product->available}} шт.
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mx-auto mt-5">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            {{$product->description}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <div class="container mt-5">
        <div class="row mx-auto">
            <div class="col">
                <div class="row">
                    <h3 class="col-3">Комментарии:</h3>
                </div>
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('newComment')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" value="{{$product->id}}" name="product_id">
                            <div class="input-group">
                                <textarea name="comment" placeholder="Комментарий" rows="5" class="form-control" aria-label="With textarea"></textarea>
                            </div>
                            <div class="d-flex col-3 mt-3 text-center">
                                <input name="stars" class="form-range col" id="range" type="range" min="1" max="5" step="1">
                                <span class="col d-flex justify-content-center">
                                    <p class="text-dark" id="rangeValue">3</p>
                                    <span class="material-symbols-outlined" style="color:gold">star</span>
                                </span>
                            </div>
                            <div class="input-group mb-3">
                                <input name="image" type="file" class="form-control" id="inputGroupFile02">
                            </div>
                            @if(Auth::Check())
                                <button type="submit" class="btn btn-secondary">Отправить</button>
                            @else
                                <a href="{{route('login')}}"><button type="button" class="btn btn-secondary">Отправить</button></a>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @foreach($comments as $comment)
        <div class="row mx-auto mt-5">
                <div class="col">
                    <div class="card" style="height: 300px">
                        <div class="card-body">
                            <div class="row h-100">
                                <div class="col-3 align-self-center ">
                                    <img class="rounded object-fit-contain img-fluid img-thumbnail" style="height:250px;width:100%" src="/images/{{$comment->image}}" alt="{{$comment->stars}}">
                                </div>
                                <div class="col">
                                    <div class="d-flex justify-content-between">
                                        <h3 class="text-dark">{{$comment->user->name}}:</h3>
                                        <div class="d-inline-flex justify-content-start">
                                            @for($i = 0;$i < $comment->stars;$i++)
                                                <span class="material-symbols-outlined" style="color:gold">star</span>
                                            @endfor
                                        </div>
                                    </div>
                                    <p class="text-dark mt-3">{{$comment->comment}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        @endforeach
    </div>
<x-footer></x-footer>
</body>
<script type="text/javascript">
    const range = document.getElementById('range');
    const rangeValue = document.getElementById('rangeValue');
    range.oninput = function(){
        rangeValue.innerHTML = range.value;
    }
</script>
</html>
