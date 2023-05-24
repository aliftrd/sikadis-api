<!-- Javascripts -->
<script src="{{ asset("backend/plugins/jquery/jquery-3.5.1.min.js") }}"></script>
<script src="{{ asset("backend/plugins/bootstrap/popper.min.js") }}"></script>
<script src="{{ asset("backend/plugins/bootstrap/js/bootstrap.min.js") }}"></script>
<script src="{{ asset("backend/plugins/jquery-slimscroll/jquery.slimscroll.min.js") }}"></script>
<script src="{{ asset("backend/plugins/toastr/toastr.min.js") }}"></script>
@auth
    <script src="{{ asset("backend/plugins/datatables/jquery.dataTables.min.js") }}"></script>
    <script src="{{ asset("backend/plugins/datatables/dataTables.bootstrap4.min.js") }}"></script>
    <script src="{{ asset("backend/plugins/select2/js/select2.full.min.js") }}"></script>
    <script src="{{ asset("backend/js/pages/select2.js") }}"></script>
    <script src="{{ asset("backend/plugins/sweetalert2/sweetalert2.all.min.js") }}"></script>
@endauth
<script src="{{ asset("backend/js/lime.min.js") }}"></script>
@auth
    <script type="text/javascript">
        $(document).ready(function () {
            $(document).on('submit', 'form', function (event) {
                $(this).find('button[type=submit]').attr('disabled', true);
            })

            $(document).on('submit', 'form.delete-form', function (event) {
                event.preventDefault();
                const button = $(this).find('button[type=submit]').attr('disabled', true);
                Swal.fire({
                    title: 'Apakah kamu yakin ingin menghapus data ini?',
                    text: "Data yang dihapus tidak dapat dikembalikan!",
                    icon: 'warning',
                    showCancelButton: true,
                    customClass: {
                        confirmButton: 'btn btn-danger',
                        cancelButton: 'btn btn-secondary'
                    },
                    confirmButtonText: 'Ya',
                    cancelButtonText: 'Tidak'
                }).then((result) => {
                    if (!result.isConfirmed) {
                        return button.attr('disabled', false);
                    }
                    return event.currentTarget.submit()
                })
            })

            $(document).on('submit', 'form.active-form', function (event) {
                event.preventDefault();
                const button = $(this).find('button[type=submit]').attr('disabled', true);
                Swal.fire({
                    title: 'Apakah kamu yakin ingin melakukan aksi ini?',
                    icon: 'warning',
                    showCancelButton: true,
                    customClass: {
                        confirmButton: 'btn btn-danger',
                        cancelButton: 'btn btn-secondary'
                    },
                    confirmButtonText: 'Ya',
                    cancelButtonText: 'Tidak'
                }).then((result) => {
                    if (!result.isConfirmed) {
                        return button.attr('disabled', false);
                    }
                    return event.currentTarget.submit()
                })
            })
        })
    </script>
@endauth

@stack('scripts')
<script src="{{ asset("backend/js/custom.js") }}"></script>
