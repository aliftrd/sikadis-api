@extends('layouts.guest', ['title' => 'Verifikasi Alamat Email Anda'])

@section('content')
    <div class="card">
        <div class="card-body">
            <h1 class="card-title">Verifikasi Alamat Email Anda</h1>
            @if (session('resent'))
                <div class="alert alert-success" role="alert">
                    Tautan verifikasi baru telah dikirim ke alamat email Anda.
                </div>
            @endif

            Sebelum melanjutkan, silakan periksa email Anda untuk tautan
            verifikasi.
            Jika Anda tidak menerima email,
            <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                @csrf
                <button type="submit"
                        class="btn btn-link p-0 m-0 align-baseline">klik di sini untuk kirim ulang
                </button>
                .
            </form>
        </div>
    </div>
@endsection
