@extends('layouts.auth')

@section('title', 'Categories')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between">
                    <h1 class="card-title">Categories</h1>
                    <a href="{{ route('admin.posts.categories.create') }}" class="btn btn-sm btn-primary mb-4 mx-2">
                        <i class="fas fa-plus mr-2"></i> Create
                    </a>
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
