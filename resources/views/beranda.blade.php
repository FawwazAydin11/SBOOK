@extends('layouts.app')

@section('content')
    <div class="text-center mt-5">
        <h1>Selamat Datang di Sbook</h1>
        <p>Sistem Penyewaan Lapangan Badminton Lapangan 8 Jember</p>
        @guest
            <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
            <a href="{{ route('register') }}" class="btn btn-secondary">Register</a>
        @endguest
    </div>
@endsection
