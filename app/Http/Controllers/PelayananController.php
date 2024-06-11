<?php

namespace App\Http\Controllers;

use App\Models\Pelayanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\PelayananSearch;
use App\Models\StatusPelayanan;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use App\Exports\PelayananExport;
use App\Models\RefJnsPelayanan;
use Maatwebsite\Excel\Facades\Excel;


class PelayananController extends Controller


{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {

    //     $data_user = DB::table('users');
    //     $user = $data_user->where('id', Auth()->user()->id)->first();
    //     $fullname = $user->fullname;
    //     $username = $user->username;

    //     $searchModel = new PelayananSearch();
    //     $status = StatusPelayanan::orderBy('urutan')->pluck('nama', 'id')->toArray();

    //     $dataProvider = $searchModel->search(request()->all());

    //     if (request()->has('hasEditable')) {
    //         $id = request()->post('editableKey');
    //         $model = Pelayanan::findOrFail($id);

    //         $pelayanan = ['Pelayanan' => current(request()->post('Pelayanan'))];
    //         if ($model->fill($pelayanan)->save()) {
    //             switch ($model->STATUS_PELAYANAN) {
    //                 case 2:
    //                     $model->TGL_MASUK_PENILAI = now();
    //                     $model->NIP_MASUK_PENILAI = Auth::user()->username;
    //                     break;
    //                 case 4:
    //                     $model->TGL_SELESAI = now();
    //                     $model->NIP_SELESAI = Auth::user()->username;
    //                     break;
    //                 case 5:
    //                     $model->TGL_TERKONFIRMASI_WP = now();
    //                     $model->NIP_TERKONFIRMASI_WP = Auth::user()->username;
    //                     break;
    //                 case 3:
    //                     $model->TGL_PENETAPAN = now();
    //                     $model->NIP_PENETAPAN = Auth::user()->username;
    //                     break;
    //                 case 6:
    //                     $model->TGL_BERKAS_DITUNDA = now();
    //                     $model->NIP_BERKAS_DITUNDA = Auth::user()->username;
    //                     break;
    //             }

    //             $model->save();

    //             if (isset($pelayanan['Pelayanan']['STATUS_PELAYANAN'])) {
    //                 return response()->json(['output' => $status[$model->STATUS_PELAYANAN], 'message' => '']);
    //             } else {
    //                 return response()->json(['output' => $model->KETERANGAN_BERKAS, 'message' => '']);
    //             }
    //         }
    //         return response()->json(['output' => '', 'message' => 'Gagal']);
    //     }

    //     return view('pelayanan.pelayanan', compact('searchModel', 'dataProvider', 'status', 'username', 'fullname'));
    // }

    public function index()
    {
        $data_user = DB::table('users');
        $user = $data_user->where('id', Auth()->user()->id)->first();
        $fullname = $user->fullname;
        $username = $user->username;

        $data_pelayanan = Pelayanan::all();
        $no = 1;
        return(view('pelayanan.pelayanan', compact('fullname', 'username')));
    }




//     public function data()
// {
    
//     try {
//         $data = Pelayanan::query()->get();
    
//         return DataTables::of($data);
//     } catch (\Exception $e) {
//         Log::error($e->getMessage());
//         return response()->json(['error' => 'An error occurred while fetching data.']);
//     }
// }

public function data(Request $request)
{
    $perPage = $request->input('length', 25);
    $page = $request->input('start', 0) / $perPage + 1;

    $query = Pelayanan::query();

    // Apply additional filters or conditions based on DataTables request
    // Example: if ($request->has('some_column')) $query->where('some_column', $request->input('some_column'));

    // Handle global search
    if ($request->filled('search.value')) {
        $searchValue = $request->input('search.value');
        $query->where(function ($query) use ($searchValue) {
            // Adjust column names as per your database schema
            $query->orWhere('NO_PELAYANAN', 'like', "%$searchValue%")
                ->orWhere('NAMA_PEMOHON', 'like', "%$searchValue%")
                ->orWhere('TANGGAL_PELAYANAN', 'like', "%$searchValue%")
                ->orWhere('KECAMATAN', 'like', "%$searchValue%")
                ->orWhere('KELURAHAN', 'like', "%$searchValue%")
                ->orWhere('KD_BLOK', 'like', "%$searchValue%")
                ->orWhere('NO_URUT', 'like', "%$searchValue%")
                ->orWhere('KD_JNS_PELAYANAN', 'like', "%$searchValue%")
                ->orWhere('STATUS_PELAYANAN', 'like', "%$searchValue%")
                ->orWhere('KETERANGAN_BERKAS', 'like', "%$searchValue%");
        });
    }

    $pelayanans = $query->paginate($perPage, ['*'], 'page', $page);


    foreach ($pelayanans->items() as $index => $pelayanan) {
        $pelayanan->DT_RowIndex = $index + 1 + ($page - 1) * $perPage;
    }    
    

    return response()->json([
        'data' => $pelayanans->items(),
        'draw' => $request->input('draw', 1),
        'recordsTotal' => $pelayanans->total(),
        'recordsFiltered' => $pelayanans->total(),
    ]);
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


        return (view('pelayanan.add_pelayanan', compact('fullname', 'username')));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $model = new Pelayanan();
        $dok_pelayanan = \app\models\RefDokumenPelayanan::find()->asArray()->all();

        if (request()->post()) {

            $p = request()->post();
            $nop = explode('.', $p['nop']);

            $model->KD_PROPINSI = $nop[0];
            $model->KD_DATI2 = $nop[1];
            $model->KD_KECAMATAN = $nop[2];
            $model->KD_KELURAHAN = $nop[3];
            $model->KD_BLOK = $nop[4];
            $model->NO_URUT = $nop[5];
            $model->KD_JNS_OP = $nop[6];
            // echo($p['Pelayanan']['KECAMATAN']);exit;
            $m_kec = \app\models\RefKecamatan::find()->where(['KD_KECAMATAN' => $p['Pelayanan']['KECAMATAN']])->one();
            $m_kel = \app\models\RefKelurahan::find()->where(['KD_KECAMATAN' => $p['Pelayanan']['KECAMATAN'], 'KD_KELURAHAN' => $p['Pelayanan']['KELURAHAN']])->one();

            $model->KECAMATAN = $m_kec->NM_KECAMATAN;
            $model->KELURAHAN = $m_kel->NM_KELURAHAN;
            $model->save();
            foreach ($p['pelayanan_dokumen'] as $key => $value) {
                $m_dok = new \app\models\PelayananDokumen();
                $m_dok->pelayanan_id = $model->ID;
                $m_dok->dokumen_id = $key;
                $m_dok->save();
            }
            return $this->redirect(['pelayanan.pelayanan', 'id' => $model->ID]);
        } else {
            $model->TANGGAL_PELAYANAN = date('Y-m-d');
            $model->NO_PELAYANAN =  $model->getNoPelayanan();
            return $this->render('pelayanan.add_pelayanan', compact('model', 'dok_pelayanan'));
        };
    }

    public function laporan()
    {

        $data_user = DB::table('users');
        $user = $data_user->where('id', Auth()->user()->id)->first();
        $fullname = $user->fullname;
        $username = $user->username;

        $JNS_PELAYANAN = \App\Models\RefJnsPelayanan::select(['KD_JNS_PELAYANAN', DB::raw("CONCAT('[', KD_JNS_PELAYANAN, '] ', NM_JENIS_PELAYANAN) AS full_name")])
            ->pluck('full_name', 'KD_JNS_PELAYANAN')
            ->toArray();

        $STATUS_PELAYANAN  = \App\Models\StatusPelayanan::select(['id', DB::raw("CONCAT('[', id, '] ', nama) AS full_name")])
        ->pluck('full_name', 'id')
        ->toArray();

        return view('pelayanan.laporan_pelayanan', compact('fullname', 'username', 'JNS_PELAYANAN', 'STATUS_PELAYANAN'));
    }

    /**
     * Display the specified resource.
     */
    public function show($ID)
    {
        $data_user = DB::table('users');
        $user = $data_user->where('id', Auth()->user()->id)->first();
        $fullname = $user->fullname;
        $username = $user->username;
        $model = Pelayanan::where(['ID' => $ID])->first();
        
        return view('pelayanan.detail_pelayanan', compact('fullname', 'username', 'model'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($ID)
    {
        $data_user = DB::table('users');
        $user = $data_user->where('id', Auth()->user()->id)->first();
        $fullname = $user->fullname;
        $username = $user->username;

        return (view('pelayanan.edit_pelayanan', compact('fullname', 'username')));
    }

    /**
     * Update the specified resource in storage.
     */
    public function export(Request $request)
    {
        $TGL_AWAL = $request->TGL_AWAL;
        $TGL_AKHIR = $request->TGL_AKHIR;
        $JNS_PELAYANAN = $request->JNS_PELAYANAN;
        $STATUS_PELAYANAN = $request->STATUS_PELAYANAN;
        

        return Excel::download(new PelayananExport($TGL_AWAL, $TGL_AKHIR, $JNS_PELAYANAN, $STATUS_PELAYANAN), 'Pelayanan.xlsx');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($pelayanan)
    {
        $id = $pelayanan;
        $data_pelayanan = Pelayanan::where([
            ['ID', '=', $id]]);

        if (!$data_pelayanan) {
            // Handle the case where the model is not found
            abort(404);
        } else {
            $data_pelayanan->delete();
            return redirect()->route('pelayanan.index')->with('success', 'Data berhasil dihapus!');
            // Replace 'your.route.name' with the actual name of the route you want to redirect to
        }
    }
    
}
