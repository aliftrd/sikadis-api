<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('layouts.partials.meta')
    <title>{{ join(' - ', [$title, $WEBSITE_TITLE ?? config('app.name', 'Laravel')]) }}</title>
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
        <div class="d-none d-lg-block col-lg-8 bg-primary">
            <div class="d-flex justify-content-center align-content-center"></div>
        </div>
    </div>
</div>

@include('layouts.partials.scripts')
</body>
</html>
