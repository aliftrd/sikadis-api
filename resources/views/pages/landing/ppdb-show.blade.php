@extends('layouts.landing', ['title' => 'Cetak Kartu Peserta PPDB'])

@section('content')
    <!--====== Header End ======-->
    <section class="page-header" style="background: none">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-xl-8">
                    <div class="title-block">
                        <h1>Cetak Formulir PPDB</h1>
                        <ul class="header-bradcrumb justify-content-center">
                            <li class="active" aria-current="page">Tahun Ajaran {{ $academic_year->year }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact section start -->
    <section class="contact section-padding">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('landing.ppdb.print') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="nik">NIK</label>
                            <input type="number" name="nik" id="nik"
                                   class="form-control @error('nik') is-invalid @enderror" value="{{ old('nik') }}"
                                   required autofocus>
                            @error('nik')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <button class="btn btn-primary w-100 rounded-3">Cetak</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact section End -->
@endsection
