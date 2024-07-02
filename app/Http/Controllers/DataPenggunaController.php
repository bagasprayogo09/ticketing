<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
class DataPenggunaController extends Controller
{
    public function index()
    {
        $allUsers = User::all();
        return view('datapengguna.index', compact('allUsers'));
    }

    public function create()
    {
        return view('datapengguna.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'usertype' => 'required|string|max:255',
        ]);

        User::create($request->all());

        return redirect()->route('datapengguna.index')->with('success', 'Pengguna created successfully.');
    }

    public function edit(User $datapengguna)
    {
        return view('datapengguna.edit', compact('datapengguna'));
    }
    public function update(Request $request, User $datapengguna)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'usertype' => 'required|string|max:255',
    ]);

    $datapengguna->update($request->only(['name', 'email', 'usertype']));

    return redirect()->route('datapengguna.index')->with('success', 'Pengguna updated successfully.');
}

    public function destroy(User $datapengguna)
    {
        $datapengguna->delete();

        return redirect()->route('datapengguna.index')->with('success', 'Pengguna deleted successfully.');
    }
}
