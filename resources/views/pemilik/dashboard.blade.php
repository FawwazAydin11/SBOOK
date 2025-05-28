@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Halo, {{ Auth::user()->name }}!</h1>
        <p>Ini adalah dashboard pemilik lapangan.</p>
    </div>
@endsection
