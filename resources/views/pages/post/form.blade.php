@extends('layouts.auth')

@section('title', isset($post) ? 'Edit Post' : 'Create Post')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h1 class="card-title">{{ isset($post) ? 'Update Post' : 'Create Post' }}</h1>
                <form
                    action="{{ isset($post) ? route('admin.posts.update', $post->id) : route('admin.posts.store') }}"
                    method="POST">
                    @csrf
                    @isset($post)
                        @method('PATCH')
                    @endisset
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" id="title"
                                       class="form-control @error('title') is-invalid @enderror"
                                       value="{{ old('title', isset($post) ? $post->title : '') }}" required>
                                @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="content">Content</label>
                                <x-ckeditor id="content"
                                            name="content"
                                            required>{{ old('content', isset($post) ? $post->content : '') }}</x-ckeditor>
                                @error('content')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                @isset($post)
                                    <div class="mb-4">
                                        <label for="preview">Preview</label>
                                        <x-lazy-image :src="$post->getMainImageUrlAttribute()"
                                                      class="img-fluid"
                                                      alt="Preview"/>
                                    </div>
                                @endisset
                                <label for="thumbnail">Thumbnail</label>
                                <x-filepond name="thumbnail" id="thumbnail"
                                            :value="old('thumbnail', isset($post) ? $post->thumbnail : '')"
                                            :required="!isset($post) ? 'true' : 'false'"
                                            accept="image/*"
                                            data-max-file-size="2MB"/>
                                @error('thumbnail')
                                <small class="text-danger">{{ $message }}</small>
                                @else
                                    @isset($post)
                                        <small class="text-muted">
                                            *Doesn't need to be filled in if you do not want to
                                            change.
                                        </small>
                                    @endisset
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="category">Category</label>
                                <select class="form-control @error('category') is-invalid @enderror" name="category"
                                        id="category" required>
                                    <option value="" selected disabled>-- Select Category --</option>
                                    @foreach($categories as $category)
                                        <option
                                            value="{{ $category->id }}"
                                            {{ isset($post) && $category->id == $post->category_id || old('category') == $category->id ? 'selected' : '' }}>
                                            {{ str($category->title)->ucfirst() }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
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
