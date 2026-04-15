@extends('layouts.app')

@section('content')
<div class="container py-5">
 
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
     <a href="{{ route('landing') }}" class="btn"> <strong style="font"> <i class="bi bi-arrow-left"> Kembali </i></strong></a>
             <hr class="mb-4">
            <!-- Card Utama -->
            <div class="card shadow-lg border-0 rounded-4 overflow-hidden">
                <div class="card-header text-white py-4" 
                     style="background: linear-gradient(135deg, var(--siap-primary-dark), var(--navy));">
                    <div class="d-flex align-items-center">
                        <h4 class="mb-0 fw-bold">Cek Status Aduan</h4>
                    </div>
                </div>

                <div class="card-body p-5">

                    <!-- Form -->
                    <form action="{{ route('pengaduan.cek.status') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label class="form-label fw-medium">Masukkan Kode Tiket</label>
                            <div class="input-group input-group-lg">
                                <span class="input-group-text"><i class="bi bi-ticket-perforated"></i></span>
                                <input type="text" name="kode_tiket" 
                                       class="form-control" 
                                       placeholder="Contoh: SIAP-6789ABC" 
                                       required 
                                       style="text-transform: uppercase;">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-lg w-100 text-white"
                                style="background: linear-gradient(135deg, var(--siap-primary-dark), var(--navy));">
                            <i class="bi bi-search me-2"></i>Cek Status Aduan
                        </button>
                    </form>

                    <!-- HASIL CEK - VERSI BARU (lebih baik) -->
                    @if(isset($pengaduan) && $pengaduan)
                        <hr class="my-5">

                        <div class="text-center mb-4">
                            <h5 class="text-muted fw-medium">HASIL PENCARIAN</h5>
                        </div>

                        <!-- Box Kode Tiket -->
                        <div class="bg-light rounded-3 p-4 mb-4 text-center border border-primary border-opacity-25">
                            <small class="text-muted">KODE TIKET ANDA</small>
                            <div class="d-flex align-items-center justify-content-center gap-3 mt-2">
                                <h2 id="ticket-code" class="fw-bold text-primary mb-0" style="letter-spacing: 6px; font-size: 1.3rem;">
                                    {{ $pengaduan->kode_tiket }}
                                </h2>
                                <button onclick="copyTicketCode()" class="btn btn-outline-primary btn-sm rounded-pill px-3">
                                    <i class="bi bi-clipboard"></i> Salin
                                </button>
                            </div>
                        </div>

                        <!-- Informasi Aduan -->
                        <div class="row g-4">
                            <div class="col-12">
                                <div class="card border-0 shadow-sm">
                                    <div class="card-body">
                                        <h5 class="mb-3">{{ $pengaduan->judul }}</h5>
                                        
                                        <div class="d-flex align-items-center mb-4">
                                            <span class="me-3">Status:</span>
                                            <span class="badge fs-6 px-4 py-2 rounded-pill bg-{{ 
                                                $pengaduan->status == 'selesai' ? 'success' : 
                                                ($pengaduan->status == 'diproses' ? 'info' : 
                                                ($pengaduan->status == 'ditolak' ? 'danger' : 'secondary')) }}">
                                                <i class="bi bi-{{ 
                                                    $pengaduan->status == 'selesai' ? 'check-circle' : 
                                                    ($pengaduan->status == 'diproses' ? 'clock' : 
                                                    ($pengaduan->status == 'ditolak' ? 'x-circle' : 'info-circle')) }}"></i>
                                                {{ ucfirst($pengaduan->status) }}
                                            </span>
                                        </div>

                                        <div class="row text-muted small">
                                            <div class="col-sm-6 mb-3">
                                                <strong>Tanggal Pengaduan</strong><br>
                                                {{ $pengaduan->created_at->format('d F Y, H:i') }}
                                            </div>
                                            @if($pengaduan->updated_at)
                                            <div class="col-sm-6 mb-3">
                                                <strong>Terakhir Diperbarui</strong><br>
                                                {{ $pengaduan->updated_at->format('d F Y, H:i') }}
                                            </div>
                                            @endif
                                        </div>

                                        @if($pengaduan->tanggapan)
                                        <div class="mt-4 pt-4 border-top">
                                            <strong class="d-block mb-2">Tanggapan Petugas:</strong>
                                            <div class="bg-white p-4 rounded-3 border">
                                                <i class="bi bi-chat-quote-fill text-info me-2"></i>
                                                {{ $pengaduan->tanggapan }}
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="text-center mt-5">
                            <a href="{{ route('pengaduan.create') }}" class="btn btn-outline-primary me-3">
                                <i class="bi bi-plus-circle"></i> Buat Aduan Baru
                            </a>
                            <a href="/" class="btn btn-primary">Kembali ke Beranda</a>
                        </div>

                    @elseif(isset($pengaduan) && !$pengaduan)
                        <!-- Pesan Tidak Ditemukan -->
                        <hr class="my-5">
                        <div class="alert alert-warning border-0 shadow-sm text-center py-5">
                            <i class="bi bi-emoji-frown fs-1 text-warning mb-3 d-block"></i>
                            <h5 class="fw-bold">Kode tiket tidak ditemukan</h5>
                            <p class="mb-0">Pastikan kode tiket yang Anda masukkan benar dan lengkap.</p>
                            <button onclick="window.location.reload()" class="btn btn-warning mt-4">
                                Coba Lagi
                            </button>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function copyTicketCode() {
        const code = document.getElementById('ticket-code').textContent.trim();
        const btn = event.currentTarget;
        const original = btn.innerHTML;

        navigator.clipboard.writeText(code).then(() => {
            btn.innerHTML = `<i class="bi bi-check2"></i> Tersalin!`;
            setTimeout(() => { btn.innerHTML = original; }, 2000);
        });
    }
</script>
@endsection