{{--<div class="col a-link-custom">--}}
{{--    <a class="a-link-custom text-dark" href="{{route('productPage',['id' => $product->type_id, 'product_id' => $product->id])}}">--}}
{{--        <div class="card mx-auto" style="width: 18rem;">--}}
{{--            <img src="/images/{{$product->getImage($product->image)}}" class="card-img-top" alt="{{$product->name}}" width="200" height="250">--}}
{{--            <div class="card-body">--}}
{{--                <h5 class="card-title">{{$product->name}}</h5>--}}
{{--                <p class="card-text">{{Str::limit($product->description,50)}}</p>--}}
{{--                <a href="{{route('productPage',['id' => $product->type_id, 'product_id' => $product->id])}}" class="btn btn-primary w-100 mt-2">Открыть</a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </a>--}}
{{--</div>--}}
{{--<style>--}}
{{--    .a-link-custom{--}}
{{--        text-decoration: none;--}}
{{--    }--}}
{{--    .a-link-custom:hover{--}}
{{--        opacity:0.7;--}}
{{--        cursor:pointer;--}}
{{--        transition: 0.5s;--}}
{{--    }--}}
{{--</style>--}}
<div class="col-lg-1-4 col-md-4 col-12 col-sm-6">
    <div class="product-cart-wrap mb-30 wow animate__animated animate__fadeIn" data-wow-delay=".1s">
        <div class="product-img-action-wrap">
            <div class="product-img product-img-zoom">
                <a href="{{route('productPage',['id' => $product->type_id, 'product_id' => $product->id])}}">
                    <img class="default-img" src="assets/imgs/shop/{{$product->image}}" alt="" />
                </a>
            </div>
        </div>
        <div class="product-content-wrap">
            <div class="product-category">
                <a href="{{route('productPage',['id' => $product->type_id, 'product_id' => $product->id])}}"><br></a>
            </div>
            <h2><a href="{{route('productPage',['id' => $product->type_id, 'product_id' => $product->id])}}">{{$product->name}}</a></h2>
            <div>
                <span class="font-small text-muted">От <a href="">СХПК ЯКУТИЯ</a></span>
            </div>
            <div class="product-card-bottom">
                <div class="product-price">
                    <span>₽{{$product->price}}.00</span>
                </div>
                <div class="add-cart">
                    <a class="add" href="{{route('productPage',['id' => $product->type_id, 'product_id' => $product->id])}}"><i class="fi-rs-shopping-cart mr-5"></i>Добавить </a>
                </div>
            </div>
        </div>
    </div>
</div>
