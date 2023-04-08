<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Wadai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WadaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->query('search');

        if(!empty($search)){
            $dataWadai = Wadai::Where('wadai.id','like','%' . $search . '%')
            ->orWhere('wadai.nama', 'like', '%'. $search . '%')
            ->paginate(6)->onEachSide(2)->fragment('std');
        } else {
            $dataWadai = Wadai::paginate(6)->onEachSide(2)->fragment('std');
        }

        return view('wadai', [
            'wadai' => $dataWadai,
            'search' => $search
        ]);
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
        $validator = $request->validate([
            'namaInput' => 'required|max:200',
            'hargaInput' => 'required|numeric',
            'image' => 'required|image|file|max:1024',
        ]);

        $query = DB::table('wadai')->insert([
            'nama' => $request->input('namaInput'),
            'harga' => $request->input('hargaInput'),
            'gambar' => $request->file('image')->store('post-image'),
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
        $validator = $request->validate([
            'namaInput' => 'required|max:200',
            'hargaInput' => 'required|numeric',
            'image' => 'image|file|max:1024',
        ]);

        $query = DB::table('wadai')->where('id', $id)->update([
            'nama' => $request->input('namaInput'),
            'harga' => $request->input('hargaInput'),
            'gambar' => $request->file('image')->store('post-image'),
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
