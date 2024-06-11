<?php

namespace App\Http\Controllers;

use App\Models\Tarif;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TarifController extends Controller
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

        $data_tarif = Tarif::paginate(25);
        $no = ($data_tarif->currentPage() - 1) * $data_tarif->perPage() + 1;


        return view('keuangan.tarif', compact('fullname', 'username', 'data_tarif', 'no'));
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

        return view('keuangan.tarif_add', compact('fullname', 'username'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'KD_PROPINSI' => 'required',
            'KD_DATI2' => 'required',
            'THN_AWAL' => 'required',
            'THN_AKHIR' => 'required',
            'NJOP_MIN' => 'required|numeric|digits_between:0,15',  // Ensure it's a number and has between 1 and 15 digits.
            'NJOP_MAX' => 'nullable|numeric|digits_between:0,15', // Nullable, but if present, ensure it's a number and has between 1 and 15 digits.
            'NILAI_TARIF' => 'nullable|numeric|between:0,999.999'
        ]);

        $data_tarif = new Tarif();
        $data_tarif->KD_PROPINSI = $request->KD_PROPINSI;
        $data_tarif->KD_DATI2 = $request->KD_DATI2;
        $data_tarif->THN_AWAL = $request->THN_AWAL;
        $data_tarif->THN_AKHIR = $request->THN_AKHIR;
        $data_tarif->NJOP_MIN = $request->NJOP_MIN;
        $data_tarif->NJOP_MAX = $request->NJOP_MAX;
        $data_tarif->NILAI_TARIF = $request->NILAI_TARIF;
        $data_tarif->save();

        return redirect()->route('tarif.index');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($KD_PROPINSI, $KD_DATI2, $THN_AWAL, $THN_AKHIR, $NJOP_MIN)
    {
        $data_user = DB::table('users');
        $user = $data_user->where('id', Auth()->user()->id)->first();
        $fullname = $user->fullname;
        $username = $user->username;
        $result = Tarif::all()->first(function ($item) use ($KD_PROPINSI, $KD_DATI2, $THN_AWAL, $THN_AKHIR, $NJOP_MIN) {
            return $item->KD_PROPINSI == $KD_PROPINSI &&
                $item->KD_DATI2 == $KD_DATI2 &&
                $item->THN_AWAL == $THN_AWAL &&
                $item->THN_AKHIR == $THN_AKHIR &&
                $item->NJOP_MIN == $NJOP_MIN;
        });

        return view('keuangan.tarif_edit', compact('fullname', 'username', 'result'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'KD_PROPINSI' => 'required',
            'KD_DATI2' => 'required',
            'THN_AWAL' => 'required',
            'THN_AKHIR' => 'required',
            'NJOP_MIN' => 'required',  // Ensure it's a number and has between 1 and 15 digits.
            'NJOP_MAX' => 'nullable', // Nullable, but if present, ensure it's a number and has between 1 and 15 digits.
            'NILAI_TARIF' => 'nullable'
        ]);

        $data_tarif = Tarif::where([
            ['KD_PROPINSI', '=', $request->KD_PROPINSI],
            ['KD_DATI2', '=', $request->KD_DATI2],
            ['THN_AWAL', '=', $request->THN_AWAL],
            ['THN_AKHIR', '=', $request->THN_AKHIR],
            ['NJOP_MIN', '=', $request->NJOP_MIN],
        ])->first();
        if ($data_tarif) {
            // Update the record with the new values
            $data_tarif->update([
                'NJOP_MAX' => $request->NJOP_MAX,
                'NILAI_TARIF' => $request->NILAI_TARIF,
            ]);
            return redirect()->route('tarif.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($KD_PROPINSI, $KD_DATI2, $THN_AWAL, $THN_AKHIR, $NJOP_MIN)
    {
        
        $data_tarif = Tarif::where([
            ['KD_PROPINSI', '=', $KD_PROPINSI],
            ['KD_DATI2', '=', $KD_DATI2],
            ['THN_AWAL', '=', $THN_AWAL],
            ['THN_AKHIR', '=', $THN_AKHIR],
            ['NJOP_MIN', '=', $NJOP_MIN],
        ])->first(); 

        $data_tarif->delete();

        return redirect()->route('tarif.index');
    }
}
