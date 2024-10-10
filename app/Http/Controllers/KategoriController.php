<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreKategoriRequest;
use App\Http\Requests\UpdateKategoriRequest;
use Illuminate\Support\Facades\Validator;

class KategoriController extends Controller
{
    public function index()
    {
        $title = 'Data Kategori';
        $kategoris = Kategori::all();

        return view('kantin.kategori', compact('title', 'kategoris'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255|unique:kategoris,nama_kategori',
        ]);

        Kategori::create([
            'nama_kategori' => $request->nama_kategori,
        ]);

        return redirect()->back()->with('success', 'Berhasil menambhaka sebuah data kategori baru.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255|unique:kategoris,nama_kategori',
        ]);

        $kategori = Kategori::find($id);

        if (!$kategori){
            return redirect()->back()->with('error', 'kategori tidak Ditemukan.');
        }

        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->save();

        return redirect()->back()->with('success', 'kategori tidak ditemukan');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $kategori = Kategori::find($id);

        $kategori->delete();

        return redirect()->back()->with('success', 'Berhasil menghapus sebuah data kategori');
    }
}
