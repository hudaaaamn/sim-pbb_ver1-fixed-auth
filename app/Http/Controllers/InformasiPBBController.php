<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Pelayanan;
use App\Models\Sppt;
use Illuminate\Support\Facades\Session;


class InformasiPBBController extends Controller
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
        return view('laporan.informasi_pbb', compact('fullname', 'username'));
    }

    
    public function print(Request $request)
    {
        $post_data = $request->input();
        
        $data_user = DB::table('users');
        $user = $data_user->where('id', Auth()->user()->id)->first();
        $fullname = $user->fullname;
        $username = $user->username;
        $routeName = 'informasiPbb.index';

        if (!empty($post_data)) {
            $model = new Sppt();
            $nop = str_replace('.', '', $post_data['nop']);
            $data = $model->getSkNjop($nop, $post_data['tahun']);
            $pelayanan = Pelayanan::where('no_pelayanan', $post_data['no_pelayanan'])->first();
            
            if (empty($pelayanan) || empty($data)) {
                Session::flash('error', 'Tidak Ada Data');
                return redirect()->route('informasiPbb.index');
            }
            
          
            $report_file = 'laporan.cetak_info_pbb';
            return view($report_file, [
                'data' => $data,
                'no_pelayanan' => $post_data['no_pelayanan'],
                'tanggal_pelayanan' => $pelayanan->TANGGAL_PELAYANAN,
                'tahun' => $post_data['tahun'],
                'fullname' => $fullname,
                'username' => $username,
                'routeName' => $routeName,
            ])->with('layout', 'report');
        }

        return view('laporan.informasi_pbb');
    }
    
}