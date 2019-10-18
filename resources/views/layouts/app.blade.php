
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>
        window.Laravel = { csrfToken: '{{ csrf_token() }}' }
    </script>

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.css') }}">


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/img.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

<div id="app">
        <div class="pos-f-t">
<!--            <div class="collapse" id="navbarToggleExternalContent">-->
<!--                <div class="bg-dark p-4">-->
<!--                    <div class="btn-group" role="group" aria-label="Basic example">-->
<!--                        <button type="button" class="btn btn-primary">left 1</button>-->
<!--                        <button type="button" class="btn btn-primary">mid</button>-->
<!--                        <button type="button" class="btn btn-primary">Right</button>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->

            <nav class="navbar navbar-dark is-info">
<!--                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">-->
<!--                    <span class="navbar-toggler-icon"></span>-->
<!--                </button>-->




            <div class="navbar-brand">
                <a class="navbar-item" href="{{ url('/') }}">
                    <img src="https://api.findit.lk/images/companies/1453/comtechlogo.png" alt="File Hosting" width="112" height="28">
                </a>
            </div>
            <div class="navbar-menu">
                <div class="navbar-start">
                    <a class="navbar-item" href="{{ url('/') }}">
                        Home
                    </a>
                    <a class="navbar-item" href="{{ url('/channel') }}">
                        Channels
                    </a>
                    <a class="navbar-item" href="{{ url('/teledrama') }}">
                        Teledramas
                    </a>
                    <a class="navbar-item" href="{{ url('/episode') }}">
                        Episodes
                    </a>
                </div>
                <div class="navbar-end">
                    @guest
                        <a class="navbar-item" href="{{ route('login') }}">Login</a>
                        <a class="navbar-item" href="{{ route('register') }}">Register</a>
                    @else
                        <div class="navbar-item has-dropdown is-hoverable">
                            <a class="navbar-link">
                                <span class="fa fa-user-o"></span> &nbsp;
                                {{ Auth::user()->name }}
                            </a>

                            <div class="navbar-dropdown is-right">
                                    <a class="navbar-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                            </div>
                        </div>
                    @endguest
                </div>
            </div>

            </nav>

        @if(Auth::check())
            @include('layouts.notification')
<!--            @include('layouts.file-form')-->
            @include('layouts.confirm')
            @include('layouts.modal')
        @endif

        @yield('content')

        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/img.js') }}"></script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>
