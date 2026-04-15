@extends('layouts.app')
@section('content')
<div class="card shadow">
    <div class="card-header"><h4>Detail Aduan #{{ $pengaduan->id }}</h4></div>
    <div class="card-body">
        <p><strong>Pelapor:</strong> {{ $pengaduan->nama_pelapor }} ({{ $pengaduan->email }})</p>
        <p><strong>No HP:</strong> {{ $pengaduan->no_hp }}</p>
        <p><strong>Kategori:</strong> {{ $pengaduan->kategori->nama_kategori ?? '-' }}</p>
        <p><strong>Judul:</strong> {{ $pengaduan->judul }}</p>
        <p><strong>Isi:</strong> {{ $pengaduan->isi_aduan }}</p>
        <p><strong>Lokasi:</strong> {{ $pengaduan->lokasi }}</p>
        @if($pengaduan->foto)
            <p><strong>Foto:</strong><br><img src="{{ asset('storage/' . $pengaduan->foto) }}" width="300"></p>
        @endif

        <hr>
        <form action="{{ route('admin.pengaduan.update', $pengaduan) }}" method="POST">
            @csrf @method('PUT')
            <div class="mb-3">
                <label class="form-label">Ubah Status</label>
                <select name="status" class="form-select">
                    @foreach(['menunggu','diproses','selesai','ditolak'] as $s)
                        <option value="{{ $s }}" {{ $pengaduan->status == $s ? 'selected' : '' }}>{{ ucfirst($s) }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Tanggapan</label>
                <textarea name="tanggapan" class="form-control" rows="3">{{ $pengaduan->tanggapan }}</textarea>
            </div>
            <div class="d-flex justify-content-between mt-3">
    
    <!-- Kiri -->
    <div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('admin.pengaduan.index') }}" class="btn btn-secondary">Kembali</a>
    </div>

    <!-- Kanan -->
    <form action="{{ route('admin.pengaduan.destroy', $pengaduan->id) }}" method="POST"
          onsubmit="return confirm('Yakin ingin menghapus aduan ini?')">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus aduan ini?')">Hapus</button>
    </form>

            </div>
        </form>
    </div>
</div>
@endsection