@extends('layouts.guest', ['title' => 'Lupa password'])

@section('content')
    <div class="card">
        <div class="card-body">
            <h1 class="card-title">{{ __('Lupa password') }}</h1>
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email"
                           class="form-control @error('email') is-invalid @enderror" name="email"
                           value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <button type="submit"
                        class="btn btn-lg btn-primary btn-block">Kirim link reset password
                </button>
            </form>
        </div>
    </div>
@endsection
