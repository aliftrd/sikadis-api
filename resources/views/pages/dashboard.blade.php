@extends('layouts.auth', ['title' => 'Dashboard'])

@section('content')
    <div class="container">
        <div class="alert alert-info">Selamat datang di halaman dashboard {{ auth()->user()->name }}</div>
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <h1 class="card-title">Pendaftar Baru</h1>
                            @can('student.candidate.view')
                                <a href="{{ route('admin.student-candidates.index') }}"
                                   class="btn btn-sm btn-primary mb-4 mx-2">
                                    <i class="fas fa-eye mr-2"></i> Lihat Semua
                                </a>
                            @endcan
                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">NIK</th>
                                    <th scope="col">Nama Lengkap</th>
                                    <th scope="col">Waktu Mendaftar</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($studentCandidates as $studentCandidate)
                                    <tr>
                                        <td>{{ $studentCandidate->nik }}</td>
                                        <td>{{ $studentCandidate->fullname }}</td>
                                        <td>{{ $studentCandidate->created_at->diffForHumans() }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center">Tidak ada data</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Artikel Terbaru</h5>
                        <div class="social-media-list">
                            @forelse($latestPosts as $latestPost)
                                <a href="{{ route('landing.single-news', $latestPost->slug) }}">
                                    <div class="social-media-item">
                                        <div class="social-icon bg-info">
                                            <i class="fab fa-blogger"></i>
                                        </div>
                                        <div class="social-text">
                                            <p>{{ str($latestPost->title)->limit(40, '...') }}</p>
                                            <span>{{ $latestPost->created_at->diffForHumans() }}</span>
                                        </div>
                                    </div>
                                </a>
                            @empty
                                <div class="social-media-item">
                                    <div class="social-icon bg-danger">
                                        <i class="fa fa-times"></i>
                                    </div>
                                    <div class="social-text">
                                        <p>Tidak ada data</p>
                                    </div>
                                </div>
                            @endforelse

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
