<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Sppt;
use App\Models\Pelayanan;
use Illuminate\Support\Facades\Session;
use App\Services\DateHelper;

class SKNJOPController extends Controller
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
        return view('laporan.sk_njop', compact('fullname', 'username'));
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
        $routeName = 'skNjop.index';
        $post_data = $request->all();

        if (!empty($post_data)) {
            $model = new Sppt();
            $nop = str_replace('.', '', $post_data['nop']);
            $data = $model->getSkNjop($nop, $post_data['tahun']);
            $pelayanan = Pelayanan::where('no_pelayanan', $post_data['no_pelayanan'])->first();

            if (empty($pelayanan) || empty($data)) {
                Session::flash('error', 'Data tidak ditemukan');
                return redirect()->route('skNjop.index');
            }

            $report_file = 'cetak_sknjop';

            if (isset($post_data['baru'])) {
                $report_file = 'cetak_sknjop_baru';
            }

            $formattedDate = DateHelper::tglIndo(date("Y-m-d"));

            return view('laporan.' . $report_file, [
                'data' => $data,
                'no_surat' => $post_data['no_surat'],
                'ttd' => isset($post_data['ttd']),
                'no_pelayanan' => $post_data['no_pelayanan'],
                'tanggal_pelayanan' => $pelayanan->TANGGAL_PELAYANAN,
                'tahun' => $post_data['tahun'],
                'formattedDate' => $formattedDate,
                'fullname' => $fullname,
                'username' => $username,
                'routeName' => $routeName,
            ])->with('layout', 'report');
            }


        return view('laporan.sk_njop_print', compact('fullname', 'username'));
    }

    
}
