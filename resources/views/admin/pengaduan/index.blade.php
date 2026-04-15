@extends('layouts.app')
@section('content')
<h3>Daftar Pengaduan</h3>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<!-- TABEL RESPONSIF -->
<div class="table-responsive mt-3">
    <table class="table table-bordered table-striped table-sm bg-white">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Pelapor</th>
                <th>Judul</th>
                <th>Kategori</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pengaduans as $i => $p)
            <tr>
                <td>{{ $i + 1 }}</td>
                <td>{{ $p->created_at->format('d/m/Y') }}</td>
                <td>{{ $p->nama_pelapor }}</td>
                <td style="max-width: 280px; white-space: normal; word-break: break-word;">
                    {{ $p->judul }}
                </td>
                <td>{{ $p->kategori->nama_kategori ?? '-' }}</td>
                <td>
                    <span class="badge bg-{{ $p->status == 'selesai' ? 'success' : ($p->status == 'diproses' ? 'warning' : ($p->status == 'ditolak' ? 'danger' : 'secondary')) }}">
                        {{ ucfirst($p->status) }}
                    </span>
                </td>
                <td>
                    <a href="{{ route('admin.pengaduan.show', $p) }}" class="btn btn-info btn-sm">Detail</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="mt-4">
  

    <div class="text-center text-muted small">
         {{ $pengaduans->links('pagination::bootstrap-5') }}
    </div>
</div>


@endsection