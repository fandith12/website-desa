<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VillageOfficial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VillageOfficialController extends Controller
{
    public function index()
    {
        // KEMBALIKAN SEPERTI INI:
        // Menampilkan semua data, diurutkan berdasarkan 'order'
        $officials = VillageOfficial::orderBy('order')->paginate(10);
        return view('admin.officials.index', compact('officials'));
    }

    public function create()
    {
        return view('admin.officials.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'type' => 'required|in:kepala_desa,perangkat_desa',
            'order' => 'required|integer',
            'bio' => 'nullable|string',
            'photo' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('officials', 'public');
        }

        VillageOfficial::create($data);
        return redirect()->route('admin.officials.index')->with('success', 'Data perangkat desa berhasil ditambahkan.');
    }

    public function edit(VillageOfficial $official)
    {
        return view('admin.officials.edit', compact('official'));
    }

    public function update(Request $request, VillageOfficial $official)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'type' => 'required|in:kepala_desa,perangkat_desa',
            'order' => 'required|integer',
            'bio' => 'nullable|string',
            'photo' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            if ($official->photo) {
                Storage::disk('public')->delete($official->photo);
            }
            $data['photo'] = $request->file('photo')->store('officials', 'public');
        }

        $official->update($data);
        return redirect()->route('admin.officials.index')->with('success', 'Data perangkat desa berhasil diperbarui.');
    }

    public function destroy(VillageOfficial $official)
    {
        if ($official->photo) {
            Storage::disk('public')->delete($official->photo);
        }
        $official->delete();
        return redirect()->route('admin.officials.index')->with('success', 'Data perangkat desa berhasil dihapus.');
    }
}
