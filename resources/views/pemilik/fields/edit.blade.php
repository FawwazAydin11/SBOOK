@extends('layouts.layout-pemilik')

@section('content')

<div class="container py-4">

    {{-- Judul --}}
    <h2 class="fw-bold mb-4" style="color: #e31e25;">✏️ Edit Lapangan</h2>

    {{-- Form Card --}}
    <div class="card border-0 rounded-4 shadow-sm" style="background-color: #fff8e1;">
        <div class="card-body p-4">

            <form action="{{ route('fields.update', $field->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- Nama --}}
                <div class="mb-3">
                    <label for="name" class="form-label fw-semibold">Nama Lapangan</label>
                    <input type="text" class="form-control" name="name" id="name"
                           value="{{ old('name', $field->name) }}" required>
                </div>

                {{-- Foto --}}
                <div class="mb-3">
                    <label for="photo" class="form-label fw-semibold">Foto Baru (opsional)</label>
                    <input type="file" class="form-control" name="photo" id="photo" accept="image/*">
                    @if ($field->photo)
                        <div class="mt-2">
                            <small class="fw-semibold">Foto Saat Ini:</small><br>
                            <img src="{{ asset('storage/' . $field->photo) }}" alt="Foto Lapangan" class="img-thumbnail mt-1" style="max-height: 150px;">
                        </div>
                    @endif
                </div>

                {{-- Harga --}}
                <div class="mb-3">
                    <label for="price" class="form-label fw-semibold">Harga per Jam (Rp)</label>
                    <input type="number" class="form-control" name="price" id="price"
                           value="{{ old('price', $field->price) }}" required>
                </div>

                {{-- Status Ketersediaan --}}
                <div class="mb-4">
                    <label for="available" class="form-label fw-semibold">Status Ketersediaan</label>
                    <select class="form-select border-0 shadow-sm fw-semibold" name="available" id="available" required style="background-color: #fff8e1;">
                        <option value="1" class="bg-warning text-dark" {{ $field->available ? 'selected' : '' }}>✅ Available</option>
                        <option value="0" class="bg-danger text-white" {{ !$field->available ? 'selected' : '' }}>❌ Tidak Tersedia</option>
                    </select>
                </div>

                {{-- Tombol --}}
                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('fields.index') }}" class="btn btn-outline-secondary">
                        <i class="bi bi-x-circle"></i> Batal
                    </a>
                    <button type="submit" class="btn text-white fw-semibold" style="background-color: #e31e25;">
                        <i class="bi bi-save"></i> Update
                    </button>
                </div>

            </form>

        </div>
    </div>

</div>
@endsection
