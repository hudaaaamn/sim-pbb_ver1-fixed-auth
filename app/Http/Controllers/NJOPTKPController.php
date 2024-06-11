<?php

namespace App\Http\Controllers;

use App\Models\DatSubjekPajak;
use Illuminate\Http\Request;
use App\Models\Sppt;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Exception;

use Illuminate\Support\Facades\DB;

class NJOPTKPController extends Controller
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

        DB::statement("SET SESSION sql_mode = ''");
        DB::statement("SET max_execution_time = 3000000");
        $results = Sppt::select(
            'dat_subjek_pajak.SUBJEK_PAJAK_ID as subjek_pajak_id',
            'sppt.NM_WP_SPPT as NM_WP_SPPT',
            'spop.KD_PROPINSI',
            'spop.KD_DATI2',
            'spop.KD_KECAMATAN',
            'spop.KD_KELURAHAN',
            'spop.KD_BLOK',
            'spop.NO_URUT',
            'spop.KD_JNS_OP',
            'sppt.NJOPTKP_SPPT as NJOPTKP_SPPT',
            DB::raw('MAX(sppt.NJOP_SPPT) AS max_NJOP_SPPT'),
            'sppt.THN_PAJAK_SPPT as THN_PAJAK_SPPT'
        )
            ->join('spop', function ($join) {
                $join->on('spop.KD_PROPINSI', '=', 'sppt.KD_PROPINSI')
                    ->on('spop.KD_DATI2', '=', 'sppt.KD_DATI2')
                    ->on('spop.KD_KECAMATAN', '=', 'sppt.KD_KECAMATAN')
                    ->on('spop.KD_KELURAHAN', '=', 'sppt.KD_KELURAHAN')
                    ->on('spop.KD_BLOK', '=', 'sppt.KD_BLOK')
                    ->on('spop.NO_URUT', '=', 'sppt.NO_URUT')
                    ->on('spop.KD_JNS_OP', '=', 'sppt.KD_JNS_OP')
                    ->join('dat_subjek_pajak', 'dat_subjek_pajak.SUBJEK_PAJAK_ID', '=', 'spop.SUBJEK_PAJAK_ID');
            })
            ->groupBy('sppt.NM_WP_SPPT', 'dat_subjek_pajak.SUBJEK_PAJAK_ID', 'spop.KD_PROPINSI', 'spop.KD_DATI2', 'spop.KD_KECAMATAN', 'spop.KD_BLOK', 'spop.NO_URUT', 'spop.KD_JNS_OP', 'sppt.NJOPTKP_SPPT')
            ->paginate(25);


        $no = ($results->currentPage() - 1) * $results->perPage() + 1;


        return view('keuangan.njoptkp', compact('fullname', 'username', 'results', 'no'));
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
    public function edit($subjek_pajak_id)
    {
        $data_user = DB::table('users');
        $user = $data_user->where('id', Auth()->user()->id)->first();
        $fullname = $user->fullname;
        $username = $user->username;

        return view('keuangan.njoptkp_edit', compact('fullname', 'username', 'subjek_pajak_id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $kdPropinsi, $kdDati2, $kdKecamatan, $kdKelurahan, $kdBlok, $noUrut, $kdJenisOp, $thnPajakSppt)
    {
        // Ubah query builder menjadi model Eloquent
        try {
            $spptModel = Sppt::where([
            'sppt.KD_PROPINSI' => $kdPropinsi,
            'sppt.KD_DATI2' => $kdDati2,
            'sppt.KD_KECAMATAN' => $kdKecamatan,
            'sppt.KD_KELURAHAN' => $kdKelurahan,
            'sppt.KD_BLOK' => $kdBlok,
            'sppt.NO_URUT' => $noUrut,
            'sppt.KD_JNS_OP' => $kdJenisOp,
            'sppt.THN_PAJAK_SPPT' => $thnPajakSppt,
        ])->firstOrFail();
    
        
        // Update nilai NJOPTKP_SPPT
        $spptModel->NJOPTKP_SPPT = $request->NJOPTKP_SPPT;
        $spptModel->save();
    
        return redirect()->route('njoptkp.index')->with('success', 'Data berhasil diubah');
    }
    catch (ModelNotFoundException $e) {
        return redirect()->route('njoptkp.index')->with('error', 'Data tidak ditemukan');
    }
    catch (Exception $e) {
        return redirect()->route('njoptkp.index')->with('error', 'Terjadi kesalahan');
    }
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
