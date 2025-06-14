@extends('layouts.layout-pelanggan')

@section('content')
<div class="container py-4">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Data Pesanan Anda</h4>
        </div>
        <div class="card-body">
            @if ($orders->isEmpty())
                <div class="alert alert-info text-center">
                    Belum ada pesanan.
                </div>
            @else
                <div class="table-responsive">
                    <table class="table table-bordered table-hover align-middle text-center">
                        <thead class="table-light">
                            <tr>
                                <th>Order ID</th>
                                <th>Tanggal Pemesanan</th>
                                <th>Detail Pesanan</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $orderUniqueId => $group)
                                @php
                                    $first = $group->first();
                                @endphp
                                <tr>
                                    <td class="fw-bold">{{ $orderUniqueId }}</td>
                                    <td>{{ \Carbon\Carbon::parse($first->tanggal)->format('d M Y') }}</td>
                                    <td class="text-start">
                                        <ul class="list-unstyled mb-0">
                                            @foreach ($group as $order)
                                                <li>
                                                    <i class="bi bi-check-circle text-success"></i>
                                                    <strong>{{ $order->field->name }}</strong> - {{ $order->jam }}
                                                </li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td>
                                        @php
                                            $statusClass = [
                                                'pending' => 'warning',
                                                'confirmed' => 'success',
                                                'cancelled' => 'danger'
                                            ][$first->status] ?? 'secondary';
                                        @endphp
                                        <span class="badge bg-{{ $statusClass }}">
                                            {{ ucfirst($first->status) }}
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
