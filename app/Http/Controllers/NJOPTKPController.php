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
        // DB::statement("SET max_execution_time = 3000000"); // Baris ini dihapus karena menyebabkan error

        $results = Sppt::select(
            'dat_subjek_pajak.SUBJEK_PAJAK_ID as subjek_pajak_id',
            'sppt.NM_WP_SPPT as NM_WP_SPPT',
            // 'spop.jenis_transaksi',
            'spop.nop',
            'spop.nop_bersama',
            'spop.nop_asal',
            'spop.no_sppt_lama',
            'spop.jalan',
            'spop.rt',
            'spop.rw',
            'spop.no',
            'spop.kelurahan',
            'spop.nomor_legalitas',
            'spop.nik',
            'spop.nama',
            'spop.npwp',
            'spop.alamat',
            'spop.rw_alamat',
            'spop.rt_alamat',
            'spop.no_alamat',
            'spop.kode_pos',
            'spop.kelurahan_alamat',
            'spop.status',
            'spop.pekerjaan',
            'sppt.NJOPTKP_SPPT as NJOPTKP_SPPT',
            DB::raw('MAX(sppt.NJOP_SPPT) AS max_NJOP_SPPT'),
            'sppt.THN_PAJAK_SPPT as THN_PAJAK_SPPT'
        )
            ->join('spop', 'spop.nop', '=') // Sesuaikan kolom 'nop' dengan kolom yang relevan pada tabel 'sppt'
            ->join('dat_subjek_pajak', 'dat_subjek_pajak.SUBJEK_PAJAK_ID', '=', 'spop.nik') // Sesuaikan kolom 'nik' jika ada perubahan
            ->groupBy(
                'dat_subjek_pajak.SUBJEK_PAJAK_ID',
                'sppt.NM_WP_SPPT',
                'spop.jenis_transaksi',
                'spop.nop',
                'spop.nop_bersama',
                'spop.nop_asal',
                'spop.no_sppt_lama',
                'spop.jalan',
                'spop.rt',
                'spop.rw',
                'spop.no',
                'spop.kelurahan',
                'spop.nomor_legalitas',
                'spop.nik',
                'spop.nama',
                'spop.npwp',
                'spop.alamat',
                'spop.rw_alamat',
                'spop.rt_alamat',
                'spop.no_alamat',
                'spop.kode_pos',
                'spop.kelurahan_alamat',
                'spop.status',
                'spop.pekerjaan',
                'sppt.NJOPTKP_SPPT'
            )
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
    public function update(Request $request, $nop)
    {
        try {
            $spptModel = Sppt::where('sppt.nop', $nop) // Sesuaikan kolom 'nop' dengan kolom yang relevan pada tabel 'sppt'
                ->firstOrFail();

            // Update nilai NJOPTKP_SPPT
            $spptModel->NJOPTKP_SPPT = $request->NJOPTKP_SPPT;
            $spptModel->save();

            return redirect()->route('njoptkp.index')->with('success', 'Data berhasil diubah');
        } catch (ModelNotFoundException $e) {
            return redirect()->route('njoptkp.index')->with('error', 'Data tidak ditemukan');
        } catch (Exception $e) {
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

