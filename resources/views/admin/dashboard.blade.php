@extends('layouts.app')

@section('content')
<div class="container-fluid py-4">
    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="mb-1 fw-bold">Dashboard <span style="color:#22d3ee;">Admin</span></h2>
            <p class="text-muted mb-0">Selamat datang kembali! Berikut ringkasan pengaduan hari ini.</p>
        </div>
        <a href="{{ route('admin.pengaduan.index') }}" class="btn btn-primary" style="background-color: var(--navy)">
            <i class="bi bi-list-check me-2"></i>Lihat Semua Aduan
        </a>
    </div>

    <!-- Stat Cards -->
    <div class="row g-4 mb-5">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white shadow-sm border-0 h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h2 class="mb-0 fw-bold">{{ $total }}</h2>
                            <p class="mb-0 opacity-75">Total Aduan</p>
                        </div>
                        <i class="bi bi-clipboard-data fs-1 opacity-75"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card bg-warning text-dark shadow-sm border-0 h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h2 class="mb-0 fw-bold">{{ $menunggu }}</h2>
                            <p class="mb-0 opacity-75">Menunggu</p>
                        </div>
                        <i class="bi bi-hourglass-split fs-1 opacity-75"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card bg-info text-white shadow-sm border-0 h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h2 class="mb-0 fw-bold">{{ $diproses }}</h2>
                            <p class="mb-0 opacity-75">Diproses</p>
                        </div>
                        <i class="bi bi-gear-wide-connected fs-1 opacity-75"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white shadow-sm border-0 h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h2 class="mb-0 fw-bold">{{ $selesai }}</h2>
                            <p class="mb-0 opacity-75">Selesai</p>
                        </div>
                        <i class="bi bi-check-circle-fill fs-1 opacity-75"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Aduan Terbaru -->
    <div class="card shadow-sm border-0">
        <div class="card-header bg-white py-3">
            <h5 class="mb-0 fw-semibold">
                <i class="bi bi-clock-history me-2"></i>
                Aduan Terbaru
            </h5>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Kode Tiket</th>
                            <th>Pelapor</th>
                            <th>Judul Aduan</th>
                            <th>Status</th>
                            <th class="text-end">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($terbaru as $p)
                        <tr>
                            <td><code class="fw-semibold">{{ $p->kode_tiket }}</code></td>
                            <td>{{ $p->nama_pelapor }}</td>
                            <td class="text-truncate" style="max-width: 280px;">{{ $p->judul }}</td>
                            <td>
                            <span class="badge px-3 py-2 
                                {{ $p->status == 'selesai' ? 'bg-success' : 
                                ($p->status == 'diproses' ? 'bg-warning text-dark' : 
                                ($p->status == 'ditolak' ? 'bg-danger' : 'bg-secondary')) }}">
                                {{ ucfirst($p->status) }}
                            </span>

                            </td>
                            <td class="text-end">
                                <a href="{{ route('admin.pengaduan.show', $p) }}" 
                                   class="btn btn-sm btn-outline-primary">
                                    <i class="bi bi-eye me-1"></i>Detail
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center py-4 text-muted">
                                Belum ada aduan terbaru
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection