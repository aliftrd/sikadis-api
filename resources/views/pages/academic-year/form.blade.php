@extends('layouts.auth', ['title' => isset($academicYear) ? 'Update Academic Year' : 'Create Academic Year'])

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h1 class="card-title">{{ isset($academicYear) ? 'Update Academic Year' : 'Create Academic Year' }}</h1>
                <form
                    action="{{ isset($academicYear) ? route('admin.academic-years.update', $academicYear->id) : route('admin.academic-years.store') }}"
                    method="POST">
                    @csrf
                    @isset($academicYear)
                        @method('PATCH')
                    @endisset

                    <div class="form-group">
                        <label for="year">Year</label>
                        <input type="text" name="year" id="year"
                               class="form-control @error('year') is-invalid @enderror"
                               value="{{ old('year', isset($academicYear) ? $academicYear->year : '') }}" required>
                        @error('year')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
