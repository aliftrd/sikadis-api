<div class="card">
    <div class="card-body">
        <h1 class="card-title">Edit Profile</h1>

        @if($status)
            <div class="alert alert-success">
                <i class="fas fa-check-circle mr-2"></i>
                <span class="text-dark">A new verification link has been sent to your email address.</span>
            </div>
        @endif

        @if($mustVerifyEmail && auth()->user()->email_verified_at == null)
            <div class="alert alert-warning">
                <i class="fas fa-exclamation-triangle mr-2"></i>
                <span class="text-dark">Your email address is not verified.</span>
                <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                    @csrf
                    <button type="submit"
                            class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>
                </form>
            </div>
        @endif

        <form action="{{ route('admin.profile.edit') }}" method="post">
            @csrf
            @method('PATCH')

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" value="{{ old('name', auth()->user()->name) }}"
                       class="form-control @error('name') is-invalid @enderror" required>
                @error('name')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email', auth()->user()->email) }}"
                       class="form-control @error('email') is-invalid @enderror" required>
                @error('email')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <button class="btn btn-primary">Submit</button>
        </form>

    </div>
</div>
