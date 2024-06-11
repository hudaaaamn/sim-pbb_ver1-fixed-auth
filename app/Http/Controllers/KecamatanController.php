<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\RefKecamatan;

class KecamatanController extends Controller
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
        $data_kecamatan = RefKecamatan::orderBy('kd_kecamatan', 'asc')
        ->paginate(25);

        $no = ($data_kecamatan->currentPage() - 1) * $data_kecamatan->perPage() + 1;
        return view('kecamatan.kecamatan', compact('data_kecamatan', 'no', 'fullname', 'username'));
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
        return view('kecamatan.add_kecamatan', compact('fullname', 'username'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        
        $request->validate([
            'inputKodeProvinsi' => 'required',
            'inputKodeDati2' => 'required',
            'inputKodeKecamatan' => 'required',
            'inputNamaKecamatan' => 'required',
        ]);
        
        $kecamatan = new RefKecamatan;
        $kecamatan->kd_propinsi = $request->inputKodeProvinsi;
        $kecamatan->kd_dati2 = $request->inputKodeDati2;
        $kecamatan->kd_kecamatan = $request->inputKodeKecamatan;
        $kecamatan->nm_kecamatan = $request->inputNamaKecamatan;
        $kecamatan->save();
        // dd($request->all());

        return redirect()->route('kecamatan.index')
            ->with('success', 'Kecamatan berhasil ditambah.');
    }

    /**
     * Display the specified resource.
     */
    public function show($kdPropinsi, $kdDati2, $kdKecamatan, $no)
    {
        // Fetch user data
        $no = $no;
        $data_user = DB::table('users');
        $user = $data_user->where('id', Auth()->user()->id)->first();
        $fullname = $user->fullname;
        $username = $user->username;

        // Fetch Kelurahan data based on the provided parameters
        $kecamatan = RefKecamatan::where([
            'KD_PROPINSI' => $kdPropinsi,
            'KD_DATI2' => $kdDati2,
            'KD_KECAMATAN' => $kdKecamatan,
            
        ])->first();

        // Return the view with the user and Kelurahan data
        return view('kecamatan.detail_kecamatan', compact('fullname', 'username', 'kecamatan', 'no'));
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
