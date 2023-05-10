<!-- Styles -->
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href="{{ asset('backend/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('backend/plugins/font-awesome/css/all.min.css') }}" rel="stylesheet">
@auth
    <link href="{{ asset('backend/plugins/toastr/toastr.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/plugins/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet">
@endauth

<!-- Theme Styles -->
<link href="{{ asset('backend/css/lime.min.css') }}" rel="stylesheet">
<link href="{{ asset('backend/css/custom.css') }}" rel="stylesheet">
@stack('styles')
