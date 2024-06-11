<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Konfigurasi extends Model
{
    use HasFactory;
    public $kepala = array(
        'nama' => 'I Dewa Nyoman Semadi, S.E., M.Si.',
        'nip' => '19641231 199011 1 008',
        'jabatan' => 'Kepala Badan Pendapatan Daerah Kota Denpasar',
        'pangkat' => 'Pembina Utama Muda'
    );

    public $kota = 'Denpasar';

    public $header_top = "KOTA DENPASAR";
    public $footer_kiri = "Badan Pendapatan Daerah";
    public $footer_kanan = "Kota Denpasar";
    public $target_pbb = [
    	2014=>100888200000,
    	2015=>105451464000,
    	2016=>105451464000,    		
    ];

    // KOP SURAT
    public $kabupaten_kop = "KOTA DENPASAR";
    public $instansi_kop = "BADAN PENDAPATAN DAERAH";
    public $alamat_kop = "Jl. Letda Tantular No. 12";
    public $website_kop = "Telp. (0361) 239079.239080 Fax. (0361) 261246";
    public $ttd_salinan = [
        [
            'JABATAN' => 'Kepala Bidang PBB & BPHTB', 
            'NAMA' => 'Fathul Bahri, SE',
            'NIP' => 'NIP. 19580630 199503 1 001'
        ],        
        [
            'JABATAN' => 'Kasi Pendataan dan Pendaftaran PBB & BHPTB', 
            'NAMA' => 'Janwaril Adhatulahad, S.Sos',
            'NIP' => 'NIP. 19740113 199803 2 005'
        ],
        [
            'JABATAN' => 'Kasi Penagihan dan Keberatan PBB & BHPTB', 
            'NAMA' => 'Jamaluddin, SE',
            'NIP' => 'NIP. 19720414 200012 1 002'
        ],
        [
            'JABATAN' => 'Kasi Penilaian dan Penetapan PBB & BPHTB', 
            'NAMA' => 'Adji Sadly Saputera, S.Kom',
            'NIP' => 'NIP. 19720308 200604 1 015'
        ],
    ];

    public $sk_njop = array(
        'peraturan' => 'Peraturan Daerah Kota Denpasar No. 4 Tahun 2012 tentang PBB-P2',
        'nama_pj' => 'I Dewa Nyoman Semadi, S.E., M.Si.',
        'jabatan_pj' => 'Kepala Badan Pendapatan Daerah Kota Denpasar',
        'pangkat_pj' => 'Pembina Utama Muda',
        'nip_pj' => '19641231 199011 1 008',
        'ttd_lokasi' => 'Denpasar',
        'ttd_kabupaten' => 'Kota Denpasar',
        'ttd_instansi' => 'Kepala Badan Pendapatan Daerah'
    );
}
