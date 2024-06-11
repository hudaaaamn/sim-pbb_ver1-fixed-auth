<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Sppt;

class NeracaKPPController extends Controller
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
        return view('laporan.neraca_kpp', compact('fullname', 'username'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function print()
    {
        $post_data = request()->post();

        if (!empty($post_data)) {
            $model = new Sppt();
            $model->neracaKpp($post_data['tahun_awal'], $post_data['tahun_akhir'], $post_data['per_tanggal']);
            return redirect()->route('neracaKpp.index');
        }

        return view('laporan.neraca_kpp', [
            'tahun_awal' => date('Y'),
            'tahun_akhir' => date('Y'),
            'per_tanggal' => date('Y-m-d')
    ]);
    }

    
}
