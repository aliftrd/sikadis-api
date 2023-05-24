@props(['title' => isset($slider) ? 'Update Slider' : 'Buat Slider'])
@extends('layouts.auth', ['title' => $title])

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h1 class="card-title">{{ $title }}</h1>
                <form
                    action="{{ isset($slider) ? route('admin.sliders.update', $slider->id) : route('admin.sliders.store') }}"
                    method="POST">
                    @csrf
                    @isset($slider)
                        @method('PATCH')
                    @endisset

                    <div class="form-group">
                        <label for="title">Judul</label>
                        <input type="text" name="title" id="title"
                               class="form-control @error('title') is-invalid @enderror"
                               value="{{ old('title', isset($slider) ? $slider->title : '') }}" required>
                        @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="image">Gambar</label>
                        <x-filepond name="image" id="image"
                                    class="@error('image') is-invalid @enderror"
                                    required="{{ !isset($slider) ? 'true' : 'false' }}"
                                    accept="image/*"
                                    data-max-file-size="2MB"/>
                        @error('image')
                        <small class="text-danger">{{ $message }}</small>
                        @else
                            @isset($slider)
                                <small class="text-muted">
                                    *Kosongkan jika tidak ingin mengubah
                                </small>
                            @endisset
                        @endif
                    </div>

                    <button type="submit" class="btn btn-primary">Kirim</button>
                </form>
            </div>
        </div>
    </div>
@endsection
