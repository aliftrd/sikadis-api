@extends('layouts.auth')

@section('title', isset($role) ? 'Update Role' : 'Create Role')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h1 class="card-title">{{ isset($role) ? 'Update Role' : 'Create Role' }}</h1>
                <form action="{{ isset($role) ? route('admin.roles.update', $role->id) : route('admin.roles.store') }}"
                      method="POST">
                    @csrf
                    @isset($role)
                        @method('PATCH')
                    @endisset

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name"
                               class="form-control @error('name') is-invalid @enderror"
                               value="{{ isset($role) ? $role->name : old('name') }}" required>
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    @if(empty($role) || $role->id !== 1)
                        <div class="form-group">
                            <label for="permissions">Permissions</label>
                            <select class="form-control @error('permissions') is-invalid @enderror"
                                    name="permissions[]" id="permissions" tabindex="-1"
                                    multiple required>
                                @foreach ($permissions as $permission)
                                    <option
                                        value="{{ $permission->name }}" {{ isset($role) && $role->permissions->contains($permission) ? 'selected' : '' }}>
                                        {{ str($permission->name)->replace('.', ' ')->title() }}
                                    </option>
                                @endforeach
                            </select>
                            @error('permissions')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    @endempty

                    <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
