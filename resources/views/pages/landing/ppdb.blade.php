@extends('layouts.landing', ['title' => join(' ', ['PPDB', $academic_year->year])])

@section('content')
    <!--====== Header End ======-->
    <section class="page-header" style="background: none">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-xl-8">
                    <div class="title-block">
                        <h1>Pendaftaran Siswa Baru</h1>
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
            <x-alert/>
            <div class="card">
                <div class="card-body">
                    @if($academic_year->ppdb)
                        <h1 class="card-title mb-4" style="font-size: 18px;margin-bottom: 20px;color: #000;">
                            Formulir Pendaftaran Siswa Baru
                        </h1>
                        <form class="contact__form form-row " method="post" action="{{ route('landing.ppdb.store') }}"
                              id="contactForm" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-lg-6 col-xl-6">
                                    <div class="mb-3 row align-items-center">
                                        <label for="nik" class="col-md-4 col-form-label">
                                            NIK
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-md-8">
                                            <input type="number"
                                                   class="form-control @error('nik') is-invalid @enderror"
                                                   name="nik"
                                                   id="nik"
                                                   value="{{ old('nik') }}" required>
                                            @error('nik')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-xl-6">
                                    <div class="mb-3 row align-items-center">
                                        <label for="fullname" class="col-md-4 col-form-label">
                                            Nama Lengkap
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-md-8">
                                            <input type="text"
                                                   class="form-control @error('fullname') is-invalid @enderror"
                                                   name="fullname"
                                                   id="fullname"
                                                   value="{{ old('fullname') }}" required>
                                            @error('fullname')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-xl-6">
                                    <div class="mb-3 row align-items-center">
                                        <label for="birthplace" class="col-md-4 col-form-label">
                                            Tempat Lahir
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-md-8">
                                            <input type="text"
                                                   class="form-control @error('birthplace') is-invalid @enderror"
                                                   name="birthplace" id="birthplace"
                                                   value="{{ old('birthplace') }}"
                                                   required>
                                            @error('birthplace')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-xl-6">
                                    <div class="mb-3 row align-items-center">
                                        <label for="birthdate" class="col-md-4 col-form-label">
                                            Tanggal Tahun Lahir
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-md-8">
                                            <input type="date"
                                                   class="form-control @error('birthdate') is-invalid @enderror"
                                                   name="birthdate" id="birthdate"
                                                   value="{{ old('birthdate') }}"
                                                   required>
                                            @error('birthdate')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 row align-items-center">
                                <label for="gender" class="col-md-2 col-form-label">
                                    Jenis Kelamin
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="col-md-10">
                                    @foreach(\App\Enums\GenderType::cases() as $gender)
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender"
                                                   id="{{ $gender }}"
                                                   value="{{ $gender->value }}" {{ old('gender') == $gender->value ? 'checked' : '' }}>
                                            <label class="form-check-label" for="{{ $gender }}">
                                                {{ $gender === \App\Enums\GenderType::Male ? 'Laki-laki' : 'Perempuan' }}
                                            </label>
                                        </div>
                                    @endforeach
                                    @error('gender')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row align-items-center">
                                <label for="religion" class="col-md-2 col-form-label">
                                    Agama
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="col-md-10">
                                    <select class="form-control @error('birthplace') is-invalid @enderror"
                                            name="religion"
                                            id="religion" required>
                                        <option value="" selected disabled>Pilih Agama</option>
                                        @foreach(\App\Enums\ReligionType::cases() as $religion)
                                            <option
                                                value="{{ $religion }}" {{ old('religion') == $religion->value ? 'selected': '' }}>{{ ucfirst($religion->value) }}</option>
                                        @endforeach
                                    </select>
                                    @error('religion')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-xl-6">
                                    <div class="mb-3 row align-items-center">
                                        <label for="father_name" class="col-md-4 col-form-label">
                                            Nama Ayah
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-md-8">
                                            <input type="text"
                                                   class="form-control @error('father_name') is-invalid @enderror"
                                                   name="father_name" id="father_name"
                                                   value="{{ old('father_name') }}"
                                                   required>
                                            @error('father_name')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3 row align-items-center">
                                        <label for="father_occupation" class="col-md-4 col-form-label">
                                            Pekerjaan Ayah
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-md-8">
                                            <input type="text"
                                                   class="form-control @error('father_occupation') is-invalid @enderror"
                                                   name="father_occupation" id="father_occupation"
                                                   value="{{ old('father_occupation') }}"
                                                   required>
                                            @error('father_occupation')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-xl-6">
                                    <div class="mb-3 row align-items-center">
                                        <label for="mother_name" class="col-md-4 col-form-label">
                                            Nama Ibu
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-md-8">
                                            <input type="text"
                                                   class="form-control @error('mother_name') is-invalid @enderror"
                                                   name="mother_name" id="mother_name"
                                                   value="{{ old('mother_name') }}"
                                                   required>
                                            @error('mother_name')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3 row align-items-center">
                                        <label for="mother_occupation" class="col-md-4 col-form-label">
                                            Pekerjaan Ibu
                                        </label>
                                        <div class="col-md-8">
                                            <input type="text"
                                                   class="form-control @error('mother_occupation') is-invalid @enderror"
                                                   name="mother_occupation" id="mother_occupation"
                                                   value="{{ old('mother_occupation') }}">
                                            @error('mother_occupation')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 row align-items-center">
                                <label for="address" class="col-md-2 col-form-label">Alamat</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control @error('address') is-invalid @enderror"
                                           name="address" id="address"
                                           value="{{ old('address') }}"
                                           required>
                                    @error('address')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3 row align-items-center">
                                        <label for="guardian_name" class="col-md-4 col-form-label">
                                            Nama Wali
                                        </label>
                                        <div class="col-md-8">
                                            <input type="text"
                                                   class="form-control @error('guardian_name') is-invalid @enderror"
                                                   name="guardian_name" id="guardian_name"
                                                   value="{{ old('guardian_name') }}">
                                            @error('guardian_name')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3 row align-items-center">
                                        <label for="guardian_occupation" class="col-md-4 col-form-label">
                                            Pekerjaan Wali
                                        </label>
                                        <div class="col-md-8">
                                            <input type="text"
                                                   class="form-control @error('guardian_occupation') is-invalid @enderror"
                                                   name="guardian_occupation" id="guardian_occupation"
                                                   value="{{ old('guardian_occupation') }}">
                                            @error('guardian_occupation')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 row align-items-center">
                                <label for="guardian_address" class="col-md-2 col-form-label">
                                    Alamat Wali
                                </label>
                                <div class="col-md-10">
                                    <input type="text"
                                           class="form-control @error('guardian_address') is-invalid @enderror"
                                           name="guardian_address" id="guardian_address"
                                           value="{{ old('guardian_address') }}">
                                    @error('guardian_address')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <hr>
                            <div class="mb-3 row align-items-center">
                                <label for="files" class="col-md-2 col-form-label">
                                    File Pendukung
                                </label>
                                <div class="col-md-10">
                                    <input type="file"
                                           class="form-control h-auto @error('files') is-invalid @enderror"
                                           name="files" id="files" style="padding-left: 10px;"
                                           value="{{ old('files') }}" accept="image/*,application/pdf">
                                    @error('files')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                    <small class="text-muted">
                                        Surat keterangan TK / Ijasah TK atau Akte Kelahiran / KK <strong>bila
                                            ada.</strong>
                                    </small>
                                </div>
                            </div>
                            <button class="btn btn-primary w-100 rounded-3" type="submit">Daftar</button>
                        </form>
                    @else
                        <div class="alert alert-danger">
                            <h4 class="alert-heading">Pendaftaran ditutup!</h4>
                            <p class="mb-0 text-dark">
                                Pendaftaran sudah ditutup, silahkan hubungi admin untuk informasi lebih lanjut.
                            </p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!-- Contact section End -->
@endsection
