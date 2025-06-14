@extends('layouts.layout-pemilik')

@section('title', 'Dashboard Pemilik')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-xl font-semibold">Halo, {{ Auth::user()->name }}!</h1>
        <p>Ini adalah dashboard pemilik lapangan.</p>

        @if ($pendingCount >= 1)
            <div class="alert alert-warning w-50">
                ⚠ Terdapat {{$pendingCount}} pesanan menunggu konfirmasi. <a href="{{url('/pemilik/pesan/data')}}" class="text-black">Lihat</a>
            </div>
        @elseif ($pendingCount == 0)
            <div class="alert alert-success w-50">
                <div>
                    ✅ Semua pesanan telah dikonfirmasi.
                </div>
            </div>
        @endif
    </div>
@endsection
