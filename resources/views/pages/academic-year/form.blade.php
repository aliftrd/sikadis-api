@props(['title'=> isset($academicYear) ? 'Update Tahun Ajaran' : 'Buat Tahun Ajaran'])
@extends('layouts.auth', ['title' => $title])

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h1 class="card-title">{{ $title }}</h1>
                <form
                    action="{{ isset($academicYear) ? route('admin.academic-years.update', $academicYear->id) : route('admin.academic-years.store') }}"
                    method="POST">
                    @csrf
                    @isset($academicYear)
                        @method('PATCH')
                    @endisset

                    <div class="form-group">
                        <label for="year">Tahun</label>
                        <input type="text" name="year" id="year"
                               class="form-control @error('year') is-invalid @enderror"
                               value="{{ old('year', isset($academicYear) ? $academicYear->year : '') }}" required>
                        @error('year')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button class="btn btn-primary">Kirim</button>
                </form>
            </div>
        </div>
    </div>
@endsection
