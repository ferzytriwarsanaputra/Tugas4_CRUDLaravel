<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(Request $request): RedirectResponse
    {
        $validator = $request->validate([
            'namaInput' => 'required',
            'emailInput' => 'required|email',
            'nimInput' => 'required|numeric',
            'passwordInput' => 'required|min:8|confirmed',
        ]);

        $query = User::create([
            'name' => $request->namaInput,
            'email' => $request->emailInput,
            'nim' => $request->nimInput,
            'password' => Hash::make($request->passwordInput)
        ]);

        if ($query) {
            return redirect()->route('login');
        }else{
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        return view('register');
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
}
