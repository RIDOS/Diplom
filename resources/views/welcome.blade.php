<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>ATLAS</title>


    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .lead {
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }
    </style>
</head>
<body>
<div class="view full-page-intro"
     style="background-image: url('img/background_atlas.png'); background-repeat: no-repeat; background-size: cover;">
    <img src="{{ asset('img/logo_atlas.png') }}" style="width: 27em; margin-left: 5em" alt="">
    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
        <h1 class="display-4" style="margin-top: 10%;">ATLAS</h1>
        <p class="lead" style="margin-left: 30%; margin-right: 30%;">
            Формирование эффективного и достоверного сетевого взаимодействия между образовательными учреждениями,
            абитуриентами, студентами и их родителями, и предприятиями в сети интернет.
        </p>
        @if (Route::has('login'))
            <div class="links">
                @auth
                    <button type="button" class="btn btn-primary">
                        <a style="color: white" href="{{ url('/home') }}">В личный кабинет</a>
                    </button>
                @else
                    <button type="button" class="btn btn-primary">
                        <a STYLE="color: white" href="{{ route('login') }}">Авторизироваться</a>
                    </button>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Зарегистрироваться</a>
                    @endif
                @endauth
            </div>
        @endif
    </div>
    <footer class="mastfoot" style="margin-top: 14.6em; padding-bottom: 0">
        <div class="d-block  text-muted" style="text-align: center; height: 20%;">
            © 2020 Имаев Азат
        </div>
    </footer>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
</body>
</html>
