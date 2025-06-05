@extends('layouts.layout-pelanggan')

@section('title', 'Dashboard Pelanggan')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-xl font-semibold">Halo, {{ Auth::user()->name }}!</h1>
        <p>Ini adalah dashboard pelanggan.</p>
    </div>
@endsection

