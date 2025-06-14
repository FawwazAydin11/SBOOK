@extends('layouts.layout-pelanggan')

@section('content')

<div class="container py-4">
    <h2 class="mb-4">Pesan {{ $field->name }}</h2>

    <div class="row">
        <div class="col-md-6">
            @if ($field->photo)
                <img src="{{ asset('storage/fields/' . $field->photo) }}" class="img-fluid rounded" alt="{{ $field->name }}">
            @else
                <img src="{{ asset('images/default-field.jpg') }}" class="img-fluid rounded" alt="Default Field">
            @endif
            <div class="mt-3">
                <h5>Ketersediaan Jam</h5>
                <div class="row">
                    @for ($i = 8; $i < 23; $i++)
                        <div class="col-6 col-md-3 mb-3">
                            <div class="card text-center">
                                <div class="card-body p-2">
                                    <small>60 menit</small>
                                    <div><strong>{{ sprintf('%02d:00', $i) }} - {{ sprintf('%02d:00', $i + 1) }}</strong></div>
                                    <div><span class="badge bg-secondary">Available</span></div>
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>


        </div>

        <div class="col-md-6">
            <h4>{{ $field->name }}</h4>
            <p>Harga: Rp {{ number_format($field->price, 0, ',', '.') }} / jam</p>
            <p>Status: 
                @if ($field->available)
                    <span class="badge bg-success">Tersedia</span>
                @else
                    <span class="badge bg-danger">Tidak Tersedia</span>
                @endif
            </p>

            <form action="{{ url('pelanggan/pesan/' . $field->id) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="tanggal" class="form-label">Pilih Tanggal</label>
                    <input type="date" id="tanggal" name="tanggal" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="jam" class="form-label">Pilih Jam</label>
                    <select id="jam" name="jam" class="form-select" required>
                        <option value="">-- Pilih Jam --</option>
                        @for ($i = 8; $i <= 23; $i++)
                            <option value="{{ $i }}">{{ sprintf('%02d:00', $i) }}</option>
                        @endfor
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Pesan Sekarang</button>
            </form>
        </div>
    </div>
</div>

@endsection
