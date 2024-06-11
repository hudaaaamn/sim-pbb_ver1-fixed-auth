@extends('kerangka.master')

@section('title', 'Summary Neraca BPK')

@section('content')
    <?php
        $title = "NERACA " . $post_data['tahun_awal'] . ' s/d ' . $post_data['tahun_akhir'] . ' (' . $post_data['per_tanggal'] . ')';
    ?>

    <center><h2 style="color: white;">{{ $title }}</h2></center>
    <br/>

    @foreach ($data as $thn => $v)
        <table class="table table-bordered">
            <thead>
                <tr>
                    @if ($thn == $post_data['tahun_akhir'])
                        <th rowspan="2" style="text-align: center">KETETAPAN {{ $thn }}</th>
                        <th colspan="2" style="text-align: center">PENERIMAAN {{ $thn }}</th>
                        <th rowspan="2" style="text-align: center">TOTAL PENERIMAAN {{ $thn }}</th>
                        <th rowspan="2" style="text-align: center">PIUTANG BRUTO</th>
                        <th rowspan="2" style="text-align: center">PENYISIHAN PIUTANG {{ $thn }}</th>
                        <th rowspan="2" style="text-align: center">PIUTANG NETTO {{ $thn }}</th>
                    @else
                        <th rowspan="2" style="text-align: center">TOTAL PIUTANG BRUTO {{ $thn }}</th>
                        <th colspan="2" style="text-align: center">PENERIMAAN {{ $thn }} di {{ $post_data['tahun_akhir'] }}</th>
                        <th rowspan="2" style="text-align: center">TOTAL PENERIMAAN {{ $thn }}</th>
                        <th rowspan="2" style="text-align: center">SISA PIUTANG {{ $thn }}</th>
                        <th rowspan="2" style="text-align: center">PENYISIHAN PIUTANG {{ $thn }}</th>
                        <th rowspan="2" style="text-align: center">PIUTANG NETTO {{ $thn }}</th>
                    @endif
                </tr>
                <tr>
                    <th style="text-align: center">POKOK {{ $thn }}</th>
                    <th style="text-align: center">DENDA {{ $thn }}</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="text-align: right">{{ number_format($v['SISA_AWAL'], 0, '', '.') }}</td>
                    <td style="text-align: right">{{ number_format($v['POKOK_NOW'], 0, '', '.') }}</td>
                    <td style="text-align: right">{{ number_format($v['DENDA_NOW'], 0, '', '.') }}</td>
                    <td style="text-align: right">{{ number_format($v['POKOK_NOW'] + $v['DENDA_NOW'], 0, '', '.') }}</td>
                    <td style="text-align: right">{{ number_format($v['SISA'], 0, '', '.') }}</td>
                    <td style="text-align: right">{{ number_format($v['PENYISIHAN_PIUTANG'], 0, '', '.') }}</td>
                    <td style="text-align: right">{{ number_format($v['NETTO'], 0, '', '.') }}</td>
                </tr>
            </tbody>
        </table>
        <br/>
        <br/>
    @endforeach
@endsection
