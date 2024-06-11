<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RefDati2;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

class KabupatenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data_user = DB::table('users');
        $user = $data_user->where('id', Auth()->user()->id)->first();
        $fullname = $user->fullname;
        $username = $user->username;
        $data_kab = RefDati2::orderBy('kd_propinsi', 'asc')
        ->paginate(25);

        $no = ($data_kab->currentPage() - 1) * $data_kab->perPage() + 1;
        return view('kabupaten.kabupaten', compact('data_kab', 'no', 'fullname', 'username'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $data_user = DB::table('users');
        $user = $data_user->where('id', Auth()->user()->id)->first();
        $fullname = $user->fullname;
        $username = $user->username;
        return view('kabupaten.add_kabupaten', compact('fullname', 'username'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'inputKodeProvinsi' => 'required',
            'inputKodeDati2' => 'required',
            'inputNamaDati2' => 'required',
        ]);
        
        $kabupaten = new RefDati2();
        
        $kabupaten->kd_propinsi= $request->inputKodeProvinsi;
        $kabupaten->kd_dati2 = $request->inputKodeDati2;
        $kabupaten->nm_dati2 = $request->inputNamaDati2;
        
        $kabupaten->save();
        

        return redirect()->route('kabupaten.index')
            ->with('success', 'Kabupaten berhasil ditambah.');
    }

    /**
     * Display the specified resource.
     */
    public function show($kdPropinsi, $kdDati2, $no)
    {
        // Fetch user data
        $no = $no;
        $data_user = DB::table('users');
        $user = $data_user->where('id', Auth()->user()->id)->first();
        $fullname = $user->fullname;
        $username = $user->username;

        // Fetch Kelurahan data based on the provided parameters
        $kabupaten = RefDati2::where([
            'KD_PROPINSI' => $kdPropinsi,
            'KD_DATI2' => $kdDati2
            
        ])->first();

        // Return the view with the user and Kelurahan data
        return view('kabupaten.detail_kabupaten', compact('fullname', 'username', 'kabupaten', 'no'));
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
