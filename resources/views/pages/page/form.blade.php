@extends('layouts.auth', ['title' => isset($page) ? 'Update Page' : 'Create Page'])

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h1 class="card-title">{{ isset($page) ? 'Update Page' : 'Create Page' }}</h1>
                <form
                    action="{{ isset($page) ? route('admin.pages.update', $page->id) : route('admin.pages.store') }}"
                    method="POST">
                    @csrf
                    @isset($page)
                        @method('PATCH')
                    @endisset

                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" id="title"
                                       class="form-control @error('title') is-invalid @enderror"
                                       value="{{ old('title', isset($page) ? $page->title : '') }}" required>
                                @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="content">Content</label>
                                <x-ckeditor id="content"
                                            name="content"
                                            required>{{ old('content', isset($page) ? $page->content : '') }}</x-ckeditor>
                                @error('content')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                @isset($page)
                                    <div class="mb-4">
                                        <label for="preview">Preview</label>
                                        <x-lazy-image :src="$page->getMainImageUrlAttribute()"
                                                      class="img-fluid"
                                                      alt="Preview"/>
                                    </div>
                                @endisset
                                <label for="thumbnail">Thumbnail</label>
                                <x-filepond name="thumbnail" id="thumbnail"
                                            :value="old('thumbnail', isset($page) ? $page->thumbnail : '')"
                                            :required="!isset($page) ? 'true' : 'false'"
                                            accept="image/*"
                                            data-max-file-size="2MB"/>
                                @error('thumbnail')
                                <small class="text-danger">{{ $message }}</small>
                                @else
                                    @isset($page)
                                        <small class="text-muted">
                                            *Doesn't need to be filled in if you do not want to
                                            change.
                                        </small>
                                    @endisset
                                @endif
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" name="priority"
                                           id="customSwitch1"
                                        {{ old('priority', isset($page) && $page->priority) == 1 ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="customSwitch1">Priority</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <input type="submit" class="btn btn-secondary text-capitalize" name="status" value="draft">
                    <input type="submit" class="btn btn-primary text-capitalize" name="status" value="publish">
                </form>
            </div>
        </div>
    </div>
@endsection
