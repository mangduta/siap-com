<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    protected $fillable = [
    'kode_tiket', 'nama_pelapor', 'email', 'no_hp', 'kategori_id',
    'judul', 'isi_aduan', 'lokasi', 'foto', 'status', 'tanggapan'
    ];
    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}
