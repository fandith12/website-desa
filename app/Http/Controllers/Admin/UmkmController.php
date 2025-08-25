<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Umkm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UmkmController extends Controller
{
    public function index()
    {
        $umkms = Umkm::latest()->paginate(10);
        return view('admin.umkms.index', compact('umkms'));
    }

    public function create()
    {
        return view('admin.umkms.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'owner_name' => 'required|string|max:255',
            'description' => 'required|string',
            'address' => 'nullable|string',
            'phone_number' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('umkms', 'public');
        }

        Umkm::create($data);
        return redirect()->route('admin.umkms.index')->with('success', 'Data UMKM berhasil ditambahkan.');
    }

    public function show(Umkm $umkm) { return redirect()->route('admin.umkms.index'); }

    public function edit(Umkm $umkm)
    {
        return view('admin.umkms.edit', compact('umkm'));
    }

    public function update(Request $request, Umkm $umkm)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'owner_name' => 'required|string|max:255',
            'description' => 'required|string',
            'address' => 'nullable|string',
            'phone_number' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($umkm->image) Storage::disk('public')->delete($umkm->image);
            $data['image'] = $request->file('image')->store('umkms', 'public');
        }

        $umkm->update($data);
        return redirect()->route('admin.umkms.index')->with('success', 'Data UMKM berhasil diperbarui.');
    }

    public function destroy(Umkm $umkm)
    {
        if ($umkm->image) Storage::disk('public')->delete($umkm->image);
        $umkm->delete();
        return redirect()->route('admin.umkms.index')->with('success', 'Data UMKM berhasil dihapus.');
    }
}
