@extends('layouts.app')

@section('content')
<div id="hero" class="text-center py-5 mb-5" style="min-height: 70vh; display: flex; align-items: center;">
    <div class="container">
        <div class="hero-inner mx-auto" style="max-width: 620px;">
            
            <!-- Success Icon -->
        
            <h1 class="text-white fw-bold mb-3" style="font-size: 2.8rem;">Aduan <span style="color:#22d3ee">Berhasil</span> Dikirim!</h1>
            
            <p class="lead text-white-50 mb-5">
                Terima kasih! Aduan Anda telah kami terima dan akan segera diproses.
            </p>

            <!-- Ticket Code Box -->
            <div class="bg-white bg-opacity-10 backdrop-blur rounded-3 p-4 mb-5 border border-white border-opacity-20">
                <p class="text-white-50 mb-2 small fw-medium">KODE TIKET ANDA</p>
                
                <div class="d-flex align-items-center justify-content-center gap-3 flex-wrap">
                    <h2 id="ticket-code" class="text-white fw-bold mb-0" style="letter-spacing: 4px; font-size: 2.1rem;">
                        {{ $pengaduan->kode_tiket }}
                    </h2>
                    
                    <button onclick="copyTicketCode()" 
                            class="btn btn-outline-light d-flex align-items-center gap-2">
                        <i class="bi bi-clipboard"></i>
                        <span>Salin</span>
                    </button>
                </div>
            </div>

            <p class="text-white-50 mb-4">
                Kode tiket telah dikirimkan ke email Anda. Sebagai tambahan, Anda bisa screenshot dan Simpan kode ini untuk memantau status aduan mendatang.
            </p>

            <!-- Action Buttons -->
            <div class="d-flex flex-column flex-sm-row gap-3 justify-content-center">
               
                <a href="{{ route('pengaduan.cek.form') }}" 
                   onclick="handleCekStatus(event)"
                   class="btn btn-hero-primary d-flex align-items-center justify-content-center gap-2 flex-grow-1 flex-sm-grow-0 px-5 py-3">
                    <i class="bi bi-search"></i>
                    <span>Cek Status Aduan</span>
                </a>
                
                <a href="/" 
                   class="btn btn-hero-outline d-flex align-items-center justify-content-center gap-2 flex-grow-1 flex-sm-grow-0 px-5 py-3">
                    <i class="bi bi-house-door"></i>
                    Kembali ke Beranda
                </a>
            </div>

        </div>
    </div>
</div>

<script>
    // Auto copy ketika klik "Cek Status Aduan"
    function handleCekStatus(e) {
        e.preventDefault();
        const code = document.getElementById('ticket-code').textContent.trim();
        
        navigator.clipboard.writeText(code).then(() => {
            // Redirect setelah berhasil copy
            window.location.href = "{{ route('pengaduan.cek.form') }}";
        }).catch(() => {
            // Kalau copy gagal (jarang terjadi), tetap redirect
            window.location.href = "{{ route('pengaduan.cek.form') }}";
        });
    }

    // Tombol Salin manual (bonus)
    function copyTicketCode() {
        const code = document.getElementById('ticket-code').textContent.trim();
        const btn = event.currentTarget;
        const originalHTML = btn.innerHTML;

        navigator.clipboard.writeText(code).then(() => {
            btn.innerHTML = `<i class="bi bi-check2"></i> Tersalin!`;
            setTimeout(() => {
                btn.innerHTML = originalHTML;
            }, 2000);
        });
    }
</script>
@endsection