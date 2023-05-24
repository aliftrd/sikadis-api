@props(['title' => 'Sambutan'])
@extends('layouts.auth', ['title' => $title])

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h1 class="card-title">{{ $title }}</h1>
                <form action="{{ route('admin.settings.greeting.update') }}" method="POST">
                    @method('PATCH')
                    @csrf
                    <div class="form-group">
                        <label for="kata_sambutan">Kata Sambutan</label>
                        <x-ckeditor id="kata_sambutan"
                                    name="kata_sambutan"
                                    required>{{ old('kata_sambutan', $settings['KATA_SAMBUTAN']) }}</x-ckeditor>
                        @error('kata_sambutan')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button class="btn btn-primary">Kirim</button>
                </form>
            </div>
        </div>
    </div>
@endsection
