<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Spop extends Model
{
    use HasFactory;

    protected $table = 'spop';
    public $incrementing = false;
    public $timestamps = false;

    protected $primaryKey = [
        'KD_PROPINSI', 'KD_DATI2', 'KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK', 'NO_URUT', 'KD_JNS_OP'
    ];

    protected $casts = [
        'LUAS_BUMI' => 'int',
        'NILAI_SISTEM_BUMI' => 'int',
        'TGL_PENDATAAN_OP' => 'datetime',
        'TGL_PEMERIKSAAN_OP' => 'datetime'
    ];

    protected $fillable = [
        'jenis_transaksi',
        'nop',
        'nop_bersama',
        'nop_asal',
        'no_sppt_lama',
        'jalan',
        'rt',
        'rw',
        'no',
        'kelurahan',
        'nomor_legalitas',
        'nik',
        'nama',
        'npwp',
        'alamat',
        'rw_alamat',
        'rt_alamat',
        'no_alamat',
        'kode_pos',
        'kelurahan_alamat',
        'status',
        'pekerjaan',
    ];
}
