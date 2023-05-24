@extends('layouts.auth', ['title' => 'Profil'])

@section('content')
    <div class="container">
        @include('pages.profile.partials.update-profile-information-form', compact('mustVerifyEmail', 'status'))
        @include('pages.profile.partials.change-password-form')
    </div>
@endsection
