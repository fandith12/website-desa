<?php

namespace App\Http\Controllers;

use App\Models\Demographics;
use App\Models\Population;
use App\Models\Post;
use App\Models\Setting;
use App\Models\Umkm;
use App\Models\VillageOfficial;
use Illuminate\Http\Request;
use App\Models\Message;

class GuestController extends Controller
{
    public function home()
    {
        $latestPosts = Post::whereNotNull('published_at')->latest()->take(3)->get();
        $kepalaDesa = VillageOfficial::where('type', 'kepala_desa')->first();
        return view('guest.home', compact('latestPosts', 'kepalaDesa'));
    }

    public function showBerita($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        return view('guest.berita.show', compact('post'));
    }

    public function profilKepalaDesa()
    {
        $kepalaDesa = VillageOfficial::where('type', 'kepala_desa')->first();
        return view('guest.profil.kepala-desa', compact('kepalaDesa'));
    }

    public function profilPerangkatDesa()
    {
        $perangkatDesa = VillageOfficial::where('type', 'perangkat_desa')->orderBy('order')->get();
        return view('guest.profil.perangkat-desa', compact('perangkatDesa'));
    }

    public function strukturPemerintahan()
    {
        $setting = Setting::where('key', 'struktur_pemerintahan_image')->first();
        $strukturImage = $setting ? $setting->value : null;
        return view('guest.profil.struktur-pemerintahan', compact('strukturImage'));
    }

    public function sejarah()
    {
        $setting = Setting::where('key', 'sejarah_desa')->first();
        $sejarah = $setting ? $setting->value : null;
        return view('guest.profil.sejarah', compact('sejarah'));
    }

    public function visiMisi()
    {
        $settings = Setting::whereIn('key', ['visi_desa', 'misi_desa'])->pluck('value', 'key');
        $visi = $settings['visi_desa'] ?? null;
        $misi = $settings['misi_desa'] ?? null;
        return view('guest.profil.visi-misi', compact('visi', 'misi'));
    }

    public function statistikPenduduk()
    {
        $populations = Population::orderBy('year', 'desc')->get();
        return view('guest.data.statistik-penduduk', compact('populations'));
    }

    public function demografi()
    {
        // Mengelompokkan data demografi berdasarkan kategori
        $demographics = Demographics::all()->groupBy('category');

        // Mengambil data gambar piramida dari settings
        $pyramidSetting = Setting::where('key', 'piramida_penduduk_image')->first();
        $piramidaImage = $pyramidSetting ? $pyramidSetting->value : null;

        return view('guest.data.demografi', compact('demographics', 'piramidaImage'));
    }

    public function umkm()
    {
        $umkms = Umkm::latest()->paginate(9);
        return view('guest.umkm', compact('umkms'));
    }

    public function storeContactMessage(Request $request)
    {
        // 1. Validasi data yang masuk
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        // 2. Simpan data ke database
        Message::create($validatedData);

        // 3. Kembalikan pengguna ke halaman sebelumnya dengan pesan sukses
        return back()->with('success', 'Pesan Anda telah berhasil terkirim! Terima kasih.');
    }
}