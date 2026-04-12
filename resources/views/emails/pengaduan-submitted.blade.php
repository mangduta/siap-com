@component('mail::message')
# Aduan Berhasil Dikirim! 🎉

Terima kasih telah menggunakan **SIAP.com**  

**Kode Tiket Anda:**
<div style="background:#1e3a8a; color:white; padding:15px; border-radius:8px; font-size:24px; text-align:center; font-weight:bold; letter-spacing:4px;">
    {{ $pengaduan->kode_tiket }}
</div>

Gunakan kode di atas untuk cek status aduan Anda di halaman **Cek Status**.

Kami akan segera memproses aduan Anda dengan cepat, transparan, dan akuntabel.

Terima kasih atas partisipasi Anda dalam membangun kota yang lebih baik! 💙

@component('mail::button', ['url' => route('pengaduan.cek.form')])
Cek Status Aduan
@endcomponent

Salam hormat,  
**Tim SIAP.com**
@endcomponent