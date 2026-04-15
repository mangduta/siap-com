@extends('layouts.app')

@section('content')
<div class="container-fluid py-4">

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="mb-1 fw-bold">
                <i class="bi bi-list-ul me-2"></i>Daftar <span style="color:#22d3ee">Pengaduan</span>
            </h2>
            <p class="text-muted mb-0">Kelola semua aduan yang masuk ke sistem</p>
        </div>

        <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left me-2"></i>Kembali ke Dashboard
        </a>
    </div>

    <!-- Alert Success -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
            <i class="bi bi-check-circle me-2"></i>
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <!-- Card Table -->
    <div class="card shadow-sm border-0">
        <div class="card-header bg-white py-3">
            <h5 class="mb-0 fw-semibold text-dark">
                Semua Pengaduan
                <span class="badge bg-primary ms-2">{{ $pengaduans->total() }} data</span>
            </h5>
        </div>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th style="width: 50px;">No</th>
                            <th style="width: 110px;">Tanggal</th>
                            <th>Pelapor</th>
                            <th style="width: 320px;">Judul Aduan</th>
                            <th>Kategori</th>
                            <th style="width: 130px;">Status</th>
                            <th style="width: 100px;" class="text-end">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pengaduans as $i => $p)
                        <tr>
                            <td class="fw-semibold">{{ $i + 1 }}</td>
                            <td>
                                <small class="text-muted">{{ $p->created_at->format('d/m/Y') }}</small><br>
                                <small class="text-muted">{{ $p->created_at->format('H:i') }}</small>
                            </td>
                            <td>{{ $p->nama_pelapor }}</td>
                            <td class="text-truncate" style="max-width: 320px;">
                                {{ $p->judul }}
                            </td>
                            <td>
                                <span class="badge bg-secondary">
                                    {{ $p->kategori->nama_kategori ?? 'Tidak ada' }}
                                </span>
                            </td>
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
                                    <i class="bi bi-eye"></i>
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center py-5 text-muted">
                                <i class="bi bi-inbox fs-1 mb-3 d-block"></i>
                                Belum ada pengaduan
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

       <!-- Pagination -->
<div class="card-footer bg-white py-3">
    <div class="d-flex justify-content-between align-items-center">

        <!-- KIRI: Info jumlah data -->
        <div class="text-muted small">
            Menampilkan 
            <strong>{{ $pengaduans->firstItem() }}</strong> 
            sampai 
            <strong>{{ $pengaduans->lastItem() }}</strong> 
            dari total 
            <strong>{{ $pengaduans->total() }}</strong> pengaduan
        </div>

        <!-- KANAN: Tombol halaman -->
        <nav aria-label="Page navigation">
            <ul class="pagination mb-0">
                <!-- Previous -->
                @if ($pengaduans->onFirstPage())
                    <li class="page-item disabled">
                        <span class="page-link">‹</span>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $pengaduans->previousPageUrl() }}">‹</a>
                    </li>
                @endif

                <!-- Nomor halaman -->
                @foreach ($pengaduans->getUrlRange(1, $pengaduans->lastPage()) as $page => $url)
                    <li class="page-item {{ $page == $pengaduans->currentPage() ? 'active' : '' }}">
                        <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                    </li>
                @endforeach


                <!-- Next -->
                @if ($pengaduans->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" href="{{ $pengaduans->nextPageUrl() }}">›</a>
                    </li>
                @else
                    <li class="page-item disabled">
                        <span class="page-link">›</span>
                    </li>
                @endif
            </ul>
        </nav>

    </div>
</div>
    </div>

</div>
@endsection