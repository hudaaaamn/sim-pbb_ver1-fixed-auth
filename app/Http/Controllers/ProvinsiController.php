<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\RefPropinsi;

class ProvinsiController extends Controller
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
        $data_provinsi = RefPropinsi::orderBy('kd_propinsi', 'asc')
        ->paginate(25);

        $no = ($data_provinsi->currentPage() - 1) * $data_provinsi->perPage() + 1;
        return view('provinsi.provinsi', compact('data_provinsi', 'no', 'fullname', 'username'));
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
        return view('provinsi.add_provinsi', compact('fullname', 'username'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        // dd($request->all());
        $request->validate([
            'kd_propinsi' => 'required|unique:ref_propinsi|numeric',
            'nm_propinsi' => 'required',
        ]);
        
        
        $provinsi = new RefPropinsi;
        $provinsi->kd_propinsi = $request->kd_propinsi;
        $provinsi->nm_propinsi = $request->nm_propinsi;
        $provinsi->save();
        

        return redirect()->route('provinsi.index')
            ->with('success', 'Provinsi berhasil ditambah.');
    }

    /**
     * Display the specified resource.
     */
    public function show($kdPropinsi, $no)
    {
        // Fetch user data
        $no = $no;
        $data_user = DB::table('users');
        $user = $data_user->where('id', Auth()->user()->id)->first();
        $fullname = $user->fullname;
        $username = $user->username;

        // Fetch Kelurahan data based on the provided parameters
        $provinsi = RefPropinsi::where([
            'KD_PROPINSI' => $kdPropinsi,
            
        ])->first();

        // Return the view with the user and Kelurahan data
        return view('provinsi.detail_provinsi', compact('fullname', 'username', 'provinsi', 'no'));
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
