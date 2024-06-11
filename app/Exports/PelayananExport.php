<?php

namespace App\Exports;

use App\Models\Pelayanan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PelayananExport implements FromCollection, WithHeadings
{

    private $TGL_AWAL;
    private $TGL_AKHIR;
    private $JNS_PELAYANAN;
    private $STATUS_PELAYANAN;

    public function __construct ($TGL_AWAL, $TGL_AKHIR, $JNS_PELAYANAN, $STATUS_PELAYANAN)
    {
        $this->TGL_AWAL = $TGL_AWAL;
        $this->TGL_AKHIR = $TGL_AKHIR;
        $this->JNS_PELAYANAN = $JNS_PELAYANAN;
        $this->STATUS_PELAYANAN = $STATUS_PELAYANAN;
    }   

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $model = new Pelayanan();
        $val =  $model->getLaporan($this->TGL_AWAL, $this->TGL_AKHIR, $this->JNS_PELAYANAN, $this->STATUS_PELAYANAN);
        
        return $val;
    }

    public function headings(): array
    {
        return [
            'No Pelayanan',
            'Nama Pemohon',
            'Tanggal Pelayanan',
            'NOP',
            'Jenis Pelayanan',
            'Status Pelayanan',
            'Keterangan'
        ];
    }
}
