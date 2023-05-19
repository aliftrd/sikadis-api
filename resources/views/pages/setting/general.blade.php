@extends('layouts.auth', ['title' => 'General Setting'])

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h1 class="card-title">{{ 'General Setting' }}</h1>
                <form action="{{ route('admin.settings.general.update') }}" method="POST">
                    @method('PATCH')
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="preview">Preview</label>
                                <x-lazy-image :src="'/storage/' . $WEBSITE_LOGO" class="img-fluid w-25 h-25"
                                              alt="Preview"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="logo">Logo</label>
                                <x-filepond name="logo" id="logo"
                                            :value="old('logo', $WEBSITE_LOGO)"
                                            :required="!isset($WEBSITE_LOGO) ? 'true' : 'false'"
                                            accept="image/*"
                                            data-max-file-size="2MB"/>
                                @error('logo')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                                <small class="text-muted">
                                    *Doesn't need to be filled in if you do not want to
                                    change.
                                </small>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" id="title"
                                       class="form-control @error('title') is-invalid @enderror"
                                       value="{{ old('title', $WEBSITE_TITLE) }}"
                                       required>
                                @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="keywords">Keywords</label>
                                <input type="text" name="keywords" id="keywords"
                                       class="form-control @error('keywords') is-invalid @enderror"
                                       value="{{ old('keywords', $WEBSITE_KEYWORDS) }}"
                                       required>
                                @error('keywords')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror"
                                  name="description" id="description"
                                  rows="3"
                                  required>{{ old('description', $WEBSITE_DESCRIPTION) }}</textarea>
                        @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
