@extends('layouts.auth', ['title' => 'Contact Setting'])

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h1 class="card-title">{{ 'Contact Setting' }}</h1>
                <form action="{{ route('admin.settings.contact.update') }}" method="POST">
                    @method('PATCH')
                    @csrf
                    <div class="form-group">
                        <label for="pusat_bantuan">Pusat Bantuan</label>
                        <x-ckeditor id="pusat_bantuan"
                                    name="pusat_bantuan"
                                    required>{{ old('pusat_bantuan', $settings['PUSAT_BANTUAN']) }}</x-ckeditor>
                        @error('pusat_bantuan')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" name="phone" id="phone"
                                       class="form-control @error('phone') is-invalid @enderror"
                                       value="{{ old('phone', $settings['PHONE']) }}"
                                       required>
                                @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="jam_kantor">Jam Kantor</label>
                                <input type="text" name="jam_kantor" id="jam_kantor"
                                       class="form-control @error('jam_kantor') is-invalid @enderror"
                                       value="{{ old('jam_kantor', $settings['JAM_KANTOR']) }}"
                                       required>
                                @error('jam_kantor')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="email">E-mail</label>
                                <input type="email" name="email" id="email"
                                       class="form-control @error('email') is-invalid @enderror"
                                       value="{{ old('email', $settings['EMAIL']) }}"
                                       required>
                                @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
