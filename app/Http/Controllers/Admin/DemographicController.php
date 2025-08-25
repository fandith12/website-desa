<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Demographics;
use Illuminate\Http\Request;

class DemographicController extends Controller
{
    public function index()
    {
        $demographics = Demographics::orderBy('category')->paginate(15);
        return view('admin.demographics.index', compact('demographics'));
    }

    public function create()
    {
        return view('admin.demographics.create');
    }

    public function store(Request $request)
    {
        Demographics::create($request->validate([
            'category' => 'required|string|max:255',
            'label' => 'required|string|max:255',
            'value' => 'required|integer',
        ]));
        return redirect()->route('admin.demographics.index')->with('success', 'Data demografi berhasil ditambahkan.');
    }

    public function show(Demographics $demographic) { return redirect()->route('admin.demographics.index'); }

    public function edit(Demographics $demographic)
    {
        return view('admin.demographics.edit', compact('demographic'));
    }

    public function update(Request $request, Demographics $demographic)
    {
        $demographic->update($request->validate([
            'category' => 'required|string|max:255',
            'label' => 'required|string|max:255',
            'value' => 'required|integer',
        ]));
        return redirect()->route('admin.demographics.index')->with('success', 'Data demografi berhasil diperbarui.');
    }

    public function destroy(Demographics $demographic)
    {
        $demographic->delete();
        return redirect()->route('admin.demographics.index')->with('success', 'Data demografi berhasil dihapus.');
    }
}
