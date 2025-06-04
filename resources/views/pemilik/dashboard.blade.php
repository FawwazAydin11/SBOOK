@extends('layouts.layout-pemilik')

@section('title', 'Dashboard Pemilik')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-xl font-semibold">Halo, {{ Auth::user()->name }}!</h1>
        <p>Ini adalah dashboard pemilik lapangan.</p>
    </div>
@endsection
