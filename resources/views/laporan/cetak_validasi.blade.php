@extends('kerangka.master')

@section('title', 'Realisasi Kelurahan'.$data1[0]['KD_PROPINSI'].$data1[0]['KD_DATI2'].$data1[0]['KD_KECAMATAN'].$data1[0]['KD_KELURAHAN'].$data1[0]['KD_BLOK'].$data1[0]['NO_URUT'].$data1[0]['KD_JNS_OP'])

@inject('konfigurasi', 'App\Models\Konfigurasi')

<style>
    @media print {
        #header, #footer { display:none; }
    }
</style>

@section('content')

<body>
    <div class="row">
        <table style="font-size:14px;cellspacing=0;cellpadding=0;line-height:1px;" border="0px" width="100%" cellspacing="0px" cellpadding="0px">
            <tr height='1px'><td align="center" rowspan="4" width="160px"><img src="image/logo.png" height="80px" width="90px" /></td><td align="center" style="font-size:20px; !important;font-family:'Times New Roman';font-weight: bold;">PEMERINTAH KOTA DENPASAR</td><td width="100px"></td></tr>
            <tr height='1px'><td align="center" style="font-size:20px;font-family:'Times New Roman';font-weight: bold;">BADAN PENDAPATAN DAERAH</td><td></td></tr>
            <tr height='1px'><td align="center" style="font-size:15px;font-family:'Times New Roman';">Jl. Letda Tantular No. 12 Denpasar</td><td></td></tr>
            <tr height='1px'><td align="center" style="font-size:15px;font-family:'Times New Roman';">Telp. (0361) 239079 / 239080 Fax. (0361) 261246</td><td></td></tr>
        </table>

        <hr style="min-width:100%; display:block; background:transparent; height:2px; margin-top:5px !important; margin-bottom:7px !important; border: none; border-top: solid 2px #aaa;"/>
    </div>
    <!--
    <div class="row">
        <div class="col-xs-12">
        <div class="col-xs-2"><center><img src="image/logo.png" width="40px" style="padding: 2px;"/></center></div>
        <div class="col-xs-10" style="font-size:16px">
            <b>
            PEMERINTAH <?= $konfigurasi->kabupaten_kop ?><br />
            <?= $konfigurasi->instansi_kop ?></b>
        </div>
        </div>
    </div>
    <hr/>
    -->

    <div class="row">
        <div class="col-xs-12">
        <center>
            <p style="font-size:14px;margin:0;padding:0;font-weight: bold;">BERITA ACARA VALIDASI DAN VERIFIKASI DATA PIUTANG PBB-P2 KOTA DENPASAR</p>
        </center>
        </div>
    </div>
    <p font-size="7"></p>
    <div class="row">
        <p style="font-size:12px;margin:0;padding:0;text-align:justify;margin-bottom:5px !important;">
        Pada hari ini, ....................... tanggal ......................................., Tim Validasi dan Verifikasi Pajak Bumi dan Bangunan Perdesaan dan Perkotaan (PBB-P2) telah melakukan validasi dan verifikasi terhadap objek pajak berikut :
        </p>
        <table cellspacing="0px" cellpadding="0px" border="0px" width="80%" style="font-size:12px;margin-left:40px;line-height:0px;cellspacing:0px;cellpadding:0px;">	
            <tr height='15px'><td width="200px">Nomor Objek Pajak</td><td>: <?= $data1[0]['KD_PROPINSI'].'.'.$data1[0]['KD_DATI2'].'.'.$data1[0]['KD_KECAMATAN'].'.'.$data1[0]['KD_KELURAHAN'].'.'.$data1[0]['KD_BLOK'].'-'.$data1[0]['NO_URUT'].'.'.$data1[0]['KD_JNS_OP'] ?></td></tr>
            <tr height='15px'><td>Nama Wajib Pajak</td><td>: <?= $data1[0]['NM_WP_SPPT'] ?></td></tr>
            <tr height='15px'><td>Alamat Wajib Pajak</td><td>: <?= $data1[0]['JLN_WP_SPPT'],', ',$data1[0]['BLOK_KAV_NO_WP_SPPT'] ?></td></tr>
            <tr height='15px'><td>Alamat Objek Pajak</td><td>: <?= $data1[0]['JALAN_OP'],', ',$data1[0]['BLOK_KAV_NO_OP'] ?></td></tr>
            <tr height='15px'><td>Kecamatan Objek Pajak</td><td>: <?= $data1[0]['NM_KECAMATAN'] ?></td></tr>
            <tr height='15px'><td>Kelurahan Objek Pajak</td><td>: <?= $data1[0]['NM_KELURAHAN'] ?></td></tr>
            <tr height='15px'><td>Luas Bumi</td><td>: <?= number_format($data1[0]['LUAS_BUMI_SPPT'], 0, ',', '.').' m<sup>2</sup>' ?></td></tr>
            <tr height='15px'><td>Luas Bangunan</td><td>: <?= number_format($data1[0]['LUAS_BNG_SPPT'], 0, ',', '.').' m<sup>2</sup>' ?></td></tr>
            <tr height='15px'><td>Tanggal Cetak</td><td>: <?= date('d-m-Y') ?></td></tr>
        </table>
        <p font-size="7"></p>
        <table bordercolor="#999999" border="1" width="100%" style="font-size:12px;line-height:1px;cellspacing:1;cellpadding:1;">
            <thead>
                <tr height='20px'>
                    <th width='10px' style="text-align:center; ">NO</th><th width='10px' style="text-align:center;">TAHUN</th><th width='100px' style="text-align:center;">TAGIHAN</th><th width='80px' style="text-align:center;">TANGGAL BAYAR</th><th width='200px' style="text-align:center;">*) KETERANGAN</th>
                </tr>
            </thead>		
            <tbody>			
                <?php $i=1 ?>
                <?php foreach($data2 as $value){ ?>
                
                <tr height='15px'>
                    <td align="center"><?= $i ?></td><td align="center"><?= $value['THN_PAJAK_SPPT'] ?></td><td align="right"><?= number_format($value['PBB_YG_HARUS_DIBAYAR_SPPT'], 0, ',', '.'),',00' ?></td>
                    <td align="center">
                        <?php
                            if(empty($value['TGL_PEMBAYARAN_SPPT'])){
                                echo "-";
                            }else{
                                echo $value['TGL_PEMBAYARAN_SPPT'];
                            }
                        ?>
                    </td>
                    <td></td>
                </tr>

                <?php $i++ ?>			
                <?php } ?>
            </tbody>
        </table>
        <p style="font-size:10.4px;margin:0;padding:0;text-align:justify;margin-bottom:5px !important;">
        *) Untuk yang mempunyai bukti bayar / STTS, tetapi pada status bayar belum lunas, diisi tanggal pembayaran pada kolom keterangan
        </p>
    </div>
    <p font-size="7"></p>

    <div class="row">
        <p style="font-size:12px;margin:0;padding:0;text-align:justify;margin-bottom:5px !important;">
            Hasil Validasi :
        </p>
        <table bordercolor="#999999" border="0" style="font-size:12px;cellspacing:0px;cellpadding:0px;line-height:1px;" width="100%" cellspacing="0px" cellpadding="0px">
            <tr height='15px'>
                <td width='30px' align="center"><table border="1" height="12px" width="12px"><tr><td></td></tr></table></td>
                <td style="text-align:left;">
                    Kode 1, Objek Pajak tidak dapat ditemukan lokasinya dilapangan
                </td>
            </tr>
            <tr height='15px'>
                <td width='30px' align="center"><table border="1" height="12px" width="12px"><tr><td></td></tr></table></td>
                <td style="text-align:left; ">
                    Kode 2, Objek Pajak memiliki dua atau lebih NOP untuk lokasi yang sama
                </td>
            </tr>
            <tr height='15px'>
                <td width='30px' align="center"><table border="1" height="12px" width="12px"><tr><td></td></tr></table></td>
                <td style="text-align:left; ">
                    Kode 3, Objek Pajak yang subjek pajaknya tidak dapat teridentifikasi dengan jelas atau objek pajak sudah terjual
                </td>
            </tr>
            <tr height='15px'>
                <td width='30px' align="center"><table border="1" height="12px" width="12px"><tr><td></td></tr></table></td>
                <td style="text-align:left; ">
                    Kode 4, Objek Pajak yang subjek pajaknya teridentifikasi dengan jelas
                </td>
            </tr>
            <tr height='15px'>
                <td width='30px' align="center"><table border="1" height="12px" width="12px"><tr><td></td></tr></table></td>
                <td style="text-align:left; ">
                    Kode 5, Objek Pajak dan subjek pajaknya teridentifikasi tetapi data tidak sesuai
                </td>
            </tr>
        </table>
    </div>
    <p font-size="7"></p>

    <div class="row">
        <table bordercolor="#E6E6E6" border="0" style="font-size:12px;" width="100%">
            <tbody>			
                <tr height='15px'>
                    <td width='100%'>Keterangan :</td>
                </tr>
                <tr height='25px'>
                    <td>....................................................................................................................................................................................................................................................</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="row">
        <p style="font-size:12px;margin:0;padding:0;text-align:justify;margin-bottom:5px !important;">
        Selanjutnya dengan ini menyatakan bahwa data yang diisi diatas adalah benar sebagaimana mestinya, dan dapat dipertanggungjawabkan untuk kegiatan validasi PBB-P2.
        </p>
        <p font-size="7"></p>
        <table bordercolor="#E6E6E6" border="0" style="font-size:12px;" width="100%">
            <tbody>			
                <tr height='25px'>
                    <td width='50%' style="text-align:center; ">Menyetujui Hasil Validasi<br/>Wajib Pajak<br/><br/><br/><br/><br/>(.................................................................................)</td><td width='50%' style="text-align:center; "><br/>Kadus / Kaling<br/><br/><br/><br/><br/>(.................................................................................)</td>
                </tr>
                <tr height='15px'>
                    <td style="text-align:left;" colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; No HP :</td>
                </tr>
                <tr height='15px'>
                    <td style="text-align:left;" colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Alamat :</td>
                </tr>	
                <tr height='15px'>
                    <td style="text-align:left;" colspan="2"><br/><br/></td>
                </tr>
                <tr height='25px'>
                    <td width='50%' style="text-align:center; ">Petugas<br/><br/><br/><br/><br/><br/>(.................................................................................)</td><td width='50%' style="text-align:center; ">Koordinator<br/><br/><br/><br/><br/><br/>(.................................................................................)</td>
                </tr>
            </tbody>
        </table>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                window.print();
            });
        </script>
    </div>

</body>

@endsection