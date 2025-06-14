@extends('layouts.layout-pelanggan')

@section('title', 'Dashboard Pelanggan')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-xl font-semibold">Halo, {{ Auth::user()->name }}!</h1>
        <p>Ini adalah dashboard pelanggan.</p>
    </div>
    @if ($orders >= 1)
            <div class="alert alert-info w-50">
                ✅ Terdapat {{$orders}} pesanan telah konfirmasi. <a href="{{url('/pelanggan/pesan/data')}}" class="text-black">Lihat</a>
            </div>
        @elseif ($orders == 0)
            <div class="alert alert-dark w-50">
                <div>
                     ❗️Belum ada pesanan yang dikonfirmasi
                </div>
            </div>
        @endif
@endsection

