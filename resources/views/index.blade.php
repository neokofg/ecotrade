<!doctype html>
<html lang="en">
<x-head></x-head>
<body onload="document.body.style.opacity='1'">
<x-navbar></x-navbar>
<main>

    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light">Neoko Store</h1>
                <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don’t simply skip over it entirely.</p>
{{--                <p>--}}
{{--                    <a href="#" class="btn btn-primary my-2">Main call to action</a>--}}
{{--                    <a href="#" class="btn btn-secondary my-2">Secondary action</a>--}}
{{--                </p>--}}
            </div>
        </div>
    </section>

    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                @foreach($products as $product)
                    <x-card :product="$product"/>
                @endforeach
            </div>
        </div>
    </div>
</main>
<x-footer></x-footer>
</body>
</html>