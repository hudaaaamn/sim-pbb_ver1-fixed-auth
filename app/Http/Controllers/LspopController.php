<?php

namespace App\Http\Controllers;

use App\Models\DatOpBangunan;
use Illuminate\Http\Request;
use App\Models\Lspop;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class LspopController extends Controller
{

    public function apiStore(Request $request)
    {
        try {
            $request->validate([
                'nop' => 'required',
                'tgl_kunjungan_kembali' => 'required',
                'jenis_transaksi' => 'required',
                'nomor_formulir' => 'required',
                'bgn_total' => 'required',
                'bgn_tgl_pendataan' => 'required',
                'bgn_individual' => 'required',
                'bgn_nip_pendata' => 'required',
                'bgn_luas' => 'required',
                'bgn_kontruksi' => 'required',
                'bgn_dinding' => 'required',
                'bgn_jml_lantai' => 'required',
                'bgn_langit_langit' => 'required',
                'bgn_lantai' => 'required',
                'bgn_kondisi' => 'required',
                'bgn_atap' => 'required',
                'bgn_listrik' => 'required'
            ]);

            $lspop = Lspop::create($request->all());
            return response()->json([
                'success' => true,
                'data' => $lspop
            ], 201);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'error' => "Internal Sever Error" . $e->getMessage(),
            ], 500);
        }
    }

    public function apiShow($nop)
    {
        try {
            $lspop = Lspop::where('nop', $nop)->firstOrFail();
            return response()->json([
                'success' => true,
                'data' => $lspop
            ], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'error' => "Data SPOP tidak ditemukan",
            ], 404);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'error' => "Internal Server Error" . $e->getMessage(),
            ], 500);
        }
    }

    public function index()
    {
        $data_user = DB::table('users');
        $user = $data_user->where('id', Auth()->user()->id)->first();
        $fullname = $user->fullname;
        $username = $user->username;

        //Versi Anisa
        // Eksekusi query SQL menggunakan metode DB
        // $data_lspop = DB::table('db_simpbb.lspop')
        //     ->join('berhak_njoptkp', function ($join) {
        //         $join->on('db_simpbb.lspop.KD_PROPINSI', '=', 'berhak_njoptkp.KD_PROPINSI')
        //             ->on('db_simpbb.lspop.KD_DATI2', '=', 'berhak_njoptkp.KD_DATI2')
        //             ->on('db_simpbb.lspop.KD_KECAMATAN', '=', 'berhak_njoptkp.KD_KECAMATAN')
        //             ->on('db_simpbb.lspop.KD_KELURAHAN', '=', 'berhak_njoptkp.KD_KELURAHAN')
        //             ->on('db_simpbb.lspop.KD_BLOK', '=', 'berhak_njoptkp.KD_BLOK')
        //             ->on('db_simpbb.lspop.NO_URUT', '=', 'berhak_njoptkp.NO_URUT')
        //             ->on('db_simpbb.lspop.KD_JNS_OP', '=', 'berhak_njoptkp.KD_JNS_OP');
        //     })
        //     ->select('db_simpbb.lspop.*', 'berhak_njoptkp.nop')
        //     ->paginate(25);

        // Menghitung nomor awal data yang ditampilkan pada halaman
        // $no = ($data_lspop->currentPage() - 1) * $data_lspop->perPage() + 1;

        //Versi Verlino Nantinya

        // return view('lspop.lspop', compact('data_lspop', 'no', 'fullname', 'username'));
        return view('lspop.lspop', compact('fullname', 'username'));
    }

    public function data(Request $request)
    {
        $perPage = $request->input('length', 25);
        $page = $request->input('start', 0) / $perPage + 1;

        $query = DB::table('db_simpbb.lspop');

        // Apply additional filters or conditions based on DataTables request
        // Example: if ($request->has('some_column')) $query->where('some_column', $request->input('some_column'));

        // Handle global search
        if ($request->filled('search.value')) {
            $searchValue = $request->input('search.value');
            $query->where(function ($query) use ($searchValue) {
                // Adjust column names as per your database schema
                $query->orWhere(DB::raw("CONCAT(lspop.KD_PROPINSI, lspop.KD_DATI2, lspop.KD_KECAMATAN, lspop.KD_KELURAHAN, lspop.KD_BLOK, lspop.NO_URUT, lspop.KD_JNS_OP)"), 'like', "%$searchValue%")
                    ->orWhere('lspop.NO_BNG', 'like', "%$searchValue%")
                    ->orWhere('lspop.LUAS_BNG', 'like', "%$searchValue%")
                    ->orWhere('lspop.JML_LANTAI_BNG', 'like', "%$searchValue%");
            });
        }

        $lspops = $query->paginate($perPage, ['*'], 'page', $page);

        foreach ($lspops->items() as $index => $lspop) {
            $lspop->DT_RowIndex = $index + 1 + ($page - 1) * $perPage;
            $lspop->nop = $lspop->KD_PROPINSI . $lspop->KD_DATI2 . $lspop->KD_KECAMATAN . $lspop->KD_KELURAHAN . $lspop->KD_BLOK . $lspop->NO_URUT . $lspop->KD_JNS_OP;
        }

        // Build the JSON response explicitly
        $jsonResponse = [
            'data' => $lspops->items(),
            'draw' => $request->input('draw', 1),
            'recordsTotal' => $lspops->total(),
            'recordsFiltered' => $lspops->total(),
        ];

        return response()->json($jsonResponse);
    }

    public function create()
    {
        $data_user = DB::table('users');
        $user = $data_user->where('id', Auth()->user()->id)->first();
        $fullname = $user->fullname;
        $username = $user->username;
        return view('lspop.add_lspop', compact('fullname', 'username'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'KodeProvinsi' => 'required',
            'KodeDati2' => 'required',
            'KodeKecamatan' => 'required',
            'KodeKelurahan' => 'required',
            'KodeBlok' => 'required',
            'NoUrut' => 'required',
            'KodeJenisOp' => 'required',
            'NoBangunan' => 'required|integer',
            'KodeJpb' => 'nullable',
            'NoFormulirlspop' => 'nullable',
            'TahunDibangunBangunan' => 'required',
            'TahunRenovasiBangunan' => 'nullable',
            'LuasBangunan' => 'required|integer',
            'JumlahLantaiBangunan' => 'required|integer',
            'KondisiBangunan' => 'nullable',
            'JenisKonstruksiBangunan' => 'nullable',
            'JenisAtapBangunan' => 'nullable',
            'KdDinding' => 'nullable',
            'KdLantai' => 'nullable',
            'KdLangit_Langit' => 'nullable',
            'NilaiSistemBangunan' => 'required|integer',
            'JenisTransaksiKelurahan' => 'nullable',
            'TanggalPendataanBangunan' => 'required|date',
            'NIPPendataBangunan' => 'required',
            'TanggalPemeriksaanBangunan' => 'required|date',
            'NIPPemeriksaBangunan' => 'required',
            'TanggalPerekamanBangunan' => 'required|date',
            'NIPPerekamBangunan' => 'required',
            'TanggalKunjunganKembali' => 'nullable|date',
            'NilaiIndividu' => 'required|integer',
            'Aktif' => 'required|boolean',
        ]);



        $lspop = new DatOpBangunan();
        $lspop->KD_PROPINSI = $request->KodeProvinsi;
        $lspop->KD_DATI2 = $request->KodeDati2;
        $lspop->KD_KECAMATAN = $request->KodeKecamatan;
        $lspop->KD_KELURAHAN = $request->KodeKelurahan;
        $lspop->KD_BLOK = $request->KodeBlok;
        $lspop->NO_URUT = $request->NoUrut;
        $lspop->KD_JNS_OP = $request->KodeJenisOp;
        $lspop->NO_BNG = $request->NoBangunan;
        $lspop->KD_JPB = $request->KodeJpb;
        $lspop->NO_FORMULIR_lspop = $request->NoFormulirlspop;
        $lspop->THN_DIBANGUN_BNG = $request->TahunDibangunBangunan;
        $lspop->THN_RENOVASI_BNG = $request->TahunRenovasiBangunan;
        $lspop->LUAS_BNG = $request->LuasBangunan;
        $lspop->JML_LANTAI_BNG = $request->JumlahLantaiBangunan;
        $lspop->KONDISI_BNG = $request->KondisiBangunan;
        $lspop->JNS_KONSTRUKSI_BNG = $request->JenisKonstruksiBangunan;
        $lspop->JNS_ATAP_BNG = $request->JenisAtapBangunan;
        $lspop->KD_DINDING = $request->KdDinding;
        $lspop->KD_LANTAI = $request->KdLantai;
        $lspop->KD_LANGIT_LANGIT = $request->KdLangit_Langit;
        $lspop->NILAI_SISTEM_BNG = $request->NilaiSistemBangunan;
        $lspop->jenis_transaksi_kelurahan = $request->JenisTransaksiKelurahan;
        $lspop->TGL_PENDATAAN_BNG = $request->TanggalPendataanBangunan;
        $lspop->NIP_PENDATA_BNG = $request->NIPPendataBangunan;
        $lspop->TGL_PEMERIKSAAN_BNG = $request->TanggalPemeriksaanBangunan;
        $lspop->NIP_PEMERIKSA_BNG = $request->NIPPemeriksaBangunan;
        $lspop->TGL_PEREKAMAN_BNG = $request->TanggalPerekamanBangunan;
        $lspop->NIP_PEREKAM_BNG = $request->NIPPerekamBangunan;
        $lspop->TGL_KUNJUNGAN_KEMBALI = $request->TanggalKunjunganKembali;
        $lspop->NILAI_INDIVIDU = $request->NilaiIndividu;
        $lspop->AKTIF = $request->Aktif;
        $lspop->updateOrCreate(
            [
                'KD_PROPINSI' => $request->KodeProvinsi,
                'KD_DATI2' => $request->KodeDati2,
                'KD_KECAMATAN' => $request->KodeKecamatan,
                'KD_KELURAHAN' => $request->KodeKelurahan,
                'KD_BLOK' => $request->KodeBlok,
                'NO_URUT' => $request->NoUrut,
                'KD_JNS_OP' => $request->KodeJenisOp,
                'NO_BNG' => $request->NoBangunan,
            ],
            $lspop->toArray()
        );


        return redirect()->route('llspop.index')
            ->with('success', 'lspop berhasil ditambah.');
    }

    public function edit($lspop)
    {
        $data_user = DB::table('users');
        $user = $data_user->where('id', Auth()->user()->id)->first();
        $fullname = $user->fullname;
        $username = $user->username;
        $data_lspop = DB::table('db_simpbb.lspop');
        // $data_lspop->where('nop', $lspop);
        return view('lspop.edit_lspop', compact('data_lspop', 'fullname', 'username'));
    }
    public function update()
    {
        // 
    }
    public function destroy($lspop)
    {
        $data_lspop = DB::table('db_simpbb.berhak_njoptkp');
        $data_lspop->where('nop', $lspop);
        $data_lspop->delete();
        return redirect()->route('llspop.index')
            ->with('success', 'lspop berhasil dihapus.');
    }

    public function show($lspop)
    {
        // Fetch user data
        $data_user = DB::table('users');
        $user = $data_user->where('id', Auth()->user()->id)->first();
        $fullname = $user->fullname;
        $username = $user->username;

        $KD_PROPINSI = substr($lspop, 0, 2);
        $KD_DATI2 = substr($lspop, 2, 2);
        $KD_KECAMATAN = substr($lspop, 4, 3);
        $KD_KELURAHAN = substr($lspop, 7, 3);
        $KD_BLOK = substr($lspop, 10, 3);
        $NO_URUT = substr($lspop, 13, 4);
        $KD_JNS_OP = substr($lspop, 17, 1);

        $data_lspop = DB::table('lspop')->where([
            'lspop.KD_PROPINSI' => $KD_PROPINSI,
            'lspop.KD_DATI2' => $KD_DATI2,
            'lspop.KD_KECAMATAN' => $KD_KECAMATAN,
            'lspop.KD_KELURAHAN' => $KD_KELURAHAN,
            'lspop.KD_BLOK' => $KD_BLOK,
            'lspop.NO_URUT' => $NO_URUT,
            'lspop.KD_JNS_OP' => $KD_JNS_OP,
        ])->first();



        // Return the view with the user and Kelurahan data
        return view('lspop.detail_llspop', compact('fullname', 'username', 'data_lspop', 'lspop'));
    }
}
