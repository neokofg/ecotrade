<header class="p-3 text-bg-dark">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"/></svg>
            </a>
            @if(Auth::check())
{{--                <a href=""><button>Профиль</button></a>--}}
{{--                <a href=""><button>Выйти</button></a>--}}
                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    @if(!Request::is('/'))
                        <li><a href="{{route('index')}}" class="nav-link px-2 text-white">Главная</a></li>
                    @else
                        <li><a href="{{route('index')}}" class="nav-link px-2 text-secondary"  style="pointer-events: none">Главная</a></li>
                    @endif
                    @if(!Request::is('cart'))
                        <li><a href="{{route('cart.GetCart')}}" class="nav-link px-2 text-white">Корзина</a></li>
                    @else
                        <li><a href="{{route('cart.GetCart')}}" class="nav-link px-2 text-secondary" style="pointer-events: none">Корзина</a></li>
                    @endif
                    @if(!Request::is('favs'))
                        <li><a href="{{route('cart.GetFavs')}}" class="nav-link px-2 text-white">Любимые</a></li>
                    @else
                        <li><a href="{{route('cart.GetFavs')}}" class="nav-link px-2 text-secondary" style="pointer-events: none">Любимые</a></li>
                    @endif
                    @if(Auth::user()->role == '1')
                        @if(!Request::is('admin'))
                            <li><a href="{{route('admin')}}" class="nav-link px-2 text-white">Админ</a></li>
                        @else
                            <li><a href="{{route('admin')}}" class="nav-link px-2 text-secondary" style="pointer-events: none">Админ</a></li>
                        @endif
                    @endif
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link px-2 text-white dropdown-toggle"  style="cursor:pointer" data-bs-toggle="dropdown" aria-expanded="false">
                                Каталог
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark">
                                @foreach(App\Models\Type::get() as $type)
                                    <li><a class="dropdown-item" href="{{route('typePage',$type->id)}}">{{$type->name}}</a></li>
                                @endforeach
                            </ul>
                        </li>
                    </ul>
                </ul>
                <form action="{{route('search')}}" method="GET" class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
                    @csrf
                    <div id="liveware-input">
                        <input wire:model="search" type="search" name="search"  id="search" class="form-control form-control-dark" placeholder="Поиск" aria-label="Search">
                    </div>
                </form>
                <div class="dropdown text-end">
                    <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
                    </a>
                    <ul class="dropdown-menu text-small">
                        <li><a class="dropdown-item" href="#" style="pointer-events: none">{{Auth::user()->name}}</a></li>
                        <li><hr class="dropdown-divider"></li>
                        @if(!Request::is('profile'))
                            <li><a class="dropdown-item" href="{{route('profile')}}">Профиль</a></li>
                        @else
                            <li><a class="dropdown-item text-secondary" href="{{route('profile')}}" style="pointer-events: none">Профиль</a></li>
                        @endif
                        <li><a class="dropdown-item" href="{{route('auth.logoutUser')}}">Выйти</a></li>
                    </ul>
                </div>
            @else
                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    @if(!Request::is('/'))
                        <li><a href="{{route('index')}}" class="nav-link px-2 text-white">Главная</a></li>
                    @else
                        <li><a href="{{route('index')}}" class="nav-link px-2 text-secondary"  style="pointer-events: none">Главная</a></li>
                    @endif
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link px-2 text-white dropdown-toggle" style="cursor:pointer" data-bs-toggle="dropdown" aria-expanded="false">
                                Каталог
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark">
                                @foreach(App\Models\Type::all() as $type)
                                    <li><a class="dropdown-item" href="{{route('typePage',$type->id)}}">{{$type->name}}</a></li>
                                @endforeach
                            </ul>
                        </li>
                    </ul>
                </ul>
                <form action="{{route('search')}}" method="GET" class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
                    @csrf
                    <input type="search" id="search" name="search" class="form-control form-control-dark" placeholder="Поиск" aria-label="Search">
                </form>
                <div class="text-end">
                    @if(!Request::is('login'))
                        <a href="{{route('login')}}" type="button" class="btn btn-outline-light me-2">Войти</a>
                    @else
                        <a href="{{route('login')}}" type="button" class="btn btn-outline-light me-2" style="pointer-events: none">Войти</a>
                    @endif
                    @if(!Request::is('register'))
                        <a href="{{route('register')}}" type="button" class="btn btn-warning">Регистрация</a>
                    @else
                        <a href="{{route('register')}}" type="button" class="btn btn-warning" style="pointer-events: none">Регистрация</a>
                    @endif
                </div>
            @endif
        </div>
    </div>
</header>
@if (\Session::has('success'))
    <div class="container mt-3">
        <div class="row mx-auto">
            <div class="col">
                <div class="alert alert-success" role="alert">
                    {{session()->get('success')}}
                </div>
            </div>
        </div>
    </div>
@endif
@if($errors->any())
    <div class="container mt-3">
        <div class="row mx-auto">
            <div class="col">
                <div class="alert alert-danger" role="alert">
                    Ошибка:
                    <ul style="margin-left: 20px;">
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endif
