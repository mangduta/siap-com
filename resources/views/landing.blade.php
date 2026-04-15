@extends('layouts.app')

<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

@section('content')

<!-- ===== HERO ===== -->
<div class="text-center text-white mb-5" id="hero">
    <div class="hero-inner">
        <h1 class="display-4 fw-bold">
            SIAP<span style="color:#22d3ee">.com</span>
        </h1>

        <p class="lead mt-3" style="opacity:0.9">
            <b>Sistem Informasi Aduan Publik</b> - Solusi Cepat untuk Laporan Masyarakat
        </p>

        <p class="mx-auto" style="max-width:600px; opacity:0.75;">
            Sampaikan keluhan, aspirasi, atau laporan Anda dengan mudah. 
            Kami memastikan setiap aduan ditangani secara profesional dan transparan.
        </p>

        <div class="mt-4 d-flex justify-content-center gap-3 flex-wrap">
            <a href="{{ route('pengaduan.create') }}" class="btn btn-hero-primary btn-lg px-4">
                <i class="bi bi-pencil-square me-2"></i>Buat Aduan
            </a>

            <a href="{{ route('pengaduan.cek.form') }}" class="btn btn-hero-outline btn-lg px-4">
                <i class="bi bi-search me-2"></i>Cek Status
            </a>
        </div>
    </div>
</div>

<!-- ===== TRUST SECTION ===== -->
<div class="row text-center g-4 mb-5">
    <div class="col-md-3">
        <div class="trust-card p-4 h-100">
            <i class="bi bi-shield-lock-fill fs-2 mb-3 text-primary"></i>
            <h6 class="fw-bold">Aman & Privat</h6>
            <p class="text-muted small mb-0">Data Anda dilindungi dan tidak disalahgunakan</p>
        </div>
    </div>

    <div class="col-md-3">
        <div class="trust-card p-4 h-100">
            <i class="bi bi-lightning-fill fs-2 mb-3 text-warning"></i>
            <h6 class="fw-bold">Respon Cepat</h6>
            <p class="text-muted small mb-0">Aduan diproses dengan cepat oleh tim terkait</p>
        </div>
    </div>

    <div class="col-md-3">
        <div class="trust-card p-4 h-100">
            <i class="bi bi-eye-fill fs-2 mb-3 text-info"></i>
            <h6 class="fw-bold">Transparan</h6>
            <p class="text-muted small mb-0">Pantau status aduan Anda secara real-time</p>
        </div>
    </div>

    <div class="col-md-3">
        <div class="trust-card p-4 h-100">
            <i class="bi bi-people-fill fs-2 mb-3 text-success"></i>
            <h6 class="fw-bold">Dipercaya</h6>
            <p class="text-muted small mb-0">Digunakan oleh banyak masyarakat</p>
        </div>
    </div>
</div>

<!-- ===== HOW IT WORKS ===== -->
<div class="text-center mb-4">
    <h4 class="fw-bold">Cara Menggunakan</h4>
    <p class="text-muted">Hanya 4 langkah sederhana</p>
</div>

<div class="row g-4 mb-5 text-center">
    <div class="col-md-3">
        <div class="step-card p-4">
            <div class="step-icon mb-3"><i class="bi bi-pencil-square"></i></div>
            <h6 class="fw-bold">1. Tulis Aduan</h6>
            <p class="text-muted small">Isi detail laporan Anda sesuai dengan kolom</p>
        </div>
    </div>

    <div class="col-md-3">
        <div class="step-card p-4">
            <div class="step-icon mb-3"><i class="bi bi-check2-circle"></i></div>
            <h6 class="fw-bold">2. Verifikasi</h6>
            <p class="text-muted small">Kami akan melakukan pengecekan dan validasi aduan</p>
        </div>
    </div>

    <div class="col-md-3">
        <div class="step-card p-4">
            <div class="step-icon mb-3"><i class="bi bi-gear"></i></div>
            <h6 class="fw-bold">3. Diproses</h6>
            <p class="text-muted small">Adian Ditindaklanjuti oleh instansi terkait</p>
        </div>
    </div>

    <div class="col-md-3">
        <div class="step-card p-4">
            <div class="step-icon mb-3"><i class="bi bi-check-all"></i></div>
            <h6 class="fw-bold">4. Selesai</h6>
            <p class="text-muted small">Anda menerima hasilnya</p>
        </div>
    </div>
</div>

<!-- ===== KATEGORI ===== -->
<div class="mb-4">
    <h4 class="fw-bold"><i class="bi bi-folder2-open me-2"></i>Kategori Aduan</h4>
    <p class="text-muted">Pilih kategori sesuai masalah Anda</p>
</div>

<div class="row g-3 mb-5">
    @foreach($kategoris as $kat)
    <div class="col-md-4">
        <div class="card kat-card h-100">
            <div class="card-body d-flex align-items-center gap-3">
                <i class="bi bi-folder-fill fs-3 text-primary"></i>
                <div>
                    <h6 class="fw-bold mb-0">{{ $kat->nama_kategori }}</h6>
                    <small class="text-muted">Kategori layanan</small>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

<!-- ===== CTA FINAL ===== -->
<div class="cta-section text-center text-white p-5 rounded">
    <h3 class="fw-bold">Sampaikan Aduan Anda Sekarang</h3>
    <p style="opacity:0.8">Kami siap membantu menyelesaikan masalah Anda</p>

    <a href="{{ route('pengaduan.create') }}" class="btn btn-light btn-lg mt-3 px-4">
        <i class="bi bi-pencil-square me-2"></i>Buat Aduan
    </a>
</div>

@endsection
