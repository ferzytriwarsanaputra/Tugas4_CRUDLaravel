<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Wadai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->query('search');

        if(!empty($search)){
            $dataWadai = wadai::Where('wadai.id','like','%' . $search . '%')
            ->orWhere('wadai.nama', 'like', '%'. $search . '%')
            ->paginate(6)->onEachSide(2)->fragment('std');
        } else {
            $dataWadai = wadai::paginate(6)->onEachSide(2)->fragment('std');
        }

        return view('dashboard', [
            'wadai' => $dataWadai,
            'search' => $search
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
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
    public function destroy(string $id)
    {
        //
    }

    public function showDataPengguna()
    {
        $data['users'] = User::all();

        return view('data_pengguna',$data);
    }
}
