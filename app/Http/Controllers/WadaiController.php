<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WadaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['wadai'] = DB::table('wadai')->get();
        return view('wadai', $data);        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tambahWadai');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $namaInput = $request->input('namaInput');
        $hargaInput = $request->input('hargaInput');
        $gambarInput = $request->file('image')->store('post-image');

        $query = DB::table('wadai')->insert([
            'nama' => $namaInput,
            'harga' => $hargaInput,
            'gambar' => $gambarInput,
        ]);

        if ($query) {
            return redirect()->route('wadai')->with('success', 'Data Berhasil Ditambahkan');
        } else {
            return redirect()->route('wadai')->with('failed', 'Data Gagal Ditambahkan');
        }
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
    public function edit(string $id)
    {
        $data['wadai'] = DB::table('wadai')->where('id', $id)->first();

        return view('editWadai', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $namaInput = $request->input('namaInput');
        $hargaInput = $request->input('hargaInput');
        // $prodiInput = $request->input('prodiInput');

        $query = DB::table('wadai')->where('id', $id)->update([
            'nama' => $namaInput,
            'harga' => $hargaInput,
            // 'prodi' => $prodiInput
        ]);

        if ($query) {
            return redirect()->route('wadai')->with('success', 'Data Berhasil Diupdate');
        } else {
            return redirect()->route('wadai')->with('failed', 'Data Gagal Diupdate');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $query = DB::table('wadai')->where('id', $id)->delete();

        if ($query) {
            return redirect()->route('wadai')->with('success', 'Data Berhasil Dihapus');
        } else {
            return redirect()->route('wadai')->with('failed', 'Data Gagal Dihapus');
        }
    }

    public function showDataPengguna()
    {
        $data['users'] = User::all();

        return view('data_pengguna',$data);
    }
}
