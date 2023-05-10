<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.partials.meta')
    <title>@yield('title') - {{ config('app.name', 'Laravel') }}</title>
    @include('layouts.partials.styles')
</head>
<body>
@include('layouts.partials.sidebar')
@include('layouts.partials.navbar')

@if(session()->has('flash'))
    <div id="alert-toast"
         data-type="{{ session('flash')['type'] }}"
         data-message="{{ session('flash')['message'] }}"
    ></div>
@endif
<div class="lime-container">
    <div class="lime-body">
        @yield('content')
    </div>
    <div class="lime-footer">
        <div class="d-flex justify-content-center">
            <span class="footer-text">2019 © SIKADIS</span>
        </div>
    </div>
</div>

@include('layouts.partials.scripts')
</body>
</html>
