<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Rkozlov Blog - @yield('title')</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="csrf-param" content="_token" />
        <link href="/css/app.css" rel="stylesheet">
    </head>
    <body>
        <header>
            <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
                <a class="navbar-brand" href="/">Rkozlov-laravel-blog</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsingNavbarMd">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar-collapse collapse" id="collapsingNavbarMd">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ action('ArticleController@index') }}">Articles</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ action('ArticleController@create') }}">Create Article</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ action('PageController@about') }}">About</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="container mt-4">
            <h1>@yield('header')</h1>
            <div>
                @yield('content')
            </div>
        </div>
        <script src="{{ asset('/js/app.js') }}"></script>
    </body>
</html>