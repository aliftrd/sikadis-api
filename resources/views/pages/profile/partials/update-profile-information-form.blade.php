<div class="card">
    <div class="card-body">
        <h1 class="card-title">Edit Profil</h1>

        @if($status)
            <div class="alert alert-success">
                <i class="fas fa-check-circle mr-2"></i>
                <span class="text-dark">Link verifikasi baru telah dikirim ke alamat email Anda.</span>
            </div>
        @endif

        @if($mustVerifyEmail && auth()->user()->email_verified_at == null)
            <div class="alert alert-warning">
                <i class="fas fa-exclamation-triangle mr-2"></i>
                <span class="text-dark">Anda belum memverifikasi alamat email Anda.  </span>
                <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                    @csrf
                    <button type="submit"
                            class="btn btn-link p-0 m-0 align-baseline">Klik di sini untuk meminta link verifikasi baru.
                    </button>
                </form>
            </div>
        @endif

        <form action="{{ route('admin.profile.edit') }}" method="post">
            @csrf
            @method('PATCH')

            <div class="form-group">
                <label for="name">Nama</label>
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

            <button class="btn btn-primary">Kirim</button>
        </form>

    </div>
</div>
