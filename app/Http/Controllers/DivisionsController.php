<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Divisions;

use function Laravel\Prompts\alert;

class DivisionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $divisions = Divisions::all();
        return view('divisions.index', compact('divisions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $divisions = Divisions::all();
        return view('divisions.create', compact('divisions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|string|in:active,inactive', // Validasi status
        ]);

        // Buat objek Division baru
        $division = new Divisions();
        $division->name = $validatedData['name'];
        $division->status = $validatedData['status']; // Mengisi properti status

        // Simpan objek ke database
        $division->save();

        // Redirect user ke halaman yang sesuai dengan pesan sukses
        return redirect()->route('divisions.index')->with('success', 'Division created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Divisions $division)
    {
        return view('divisions.edit', compact('division'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Divisions $division)
    {
        $request->validate([
            'name'      => 'required|string|max:255',
            'status'    => 'required|string|in:active,inactive',
        ]);


        $division->update($request->all());

        return redirect()->route('divisions.index')->with('success','Divisions update berhasil');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Divisions $division)
    {
        //Delete data Divisi
        $division->delete();

        return redirect()->route('divisions.index')->with('sukses', 'data divisi telah di hapus');
    }
}
