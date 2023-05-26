<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('layouts.partials.meta')
    <title>{{ join(' - ', [$title, config('app.name', 'Laravel')]) }}</title>
    @include('layouts.partials.styles')
</head>
<body>
<div id="app">
    <div class="d-flex min-vh-100">
        <div class="d-flex flex-column justify-content-center col-lg-4">
            <div class="p-4">
                @yield('content')
            </div>
        </div>
        <div class="d-none d-lg-block col-lg-8"
             style="background: linear-gradient(rgba(40, 67, 135, .7),rgba(40, 67, 135, .7)),url(../backend/images/custom-bg.jpg);background-size: cover;">
            <div class="d-flex h-100 flex-column justify-content-center align-items-start align-content-center"
                 style="padding: 10em">
                <h1 class="text-white font-weight-bold" style="font-size: 46px">
                    SELAMAT DATANG </h1>
                <p class="text-white" style="font-size: 16px">Senang melihat anda kembali, ayo masuk dan akses
                    fiturnya!</p>
            </div>
        </div>
    </div>
</div>

@include('layouts.partials.scripts')
</body>
</html>
