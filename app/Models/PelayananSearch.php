<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\Pelayanan;

class PelayananSearch extends Pelayanan
{
    protected $table = 'pelayanan'; // Adjust the table name as needed

    protected $fillable = [
        // Add all your model fields here
        'ID', 'STATUS_PELAYANAN', 'NAMA_PEMOHON', 'ALAMAT_PEMOHON', 'NO_PELAYANAN', 'TANGGAL_PELAYANAN', 'KD_PROPINSI', 'KD_DATI2', 'KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK', 'NO_URUT', 'KD_JNS_OP', 'KD_JNS_PELAYANAN', 'TANGGAL_PERKIRAAN_SELESAI', 'NIP_PETUGAS_PENERIMA', 'NAMA_PETUGAS_PENERIMA', 'NIP_AR', 'NAMA_AR', 'CATATAN', 'KETERANGAN', 'TGL_MASUK_PENILAI', 'NIP_MASUK_PENILAI', 'TGL_SELESAI', 'NIP_SELESAI', 'TGL_TERKONFIRMASI_WP', 'NIP_TERKONFIRMASI_WP', 'TTD_JABATAN_KIRI', 'TTD_NAMA_KIRI', 'TTD_NIP_KIRI', 'TTD_JABATAN_KANAN', 'TTD_NAMA_KANAN', 'TTD_NIP_KANAN', 'TGL_PENETAPAN', 'NIP_PENETAPAN', 'TGL_BERKAS_DITUNDA', 
        'NIP_BERKAS_DITUNDA', 'LETAK_OP', 'KECAMATAN', 'KELURAHAN', 'KETERANGAN_BERKAS'
    ];

    /**
     * Search for Pelayanan records.
     *
     * @param  array  $params
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function search($params)
{
    $query = Pelayanan::query();
    $fillableArray = $this->getFillable();

    // Apply sorting
    if (empty(request()->input('sort'))) {
        $query->orderByDesc('TANGGAL_PELAYANAN');
    }

    // Apply filters
    foreach (request()->all() as $key => $value) {
        if ($value !== null && in_array($key, $fillableArray)) {
            $query->where($key, 'like', "%$value%");
        }
    }

    // Paginate the results
    $dataProvider = $query->paginate();

    return $dataProvider;
}
}
