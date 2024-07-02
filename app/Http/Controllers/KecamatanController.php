<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kecamatan;
use RealRashid\SweetAlert\Facades\Alert;

class KecamatanController extends Controller
{
    //menampilkan data-data kecamatan
    public function index()
    {
        $kecamatan = Kecamatan::all();
        return view('kecamatan.index', compact('kecamatan'));
    }

    public function create()
    {
        $kecamatan = Kecamatan::all();
        return view('kecamatan.create', compact('kecamatan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kecamatan' =>'required|string|max:255',
        ]);

        Kecamatan::create($request->all());
        Alert::success('Success', 'Kecamatan Telah Berhasil Dibuat!');
        return redirect()->route('kecamatan.index');
    }

    public function edit(Kecamatan $kecamatan)
    {
        return view('kecamatan.edit', compact('kecamatan'));
    }

    public function update(Request $request, Kecamatan $kecamatan)
    {
        $request->validate([
            'nama_kecamatan' =>'required|string|max:255',
        ]);
        $kecamatan->update($request->all());
        Alert::success('Success', 'Kecamatan Telah Berhasil Di Update!');
        return redirect()->route('kecamatan.index');
    }

    public function destroy(Kecamatan $kecamatan)
    {
        // Delete the Kecamatan record
        $kecamatan->delete();

        return redirect()->route('kecamatan.index')->with('success', 'Kecamatan deleted successfully.');
    }
}
