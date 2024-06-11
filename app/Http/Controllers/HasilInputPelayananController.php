<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\Pelayanan;
use App\Models\Sppt;

class HasilInputPelayananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data_user = DB::table('users');
        $user = $data_user->where('id', Auth()->user()->id)->first();
        $fullname = $user->fullname;
        $username = $user->username;
        return view('laporan.hasil_input_pelayanan', compact('fullname', 'username'));
        
    }

    public function print()
    {   
        $data_user = DB::table('users');
        $user = $data_user->where('id', Auth()->user()->id)->first();
        $fullname = $user->fullname;
        $username = $user->username;
        $post_data = request()->post();
        $routeName = 'hasilInputPelayanan.index';

        // dd($post_data);
        if (!empty($post_data)) {
            $model = new Sppt();
            $nop = str_replace('.', '', $post_data['nop']);
            $data = $model->getSkNjop($nop, $post_data['tahun']);
            $pelayanan = Pelayanan::where('no_pelayanan', $post_data['no_pelayanan'])->first();
    
            if (empty($pelayanan) || empty($data)) {
                Session::flash('error', 'Data tidak ditemukan');
                return redirect()->route('hasilInputPelayanan.index');
            }
    
            $report_file = 'laporan.cetak_hasil_input';
    
            if (isset($post_data['baru'])) {
                $report_file = 'laporan.cetak_hasil_input_baru';
            }
    
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
    
        return view('laporan.hasil_input');   
    }


}
