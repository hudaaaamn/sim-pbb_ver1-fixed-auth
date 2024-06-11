<?php

namespace App\Http\Controllers;

use App\Http\Requests\SpopRequest;
use App\Models\Spop;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use App\Models\BerhakNjoptkp;
use App\Models\DatSubjekPajak;
use App\Models\RefPropinsi;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use PhpParser\Node\Expr\BinaryOp\Concat;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class SpopController extends Controller
{
    public function index()
    {
        $data_user = DB::table('users');
        $user = $data_user->where('id', Auth()->user()->id)->first();
        $fullname = $user->fullname;
        $username = $user->username;

        return view('spop.spop', compact('fullname', 'username'));
    }


    public function data(Request $request)
    {
        $perPage = $request->input('length', 25);
        $page = $request->input('start', 0) / $perPage + 1;
    
        $query = DB::table('db_simpbb.spop');
    
        // Apply additional filters or conditions based on DataTables request
        // Example: if ($request->has('some_column')) $query->where('some_column', $request->input('some_column'));
    
        // Handle global search
        if ($request->filled('search.value')) {
            $searchValue = $request->input('search.value');
            $query->where(function ($query) use ($searchValue) {
                // Adjust column names as per your database schema
                $query->orWhere(DB::raw("CONCAT(spop.KD_PROPINSI, spop.KD_DATI2, spop.KD_KECAMATAN, spop.KD_KELURAHAN, spop.KD_BLOK, spop.NO_URUT, spop.KD_JNS_OP)"), 'like', "%$searchValue%")
                    ->orWhere('spop.SUBJEK_PAJAK_ID', 'like', "%$searchValue%")
                    ->orWhere('spop.JALAN_OP', 'like', "%$searchValue%")
                    ->orWhere('spop.LUAS_BUMI', 'like', "%$searchValue%");
            });
        }
    
        $spops = $query->paginate($perPage, ['*'], 'page', $page);
    
        foreach ($spops->items() as $index => $spop) {
            $spop->DT_RowIndex = $index + 1 + ($page - 1) * $perPage;
            $spop->nop = $spop->KD_PROPINSI . $spop->KD_DATI2 . $spop->KD_KECAMATAN . $spop->KD_KELURAHAN . $spop->KD_BLOK . $spop->NO_URUT . $spop->KD_JNS_OP;
        }
    
        // Build the JSON response explicitly
        $jsonResponse = [
            'data' => $spops->items(),
            'draw' => $request->input('draw', 1),
            'recordsTotal' => $spops->total(),
            'recordsFiltered' => $spops->total(),
        ];
    
        return response()->json($jsonResponse);
    }




    public function create()
    {
        $data_user = DB::table('users');
        $user = $data_user->where('id', Auth()->user()->id)->first();
        $fullname = $user->fullname;
        $username = $user->username;
        // $nip = $user->nip;
        $kecamatanOptions = \App\Models\RefKecamatan::select(['KD_KECAMATAN', DB::raw("CONCAT('[', KD_KECAMATAN, '] ', NM_KECAMATAN) AS full_name")])
            ->pluck('full_name', 'KD_KECAMATAN')
            ->toArray();
        $kelurahanOptions = \App\Models\RefKelurahan::select([
            'KD_KECAMATAN',
            'KD_KELURAHAN',
            'NM_KELURAHAN',
        ])
            ->get()
            ->groupBy('KD_KECAMATAN')
            ->map(function ($kelurahans) {
                return $kelurahans->map(function ($kelurahan) {
                    return [$kelurahan->KD_KELURAHAN, $kelurahan->NM_KELURAHAN];
                });
            })
            ->toArray();


        return view('spop.add_spop', compact('kelurahanOptions', 'kecamatanOptions', 'fullname', 'username'));
    }

    public function store(Request $request)
    {
        // // Validate the request...
        // $request->validate([
        //     'KD_PROPINSI' => 'required|string|max:2',
        //     'KD_DATI2' => 'required|string|max:2',
        //     'KD_KECAMATAN' => 'required|string|max:3',
        //     'KD_KELURAHAN' => 'required|string|max:3',
        //     'KD_BLOK' => 'required|string|max:3',
        //     'NO_URUT' => 'required|string|max:4',
        //     'KD_JNS_OP' => 'required|string|max:1',
        //     'SUBJEK_PAJAK_ID' => 'required|string|max:30',
        //     'JNS_TRANSAKSI_OP' => 'required|string|max:1',
        //     'JALAN_OP' => 'required|string|max:30',
        //     'KD_STATUS_WP' => 'required|string|max:1',
        //     'LUAS_BUMI' => 'required|integer',
        //     'JNS_BUMI' => 'required|string|max:1',
        //     'TGL_PENDATAAN_OP' => 'required|date',
        //     'TGL_PEMERIKSAAN_OP' => 'required|date',
        //     'KD_PROPINSI_BERSAMA' => 'nullable|string|max:2',
        //     'KD_DATI2_BERSAMA' => 'nullable|string|max:2',
        //     'KD_KECAMATAN_BERSAMA' => 'nullable|string|max:3',
        //     'KD_KELURAHAN_BERSAMA' => 'nullable|string|max:3',
        //     'KD_BLOK_BERSAMA' => 'nullable|string|max:3',
        //     'NO_URUT_BERSAMA' => 'nullable|string|max:4',
        //     'KD_JNS_OP_BERSAMA' => 'nullable|string|max:1',
        //     'KD_PROPINSI_ASAL' => 'nullable|string|max:2',
        //     'KD_DATI2_ASAL' => 'nullable|string|max:2',
        //     'KD_KECAMATAN_ASAL' => 'nullable|string|max:3',
        //     'KD_KELURAHAN_ASAL' => 'nullable|string|max:3',
        //     'KD_BLOK_ASAL' => 'nullable|string|max:3',
        //     'NO_URUT_ASAL' => 'nullable|string|max:4',
        //     'KD_JNS_OP_ASAL' => 'nullable|string|max:1',
        //     'NO_SPPT_LAMA' => 'nullable|string|max:30',
        //     'RW_OP' => 'nullable|string|max:2',
        //     'RT_OP' => 'nullable|string|max:3',
        //     'KD_ZNT' => 'nullable|string|max:2',
        //     'NO_FORMULIR_SPOP' => 'nullable|string|max:11',
        //     'BLOK_KAV_NO_OP' => 'nullable|string|max:15',
        //     'NIP_PENDATA' => 'nullable|string|max:20',
        //     'NIP_PEMERIKSA_OP' => 'nullable|string|max:20',
        //     'NO_PERSIL' => 'nullable|string|max:5',
        //     'NO_URUT' => 'nullable|string|max:4',
        //     'NO_URUT_BERSAMA' => 'nullable|string|max:4',
        //     'NO_URUT_ASAL' => 'nullable|string|max:4',
        //     'NO_SPPT_LAMA' => 'nullable|string|max:30',
        //     'NOP' => 'nullable|string|max:18',
        // ]);
        $request->validate([
            'jenis_transaksi' => 'required',
            'nop' => 'required',
            'jalan' => 'required',
            'rt' => 'required',
            'rw' => 'required',
            'no' => 'required',
            'kelurahan' => 'required',
            'nik' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'rw_alamat' => 'required',
            'rt_alamat' => 'required',
            'no_alamat' => 'required',
            'kode_pos' => 'required',
            'kelurahan_alamat' => 'required',
            'status' => 'required',
            'pekerjaan' => 'required',
        ]);

        Spop::create($request->all());
        return redirect()->back()->with('success', 'Data berhasil ditambahkan');

        // Ambil data yang dikirim dari form
        $model = new Spop();
        $modelWp = new DatSubjekPajak();

        $propinsis = RefPropinsi::pluck('NM_PROPINSI', 'KD_PROPINSI');

        $model->KD_PROPINSI = '51';
        $model->KD_DATI2 = '71';
        $model->KD_KECAMATAN = '010';
        $model->KD_KELURAHAN = '001';
        $model->KD_BLOK = '001';
        $model->KD_JNS_OP = '0';
        $model->LUAS_BUMI = 0;
        $model->NO_URUT = $request->input('NO_URUT');
        $model->JNS_BUMI = $request->input('JNS_BUMI');
        $model->NILAI_SISTEM_BUMI = 0;
        $model->TGL_PENDATAAN_OP = now()->toDateString();
        $model->TGL_PEMERIKSAAN_OP = now()->toDateString();
        $model->NIP_PENDATA = Auth::user()->nip;
        $model->NIP_PEMERIKSA_OP = Auth::user()->nip;

        if ($request->isMethod('post') && $model->fill($request->all())->save()) {
            // Hapus data sebelumnya jika ada
            $wp = DatSubjekPajak::find($model->SUBJEK_PAJAK_ID);
            if (!is_null($wp)) {
                $wp->delete();
            }

            $modelWp->fill($request->all());
            $modelWp->SUBJEK_PAJAK_ID = $model->SUBJEK_PAJAK_ID;
            $modelWp->save();

            return redirect()->route('spop.index', [
                'KD_PROPINSI' => $model->KD_PROPINSI,
                'KD_DATI2' => $model->KD_DATI2,
                'KD_KECAMATAN' => $model->KD_KECAMATAN,
                'KD_KELURAHAN' => $model->KD_KELURAHAN,
                'KD_BLOK' => $model->KD_BLOK,
                'NO_URUT' => $model->NO_URUT,
                'KD_JNS_OP' => $model->KD_JNS_OP,
            ])->with('success', 'SPOP berhasil ditambah.');
        }

        $kelas['KELAS_BUMI'] = "-";
        $kelas['NJOP_BUMI'] = 0;

        return view('spop.create', [
            'model' => $model,
            'modelWp' => $modelWp,
            'propinsis' => $propinsis,
            'action' => 'add',
            'kelas' => $kelas,
        ]);


        // Respon berhasil atau alihkan pengguna ke halaman yang sesuai
        return redirect()->route('spop.index')
            ->with('success', 'SPOP berhasil ditambah.');
    }
    public function edit($spop)
    {
        $data_user = DB::table('users');
        $user = $data_user->where('id', Auth()->user()->id)->first();
        $fullname = $user->fullname;
        $username = $user->username;

        $KD_PROPINSI = substr($spop, 0, 2);
        $KD_DATI2 = substr($spop, 2, 2);
        $KD_KECAMATAN = substr($spop, 4, 3);
        $KD_KELURAHAN = substr($spop, 7, 3);
        $KD_BLOK = substr($spop, 10, 3);
        $NO_URUT = substr($spop, 13, 4);
        $KD_JNS_OP = substr($spop, 17, 1);
        $kecamatanOptions = \App\Models\RefKecamatan::select(['KD_KECAMATAN', DB::raw("CONCAT('[', KD_KECAMATAN, '] ', NM_KECAMATAN) AS full_name")])
            ->pluck('full_name', 'KD_KECAMATAN')
            ->toArray();
        $kelurahanOptions = \App\Models\RefKelurahan::select([
            'KD_KECAMATAN',
            'KD_KELURAHAN',
            'NM_KELURAHAN',
        ])
            ->get()
            ->groupBy('KD_KECAMATAN')
            ->map(function ($kelurahans) {
                return $kelurahans->map(function ($kelurahan) {
                    return [$kelurahan->KD_KELURAHAN, $kelurahan->NM_KELURAHAN];
                });
            })
            ->toArray();


        $data_spop = $this->findModel($KD_PROPINSI, $KD_DATI2, $KD_KECAMATAN, $KD_KELURAHAN, $KD_BLOK, $NO_URUT, $KD_JNS_OP);
        $data_wp = $this->findModelWp($data_spop->SUBJEK_PAJAK_ID);
        // $data_spop->where('nop', $spop);
        return view('spop.edit_spop', compact('data_spop', 'data_wp', 'fullname', 'username', 'kecamatanOptions', 'kelurahanOptions', 'spop'));
    }

    public function destroy($spop)
    {

        $KD_PROPINSI = substr($spop, 0, 2);
        $KD_DATI2 = substr($spop, 2, 2);
        $KD_KECAMATAN = substr($spop, 4, 3);
        $KD_KELURAHAN = substr($spop, 7, 3);
        $KD_BLOK = substr($spop, 10, 3);
        $NO_URUT = substr($spop, 13, 4);
        $KD_JNS_OP = substr($spop, 17, 1);

        try {
            $deleted = $this->findModel($KD_PROPINSI, $KD_DATI2, $KD_KECAMATAN, $KD_KELURAHAN, $KD_BLOK, $NO_URUT, $KD_JNS_OP);
            $deleted->delete();

            return redirect()->route('spop.index')->with('success', 'Data berhasil dihapus.');
        } catch (ModelNotFoundException $e) {
            return redirect()->route('spop.index')->with('error', 'Data tidak ditemukan.');
        }
    }

    protected function findModel($KD_PROPINSI, $KD_DATI2, $KD_KECAMATAN, $KD_KELURAHAN, $KD_BLOK, $NO_URUT, $KD_JNS_OP)
    {
        try {

            $got = Spop::where([
                'KD_PROPINSI' => $KD_PROPINSI,
                'KD_DATI2' => $KD_DATI2,
                'KD_KECAMATAN' => $KD_KECAMATAN,
                'KD_KELURAHAN' => $KD_KELURAHAN,
                'KD_BLOK' => $KD_BLOK,
                'NO_URUT' => $NO_URUT,
                'KD_JNS_OP' => $KD_JNS_OP,
            ])->firstOrFail();

            return $got;
        } catch (ModelNotFoundException $e) {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    protected function findModelWp($SUBJEK_PAJAK_ID)
    {
        $model_wp = DatSubjekPajak::where('SUBJEK_PAJAK_ID', $SUBJEK_PAJAK_ID)->first();
        
        if ($model_wp) {
            return $model_wp;
        }

        abort(404, 'The requested page does not exist.');
    }


    public function update($spop)
    {   
        $KD_PROPINSI = substr($spop, 0, 2);
        $KD_DATI2 = substr($spop, 2, 2);
        $KD_KECAMATAN = substr($spop, 4, 3);
        $KD_KELURAHAN = substr($spop, 7, 3);
        $KD_BLOK = substr($spop, 10, 3);
        $NO_URUT = substr($spop, 13, 4);
        $KD_JNS_OP = substr($spop, 17, 1);

        $model = $this->findModel($KD_PROPINSI, $KD_DATI2, $KD_KECAMATAN, $KD_KELURAHAN, $KD_BLOK, $NO_URUT, $KD_JNS_OP);
        try {
            $model_wp = $this->findModelWp($model->SUBJEK_PAJAK_ID);
        } catch (ModelNotFoundException $e){
            throw new NotFoundHttpException('The requested page does not exist.');
        };
        
        
        $propinsis = RefPropinsi::pluck('NM_PROPINSI', 'KD_PROPINSI');

        if (
            $model->fill(request()->input()) && $model->save() &&
            $model_wp->fill(request()->input()) && $model_wp->save()
        ) {
        $NOP = $spop;
            
            return redirect()->route('spop.show', [
                'KD_PROPINSI' => $model->KD_PROPINSI,
                'KD_DATI2' => $model->KD_DATI2,
                'KD_KECAMATAN' => $model->KD_KECAMATAN,
                'KD_KELURAHAN' => $model->KD_KELURAHAN,
                'KD_BLOK' => $model->KD_BLOK,
                'NO_URUT' => $model->NO_URUT,
                'KD_JNS_OP' => $model->KD_JNS_OP,
                'NOP' => $NOP
            ]);
        }

        $kelas = DB::select(
            "
        SELECT KELAS_BUMI, NJOP_BUMI FROM kelas_bumi WHERE :nilai_sistem / :luas BETWEEN NILAI_MINIMUM+0.01 AND NILAI_MAKSIMUM",
            [':nilai_sistem' => $model->NILAI_SISTEM_BUMI, ':luas' => $model->LUAS_BUMI]
        )[0];

        return view('spop.edit', [
            'model' => $model,
            'model_wp' => $model_wp,
            'propinsis' => $propinsis,
            'action' => 'edit',
            'kelas' => $kelas,
        ]);
    }


    // public function show($NOP)
    // {
    //     // Fetch user data
    //     $data_user = DB::table('users');
    //     $user = $data_user->where('id', Auth()->user()->id)->first();
    //     $fullname = $user->fullname;
    //     $username = $user->username;

    //     $KD_PROPINSI = substr($NOP, 0, 2);
    //     $KD_DATI2 = substr($NOP, 2, 2);
    //     $KD_KECAMATAN = substr($NOP, 4, 3);
    //     $KD_KELURAHAN = substr($NOP, 7, 3);
    //     $KD_BLOK = substr($NOP, 10, 3);
    //     $NO_URUT = substr($NOP, 13, 4);
    //     $KD_JNS_OP = substr($NOP, 17, 1);
        
    //     $result = DB::table('spop')
    //     ->leftJoin('dat_subjek_pajak', 'spop.SUBJEK_PAJAK_ID', '=', 'dat_subjek_pajak.SUBJEK_PAJAK_ID')
    //     ->leftJoin(DB::raw("(SELECT
    //             KD_PROPINSI,
    //             KD_DATI2,
    //             KD_KECAMATAN,
    //             KD_KELURAHAN,
    //             KD_BLOK,
    //             NO_URUT,
    //             KD_JNS_OP,
    //             SUM(LUAS_BNG) as LUAS_BNG,
    //             COUNT(1) as JML_BNG
    //         FROM dat_op_bangunan
    //         WHERE
    //             KD_PROPINSI = $KD_PROPINSI AND
    //             KD_DATI2 = $KD_DATI2 AND
    //             KD_KECAMATAN = $KD_KECAMATAN AND
    //             KD_KELURAHAN = $KD_KELURAHAN AND
    //             KD_BLOK = $KD_BLOK AND
    //             NO_URUT = $NO_URUT AND
    //             KD_JNS_OP = $KD_JNS_OP
    //         GROUP BY KD_PROPINSI, KD_DATI2, KD_KECAMATAN, KD_KELURAHAN, KD_BLOK, NO_URUT, KD_JNS_OP) as dat_op_bangunan"),
    //         function ($join) {
    //             $join->on('spop.KD_PROPINSI', '=', 'dat_op_bangunan.KD_PROPINSI');
    //             $join->on('spop.KD_DATI2', '=', 'dat_op_bangunan.KD_DATI2');
    //             $join->on('spop.KD_KECAMATAN', '=', 'dat_op_bangunan.KD_KECAMATAN');
    //             $join->on('spop.KD_KELURAHAN', '=', 'dat_op_bangunan.KD_KELURAHAN');
    //             $join->on('spop.KD_BLOK', '=', 'dat_op_bangunan.KD_BLOK');
    //             $join->on('spop.NO_URUT', '=', 'dat_op_bangunan.NO_URUT');
    //             $join->on('spop.KD_JNS_OP', '=', 'dat_op_bangunan.KD_JNS_OP');
    //         })
    //     ->where([
    //         ['spop.KD_PROPINSI', '=', substr($NOP, 0, 2)],
    //         ['spop.KD_DATI2', '=', substr($NOP, 2, 2)],
    //         ['spop.KD_KECAMATAN', '=', substr($NOP, 4, 3)],
    //         ['spop.KD_KELURAHAN', '=', substr($NOP, 7, 3)],
    //         ['spop.KD_BLOK', '=', substr($NOP, 10, 3)],
    //         ['spop.NO_URUT', '=', substr($NOP, 13, 4)],
    //         ['spop.KD_JNS_OP', '=', substr($NOP, 17, 1)],
    //     ])
    //     ->groupBy('spop.KD_PROPINSI', 'spop.KD_DATI2', 'spop.KD_KECAMATAN', 'spop.KD_KELURAHAN', 'spop.KD_BLOK', 'spop.NO_URUT', 'spop.KD_JNS_OP')
    //     ->get()
    //     ->first();
    //     // dd($result);

    //     $spop = $NOP;
        
    //     // Periksa apakah permintaan datang dari AJAX
    //     if (request()->ajax()) {
    //         // Jika ya, kirim respons JSON
    //         return response()->json($result);
    //     } else {

    //         // dd($result);

    //         // Jika tidak, tampilkan view HTML
    //         return view('spop.detail_spop', compact('fullname', 'username', 'result', 'spop'));
    //     }
    // }

    public function search(Request $request)
    {
        // $nop = $request->input('nop');
        // $data = Spop::where('nop', $nop)->first();
        // return response()->json($data);
        $nop = $request->input('NOP');
        $spopData = Spop::where('SUBJEK_PAJAK_ID', $nop)->first();

        $data_user = DB::table('users');
        $user = $data_user->where('id', Auth()->user()->id)->first();
        $fullname = $user->fullname;
        $username = $user->username;

        // dd($spopData);
        if ($spopData) {
            return view('spop.spop', compact('spopData', 'fullname', 'username')); // Tampilkan hasil di view 'spop.result'
        } else {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }
    }
}
