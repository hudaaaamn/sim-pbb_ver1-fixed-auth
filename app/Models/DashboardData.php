<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DashboardData extends Model
{
    use HasFactory;

    protected $fillable = [
        'tahun',
        'jml_objek_pajak',
        'luas_bgn_total',
        'total_pendapatan_pbb',
        'jml_pbb_lunas',
        'jml_pbb_belum_lunas',
    ];

    public $timestamps = false;
    protected $table = 'dashboard_data';
}