<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buku = Buku::all();
        return view('buku.index', compact('buku'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('buku.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'id' => 'required|min:13|max:13',
            'judul' => 'required|max:255',
            'halaman' => 'required|integer|min:1|max:99999',
            'kategori' => 'required|max:255',
            'penerbit' => 'required|max:255',
        ]);

        Buku::create($validateData);

        $request->session()->flash('success', "Sukses menambah buku dengan judul: {$validateData['judul']}");
        return redirect()->route('buku.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function show(Buku $buku)
    {
        return view('buku.show', compact('buku'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function edit(Buku $buku)
    {
        return view('buku.edit', compact('buku'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Buku $buku)
    {
        $validateData = $request->validate([
            'id' => 'required|min:13|max:13',
            'judul' => 'required|max:255',
            'halaman' => 'required|integer|min:1|max:99999',
            'kategori' => 'required|max:255',
            'penerbit' => 'required|max:255',
        ]);

        $buku->update($validateData);

        $request->session()->flash('success', "Sukses mengupdate buku dengan judul: {$validateData['judul']}");
        return redirect()->route('buku.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function destroy(Buku $buku)
    {
        $buku->delete();
        return redirect()->route('buku.index')->with(
            'success',
            "Berhasil menghapus buku {$buku['judul']}!"
        );
    }
}
