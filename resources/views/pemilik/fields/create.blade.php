@extends('layouts.layout-pemilik')

@section('content')

<div class="container py-4">

    {{-- Judul --}}
    <h2 class="fw-bold mb-4" style="color: #e31e25;">➕ Tambah Lapangan</h2>

    {{-- Form Card --}}
    <div class="card border-0 rounded-4 shadow-sm" style="background-color: #fff8e1;">
        <div class="card-body p-4">

            <form action="{{ route('fields.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- Nama --}}
                <div class="mb-3">
                    <label for="name" class="form-label fw-semibold">Nama Lapangan</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Contoh: Lapangan A" required>
                </div>

                {{-- Foto --}}
                <div class="mb-3">
                    <label for="photo" class="form-label fw-semibold">Foto (opsional)</label>
                    <input type="file" class="form-control" name="photo" id="photo" accept="image/*">
                </div>

                {{-- Harga --}}
                <div class="mb-3">
                    <label for="price" class="form-label fw-semibold">Harga per Jam (Rp)</label>
                    <input type="number" class="form-control" name="price" id="price" placeholder="Misal: 75000" required>
                </div>

                {{-- Jam Operasional --}}
                <div class="mb-3 row">
                    <label class="form-label fw-semibold">Jam Operasional</label>
                    <div class="col">
                        <input type="time" class="form-control" name="start_time" required>
                    </div>
                    <div class="col-auto d-flex align-items-center">
                        s/d
                    </div>
                    <div class="col">
                        <input type="time" class="form-control" name="end_time" required>
                    </div>
                </div>

                {{-- Tanggal Tersedia --}}
                <div class="mb-4">
                    <label for="available_from" class="form-label fw-semibold">Tanggal Tersedia Mulai</label>
                    <input type="date" class="form-control" name="available_from" id="available_from" required>
                </div>

                {{-- Tombol --}}
                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('fields.index') }}" class="btn btn-outline-secondary">
                        <i class="bi bi-x-circle"></i> Batal
                    </a>
                    <button type="submit" class="btn text-white fw-semibold" style="background-color: #e31e25;">
                        <i class="bi bi-save"></i> Simpan
                    </button>
                </div>
            </form>

        </div>
    </div>

</div>
@endsection
