<div>
    <img data-src="{{ $src }}" alt="{{ $alt ?? 'Image' }}" {{ $attributes->merge(['class' => 'lazyload']) }}/>
</div>

@push('scripts')
    <script src="{{ asset('backend/plugins/lazyload/lazyload.min.js') }}"></script>
    <script type="text/javascript">
        $(function () {
            $('.lazyload').Lazy({
                scrollDirection: 'vertical',
                effect: 'fadeIn',
                visibleOnly: true,
                onError: function (element) {
                    console.log('error loading ' + element.data('src'));
                }
            });
        })
    </script>
@endpush
