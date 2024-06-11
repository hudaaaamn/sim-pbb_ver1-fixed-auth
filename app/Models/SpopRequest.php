<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SpopRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            [['KD_PROPINSI', 'KD_DATI2', 'KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK', 'NO_URUT', 'KD_JNS_OP', 'SUBJEK_PAJAK_ID', 'JNS_TRANSAKSI_OP', 'JALAN_OP', 'KD_STATUS_WP', 'LUAS_BUMI', 'JNS_BUMI', 'TGL_PENDATAAN_OP', 'TGL_PEMERIKSAAN_OP'], 'required'],
            [['LUAS_BUMI', 'NILAI_SISTEM_BUMI'], 'integer'],
            [['TGL_PENDATAAN_OP', 'TGL_PEMERIKSAAN_OP'], 'safe'],
            [['KD_PROPINSI', 'KD_DATI2', 'KD_PROPINSI_BERSAMA', 'KD_DATI2_BERSAMA', 'KD_PROPINSI_ASAL', 'KD_DATI2_ASAL', 'RW_OP', 'KD_ZNT'], 'string', 'max' => 2],
            [['KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK', 'KD_KECAMATAN_BERSAMA', 'KD_KELURAHAN_BERSAMA', 'KD_BLOK_BERSAMA', 'KD_KECAMATAN_ASAL', 'KD_KELURAHAN_ASAL', 'KD_BLOK_ASAL', 'RT_OP'], 'string', 'max' => 3],
            [['NO_URUT', 'NO_URUT_BERSAMA', 'NO_URUT_ASAL', 'NO_SPPT_LAMA'], 'string', 'max' => 4],
            [['KD_JNS_OP', 'JNS_TRANSAKSI_OP', 'KD_JNS_OP_BERSAMA', 'KD_JNS_OP_ASAL', 'KD_STATUS_WP', 'JNS_BUMI'], 'string', 'max' => 1],
            [['SUBJEK_PAJAK_ID', 'JALAN_OP', 'KELURAHAN_OP', 'NM_PENDATAAN_OP', 'NM_PEMERIKSAAN_OP'], 'string', 'max' => 30],
            [['NO_FORMULIR_SPOP'], 'string', 'max' => 11],
            [['BLOK_KAV_NO_OP'], 'string', 'max' => 15],
            [['NIP_PENDATA', 'NIP_PEMERIKSA_OP'], 'string', 'max' => 20],
            [['NO_PERSIL'], 'string', 'max' => 5],
            [['KD_PROPINSI', 'KD_DATI2', 'KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK', 'NO_URUT', 'KD_JNS_OP'], 'unique', 'targetAttribute' => ['KD_PROPINSI', 'KD_DATI2', 'KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK', 'NO_URUT', 'KD_JNS_OP']],
            [['NOP'], 'string', 'max' => 18],
        ];
    }
}

