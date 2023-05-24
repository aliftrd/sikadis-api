<div class="card">
    <div class="card-body">
        <h1 class="card-title">Update Password</h1>

        <form action="{{ route('admin.profile.password.update') }}" method="post">
            @csrf
            @method('PATCH')

            <div class="form-group">
                <label for="current-password">Password saat ini</label>
                <input type="password" name="current_password" id="current-password"
                       class="form-control @error('current_password') is-invalid @enderror" required>
                @error('current_password')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="new-password">Password baru</label>
                <input type="password" name="password" id="new-password"
                       class="form-control @error('password') is-invalid @enderror" required>
                @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="confirm-password">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" id="confirm-password"
                       class="form-control @error('password_confirmation') is-invalid @enderror" required>
                @error('password_confirmation')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button class="btn btn-primary">Kirim</button>
        </form>
    </div>
</div>
