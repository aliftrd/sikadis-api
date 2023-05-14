@extends('layouts.auth', ['title' => isset($user) ? 'Update User' : 'Create User'])

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h1 class="card-title">{{ isset($user) ? 'Update User' : 'Create User' }}</h1>
                <form action="{{ isset($user) ? route('admin.users.update', $user->id) : route('admin.users.store') }}"
                      method="POST">
                    @csrf
                    @isset($user)
                        @method('PATCH')
                    @endisset

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name"
                               class="form-control @error('name') is-invalid @enderror"
                               value="{{ old('name', isset($user) ? $user->name : '') }}" required>
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="email" name="email" id="email"
                               class="form-control @error('email') is-invalid @enderror"
                               value="{{ old('email', isset($user) ? $user->email : '') }}" required>
                        @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="role">Role</label>
                        <select class="form-control @error('role') is-invalid @enderror" name="role"
                                id="role" required>
                            <option value="" selected disabled>-- Select Role --</option>
                            @foreach($roles as $role)
                                <option
                                    value="{{ $role->name }}"
                                    {{ isset($user) && $user->hasRole($role->name) || old('role') == $role->name ? 'selected' : '' }}>
                                    {{ str($role->name)->ucfirst() }}
                                </option>
                            @endforeach
                        </select>
                        @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password"
                               class="form-control @error('password') is-invalid @enderror"
                               id="password" {{ isset($user) ? '' : 'required' }}>
                        @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password-confirmation">Password Confirmation</label>
                        <input type="password" name="password_confirmation"
                               class="form-control @error('password_confirmation') is-invalid @enderror"
                               id="password-confirmation" {{ isset($user) ? '' : 'required' }}>
                        @error('password_confirmation')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
