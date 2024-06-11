@extends('kerangka.print_master')

@section('title', "Informasi PBB".$data->KD_PROPINSI.$data->KD_DATI2.$data->KD_KECAMATAN.$data->KD_KELURAHAN.$data->KD_BLOK.$data->NO_URUT.$data->KD_JNS_OP)

@inject('konfigurasi', 'App\Models\Konfigurasi')

@section('content')

<body>
    <div class="print-section">
        <!--<div class="row">
        <div class="col-xs-12">
        <div class="col-xs-2"><center><img src="image/logo.png" width="40px" style="padding: 2px;"/></center></div>
        <div class="col-xs-10" style="font-size:16px">
            <b>
            PEMERINTAH <?= $konfigurasi->kabupaten_kop ?><br />
            <?= $konfigurasi->instansi_kop ?></b>
        </div>
        </div>
    </div>
    <hr/>-->

        <div class="row">
            <div class="col-xs-12">
                <center>
                    <p style="font-size:14px;margin:0;padding:0;">INFORMASI PELAYANAN</p>
                    <p style="font-size:12px;margin:0;padding:0;">PAJAK BUMI DAN BANGUNAN PERDESAAN DAN PERKOTAAN</p>
                </center>
            </div>
        </div>
        <br />
        <br />
        <div class="row">
            <p style="font-size:14px;margin:0;padding:0;">
                Sesuai dengan proses pelayanan PBB-P2 dengan No : {{ $no_pelayanan }} Tanggal : {{ substr($tanggal_pelayanan, 8, 2) . '-' . substr($tanggal_pelayanan, 5, 2) . '-' . substr($tanggal_pelayanan, 0, 4) }}
                akan diterbitkan SPPT untuk Tahun {{ $tahun + 1 }} sebagai berikut:
            </p>

            <table cellspacing="0" cellpadding="0" border="0px" width="100%" style="font-size:14px;">
                <tr>
                    <td>Nomor Objek Pajak</td>
                    <td colspan="5">: {{ $data->KD_PROPINSI.'.'.$data->KD_DATI2.'.'.$data->KD_KECAMATAN.'.'.$data->KD_KELURAHAN.'.'.$data->KD_BLOK.'-'.$data->NO_URUT.'.'.$data->KD_JNS_OP }}</td>
                </tr>
                <tr>
                    <td>Nama Wajib Pajak</td>
                    <td colspan="5">: {{ $data->NAMA_BARU }}</td>
                </tr>
                <tr>
                    <td>Alamat Wajib Pajak</td>
                    <td colspan="5">: {{ $data->JALAN_WP_BARU }}</td>
                </tr>
                <tr>
                    <td>Letak Objek Pajak</td>
                    <td colspan="5">: {{ $data->JALAN_OP_BARU }}</td>
                </tr>
                <tr>
                    <td>Luas Bumi</td>
                    <td colspan="5">: {{ number_format($data->LUAS_BUMI_BARU, 0, '', '.') }} m<sup>2</sup></td>
                </tr>
                <tr>
                    <td>Luas Bangunan</td>
                    <td colspan="5">: {{ number_format($data->LUAS_BNG_BARU, 0, '', '.') }} m<sup>2</sup></td>
                </tr>
                <tr>
                    <td>NJOP Bumi (Rp.)</td>
                    <td>: {{ number_format($data->LUAS_BUMI_BARU, 0, '', '.') }} m<sup>2</sup> </td>
                    <td>x</td>
                    <td>
                        @if($data->LUAS_BUMI_BARU != 0)
                        {{ number_format($data->NJOP_BUMI_TOTAL_BARU / $data->LUAS_BUMI_BARU, 0, '', '.') }}
                        @else
                        {{ number_format($data->NJOP_BUMI_TOTAL_BARU, 0, '', '.') . '/' . number_format($data->LUAS_BUMI_BARU, 0, '', '.') }}
                        @endif
                    </td>
                    <td>=</td>
                    <td>{{ number_format($data->NJOP_BUMI_TOTAL_LAMA, 0, '', '.') }}</td>
                </tr>
                <tr>
                    <td>NJOP Bangunan (Rp.)</td>
                    <td>: {{ number_format($data->LUAS_BNG_BARU, 0, '', '.') }} m<sup>2</sup>
                    <td>x</td>
                    </td>
                    <td>{{ $data->LUAS_BNG_BARU != 0 ? number_format($data->NJOP_BNG_TOTAL_BARU/$data->LUAS_BNG_BARU, 0, '', '.') : 0 }}</td>
                    <td>=</td>
                    <td>{{ number_format($data->NJOP_BNG_TOTAL_BARU, 0, '', '.') }}</td>
                </tr>
            </table>

        </div>
        <br />
        <div class="row">
            <p style="font-size:14px;margin:0;padding:0;">
                Apabila di kemudian hari terdapat kekeliruan akan dibetulkan dan ditindaklanjuti sesuai dengan ketentuan yang berlaku.<br />
            </p>
        </div>

        <br /><br />

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                window.print();
            });
        </script>
    </div>
</body>

@endsection