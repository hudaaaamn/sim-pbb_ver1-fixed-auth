@extends('kerangka.print_master')

@section('title', "Informasi Hasil Input Pelayanan ".$data->KD_PROPINSI.$data->KD_DATI2.$data->KD_KECAMATAN.$data->KD_KELURAHAN.$data->KD_BLOK.$data->NO_URUT.$data->KD_JNS_OP)


@section('content')

<body>
    <div class="print-section">
        <div class="row">
            <div class="col-xs-12">
                <center>
                    <p style="font-size:16px;margin:0;padding:0;font-family:tahoma;font-weight: bold;">INFORMASI HASIL INPUT PELAYANAN PBB-P2</p>
                    <p style="font-size:16px;margin:0;padding:0;font-family:tahoma;font-weight: bold;">TAHUN {{ $tahun }}</p>
                </center>
            </div>
        </div>

        <br /><br />

        <div class="row">
            <p style="font-size:14px;margin:0;padding:0;text-align:justify;font-family:tahoma;">
                Sesuai dengan proses pelayanan PBB-P2 dengan No : {{ $no_pelayanan }} Tanggal : {{ substr($tanggal_pelayanan, 8, 2) . '-' . substr($tanggal_pelayanan, 5, 2) . '-' . substr($tanggal_pelayanan, 0, 4) }} data objek pajak,
            </p>
            <br />
            <table cellspacing="0" cellpadding="0" border="0px" width="100%" style="font-size:14px;font-family:tahoma;">
                <tr>
                    <td colspan="6" style="font-weight: bold;">&emsp; &emsp; Sebelum Pelayanan :</td>
                </tr>
                <tr>
                    <td width="30%">&emsp; &emsp; Nomor Objek Pajak</td>
                    <td colspan="5">: {{ $data->KD_PROPINSI.'.'.$data->KD_DATI2.'.'.$data->KD_KECAMATAN.'.'.$data->KD_KELURAHAN.'.'.$data->KD_BLOK.'-'.$data->NO_URUT.'.'.$data->KD_JNS_OP }}</td>
                </tr>
                <tr>
                    <td>&emsp; &emsp; Nama Wajib Pajak</td>
                    <td colspan="5">: {{ $data->NAMA_LAMA }}</td>
                </tr>
                <tr>
                    <td>&emsp; &emsp; Alamat Wajib Pajak</td>
                    <td colspan="5">: {{ $data->JALAN_WP_LAMA }}</td>
                </tr>
                <tr>
                    <td>&emsp; &emsp; Letak Objek Pajak</td>
                    <td colspan="5">: {{ $data->JALAN_OP_BARU }}</td>
                </tr>
                <tr>
                    <td>&emsp; &emsp; Luas Bumi</td>
                    <td colspan="5">: {{ number_format($data->LUAS_BUMI_LAMA,0,'','.') }} m<sup>2</sup></td>
                </tr>
                <tr>
                    <td>&emsp; &emsp; Luas Bangunan</td>
                    <td colspan="5">: {{ number_format($data->LUAS_BNG_LAMA,0,'','.') }} m<sup>2</sup></td>
                </tr>
                <tr>
                    <td>&emsp; &emsp; NJOP Bumi (Rp.)</td>
                    <td>: {{ number_format($data->LUAS_BUMI_LAMA,0,'','.') }} m<sup>2</sup> </td>
                    <td>x</td>
                    <td>
                        @if($data->LUAS_BUMI_LAMA !== null && $data->LUAS_BUMI_LAMA !== 0)
                        {{ number_format($data->NJOP_BUMI_TOTAL_LAMA / $data->LUAS_BUMI_LAMA, 0, '', '.') }}
                        @else
                        {{ number_format($data->NJOP_BUMI_TOTAL_LAMA, 0, '', '.') . '/' . number_format($data->LUAS_BUMI_LAMA ?? 0, 0, '', '.') }}
                        @endif

                    </td>
                    <td>=</td>
                    <td>{{ number_format($data->NJOP_BUMI_TOTAL_LAMA,0,'','.') }}</td>
                </tr>
                <tr>
                    <td>&emsp; &emsp; NJOP Bangunan (Rp.)</td>
                    <td>: {{ number_format($data->LUAS_BNG_LAMA,0,'','.') }} m<sup>2</sup>
                    <td>x</td>
                    </td>
                    <td>{{ $data->LUAS_BNG_LAMA!=0 ? number_format($data->NJOP_BNG_TOTAL_LAMA/$data->LUAS_BNG_LAMA,0,'','.') : 0 }} </td>
                    <td>=</td>
                    <td>{{ number_format($data->NJOP_BNG_TOTAL_LAMA,0,'','.') }}</td>
                </tr>
            </table>
        </div>

        <br />

        <div class="row">
            <p style="font-size:14px;margin:0;padding:0;text-align:justify;font-family:tahoma;">
                SPPT untuk Tahun {{ $tahun+1 }} sebagai berikut:
            </p>
            <br />
            <table cellspacing="0" cellpadding="0" border="0px" width="100%" style="font-size:14px;font-family:tahoma;">
                <tr>
                    <td colspan="6" style="font-weight: bold;">&emsp; &emsp; Hasil Input Pelayanan :</td>
                </tr>
                <tr>
                    <td width="30%">&emsp; &emsp; Nomor Objek Pajak</td>
                    <td colspan="5">: {{ $data->KD_PROPINSI.$data->KD_DATI2.$data->KD_KECAMATAN.$data->KD_KELURAHAN.$data->KD_BLOK.$data->NO_URUT.$data->KD_JNS_OP }}</td>
                </tr>
                <tr>
                    <td>&emsp; &emsp; Nama Wajib Pajak</td>
                    <td colspan="5">: {{ $data->NAMA_BARU }}</td>
                </tr>
                <tr>
                    <td>&emsp; &emsp; Alamat Wajib Pajak</td>
                    <td colspan="5">: {{ $data->JALAN_WP_BARU }}</td>
                </tr>
                <tr>
                    <td>&emsp; &emsp; Letak Objek Pajak</td>
                    <td colspan="5">: {{ $data->JALAN_OP_BARU }}</td>
                </tr>
                <tr>
                    <td>&emsp; &emsp; Luas Bumi</td>
                    <td colspan="5">: {{ number_format($data->LUAS_BUMI_BARU,0,'','.') }} m<sup>2</sup></td>
                </tr>
                <tr>
                    <td>&emsp; &emsp; Luas Bangunan</td>
                    <td colspan="5">: {{ number_format($data->LUAS_BNG_BARU,0,'','.') }} m<sup>2</sup></td>
                </tr>
            </table>
        </div>

        <br />

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                window.print();
            });
        </script>
    </div>

</body>

@endsection