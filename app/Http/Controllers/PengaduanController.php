<?php
namespace App\Http\Controllers;

use App\Models\Pengaduan;
use App\Models\Kategori;
use App\Mail\PengaduanSubmitted;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class PengaduanController extends Controller
{
    // Landing page publik
    public function landing()
    {
        $totalAduan = Pengaduan::count();
        $totalSelesai = Pengaduan::where('status', 'selesai')->count();
        $kategoris = Kategori::withCount('pengaduans')->get();
        return view('landing', compact('totalAduan', 'totalSelesai', 'kategoris'));
    }

    // Form buat aduan (publik)
    public function create()
    {
        $kategoris = Kategori::all();
        return view('pengaduan.create', compact('kategoris'));
    }

    // Simpan aduan
       // Simpan aduan
    public function store(Request $request)
    {
        ini_set('memory_limit', '1024M');

        $validated = $request->validate([
            'nama_pelapor' => 'required|string|max:255',
            'email'        => 'required|email',
            'no_hp'        => 'required|string',
            'kategori_id'  => 'required|exists:kategoris,id',
            'judul'        => 'required|string|max:255',
            'isi_aduan'    => 'required|string',
            'lokasi'       => 'required|string',
            'foto'         => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('aduan', 'public');
        }

        $validated['kode_tiket'] = 'SIAP-' . strtoupper(uniqid());

        $pengaduan = Pengaduan::create($validated);

        // PERBAIKAN: pakai send() bukan queue()
        Mail::to($pengaduan->email)->send(new PengaduanSubmitted($pengaduan));

        return redirect()->route('pengaduan.sukses', $pengaduan);
    }
    

    // Halaman sukses setelah kirim aduan
    public function sukses(Pengaduan $pengaduan)
    {
        return view('pengaduan.sukses', compact('pengaduan'));
    }

    // Form cek status aduan (publik)
    public function cekForm()
    {
        return view('pengaduan.cek');
    }

    // Proses cek status
    public function cekStatus(Request $request)
    {
        $request->validate(['kode_tiket' => 'required|string']);
        $pengaduan = Pengaduan::where('kode_tiket', $request->kode_tiket)->first();
        return view('pengaduan.cek', compact('pengaduan'));
    }

    // Dashboard admin
    public function dashboard()
    {
        $total = Pengaduan::count();
        $menunggu = Pengaduan::where('status', 'menunggu')->count();
        $diproses = Pengaduan::where('status', 'diproses')->count();
        $selesai = Pengaduan::where('status', 'selesai')->count();
        $ditolak = Pengaduan::where('status', 'ditolak')->count();
        $terbaru = Pengaduan::with('kategori')->latest()->take(5)->get();
        return view('admin.dashboard', compact('total', 'menunggu', 'diproses', 'selesai', 'ditolak', 'terbaru'));
    }

    // Daftar aduan (admin)
   public function index()
{
    $pengaduans = Pengaduan::with('kategori')     // eager loading biar cepat
                    ->latest('created_at')         // urut dari yang terbaru
                    ->paginate(15);                // 15 data per halaman (bisa diubah)

    return view('admin.pengaduan.index', compact('pengaduans'));
}

    // Detail aduan (admin)
    public function show(Pengaduan $pengaduan)
    {
        return view('admin.pengaduan.show', compact('pengaduan'));
    }

    // Update status & tanggapan (admin)
    public function update(Request $request, Pengaduan $pengaduan)
    {
        $pengaduan->update([
            'status'    => $request->status,
            'tanggapan' => $request->tanggapan,
        ]);
        return redirect()->route('admin.pengaduan.index')->with('success', 'Status aduan diperbarui!');
    }

    // Hapus aduan (admin)
    public function destroy(Pengaduan $pengaduan)
    {
        $pengaduan->delete();
        return redirect()->route('admin.pengaduan.index')->with('success', 'Aduan dihapus!');
    }
}