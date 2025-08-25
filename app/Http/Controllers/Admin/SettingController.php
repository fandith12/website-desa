<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::pluck('value', 'key')->all();
        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $data = $request->except('_token');

        foreach ($data as $key => $value) {
            // Logika untuk menangani upload file
            if ($request->hasFile($key)) {
                // Hapus gambar lama jika ada
                $oldImage = Setting::where('key', $key)->first();
                if ($oldImage && $oldImage->value) {
                    Storage::disk('public')->delete($oldImage->value);
                }
                // Simpan gambar baru dan dapatkan path-nya
                $value = $request->file($key)->store('settings', 'public');
            }
            
            // Buat atau update data di database
            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }

        return redirect()->route('admin.settings.index')->with('success', 'Pengaturan berhasil diperbarui.');
    }
}
