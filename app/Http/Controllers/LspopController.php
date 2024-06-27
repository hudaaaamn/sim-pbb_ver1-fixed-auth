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
use Illuminate\Support\Facades\Auth;
use App\Models\BerhakNjoptkp;
use App\Models\DatSubjekPajak;
use App\Models\RefPropinsi;
use PhpParser\Node\Expr\BinaryOp\Concat;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;


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

        return view('lspop.lspop', compact('fullname', 'username'));
    }

    // public function data(Request $request)
    // {
    //     $perPage = $request->input('length', 25);
    //     $page = $request->input('start', 0) / $perPage + 1;

    //     $query = DB::table('db_simpbb.lspop');

    //     // Apply additional filters or conditions based on DataTables request
    //     // Example: if ($request->has('some_column')) $query->where('some_column', $request->input('some_column'));

    //     // Handle global search
    //     if ($request->filled('search.value')) {
    //         $searchValue = $request->input('search.value');
    //         $query->where(function ($query) use ($searchValue) {
    //             // Adjust column names as per your database schema
    //             $query->orWhere(DB::raw("CONCAT(lspop.KD_PROPINSI, lspop.KD_DATI2, lspop.KD_KECAMATAN, lspop.KD_KELURAHAN, lspop.KD_BLOK, lspop.NO_URUT, lspop.KD_JNS_OP)"), 'like', "%$searchValue%")
    //                 ->orWhere('lspop.NO_BNG', 'like', "%$searchValue%")
    //                 ->orWhere('lspop.LUAS_BNG', 'like', "%$searchValue%")
    //                 ->orWhere('lspop.JML_LANTAI_BNG', 'like', "%$searchValue%");
    //         });
    //     }

    //     $lspops = $query->paginate($perPage, ['*'], 'page', $page);

    //     foreach ($lspops->items() as $index => $lspop) {
    //         $lspop->DT_RowIndex = $index + 1 + ($page - 1) * $perPage;
    //         $lspop->nop = $lspop->KD_PROPINSI . $lspop->KD_DATI2 . $lspop->KD_KECAMATAN . $lspop->KD_KELURAHAN . $lspop->KD_BLOK . $lspop->NO_URUT . $lspop->KD_JNS_OP;
    //     }

    //     // Build the JSON response explicitly
    //     $jsonResponse = [
    //         'data' => $lspops->items(),
    //         'draw' => $request->input('draw', 1),
    //         'recordsTotal' => $lspops->total(),
    //         'recordsFiltered' => $lspops->total(),
    //     ];

    //     return response()->json($jsonResponse);
    // }

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
            'nop' => 'required',
            'tgl_kunjugan_kembali' => 'required',
            'jenis_transaksi' => 'required',
            'nomor_formulir' => 'required',
            'bgn_total' => 'required|integer',
            'bgn_tgl_pendataan' => 'required',
            'bgn_individual' => 'required',
            'bgn_nip_pendata' => 'required|integer',
            'bgn_luas' => 'required|integer',
            'bgn_kontruksi' => 'required',
            'bgn_dinding' => 'required',
            'bgn_jml_lantai' => 'required|integer',
            'bgn_langit_langit' => 'required',
            'bgn_lantai' => 'required',
            'bgn_kondisi' => 'required',
            'bgn_atap' => 'required',
            'bgn_listrik' => 'required|integer', 
        ]);


        Lspop::create([
            'nop' => $request->nop,
            'tgl_kunjugan_kembali' => $request->tgl_kunjugan_kembali,
            'jenis_transaksi' => $request->jenis_transaksi,
            'nomor_formulir' => $request->nomor_formulir,
            'bgn_total' => $request->bgn_total,
            'bgn_tgl_pendataan' => $request->bgn_tgl_pendataan,
            'bgn_individual' => $request->bgn_individual,
            'bgn_nip_pendata' => $request->bgn_nip_pendata,
            'bgn_luas' => $request->bgn_luas,
            'bgn_kontruksi' => $request->bgn_kontruksi,
            'bgn_dinding' => $request->bgn_dinding,
            'bgn_jml_lantai' => $request->bgn_jml_lantai,
            'bgn_langit_langit' => $request->bgn_langit_langit,
            'bgn_lantai' => $request->bgn_lantai,
            'bgn_kondisi' => $request->bgn_kondisi,
            'bgn_atap' => $request->bgn_atap,
            'bgn_listrik' => $request->bgn_listrik,
        ]);
        return redirect()->route('lspop.index')->with('success', 'lspop berhasil ditambahkan');
    }

    // public function edit($lspop)
    // {
    //     $data_user = DB::table('users');
    //     $user = $data_user->where('id', Auth()->user()->id)->first();
    //     $fullname = $user->fullname;
    //     $username = $user->username;
    //     $data_lspop = DB::table('db_simpbb.lspop');
    //     // $data_lspop->where('nop', $lspop);
    //     return view('lspop.edit_lspop', compact('data_lspop', 'fullname', 'username'));
    // }
    
    public function destroy($lspop)
    {
        $data_lspop = DB::table('db_simpbb.berhak_njoptkp');
        $data_lspop->where('nop', $lspop);
        $data_lspop->delete();
        return redirect()->route('llspop.index')
            ->with('success', 'lspop berhasil dihapus.');
    }

    // public function show($lspop)
    // {
    //     // Fetch user data
    //     $data_user = DB::table('users');
    //     $user = $data_user->where('id', Auth()->user()->id)->first();
    //     $fullname = $user->fullname;
    //     $username = $user->username;

    //     $KD_PROPINSI = substr($lspop, 0, 2);
    //     $KD_DATI2 = substr($lspop, 2, 2);
    //     $KD_KECAMATAN = substr($lspop, 4, 3);
    //     $KD_KELURAHAN = substr($lspop, 7, 3);
    //     $KD_BLOK = substr($lspop, 10, 3);
    //     $NO_URUT = substr($lspop, 13, 4);
    //     $KD_JNS_OP = substr($lspop, 17, 1);

    //     $data_lspop = DB::table('lspop')->where([
    //         'lspop.KD_PROPINSI' => $KD_PROPINSI,
    //         'lspop.KD_DATI2' => $KD_DATI2,
    //         'lspop.KD_KECAMATAN' => $KD_KECAMATAN,
    //         'lspop.KD_KELURAHAN' => $KD_KELURAHAN,
    //         'lspop.KD_BLOK' => $KD_BLOK,
    //         'lspop.NO_URUT' => $NO_URUT,
    //         'lspop.KD_JNS_OP' => $KD_JNS_OP,
    //     ])->first();



    //     // Return the view with the user and Kelurahan data
    //     return view('lspop.detail_lspop', compact('fullname', 'username', 'data_lspop', 'lspop'));
    // }

    public function search(Request $request)
    {
        // $nop = $request->input('nop');
        // $data = Spop::where('nop', $nop)->first();
        // return response()->json($data);
        $nop = $request->input('NOP');
        $lspopData = Lspop::where('NOP', $nop)->first();

        $data_user = DB::table('users');
        $user = $data_user->where('id', Auth()->user()->id)->first();
        $fullname = $user->fullname;
        $username = $user->username;

        // dd($spopData);
        if ($lspopData) {
            return view('lspop.lspop', compact('lspopData', 'fullname', 'username')); // Tampilkan hasil di view 'lspop.result'
        } else {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }
    }
}
