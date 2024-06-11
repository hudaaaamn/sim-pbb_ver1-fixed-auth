<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Sppt;

class SummaryNeracaBPKController extends Controller
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
        return view('laporan.summary_neraca_bpk', compact('fullname', 'username'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function print(Request $request)
    {   
        $data_user = DB::table('users');
        $user = $data_user->where('id', Auth()->user()->id)->first();
        $fullname = $user->fullname;
        $username = $user->username;

        $post_data = $request->all();
        $model = new Sppt();
        try {
            $data = $model->neracaBpkSummary(
                $request->input('tahun_awal'),
                $request->input('tahun_akhir'),
                $request->input('per_tanggal')
            );

            $report_file = 'cetak_neraca_bpk_summary';

            return view('laporan.' . $report_file, [
                'data' => $data,
                'post_data' => $request->all(),
                'fullname' => $fullname, // Ensure $fullname is defined
                'username' => $username, // Ensure $username is defined
            ]);
        } catch (\Exception $e) {
            return redirect()->route('summaryNerBPK.index', ['fullname', 'username'])->with('error', 'Data tidak ditemukan');
        }
    }
}

