<div>
    <textarea id="{{ $id }}" {{ $attributes }}>{{ $slot }}</textarea>
</div>

@push('styles')

@endpush

@push('scripts')
    <script src="{{ asset('backend/plugins/ckeditor/ckeditor.js') }}"></script>
    <script type="text/javascript">
        $(function () {
            let ckeditorElement = document.getElementById('{{ $id }}');
            CKEDITOR.replace(ckeditorElement)
            CKEDITOR.config.customConfig = '{{ asset('backend/plugins/ckeditor/config.js') }}';
        });
    </script>
@endpush
