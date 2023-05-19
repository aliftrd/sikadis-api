@extends('layouts.auth', ['title' => 'Student Candidates'])

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between">
                    <h1 class="card-title">Student Candidates</h1>
                    @can('academic.year.create')
                        <a href="{{ route('admin.academic-years.create') }}" class="btn btn-sm btn-primary mb-4 mx-2">
                            <i class="fas fa-plus mr-2"></i> Create
                        </a>
                    @endcan
                </div>
                <div class="table-responsive-md">
                    {!! $dataTable->table() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    {!! $dataTable->scripts() !!}
@endpush
