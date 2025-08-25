<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Population;
use Illuminate\Http\Request;

class PopulationController extends Controller
{
    public function index()
    {
        $populations = Population::orderBy('year', 'desc')->paginate(10);
        return view('admin.populations.index', compact('populations'));
    }

    public function create()
    {
        return view('admin.populations.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'year' => 'required|integer|unique:populations,year',
            'male_count' => 'required|integer',
            'female_count' => 'required|integer',
        ]);
        $data['total_population'] = $data['male_count'] + $data['female_count'];

        Population::create($data);
        return redirect()->route('admin.populations.index')->with('success', 'Data populasi berhasil ditambahkan.');
    }

    public function show(Population $population) { return redirect()->route('admin.populations.index'); }

    public function edit(Population $population)
    {
        return view('admin.populations.edit', compact('population'));
    }

    public function update(Request $request, Population $population)
    {
        $data = $request->validate([
            'year' => 'required|integer|unique:populations,year,' . $population->id,
            'male_count' => 'required|integer',
            'female_count' => 'required|integer',
        ]);
        $data['total_population'] = $data['male_count'] + $data['female_count'];

        $population->update($data);
        return redirect()->route('admin.populations.index')->with('success', 'Data populasi berhasil diperbarui.');
    }

    public function destroy(Population $population)
    {
        $population->delete();
        return redirect()->route('admin.populations.index')->with('success', 'Data populasi berhasil dihapus.');
    }
}