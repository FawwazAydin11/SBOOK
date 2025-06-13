@extends('layouts.layout-pemilik')

@section('content')

<div class="container py-4">

    {{-- HEADER + TOMBOL TAMBAH --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold m-0" style="color: #e31e25;">📋 Daftar Lapangan</h2>
        <a href="{{ route('fields.create') }}" class="btn btn-warning text-dark fw-semibold shadow-sm">
            + Tambah Lapangan
        </a>
    </div>

    {{-- KONTEN DAFTAR LAPANGAN --}}
    <div class="row g-4">
        @forelse($fields as $field)
        <div class="col-12">
            <div class="card shadow-sm border-0 rounded-3 overflow-hidden d-flex flex-row">

                {{-- FOTO --}}
                <div class="col-md-4">
                    @if($field->photo)
                        <img src="{{ asset('storage/' . $field->photo) }}" class="img-fluid h-100 w-100 object-fit-cover" style="object-fit: cover;" alt="{{ $field->name }}">
                    @else
                        <div class="bg-secondary text-white d-flex justify-content-center align-items-center h-100" style="height: 200px;">
                            Tidak Ada Gambar
                        </div>
                    @endif
                </div>

                {{-- DETAIL --}}
                <div class="col-md-8 p-4 d-flex flex-column justify-content-between">
                    <div>
                        <h5 class="fw-bold text-dark">{{ $field->name }}</h5>
                        <p class="mb-2 text-muted small">
                            Tersedia mulai: <strong>{{ \Carbon\Carbon::parse($field->available_from)->translatedFormat('d F Y') }}</strong>
                        </p>

                        <div class="d-flex flex-wrap gap-3 mb-3 text-dark">
                            <div>
                                <i class="bi bi-clock-history me-1 text-warning"></i>
                                Operasional: {{ \Carbon\Carbon::parse($field->start_time)->format('H:i') }} - {{ \Carbon\Carbon::parse($field->end_time)->format('H:i') }}
                            </div>
                            <div>
                                <i class="bi bi-currency-dollar me-1 text-warning"></i>
                                Harga: Rp{{ number_format($field->price, 0, ',', '.') }}/jam
                            </div>
                        </div>
                    </div>

                    {{-- TOMBOL AKSI --}}
                    <div class="mt-3 d-flex gap-2">
                        <a href="{{ route('fields.schedules.index', $field->id) }}" class="btn text-white fw-semibold px-3" style="background-color: #e31e25;">
                            Lihat Jadwal
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center text-muted">Belum ada lapangan ditambahkan.</div>
        @endforelse
    </div>
</div>
@endsection
