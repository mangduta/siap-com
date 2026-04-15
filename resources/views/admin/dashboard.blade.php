@extends('layouts.app')
@section('content')
<h3 class="mb-4">Dashboard Admin</h3>

<div class="row mb-4">
    <div class="col-md-3">
        <div class="card bg-primary text-white shadow">
            <div class="card-body text-center">
                <h2>{{ $total }}</h2>
                <p>Total Aduan</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card bg-secondary text-white shadow">
            <div class="card-body text-center">
                <h2>{{ $menunggu }}</h2>
                <p>Menunggu</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card bg-warning text-dark shadow">
            <div class="card-body text-center">
                <h2>{{ $diproses }}</h2>
                <p>Diproses</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card bg-success text-white shadow">
            <div class="card-body text-center">
                <h2>{{ $selesai }}</h2>
                <p>Selesai</p>
            </div>
        </div>
    </div>
</div>

<h5>Aduan Terbaru</h5>
<table class="table table-bordered bg-white">
    <thead class="table-dark">
        <tr><th>Kode</th><th>Pelapor</th><th>Judul</th><th>Status</th><th>Aksi</th></tr>
    </thead>
    <tbody>
        @foreach($terbaru as $p)
        <tr>
            <td><code>{{ $p->kode_tiket }}</code></td>
            <td>{{ $p->nama_pelapor }}</td>
            <td>{{ $p->judul }}</td>
            <td>
                   <span class="badge bg-{{ $p->status == 'selesai' ? 'success' : ($p->status == 'diproses' ? 'warning' : ($p->status == 'ditolak' ? 'danger' : 'secondary')) }}">
                        {{ ucfirst($p->status) }}
                    </span>
            </td>
            <td><a href="{{ route('admin.pengaduan.show', $p) }}" class="btn btn-sm btn-info">Detail</a></td>
        </tr>
        @endforeach
    </tbody>
</table>

<a href="{{ route('admin.pengaduan.index') }}" class="btn btn-primary">Lihat Semua Aduan <i class="bi bi-arrow-right"></i> </a>
@endsection