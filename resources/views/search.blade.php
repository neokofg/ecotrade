<!doctype html>
<html lang="en">
<x-head></x-head>
@livewireStyles
<body onload="document.body.style.opacity='1'">
<x-navbar></x-navbar>
<div class="container mt-5">
    @livewire('search-products')
</div>
<x-footer></x-footer>
@livewireScripts
</body>
</html>
