@extends('layouts.guest')

@section('content')
<div class="login-box">
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a href="#" class="h1">
                <img src="{{ asset('images/general/app-logo.png') }}" height="35" alt="">
                <b>{{ config('app.name') }}</b>
            </a>
        </div>
        <div class="card-body">
            <h2 class="text-center mb-4">Daftar Akun Baru</h2>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Lengkap</label>
                    <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Nama Lengkap" required autocomplete="name" autofocus>
                    @error('name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="Email" required autocomplete="email">
                    @error('email')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" required autocomplete="new-password">
                    @error('password')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Konfirmasi Password" required autocomplete="new-password">
                </div>

                <div class="form-footer">
                    <button type="submit" class="btn btn-primary w-100">Daftar Sekarang</button>
                </div>
            </form>

            <div class="text-center text-muted my-3">
                Sudah punya akun? <a href="{{ url('login') }}">Login disini</a>
            </div>
        </div>
    </div>
</div>
@endsection