<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\Sppt;
use App\Models\DatObjekPajak;
use App\Models\DatSubjekPajak;
use App\Models\RefKelurahan;
use App\Models\PembayaranSppt;
use App\Models\Spop;

class TunggakanController extends Controller
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
        return view('keuangan.tunggakan', compact('fullname', 'username'));
    }

    public function print(Request $request)
    {
        $data_user = DB::table('users');
        $user = $data_user->where('id', Auth()->user()->id)->first();
        $fullname = $user->fullname;
        $username = $user->username;
        $routeName = 'tunggakan.index';

        if ($request->hasAny(['nop', 'tahun_awal', 'tahun_akhir'])) {
            $post_data = $request->all();
            $model_sppt = new Sppt();
            $model_pembayaran = new PembayaranSppt();

            if (isset($post_data['simpbb'])) {
                $view = 'keuangan.cetak_tunggakan_simpbb';
                $model_objek = new Spop();
            } else {
                $view = 'keuangan.cetak_tunggakan';
            }

            $model_subjek = new DatSubjekPajak();
            $model_kelurahan = new RefKelurahan();

            $data_sppt = $model_sppt->getDataByNOPTahun(
                explode('.', $post_data['nop']),
                $post_data['tahun_awal'],
                $post_data['tahun_akhir']
            );

            if (empty($data_sppt)) {
                return redirect()->route('tunggakan.index', [
                    'fullname' => $fullname,
                    'username' => $username,
                ])->with('error', 'Data tidak ditemukan');
            }

            $data_pembayaran = $model_pembayaran->getDataByNOPTahun(
                explode('.', $post_data['nop']),
                $post_data['tahun_awal'],
                $post_data['tahun_akhir']
            );

            $data_pembayaran = $model_pembayaran->formatKeyTahun($data_pembayaran);

            $data_objek = $model_objek->getDataByNOP(
                explode('.', $post_data['nop'])
            );

            $data_subjek = $model_subjek->getDataBySubjekId(
                $data_objek[0]['SUBJEK_PAJAK_ID']
            );

            $kelurahan = $model_kelurahan->getKelurahanGroup();

            $show_all = true;
            if (isset($post_data['only_tunggakan'])) {
                $show_all = false;
            }

            $model_sppt =new Sppt();

            return view($view, [
                'data_sppt' => $data_sppt,
                'data_pembayaran' => $data_pembayaran,
                'data_objek' => $data_objek[0],
                'data_subjek' => $data_subjek[0],
                'show_all' => $show_all,
                'kelurahan' => $kelurahan,
                'post_data' => $post_data,
                'fullname' => $fullname,
                'username' => $username,
                'model_sppt' => $model_sppt,
                'routeName' => $routeName

            ])->with('layout', 'report');
        }

        return redirect()->route('tunggakan.index', [
            'fullname' => $fullname,
            'username' => $username,
        ]);
    }
}
