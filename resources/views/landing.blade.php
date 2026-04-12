@extends('layouts.app')

<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">


@section('content')

<!-- ======== HERO ======== -->
<div class="text-center text-white mb-5" id="hero">
    <div class="hero-inner">
        <h1 class="display-4">SIAP<span style="color:#22d3ee">.com</span></h1>
        <p class="lead mb-1 text-sm">Sistem Informasi Aduan Publik</p>
        <p class="mx-auto mb-0" style="max-width:620px;opacity:0.85;">
            Sampaikan keluhan dan aspirasi Anda dengan mudah. Setiap aduan ditindaklanjuti secara cepat, transparan, dan akuntabel.
        </p>
        <div class="mt-4 d-flex justify-content-center gap-3 flex-wrap">
            <a href="{{ route('pengaduan.create') }}" class="btn btn-hero-primary btn-lg">
                <i class="bi bi-pencil-square me-2"></i>Buat Aduan
            </a>
            <a href="{{ route('pengaduan.cek.form') }}" class="btn btn-hero-outline btn-lg">
                <i class="bi bi-search me-2"></i>Cek Status Aduan
            </a>
        </div>
    </div>
</div>

<!-- ======== STATISTIK ======== -->
<div class="row g-4 mb-5">
    <div class="col-md-4">
        <div class="card stat-card shadow-sm h-100">
            <div class="card-body d-flex align-items-center gap-3 p-4">
                <div class="stat-icon" style="background:#eff6ff;color:var(--siap-primary)">
                    <i class="bi bi-envelope-paper-fill"></i>
                </div>
                <div>
                    <div class="stat-number text-primary">{{ $totalAduan }}</div>
                    <div class="text-muted small fw-medium">Total Aduan Masuk</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card stat-card shadow-sm h-100">
            <div class="card-body d-flex align-items-center gap-3 p-4">
                <div class="stat-icon" style="background:#ecfdf5;color:var(--siap-success)">
                    <i class="bi bi-check-circle-fill"></i>
                </div>
                <div>
                    <div class="stat-number text-success">{{ $totalSelesai }}</div>
                    <div class="text-muted small fw-medium">Aduan Selesai</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card stat-card shadow-sm h-100">
            <div class="card-body d-flex align-items-center gap-3 p-4">
                <div class="stat-icon" style="background:#f0f9ff;color:var(--siap-accent)">
                    <i class="bi bi-grid-fill"></i>
                </div>
                <div>
                    <div class="stat-number" style="color:var(--siap-accent)">{{ $kategoris->count() }}</div>
                    <div class="text-muted small fw-medium">Kategori Layanan</div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ======== CARA KERJA ======== -->
<div class="text-center mb-3">
    <div class="section-line mx-auto mb-2"></div>
    <h4 class="section-title">Cara Kerja </h4>
    <p class="text-muted">Proses pengaduan yang mudah dan transparan</p>
</div>
<div class="row g-3 mb-5">
    <div class="col-md-3"><div class="step-card"><div class="step-num">1</div><h6 class="fw-bold">Tulis Aduan</h6><p class="text-muted small mb-0">Isi formulir pengaduan dengan lengkap dan jelas.</p></div></div>
    <div class="col-md-3"><div class="step-card"><div class="step-num">2</div><h6 class="fw-bold">Verifikasi</h6><p class="text-muted small mb-0">Tim kami memverifikasi dan meneruskan aduan Anda.</p></div></div>
    <div class="col-md-3"><div class="step-card"><div class="step-num">3</div><h6 class="fw-bold">Proses</h6><p class="text-muted small mb-0">Instansi terkait menindaklanjuti aduan Anda.</p></div></div>
    <div class="col-md-3"><div class="step-card"><div class="step-num">4</div><h6 class="fw-bold">Selesai</h6><p class="text-muted small mb-0">Anda menerima tanggapan dan penyelesaian.</p></div></div>
</div>

<!-- ======== KATEGORI ======== -->
<div class="mb-3">
    <div class="section-line mb-2"></div>
    <h4 class="section-title"><i class="bi bi-folder2-open me-2"></i>Kategori Aduan</h4>
    <p class="text-muted">Pilih kategori yang sesuai dengan permasalahan Anda</p>
</div>
<div class="row g-3 mb-5">
    @foreach($kategoris as $kat)
    <div class="col-md-4">
        <div class="card kat-card h-100">
            <div class="card-body d-flex align-items-center gap-3 p-4">
                <div class="kat-icon"><i class="bi bi-folder-fill"></i></div>
                <div>
                    <h6 class="fw-bold mb-1">{{ $kat->nama_kategori }}</h6>
                    <span class="badge bg-primary bg-opacity-10 text-primary">{{ $kat->pengaduans_count }} aduan</span>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

<!-- ======== TRUST BANNER ======== -->
<div class="trust-banner p-4 mb-5">
    <div class="row text-center g-4">
        <div class="col-6 col-md-3">
            <i class="bi bi-shield-lock-fill d-block mb-2"></i>
            <div class="fw-semibold small">Data Terenkripsi</div>
            <div class="text-muted" style="font-size:0.78rem">Informasi Anda aman</div>
        </div>
        <div class="col-6 col-md-3">
            <i class="bi bi-clock-history d-block mb-2"></i>
            <div class="fw-semibold small">Respon &lt; 24 Jam</div>
            <div class="text-muted" style="font-size:0.78rem">Tanggapan cepat</div>
        </div>
        <div class="col-6 col-md-3">
            <i class="bi bi-eye-fill d-block mb-2"></i>
            <div class="fw-semibold small">Transparan</div>
            <div class="text-muted" style="font-size:0.78rem">Pantau progres aduan</div>
        </div>
        <div class="col-6 col-md-3">
            <i class="bi bi-people-fill d-block mb-2"></i>
            <div class="fw-semibold small">Dipercaya Publik</div>
            <div class="text-muted" style="font-size:0.78rem">Ribuan pengguna aktif</div>
        </div>
    </div>
</div>

<!-- ======== CTA ======== -->
<div class="cta-section text-center text-white p-5 mb-4">
    <h3 class="fw-bold mb-2">Punya Keluhan? Sampaikan Sekarang!</h3>
    <p class="mb-4" style="opacity:0.8">Suara Anda penting. Kami siap mendengarkan dan menindaklanjuti setiap aduan.</p>
    <a href="{{ route('pengaduan.create') }}" class="btn btn-light btn-lg">
        <i class="bi bi-pencil-square me-2"></i>Buat Aduan Sekarang
    </a>
</div>

@endsection