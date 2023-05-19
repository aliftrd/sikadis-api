@extends('layouts.landing', ['title' => 'PPDB Belum Dibuka'])

@section('content')
    <!-- Contact section start -->
    <section class="contact section-padding">
        <div class="container">
            <x-alert/>
            <div class="card">
                <div class="card-body">
                    <div class="alert alert-danger">
                        <h4 class="alert-heading">PPDB belum dibuka!</h4>
                        <p class="mb-0 text-dark">
                            PPDB belum dibuka. Silahkan kembali lagi nanti.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact section End -->
@endsection
