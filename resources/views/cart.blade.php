<!doctype html>
<html lang="en">
<x-head></x-head>
<body onload="document.body.style.opacity='1'">
<x-navbar></x-navbar>
    <h1 class="mt-5 text-center">Ваша корзина:</h1>
<form action="{{route('orders.pageOrder')}}">
    <div class="container mt-5">
        <div class="row mx-auto justify-content-between">
            <div class="col-5">
                <div class="list-group">
                    @foreach($products as $product)
                        <div class="list-group-item list-group-item-action">
                            <input type="hidden" value="{{$product->sale}}" id="productPrice{{$product->id}}">
                            <label for="checkBox{{$product->id}}">
                                <div class="row">
                                        <div class="col-1 align-self-center">
                                            <input id="checkBox{{$product->id}}" name="product[]" value="{{$product->id}}" onclick="checkeddisplay({{$product->id}})" class="form-check-input me-1" type="checkbox">
                                        </div>
                                        <div class="col">
                                            <div class="d-flex w-100 justify-content-between">
                                                <h5 class="mb-1">{{$product->name}}</h5>
                                                <small>{{$product->sale}} ₽</small>
                                            </div>
                                            <p class="mb-1">{{Str::limit($product->description,50)}}</p>
                                        </div>
                                    <div class="col-3 align-self-center">
                                        <a class="text-decoration-none" href="{{route('cart.deleteFromCart',$product->id)}}"><button type="button" class="btn btn-secondary d-inline">Убрать</button></a>
                                    </div>
                                </div>
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-md-5 col-lg-4 align-self-end">
                <ul class="list-group mb-3">
                    <li class="list-group-item d-flex justify-content-between lh-sm">
                        <div>
                            <h6 class="my-0">Доставка</h6>
                        </div>
                        <span class="text-muted">{{600}} Рублей</span>
                    </li>
                    @foreach($products as $product)
                        <li class="list-group-item justify-content-between lh-sm" style="display:none" id="view{{$product->id}}">
                            <div>
                                <h6 class="my-0">{{$product->name}}</h6>
                            </div>
                            <span class="text-muted">{{$product->sale}} Рублей</span>
                        </li>
                    @endforeach
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Всего (Рублей)</span>
                        <strong id="TotalPrice">{{0 + 600}}</strong>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary vw-100">Заказать</button>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</form>
<script type="text/javascript">
    let TotalPrice = document.getElementById('TotalPrice');
    function checkeddisplay($id) {
        var checkBox = document.getElementById('checkBox'+$id);
        var productPrice = document.getElementById('productPrice'+$id)
        var text = document.getElementById('view'+$id);
        if (checkBox.checked == true){
            text.style.display = "flex";
            const total = Number(TotalPrice.innerHTML) + Number(productPrice.value);
            TotalPrice.innerHTML = total;
        } else {
            text.style.display = "none";
            const total = Number(TotalPrice.innerHTML) - Number(productPrice.value);
            TotalPrice.innerHTML = total;
        }
    }
</script>
<x-footer></x-footer>
</body>
</html>
