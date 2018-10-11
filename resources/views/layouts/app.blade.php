<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Greenpanda') }}</title>

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>

    @section('scripts')
        @show
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- include summernote css/js-->
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Greenpanda') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                @if (Route::has('register'))
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                @endif
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-2">
                        <ul class="nav flex-column nav-pills">
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('admin/game-category') ? 'active' : '' }}" href="{{ url('admin/game-category') }}">Games categories</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('admin/game') ? 'active' : '' }}" href="{{ url('admin/game') }}">Games</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('admin/job-category') ? 'active' : '' }}" href="{{ url('admin/job-category') }}">Jobs categories</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('admin/job') ? 'active' : '' }}" href="{{ url('admin/job') }}">Jobs</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('admin/testimonials') ? 'active' : '' }}" href="{{ url('admin/testimonials') }}">Testimonials</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('admin/legal-pages') ? 'active' : '' }}" href="{{ url('admin/legal-pages') }}">Legal Pages</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('admin/static-content') ? 'active' : '' }}" href="{{ url('admin/static-content') }}">Static Content</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('admin/setting/1/edit') ? 'active' : '' }}" href="{{ url('admin/setting/1/edit') }}">Setting</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-8">
                        @section('navbar')
                        @show
                        <div class="card">
                            <div class="card-header">
                                @section('title')
                                @show
                            </div>

                            <div class="card-body">
                                @yield('content')
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </main>
    </div>


    <script src="//cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js" defer></script>

    <script>
        $(document).ready(function() {
            $('#page_description').summernote({
                height: 200
            });
        });
    </script>
</body>
</html>
