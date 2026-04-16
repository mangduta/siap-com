@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10 col-xl-8">
              <a href="{{ route('landing') }}" class="btn"> <strong style="font"> <i class="bi bi-arrow-left"> Kembali </i></strong></a>
             <hr class="mb-4">
            <div class="card border-0 shadow-lg rounded-4">
                
                <!-- Header -->
                <div class="card-header text-white py-4 px-5 border-0">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-chat-dots-fill fs-1 me-3"></i>
                        <div>
                            <h3 class="mb-0 fw-bold">Form Pengaduan Masyarakat</h3>
                            <small class="opacity-90">Setiap suara Anda sangat berharga bagi kami</small>
                        </div>
                    </div>
                </div>

                <div class="card-body p-5">

                    @if($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Ada yang perlu diperbaiki:</strong>
                        <ul class="mb-0 mt-2">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                    @endif

                    <form action="{{ route('pengaduan.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row g-4">

                            <div class="col-md-12">
                                <label class="form-label fw-semibold">Nama Lengkap</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                                    <input type="text" name="nama_pelapor" class="form-control form-control-lg" 
                                           value="{{ old('nama_pelapor') }}" 
                                           placeholder="Masukkan nama lengkap Anda" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Email</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-envelope-fill"></i></span>
                                    <input type="email" name="email" class="form-control form-control-lg" 
                                           value="{{ old('email') }}" 
                                           placeholder="contoh@email.com" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">No. Handphone</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-telephone-fill"></i></span>
                                    <input type="tel" name="no_hp" class="form-control form-control-lg" 
                                           value="{{ old('no_hp') }}" 
                                           placeholder="081234567890" required>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label class="form-label fw-semibold">Kategori Aduan</label>
                                <select name="kategori_id" class="form-select form-select-lg" required>
                                    <option value="">-- Pilih Kategori --</option>
                                    @foreach($kategoris as $kat)
                                        <option value="{{ $kat->id }}" {{ old('kategori_id') == $kat->id ? 'selected' : '' }}>
                                            {{ $kat->nama_kategori }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-12">
                                <label class="form-label fw-semibold">Judul Aduan</label>
                                <input type="text" name="judul" class="form-control form-control-lg" 
                                       value="{{ old('judul') }}" 
                                       placeholder="Contoh: Jalan rusak di depan rumah" required>
                            </div>

                            <div class="col-md-12">
                                <label class="form-label fw-semibold">Isi Aduan</label>
                                <textarea name="isi_aduan" class="form-control form-control-lg" rows="6" 
                                          placeholder="Jelaskan secara lengkap dan jelas keluhan/aspirasi Anda..." required>{{ old('isi_aduan') }}</textarea>
                            </div>

                            <div class="col-md-12">
                                <label class="form-label fw-semibold">Lokasi Kejadian</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-geo-alt-fill"></i></span>
                                    <input type="text" name="lokasi" class="form-control form-control-lg" 
                                           value="{{ old('lokasi') }}" 
                                           placeholder="Jl. Sudirman No. 45, Denpasar" required>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label class="form-label fw-semibold">Foto Pendukung (Opsional)</label>
                                <input type="file" name="foto" class="form-control form-control-lg" accept="image/*">
                                <small class="text-muted">JPG / PNG • Maksimal 10 MB</small>
                            </div>

                        </div>

                        <div class="d-grid mt-5">
                            <button type="submit" class="btn-hero-send btn-lg py-3 fw-semibold">
                                <i class="bi bi-send-fill me-2"></i>
                                Kirim Aduan Sekarang
                            </button>
                        </div>
                    </form>
                </div>

                <div class="card-footer text-center py-4 text-muted small">
                    Aduan Anda akan diproses secara rahasia • Transparan • Akuntabel
                </div>
            </div>
        </div>
    </div>
</div>

<!-- CSS khusus untuk placeholder agar font lebih kecil -->
<style>
    .form-control::placeholder,
    .form-select option, .form-select{
        font-size: 0.95rem !important;
        color: #9ca3af;
    }
     
    .form-control, option {
        font-size: 1rem;
    }
    .card-header {
         background: linear-gradient(135deg, var(--siap-primary-dark), var(--navy));
    }
</style>
@endsection