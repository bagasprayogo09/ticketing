<?php

namespace App\Http\Controllers;

use App\Models\Kategorimasalah;
use App\Models\Divisions;
use Illuminate\Http\Request;

class KategorimasalahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve all Kategorimasalah records
        $kategorimasalah = Kategorimasalah::all();
        return view('kategorimasalah.index', compact('kategorimasalah'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Retrieve all divisions for the form
        $divisions = Divisions::all();
        return view('kategorimasalah.create', compact('divisions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'nama' => 'required|string|max:255',
            'divisions_id' => 'required|exists:divisions,id',
            'status' => 'required|string|max:255'
        ]);

        // Create a new Kategorimasalah record
        Kategorimasalah::create($request->all());

        return redirect()->route('kategorimasalah.index')->with('success', 'Kategorimasalah created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kategorimasalah $kategorimasalah)
    {
        return view('kategorimasalah.show', compact('kategorimasalah'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kategorimasalah $kategorimasalah)
    {
        $divisions = Divisions::all();
        return view('kategorimasalah.edit', compact('kategorimasalah', 'divisions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kategorimasalah $kategorimasalah)
    {
        // Validate the request data
        $request->validate([
            'nama' => 'required|string|max:255',
            'divisions_id' => 'required|exists:divisions,id',
            'status' => 'required|string|max:255'
        ]);

        // Update the Kategorimasalah record
        $kategorimasalah->update($request->all());

        return redirect()->route('kategorimasalah.index')->with('success', 'Kategorimasalah updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kategorimasalah $kategorimasalah)
    {
        // Delete the Kategorimasalah record
        $kategorimasalah->delete();

        return redirect()->route('kategorimasalah.index')->with('success', 'Kategorimasalah deleted successfully.');
    }
}
