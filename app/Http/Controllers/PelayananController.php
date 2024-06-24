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
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\ValidationException;
use Maatwebsite\Excel\Facades\Excel;


class PelayananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function apiIndex()
    {
        try {
            $perPage = request()->query('per_page', 10);
            $data = Pelayanan::select("ID", "NO_PELAYANAN", "NAMA_PEMOHON", "TANGGAL_PELAYANAN", "KD_JNS_PELAYANAN", "KECAMATAN", "KELURAHAN", "KD_BLOK", "NO_URUT", "STATUS_PELAYANAN", "KETERANGAN_BERKAS")->paginate($perPage);

            return response()->json([
                'success' => true,
                'data' => $data
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function apiStore(Request $request)
    {
        try {
            $request->validate([
                'NO_PELAYANAN' => 'required',
                'KD_DATI2' => 'required',
                'KD_JNS_PELAYANAN' => 'required',
                'NAMA_PEMOHON' => 'required',
                'ALAMAT_PEMOHON' => 'required',
                'NOP' => 'required',
                'KETERANGAN' => 'required',
                'LETAK_OP' => 'required',
                'KECAMATAN' => 'required',
                'KELURAHAN' => 'required',
                'TGL_SELESAI' => 'required',
                'KETERANGAN_BERKAS' => 'nullable',
            ]);

            $pelayanan = Pelayanan::create($request->all());
            return response()->json([
                'success' => true,
                'data' => $pelayanan
            ], 200);
        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'error' => $e->getMessage()
            ], 500);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'error' => "Internal server error: " . $e->getMessage()
            ], 500);
        }
    }


    public function apiShow($id)
    {
        try {
            $pelayanan = Pelayanan::findOrFail($id);
            return response()->json([
                'success' => true,
                'data' => $pelayanan
            ], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'error' => "Pelayanan not found"
            ], 404);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'error' => "Internal server error"
            ], 500);
        }
    }

    public function apiUpdate(Request $request, $id)
    {
        try {
            $request->validate([
                'NO_PELAYANAN' => 'required',
                'KD_DATI2' => 'required',
                'KD_JNS_PELAYANAN' => 'required',
                'NAMA_PEMOHON' => 'required',
                'ALAMAT_PEMOHON' => 'required',
                'NOP' => 'required',
                'KETERANGAN' => 'required',
                'LETAK_OP' => 'required',
                'KECAMATAN' => 'required',
                'KELURAHAN' => 'required',
                'TGL_SELESAI' => 'required',
                'KETERANGAN_BERKAS' => 'text',
            ]);

            $pelayanan = Pelayanan::where('ID', $id)->update($request->all());
            $pelayanan = Pelayanan::findOrFail($id);
            return response()->json([
                'success' => true,
                'data' => $pelayanan
            ], 200);
        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'error' => $e->getMessage()
            ], 500);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'error' => "Internal server error" . $e->getMessage()
            ], 500);
        }
    }

    public function apiDestroy($id)
    {
        try {
            $pelayanan = Pelayanan::where('ID', $id)->delete();
            return response()->json([
                'success' => true,
                'data' => $pelayanan
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'error' => "Internal server error" . $e->getMessage()
            ], 500);
        }
    }


    public function index()
    {
        $data_user = DB::table('users');
        $user = $data_user->where('id', Auth()->user()->id)->first();
        $fullname = $user->fullname;
        $username = $user->username;

        $response = Http::withHeaders([
            "Authorization" => "Bearer " . "10|Q2ER3GcZ0RlDfZxk8EpO0xQQlWPxcqJLndJ1Yb821f928d1f"
        ])->get(env("API_URL") . "/pelayanan");

        if($response->successful()) {
            $data_pelayanan = $response->json()['data']['data']; // Ambil data di dalam key 'data'
        } else {
            $data_pelayanan = [];
        }

        return view('pelayanan.pelayanan', compact('fullname', 'username', 'data_pelayanan'));
    }


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
            ['ID', '=', $id]
        ]);

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
