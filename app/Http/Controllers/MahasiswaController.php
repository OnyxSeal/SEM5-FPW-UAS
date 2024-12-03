<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil semua data mahasiswa
        $mahasiswas = Mahasiswa::all();

        // Return view dan kirimkan data mahasiswa
        return view('master-data.mahasiswa-master.index-mahasiswa', compact('mahasiswas'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('master-data.mahasiswa-master.create-mahasiswa');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'npm' => 'required|numeric|digits:13',
            'nama' => 'required|string',
            'prodi' => 'required|string',
        ]);

        // Simpan ke database
        Mahasiswa::create($validated);

        // Redirect dengan pesan sukses
        return redirect()->back()->with('success', 'Data berhasil ditambahkan.');
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
    public function edit($npm)
    {
        // Cari mahasiswa berdasarkan NPM
        $mahasiswa = Mahasiswa::where('npm', $npm)->firstOrFail();

        // Tampilkan form edit dengan data mahasiswa
        return view('master-data.mahasiswa-master.edit-mahasiswa', compact('mahasiswa'));
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($npm)
    {
        // Cari mahasiswa berdasarkan NPM
        $mahasiswa = Mahasiswa::where('npm', $npm)->firstOrFail();

        // Hapus data mahasiswa
        $mahasiswa->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('index-mahasiswa')->with('success', 'Data mahasiswa berhasil dihapus.');
    }


}
