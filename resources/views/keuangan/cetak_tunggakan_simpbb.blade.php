@extends('kerangka.print_master')

@section('title', "Tunggakan ")

@inject('konfigurasi', 'App\Models\Konfigurasi')
@inject('helper', 'App\Services\DateHelper')

@section('content')

<body>
    <div class="print-section">
        <table class="table" style="margin-top: 0px;">
            <tr>
                <td width="20%" style="vertical-align: middle;"><img src="{{ asset('image/logo-small.png') }}" width="90px" /></td>
                <td>
                    <center>
                        <h2 style="font-size: 18px;margin-bottom: 0px">
                            PEMERINTAH {{ $konfigurasi->kabupaten_kop }}<br />
                            {{ $konfigurasi->instansi_kop }}
                        </h2><span style="font-size: 14px">JALAN PAHLAWAN NOMOR 19 TABANAN<br />TELP. (0361) 815333<br />email: {{ $konfigurasi->email }}</span>
                    </center>
                </td>
                <td width="20%"></td>
            </tr>
        </table>
        <hr style="border:1px solid">
        <center>
            <h4>INFORMASI DATA PEMBAYARAN</h4>
        </center>
        <div class="row">
            <div class="col-xs-12" style="font-size:12px"><br />
                <table class="table">
                    <tr>
                        <td style="min-width: 70px; border: none; padding: 2px">NOP</td>
                        <td style="border: none; padding: 2px">:</td>
                        <td style="border: none; padding: 2px">{{ $data_objek['KD_PROPINSI'].'.'.$data_objek['KD_DATI2'].'.'.$data_objek['KD_KECAMATAN'].'.'.$data_objek['KD_KELURAHAN'].'.'.$data_objek['KD_BLOK'].'.'.$data_objek['NO_URUT'].'.'.$data_objek['KD_JNS_OP']}}</td>

                        <td style="border: none; padding: 2px">Luas Bumi (m<sup>2</sup>)</td>
                        <td style="border: none; padding: 2px">:</td>
                        <td style="border: none; padding: 2px">{{ number_format($data_objek['LUAS_BUMI'], 0, "," , "." ); }}</td>
                    </tr>
                    <tr>
                        <td style="border: none; padding: 2px">Nama</td>
                        <td style="border: none; padding: 2px">:</td>
                        <td style="border: none; padding: 2px">{{ $data_subjek['NM_WP'] }}</td>

                        <td style="border: none; padding: 2px">NJOP Bumi (m<sup>2</sup>) / Kelas</td>
                        <td style="border: none; padding: 2px">:</td>
                        <td style="border: none; padding: 2px">
                            {{ $data_objek['LUAS_BUMI'] == 0 ? $data_sppt[count($data_sppt)-1]['NJOP_BUMI_SPPT']. ' / '.$data_sppt[count($data_sppt)-1]['KD_KLS_TANAH'] : number_format($data_sppt[count($data_sppt)-1]['NJOP_BUMI_SPPT']/$data_objek['LUAS_BUMI'], 0, "," , "." ). ' / '.$data_sppt[count($data_sppt)-1]['KD_KLS_TANAH'] }}
                        </td>
                    </tr>
                    <tr>
                        <td style="border: none; padding: 2px">Alamat WP</td>
                        <td style="border: none; padding: 2px">:</td>
                        <td style="border: none; padding: 2px">{{ $data_subjek['JALAN_WP'].' RT '. $data_subjek['RT_WP']. ' ' .$data_subjek['KELURAHAN_WP'] }}</td>

                        <td style="border: none; padding: 2px">Luas Bangunan (m<sup>2</sup>)</td>
                        <td style="border: none; padding: 2px">:</td>
                        <td style="border: none; padding: 2px">{{ number_format($data_sppt[count($data_sppt)-1]['LUAS_BNG_SPPT'], 0, "," , "." ) }}</td>
                    </tr>
                    <tr>
                        <td style="border: none; padding: 2px">Alamat OP</td>
                        <td style="border: none; padding: 2px">:</td>
                        <td style="width: 250px; border: none; padding: 2px">{{ $data_objek['JALAN_OP'].' RT '. $data_objek['RT_OP'].' '.$kelurahan[$data_objek['KD_KECAMATAN']][$data_objek['KD_KELURAHAN']] }}</td>

                        <td style="border: none; padding: 2px">NJOP Bangunan (m<sup>2</sup>) / Kelas</td>
                        <td style="border: none; padding: 2px">:</td>
                        <td style="border: none; padding: 2px">
                            @if($data_sppt[count($data_sppt)-1]['LUAS_BNG_SPPT']>0)
                            {{ number_format($data_sppt[count($data_sppt)-1]['NJOP_BNG_SPPT']/$data_sppt[count($data_sppt)-1]['LUAS_BNG_SPPT'], 0, "," , "." ). ' / '.$data_sppt[count($data_sppt)-1]['KD_KLS_BNG'] }}
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td style="border: none; padding: 2px">Tanggal Printout</td>
                        <td style="border: none; padding: 2px">:</td>
                        <td style="width: 250px; border: none; padding: 2px">{{ $helper->tglIndo(date("Y-m-d")) }}</td>

                        <td style="border: none; padding: 2px">Petugas Cetak</td>
                        <td style="border: none; padding: 2px">:</td>
                        <td style="border: none; padding: 2px">{{ Auth::user()->fullname}}</td>
                    </tr>
                </table>
                <div class="row">
                    <div class="col-xs-12" style="font-size:12px">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th style="border:1px solid;padding:2px">TAHUN</th>
                                    <th style="border:1px solid;padding:2px">NAMA</th>
                                    <th style="border:1px solid;padding:2px">POKOK PBB</th>
                                    <th style="border:1px solid;padding:2px">PENGURANGAN</th>
                                    <th style="border:1px solid;padding:2px">DENDA</th>
                                    <th style="border:1px solid;padding:2px">JATUH TEMPO</th>
                                    <th style="border:1px solid;padding:2px">DIBAYAR</th>
                                    <th style="border:1px solid;padding:2px">TGL BAYAR</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

use Illuminate\Support\Facades\Auth;

                                $TOTAL_POKOK = 0;
                                $TOTAL_DENDA = 0;
                                $TOTAL_TAGIHAN = 0;
                                foreach ($data_sppt as $key => $value) {
                                    $model_sppt = $model_sppt;

                                    $DENDA_SPPT = isset($data_pembayaran[$value['THN_PAJAK_SPPT']]['DENDA_SPPT']) ? $data_pembayaran[$value['THN_PAJAK_SPPT']]['DENDA_SPPT'] : 0;
                                    $JML_BAYAR = isset($data_pembayaran[$value['THN_PAJAK_SPPT']]['JML_BAYAR']) ? $data_pembayaran[$value['THN_PAJAK_SPPT']]['JML_BAYAR'] : 0;
                                    $TGL_BAYAR =  isset($data_pembayaran[$value['THN_PAJAK_SPPT']]['TGL_PEMBAYARAN_SPPT']) ? $data_pembayaran[$value['THN_PAJAK_SPPT']]['TGL_PEMBAYARAN_SPPT'] : '';

                                    $POKOK_BAYAR = $JML_BAYAR - $DENDA_SPPT;

                                    $TAGIHAN = 0;
                                    if ($value['STATUS_PEMBAYARAN_SPPT'] == 0)
                                        $TAGIHAN = $value['PBB_YG_HARUS_DIBAYAR_SPPT'] - $POKOK_BAYAR;

                                    $kurang = '';
                                    if ($POKOK_BAYAR > 0 && $TAGIHAN > 0 && $value['STATUS_PEMBAYARAN_SPPT'] == 0) {
                                        $kurang = ' (K)';
                                    }

                                    if ($TAGIHAN < 0) $TAGIHAN = 0;
                                    $denda = 0;
                                    if ($TAGIHAN > 0) {

                                        /*
						 * PENYESUAIAN TANGGAL DI ORACLE
						 * $datePart = date_parse_from_format('d-M-y', $value['TGL_JATUH_TEMPO_SPPT']);
						 */
                                        $datePart = date_parse_from_format('Y-m-d', $value['TGL_JATUH_TEMPO_SPPT']);
                                        if (empty($datePart['month'])) {
                                            $tgl = explode('-', $value['TGL_JATUH_TEMPO_SPPT']);
                                            if ($tgl[1] == 'DES') $datePart['month'] = '12';
                                            if ($tgl[1] == 'OKT') $datePart['month'] = '10';
                                            if ($tgl[1] == 'MEI') $datePart['month'] = '05';
                                            if ($tgl[1] == 'AGU') $datePart['month'] = '08';
                                        }
                                        $denda = 0;


                                        if ($data_objek['KD_PROPINSI'] == '51' && $data_objek['KD_DATI2'] = '71' && $value['FAKTOR_PENGURANG_SPPT'] > 0 && $value['STATUS_PEMBAYARAN_SPPT'] == '0')
                                            $denda = 0;
                                        else {
                                            $denda = $model_sppt->hitungDenda($datePart, $value['PBB_YG_HARUS_DIBAYAR_SPPT']);
                                            if ($DENDA_SPPT > 0) {
                                                $denda = $denda - $DENDA_SPPT;
                                            }
                                        }





                                        if ($value['STATUS_PEMBAYARAN_SPPT'] == '0') {
                                            $TOTAL_DENDA += $denda;
                                            $TOTAL_POKOK += $TAGIHAN;
                                            $TAGIHAN += $denda;
                                            $TOTAL_TAGIHAN += $TAGIHAN;
                                        }
                                    }

                                    if (!$show_all && $TAGIHAN == 0) continue;
                                ?>
                                    <tr>
                                        <td style="border:1px solid;padding:2px;text-align: center;"><?= $value['THN_PAJAK_SPPT'] ?></td>
                                        <td style="border:1px solid;padding:2px"><?= $value['NM_WP_SPPT'] ?></td>
                                        <td style="text-align:right;border:1px solid;padding:2px"><?= number_format($value['STATUS_PEMBAYARAN_SPPT'] == '0' ? $value['PBB_TERHUTANG_SPPT'] : $value['PBB_YG_HARUS_DIBAYAR_SPPT'], 0, ",", ".") ?></td>
                                        <td style="text-align:right;border:1px solid;padding:2px"><?= number_format($value['FAKTOR_PENGURANG_SPPT'], 0, ",", ".") ?></td>
                                        <td style="text-align:right;border:1px solid;padding:2px"><?= number_format($value['STATUS_PEMBAYARAN_SPPT'] == '1' ? $DENDA_SPPT : $denda, 0, ",", ".") ?>
                                        </td>
                                        <td style="border:1px solid;padding:2px;text-align: right;"><?= date("d-m-Y", strtotime($value['TGL_JATUH_TEMPO_SPPT'])) ?></td>
                                        <td style="text-align:right;border:1px solid;padding:2px"><?= number_format($JML_BAYAR, 0, ",", ".") ?></td>
                                        <td style="border:1px solid;padding:2px; text-align: right;"><?= empty($TGL_BAYAR) ? '' : date("d-m-Y", strtotime($TGL_BAYAR)) . $kurang ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>

                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-6">
                        Unduh aplikasi i-PBB di PlayStore, dan dapatkan SPPT secara Elektronik. Scan QR Code untuk mengunduh aplikasi.<br />
                        <img style="text-align: center;" src="{{ asset('image/i-PBB_Kota_Denpasar.png') }}" width="110px" />
                    </div>
                    <div class="col-xs-6" style="font-size:12px">
                        <table class="table">
                            <tr>
                                <th style="border:1px solid;padding:2px" colspan="2">
                                    <center>TOTAL TAGIHAN</center>
                                </th>
                            </tr>
                            <tr>
                                <th style="border:1px solid;padding:2px">Total Pokok</th>
                                <td style="border:1px solid;padding:2px;text-align: right;"><?= number_format($TOTAL_POKOK, 0, ",", ".") ?></td>
                            </tr>
                            <tr>
                                <th style="border:1px solid;padding:2px">Total Denda</th>
                                <td style="border:1px solid;padding:2px;text-align: right;"><?= number_format($TOTAL_DENDA, 0, ",", ".") ?></td>
                            </tr>
                            <tr>
                                <th style="border:1px solid;padding:2px;">Total</th>
                                <td style="border:1px solid;padding:2px;text-align: right;"><?= number_format($TOTAL_TAGIHAN, 0, ",", ".") ?></td>
                            </tr>
                        </table>
                        <?php if (isset($post_data['ttd'])) : ?>
                            <center>
                                <table>
                                    <tr>
                                        <th style="text-align:center">Kota Denpasar, <?= App\Services\DateHelper::tglIndo(date('Y-m-d')) ?></th>
                                    </tr>
                                    <tr>
                                        <th style="text-align:center">Petugas Penerima</th>
                                    </tr>
                                    <tr>
                                        <th>&nbsp;</th>
                                    </tr>
                                    <tr>
                                        <th>&nbsp;</th>
                                    </tr>
                                    <tr>
                                        <th style="text-align:center"><?= Auth::user()->fullname ?></th>
                                    </tr>

                                </table>
                            </center>
                        <?php endif; ?>
                    </div>
                </div>
</body>

<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        window.print();
    });
</script>

@endsection