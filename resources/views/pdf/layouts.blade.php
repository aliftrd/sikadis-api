<!doctype html>
<html lang="en">
<head>
    @include('pdf.partials.styles')
</head>
<body>
<header>
    @include('pdf.partials.headers')
</header>
<main>
    @yield('content')
</main>
</body>
</html>
