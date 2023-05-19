@props(['required' => false, 'value' => ''])

<div>
    <input type="file" class="filepond"
           required="{{ $required }}" {{ $attributes }}>
</div>

@push('styles')
    <link rel="stylesheet" href="{{ asset('backend/plugins/filepond/filepond.min.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('backend/plugins/filepond/plugins/filepond-plugin-file-validate-type.js') }}"></script>
    <script src="{{ asset('backend/plugins/filepond/plugins/filepond-plugin-file-validate-size.js') }}"></script>
    <script src="{{ asset('backend/plugins/filepond/filepond.min.js') }}"></script>
    <script type="text/javascript">
        FilePond.registerPlugin(
            FilePondPluginFileValidateType,
            FilePondPluginFileValidateSize,
        );
        const pondElement = document.querySelector('.filepond');
        const pond = FilePond.create(pondElement);
        const headers = {
            "X-CSRF-TOKEN": '{{ csrf_token() }}',
        };
        pond.setOptions({
            server: {
                process: {
                    url: '{{ route('upload.store') }}',
                    headers: headers,
                    onload: (response) => {
                        let json = (response);
                        let data = JSON.parse(json).data;
                        return data.path;
                    }
                },
                revert: {
                    url: '{{ route('upload.revert') }}',
                    headers: headers,
                },
            },
        })
        pond.on('processfileprogress', function (e) {
            $(this).find('form>button[type=submit]').attr('disabled', true);
        })
    </script>
@endpush
