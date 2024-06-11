<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\Sppt;

class PelayananLaporanController extends Controller
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

        $jenis_pelayanan = \App\Models\RefJnsPelayanan::select(['KD_JNS_PELAYANAN', DB::raw("NM_JENIS_PELAYANAN AS full_name")])
        ->pluck('full_name', 'KD_JNS_PELAYANAN')
        ->toArray();

        return view('laporan.laporan_pelayanan_', compact('fullname', 'username', 'jenis_pelayanan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function look(Request $request)
    {
        $data_user = DB::table('users');
        $user = $data_user->where('id', Auth()->user()->id)->first();
        $fullname = $user->fullname;
        $username = $user->username;
        $post_data = $request->post();
        $no = 1;

        if (!empty($post_data)) {
            $model = new Sppt();
            $data = $model->laporanPelayanan(
                $post_data['thn_awal'],
                $post_data['jns_pelayanan'],
                $post_data['tgl_awal'],
                $post_data['tgl_akhir']
            );
            dd($data);
            // Assuming you want to redirect to the 'pelayanan-grid' route
            return view('laporan.laporan_pelayanan_lihat', [
                'data' => $data,
                'fullname' => $fullname,
                'username' => $username,
                'no' => $no
            ]);
        }
    }

}

