<!doctype html>
<html lang="en">
<x-head></x-head>
<body class="text-center" onload="document.body.style.opacity='1'">
<x-navbar></x-navbar>
    <h1 class="mt-5">Ваши избранные:</h1>
    <div class="container mt-5">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            @foreach($products as $product)
                <x-card :product="$product"/>
            @endforeach
        </div>
    </div>
<x-footer></x-footer>
</body>
</html>
