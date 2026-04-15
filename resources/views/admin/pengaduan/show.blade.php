@extends('layouts.app')

@section('content')
<div class="card shadow">
    <div class="card-header">
        <h4>Detail Aduan #{{ $pengaduan->id }}</h4>
    </div>

    <div class="card-body">

        <!-- INFORMASI ADUAN -->
        <p><strong>Pelapor:</strong> {{ $pengaduan->nama_pelapor }} ({{ $pengaduan->email }})</p>
        <p><strong>No HP:</strong> {{ $pengaduan->no_hp }}</p>
        <p><strong>Kategori:</strong> {{ optional($pengaduan->kategori)->nama_kategori ?? '-' }}</p>
        <p><strong>Judul:</strong> {{ $pengaduan->judul }}</p>
        <p><strong>Isi:</strong> {{ $pengaduan->isi_aduan }}</p>
        <p><strong>Lokasi:</strong> {{ $pengaduan->lokasi }}</p>

        @if($pengaduan->foto)
            <div class="mb-3">
                <strong>Foto:</strong><br>
                <img src="{{ asset('storage/' . $pengaduan->foto) }}" 
                     class="img-fluid rounded shadow-sm mt-2" 
                     style="max-width:300px;">
            </div>
        @endif

        <hr>

        <!-- FORM UPDATE -->
        <form id="update-form" action="{{ route('admin.pengaduan.update', $pengaduan->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Ubah Status</label>
                <select name="status" class="form-select">
                    @foreach(['menunggu','diproses','selesai','ditolak'] as $s)
                        <option value="{{ $s }}" {{ $pengaduan->status == $s ? 'selected' : '' }}>
                            {{ ucfirst($s) }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Tanggapan</label>
                <textarea name="tanggapan" class="form-control" rows="3">{{ $pengaduan->tanggapan }}</textarea>
            </div>

            <div class="d-flex justify-content-between mt-4">

                <!-- KIRI -->
                <div>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#confirmUpdateModal">
                        Simpan
                    </button>

                    <a href="{{ route('admin.pengaduan.index') }}" class="btn btn-secondary">
                        Kembali
                    </a>
                </div>

                <!-- KANAN -->
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal">
                    Hapus
                </button>

            </div>
        </form>

        <!-- FORM DELETE -->
        <form id="delete-form" 
              action="{{ route('admin.pengaduan.destroy', $pengaduan->id) }}" 
              method="POST">
            @csrf
            @method('DELETE')
        </form>

    </div>
</div>

<!-- ================= MODAL UPDATE ================= -->
<div class="modal fade" id="confirmUpdateModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Konfirmasi Perubahan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                Yakin ingin menyimpan perubahan pada aduan ini?
            </div>

            <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button class="btn btn-primary" onclick="document.getElementById('update-form').submit();">
                    Ya, Simpan
                </button>
            </div>
        </div>
    </div>
</div>

<!-- ================= MODAL DELETE ================= -->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-danger">
            <div class="modal-header">
                <h5 class="modal-title text-danger">Hapus Aduan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                ⚠️ Tindakan ini tidak bisa dibatalkan.<br>
                Yakin ingin menghapus aduan ini?
            </div>

            <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button class="btn btn-danger" onclick="document.getElementById('delete-form').submit();">
                    Ya, Hapus
                </button>
            </div>
        </div>
    </div>
</div>

@endsection
