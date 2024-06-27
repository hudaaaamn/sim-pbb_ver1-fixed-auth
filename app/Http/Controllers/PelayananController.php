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

        // $response = Http::withHeaders([
        //     "Authorization" => "Bearer " . "21|pViTyEasFDRUZxCriLVHUFtEqh1dlnIVFunewpaI99df61ed"
        // ])->get(env("API_URL") . "/pelayanan");

        // if($response->successful()) {
        //     $data_pelayanan = $response->json()['data']['data']; // Ambil data di dalam key 'data'
        // } else {
        //     $data_pelayanan = [];
        // }

        return view('pelayanan.pelayanan', compact('fullname', 'username'));
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
                    ->orWhere('KD_DATI2', 'like', "%$searchValue%")
                    ->orWhere('KD_JNS_PELAYANAN', 'like', "%$searchValue%")
                    ->orWhere('NAMA_PEMOHON', 'like', "%$searchValue%")
                    ->orWhere('ALAMAT_PEMOHON', 'like', "%$searchValue%")
                    ->orWhere('NOP', 'like', "%$searchValue%")
                    ->orWhere('KETERANGAN', 'like', "%$searchValue%")
                    ->orWhere('LETAK_OP', 'like', "%$searchValue%")
                    ->orWhere('KECAMATAN', 'like', "%$searchValue%")
                    ->orWhere('KELURAHAN', 'like', "%$searchValue%")
                    ->orWhere('TGL_SELESAI', 'like', "%$searchValue%")
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
        $user = $data_user->where('id', Auth::user()->id)->first();
        $fullname = $user->fullname;
        $username = $user->username;

        return view('pelayanan.add_pelayanan', compact('fullname', 'username'));
    }

    /**
     * Store a newly created Pelayanan in storage.
     */
    public function store(Request $request)
    {
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

        $data_pelayanan = new Pelayanan();
        $data_pelayanan->NO_PELAYANAN = $request->NO_PELAYANAN;
        $data_pelayanan->KD_DATI2 = $request->KD_DATI2;
        $data_pelayanan->KD_JNS_PELAYANAN = $request->KD_JNS_PELAYANAN;
        $data_pelayanan->NAMA_PEMOHON = $request->NAMA_PEMOHON;
        $data_pelayanan->ALAMAT_PEMOHON = $request->ALAMAT_PEMOHON;
        $data_pelayanan->NOP = $request->NOP;
        $data_pelayanan->KETERANGAN = $request->KETERANGAN;
        $data_pelayanan->LETAK_OP = $request->LETAK_OP;
        $data_pelayanan->KECAMATAN = $request->KECAMATAN;
        $data_pelayanan->KELURAHAN = $request->KELURAHAN;
        $data_pelayanan->TGL_SELESAI = $request->TGL_SELESAI;
        $data_pelayanan->KETERANGAN_BERKAS = $request->KETERANGAN_BERKAS;
        
        return redirect()->route('pelayanan.index')->with('success', 'Data pelayanan berhasil ditambahkan');

        //     $nop = explode('.', $request->input('NOP'));

        //     $pelayanan = new Pelayanan();
        //     $pelayanan->KD_PROPINSI = $nop[0];
        //     $pelayanan->KD_DATI2 = $nop[1];
        //     $pelayanan->KD_KECAMATAN = $nop[2];
        //     $pelayanan->KD_KELURAHAN = $nop[3];
        //     $pelayanan->KD_BLOK = $nop[4];
        //     $pelayanan->NO_URUT = $nop[5];
        //     $pelayanan->KD_JNS_OP = $nop[6];

        //     $m_kec = \App\Models\RefKecamatan::where('KD_KECAMATAN', $request->input('KECAMATAN'))->first();
        //     $m_kel = \App\Models\RefKelurahan::where([
        //         'KD_KECAMATAN' => $request->input('KECAMATAN'),
        //         'KD_KELURAHAN' => $request->input('KELURAHAN')
        //     ])->first();

        //     $pelayanan->KECAMATAN = $m_kec->NM_KECAMATAN;
        //     $pelayanan->KELURAHAN = $m_kel->NM_KELURAHAN;
        //     $pelayanan->TANGGAL_PELAYANAN = date('Y-m-d');
        //     $pelayanan->NO_PELAYANAN = $pelayanan->getNoPelayanan();
        //     $pelayanan->fill($request->all());
        //     $pelayanan->save();

        //     foreach ($request->input('pelayanan_dokumen') as $key => $value) {
        //         $m_dok = new \App\Models\PelayananDokumen();
        //         $m_dok->pelayanan_id = $pelayanan->ID;
        //         $m_dok->dokumen_id = $key;
        //         $m_dok->save();
        //     }

        //     return response()->json([
        //         'success' => true,
        //         'data' => $pelayanan
        //     ], 200);

        // } catch (ValidationException $e) {
        //     return response()->json([
        //         'success' => false,
        //         'error' => $e->getMessage()
        //     ], 500);
        // } catch (Exception $e) {
        //     return response()->json([
        //         'success' => false,
        //         'error' => "Internal server error: " . $e->getMessage()
        //     ], 500);
        // }
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
    public function edit($NO_PELAYANAN, $KD_DATI2, $KD_JNS_PELAYANAN, $NAMA_PEMOHON, $ALAMAT_PEMOHON, $NOP, $KETERANGAN, $LETAK_OP, $KECAMATAN, $KELURAHAN, $TGL_SELESAI, $KETERANGAN_BERKAS)
    {
        $data_user = DB::table('users');
        $user = $data_user->where('id', Auth()->user()->id)->first();
        $fullname = $user->fullname;
        $username = $user->username;
        $result = Pelayanan::all()->first(function ($item) use ($NO_PELAYANAN, $KD_DATI2, $KD_JNS_PELAYANAN, $NAMA_PEMOHON, $ALAMAT_PEMOHON, $NOP, $KETERANGAN, $LETAK_OP, $KECAMATAN, $KELURAHAN, $TGL_SELESAI, $KETERANGAN_BERKAS) {
            return $item->NO_PELAYANAN == $NO_PELAYANAN &&
                $item->KD_DATI2 == $KD_DATI2 &&
                $item->KD_JNS_PELAYANAN == $KD_JNS_PELAYANAN &&
                $item->NAMA_PEMOHON == $NAMA_PEMOHON &&
                $item->ALAMAT_PEMOHON == $ALAMAT_PEMOHON &&
                $item->NOP == $NOP &&
                $item->KETERANGAN == $KETERANGAN &&
                $item->LETAK_OP == $LETAK_OP &&
                $item->KECAMATAN == $KECAMATAN &&
                $item->KELURAHAN == $KELURAHAN &&
                $item->TGL_SELESAI == $TGL_SELESAI &&
                $item->KETERANGAN_BERKAS == $KETERANGAN_BERKAS;
        });
        return view('pelayanan.edit_pelayanan', compact('fullname', 'username', 'result'));
    }

    public function update(Request $request)
    {
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

        $data_pelayanan = Pelayanan::where([
            ['NO_PELAYANAN', '=', $request->NO_PELAYANAN],
            ['KD_DATI2', '=', $request->KD_DATI2],
            ['KD_JNS_PELAYANAN', '=', $request->KD_JNS_PELAYANAN],
            ['NAMA_PEMOHON', '=', $request->NAMA_PEMOHON],
            ['ALAMAT_PEMOHON', '=', $request->ALAMAT_PEMOHON],
            ['NOP', '=', $request->NOP],
            ['KETERANGAN', '=', $request->KETERANGAN],
            ['LETAK_OP', '=', $request->LETAK_OP],
            ['KECAMATAN', '=', $request->KECAMATAN],
            ['KELURAHAN', '=', $request->KELURAHAN],
            ['TGL_SELESAI', '=', $request->TGL_SELESAI],
            ['KETERANGAN_BERKAS', '=', $request->KETERANGAN_BERKAS],
        ])->first();

        if ($data_pelayanan) {
            // Update the record with the new values
            $data_pelayanan->update([
                'LETAK_OP' => $request->LETAK_OP,
                'TGL_SELESAI' => $request->TGL_SELESAI,
            ]);
            return redirect()->route('pelayanan.index');
        }
        // $id = $pelayanan;
        // $pelayanan = Pelayanan::find($id);

        // if (!$pelayanan) {
        //     // Handle the case where the model is not found
        //     abort(404);
        // }

        // if ($pelayanan->fill(request()->all())->save()) {
        //     return redirect()->route('pelayanan.index', ['id' => $pelayanan->id])->with('success', 'Data berhasil disimpan');
        //     // Replace 'your.route.name' with the actual name of the route you want to redirect to
        // }

        // return view('pelayanan.edit_pelayanan', ['pelayanan' => $pelayanan]);
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
