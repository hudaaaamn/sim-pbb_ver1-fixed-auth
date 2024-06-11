@extends('kerangka.master')

@section('title', "SK NJOP ".$data->KD_PROPINSI.$data->KD_DATI2.$data->KD_KECAMATAN.$data->KD_KELURAHAN.$data->KD_BLOK.$data->NO_URUT.$data->KD_JNS_OP)

@inject('konfigurasi', 'App\Models\Konfigurasi')


@section('content')

<body>

    <br/><br/><br/><br/><br/><br/>
<div class="print-section">
    <br/>
    <div class="row">
        <div class="col-xs-12">
            <center>
                <p style="font-size:16px;margin:0;padding:0;font-family:tahoma;line-height:200%;">SURAT KETERANGAN</p>
                <p style="font-size:14px;margin:0;padding:0;font-family:tahoma;line-height:200%;">NOMOR : 973 / {{ $no_surat }} / BPDKD</p>
            </center>
        </div>
    </div>
    <br/><br/>
    <div class="row">
        <p style="font-size:14px;margin:0;padding:0;font-family:tahoma;line-height:200%;">Yang bertanda tangan dibawah ini:</p>
        <br/>
        <table cellspacing="0" cellpadding="0" border="0px" width="100%" style="font-size:14px;font-family:tahoma;line-height:200%;">
            <tr>
                <td>&emsp; &emsp; 1. Nama</td>
                <td>: {{ $konfigurasi->sk_njop['nama_pj'] }}</td>
            </tr>
            <tr>
                <td>&emsp; &emsp; 2. Jabatan</td>
                <td>: {{ $konfigurasi->sk_njop['jabatan_pj'] }}</td>
            </tr>
        </table>
    </div>
    <br/>
    <div class="row">
        <p style="font-size:14px;margin:0;padding:0;text-align:justify;font-family:tahoma;line-height:200%;">
        Berdasarkan {{ $konfigurasi->sk_njop['peraturan'] }}, dengan ini menerangkan bahwa, sesuai dengan proses pelayanan PBB-P2 dengan No : {{ $no_pelayanan }} Tanggal : {{ substr($tanggal_pelayanan,8,2).'-'.substr($tanggal_pelayanan,5,2).'-'.substr($tanggal_pelayanan,0,4) }} akan diterbitkan SPPT untuk Tahun {{ $tahun+1 }} sebagai berikut:
        </p>
        <br/>
        <table cellspacing="0" cellpadding="0" border="0px" width="100%" style="font-size:14px;font-family:tahoma;line-height:200%;">
            <tr><td width="30%">&emsp; &emsp; Nomor Objek Pajak</td><td colspan="5">: {{ $data->KD_PROPINSI.'.'.$data->KD_DATI2.'.'.$data->KD_KECAMATAN.'.'.$data->KD_KELURAHAN.'.'.$data->KD_BLOK.'-'.$data->NO_URUT.'.'.$data->KD_JNS_OP }}</td></tr>
            <tr><td>&emsp; &emsp; Nama Wajib Pajak</td><td colspan="5">: {{ $data->NAMA_BARU }}</td></tr>
            <tr><td>&emsp; &emsp; Alamat Wajib Pajak</td><td colspan="5">: {{ $data->JALAN_WP_BARU }}</td></tr>
            <tr><td>&emsp; &emsp; Letak Objek Pajak</td><td colspan="5">: {{ $data->JALAN_OP_BARU }}</td></tr>
            <tr><td>&emsp; &emsp; Luas Bumi</td><td colspan="5">: {{ number_format($data->LUAS_BUMI_BARU,0,'','.') }} m<sup>2</sup></td></tr>
        <tr><td>&emsp; &emsp; Luas Bangunan</td><td colspan="5">: {{ number_format($data->LUAS_BNG_BARU,0,'','.') }} m<sup>2</sup></td></tr>
        </table>

    </div>
    <br/>
    <div class="row">
        <p style="font-size:14px;margin:0;padding:0;text-align:justify;font-family:tahoma;line-height:200%;">
        Apabila di kemudian hari terdapat kekeliruan akan dibetulkan dan ditindaklanjuti sesuai dengan ketentuan yang berlaku.<br/>
        &emsp; &emsp; Demikian Surat Keterangan ini dibuat untuk dapat dipergunakan seperlunya.
        </p>
    </div>

    <br/><br/><br/>

    <table cellspacing="0" cellpadding="0" border="0px" width="100%" style="font-size:14px;font-family:tahoma;">
        <tr>
            <td width="50%">
            </td>
            <td width="50%">
                <center style="font-size:14px">
                    {{ $konfigurasi->sk_njop['ttd_lokasi'] }}, {{ $formattedDate }} <br/>
                    {{ $konfigurasi->sk_njop['ttd_instansi'] }} <br/>
                    {{ $konfigurasi->sk_njop['ttd_kabupaten'] }} <br/>
                    @if($ttd)
                    <img src="{{ asset('/simpbb/web/image/ttd.jpg') }}" alt="some_text">
                    @else
                        <br/><br/>
                    @endif
                    <br/>
                    <u>{{ $konfigurasi->sk_njop['nama_pj'] }}</u> <br/>
                    {{ $konfigurasi->sk_njop['pangkat_pj'] }} <br/>
                    NIP. {{ $konfigurasi->sk_njop['nip_pj'] }}
                </center>
            </td>
        </tr>
    </table>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            window.print();
        });
    </script>
</div>

</body>
@endsection