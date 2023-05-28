@props(['title' => isset($studentCandidate) ? 'Edit Data Calon Siswa' : 'Tambah Data Calon Siswa'])
@extends('layouts.auth', ['title' => $title])

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <form method="post" action="{{ route('landing.ppdb.update', $studentCandidate->id) }}"
                      id="contactForm" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="nik">NIK</label>
                        <input type="number"
                               class="form-control @error('nik') is-invalid @enderror"
                               name="nik"
                               id="nik"
                               value="{{ old('nik', $studentCandidate->nik) }}" readonly required>
                        @error('nik')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="fullname">Nama Lengkap</label>
                        <input type="text"
                               class="form-control @error('fullname') is-invalid @enderror"
                               name="fullname"
                               id="fullname"
                               value="{{ old('fullname', $studentCandidate->fullname) }}" required>
                        @error('fullname')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="birthplace">Tempat Lahir</label>
                                <input type="text"
                                       class="form-control @error('birthplace') is-invalid @enderror"
                                       name="birthplace" id="birthplace"
                                       value="{{ old('birthplace', $studentCandidate->birthplace) }}"
                                       required>
                                @error('birthplace')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                                @error('birthplace')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="birthdate">Tanggal Tahun Lahir</label>
                                <input type="date"
                                       class="form-control @error('birthdate') is-invalid @enderror"
                                       name="birthdate" id="birthdate"
                                       value="{{ old('birthdate', $studentCandidate->birthdate) }}"
                                       required>
                                @error('birthdate')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="gender">Jenis Kelamin</label>
                        <div class="row container">
                            @foreach(\App\Enums\GenderType::cases() as $gender)
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender"
                                           id="{{ $gender }}"
                                           value="{{ $gender->value }}" {{ old('gender', $studentCandidate->gender) == $gender ? 'checked' : '' }}>
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
                    <div class="form-group">
                        <label for="religion">Agama</label>
                        <select class="form-control @error('birthplace') is-invalid @enderror"
                                name="religion"
                                id="religion" required>
                            <option value="" selected disabled>Pilih Agama</option>
                            @foreach(\App\Enums\ReligionType::cases() as $religion)
                                <option
                                    value="{{ $religion }}" {{ old('religion', $studentCandidate->religion) == $religion->value ? 'selected': '' }}>{{ ucfirst($religion->value) }}</option>
                            @endforeach
                        </select>
                        @error('religion')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="father_name">Nama Ayah</label>
                                <input type="text"
                                       class="form-control @error('father_name') is-invalid @enderror"
                                       name="father_name" id="father_name"
                                       value="{{ old('father_name', $studentCandidate->father_name) }}"
                                       required>
                                @error('father_name')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="mother_name">Nama Ibu</label>
                                <input type="text"
                                       class="form-control @error('mother_name') is-invalid @enderror"
                                       name="mother_name" id="mother_name"
                                       value="{{ old('mother_name', $studentCandidate->mother_name) }}"
                                       required>
                                @error('mother_name')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="father_occupation">Pekerjaan Ayah</label>
                                <input type="text"
                                       class="form-control @error('father_occupation') is-invalid @enderror"
                                       name="father_occupation" id="father_occupation"
                                       value="{{ old('father_occupation', $studentCandidate->father_occupation) }}"
                                       required>
                                @error('father_occupation')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="mother_occupation">Pekerjaan Ibu</label>
                                <input type="text"
                                       class="form-control @error('mother_occupation') is-invalid @enderror"
                                       name="mother_occupation" id="mother_occupation"
                                       value="{{ old('mother_occupation', $studentCandidate->mother_occupation) }}"
                                       required>
                                @error('mother_occupation')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="address">Alamat</label>
                        <input type="text"
                               class="form-control @error('address') is-invalid @enderror"
                               name="address" id="address"
                               value="{{ old('address', $studentCandidate->address) }}"
                               required>
                        @error('address')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="guardian_name">Nama Wali</label>
                                <input type="text"
                                       class="form-control @error('guardian_name') is-invalid @enderror"
                                       name="guardian_name" id="guardian_name"
                                       value="{{ old('guardian_name', $studentCandidate->guardian_name) }}">
                                @error('guardian_name')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="guardian_occupation">Pekerjaan Wali</label>
                                <input type="text"
                                       class="form-control @error('guardian_occupation') is-invalid @enderror"
                                       name="guardian_occupation" id="guardian_occupation"
                                       value="{{ old('guardian_occupation', $studentCandidate->guardian_occupation) }}">
                                @error('guardian_occupation')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="guardian_address">Alamat Wali</label>
                        <input type="text"
                               class="form-control @error('guardian_address') is-invalid @enderror"
                               name="guardian_address" id="guardian_address"
                               value="{{ old('guardian_address', $studentCandidate->guardian_address) }}">
                        @error('guardian_address')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                    <button class="btn btn-primary w-100 rounded-3" type="submit">Kirim</button>
                </form>
            </div>
        </div>
    </div>
@endsection
