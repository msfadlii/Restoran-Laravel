<?php

namespace App\Http\Controllers;

use App\Models\Makanan;
use Illuminate\Http\Request;

class MakananController extends Controller
{
    public function index()
    {
        $makanans = Makanan::all();
        return view('master-data.makanan.index', compact('makanans'));
    }

    public function create()
    {
        return view('master-data.makanan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'harga' => 'required|integer',
        ]);

        Makanan::create($request->all());
        return redirect()->route('makanan.index')->with('success', 'Makanan berhasil ditambahkan');
    }

    public function show($id)
    {
        $makanan = Makanan::findOrFail($id);
        return view('master-data.makanan.show', compact('makanan'));
    }

    public function edit($id)
    {
        $makanan = Makanan::findOrFail($id);
        return view('master-data.makanan.edit', compact('makanan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'harga' => 'required|integer',
        ]);

        $makanan = Makanan::findOrFail($id);
        $makanan->update($request->all());
        return redirect()->route('makanan.index')->with('success', 'Makanan berhasil diperbarui');
    }

    public function destroy($id)
    {
        $makanan = Makanan::findOrFail($id);
        $makanan->delete();
        return redirect()->route('makanan.index')->with('success', 'Makanan berhasil dihapus');
    }
}
