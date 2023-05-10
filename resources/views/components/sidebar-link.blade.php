<a href="{{ $href }}" @class([
        'active' => request()->routeIs($isRoute ?? false),
    ])>
    {{ $slot }}
</a>
