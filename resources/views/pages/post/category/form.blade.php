@props(['title' => isset($category) ? 'Update Kategori' : 'Buat Kategori'])
@extends('layouts.auth', ['title' => $title])

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h1 class="card-title">{{ $title }}</h1>
                <form
                    action="{{ isset($category) ? route('admin.posts.categories.update', $category->id) : route('admin.posts.categories.store') }}"
                    method="POST">
                    @csrf
                    @isset($category)
                        @method('PATCH')
                    @endisset

                    <div class="form-group">
                        <label for="title">Judul</label>
                        <input type="text" name="title" id="title"
                               class="form-control @error('title') is-invalid @enderror"
                               value="{{ old('title', isset($category) ? $category->title : '') }}" required>
                        @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Kirim</button>
                </form>
            </div>
        </div>
    </div>
@endsection
