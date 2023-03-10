<!doctype html>
<html lang="en">
<x-head></x-head>
<style>
    html,
    body {
        height: 100%;
    }

    body {
        align-items: center;
        background-color: #f5f5f5;
    }

    .form-signin {
        max-width: 330px;
        padding: 15px;
    }

    .form-signin .form-floating:focus-within {
        z-index: 2;
    }

    .form-signin input[type="email"] {
        margin-bottom: -1px;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
    }

    .form-signin input[type="password"] {
        margin-bottom: 10px;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
    }
    .bodyChanger{
        padding-top:40px;
        padding-bottom: 40px;
        display:flex;
    }

</style>
<style>
    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
    }

    @media (min-width: 768px) {
        .bd-placeholder-img-lg {
            font-size: 3.5rem;
        }
    }

    .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
    }

    .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
    }

    .bi {
        vertical-align: -.125em;
        fill: currentColor;
    }

    .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
    }

    .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
    }
</style>
<body onload="document.body.style.opacity='1'">
<x-navbar></x-navbar>
{{--    <form action="{{route('')}}" method="POST">--}}
{{--        @csrf--}}
{{--        <input type="text"  placeholder="Имя"><br>--}}
{{--        <input type="text" name="email" placeholder="Email"><br>--}}
{{--        <input type="password" name="password" placeholder="Пароль"><br>--}}
{{--        <button>Зарегистрироваться</button>--}}
{{--    </form>--}}
{{--    <a href="{{route('login')}}"><button>Войти</button></a>--}}
    <div class="bodyChanger text-center">
        <main class="form-signin w-100 m-auto">
            <form action="{{route('auth.registerNewUser')}}" method="POST">
                @csrf
                <h1 class="h3 mb-3 fw-normal">Регистрация</h1>

                <div class="form-floating">
                    <input type="name" name="name" class="form-control" id="floatingName" placeholder="Михаил">
                    <label for="floatingName">Имя</label>
                </div>
                <div class="form-floating">
                    <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput">Электронная почта</label>
                </div>
                <div class="form-floating">
                    <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Пароль">
                    <label for="floatingPassword">Пароль</label>
                </div>

                <div class="checkbox mb-3">
                    <label>
                        <input type="checkbox" value="remember-me"> Запомнить меня
                    </label>
                </div>
                <button class="w-100 btn btn-lg btn-primary" type="submit">Зарегистрироваться</button>
                <p class="mt-5 mb-3 text-muted">&copy; 2023</p>
            </form>
        </main>
    </div>
<x-footer></x-footer>
</body>
</html>
