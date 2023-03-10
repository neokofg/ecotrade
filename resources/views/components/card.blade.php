<div class="col a-link-custom">
    <a class="a-link-custom text-dark" href="{{route('productPage',['id' => $product->type_id, 'product_id' => $product->id])}}">
        <div class="card mx-auto" style="width: 18rem;">
            <img src="/images/{{$product->getImage($product->image)}}" class="card-img-top" alt="{{$product->name}}" width="200" height="250">
            <div class="card-body">
                <h5 class="card-title">{{$product->name}}</h5>
                <p class="card-text">{{Str::limit($product->description,50)}}</p>
                <a href="{{route('productPage',['id' => $product->type_id, 'product_id' => $product->id])}}" class="btn btn-primary w-100 mt-2">Открыть</a>
            </div>
        </div>
    </a>
</div>
<style>
    .a-link-custom{
        text-decoration: none;
    }
    .a-link-custom:hover{
        opacity:0.7;
        cursor:pointer;
        transition: 0.5s;
    }
</style>
