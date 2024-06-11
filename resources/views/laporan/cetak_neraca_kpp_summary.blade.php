@extends('kerangka.master')

@section('title', "Neraca Tahun ".$post_data['tahun_neraca'].' '.$post_data['tahun_awal'] .' s/d '.$post_data['tahun_akhir'].' ('.$post_data['per_tanggal'].')')

@section('content')

<body>
<a href="{{ route($routeName) }}"><button type="button" class="btn-primary m-4">Kembali</button></a>

<div>
    <?php
        $total = [
            'SISA' => 0,
            'POKOK' => 0,
            'DENDA' => 0,
            'TOTAL' => 0,
            'PENYISIHAN' => 0,
        ];
    ?>

    <table class="table table-hover">
        <thead>
            <tr>
                <th>TAHUN</th>
                <th>AWAL</th>
                <th>POKOK</th>
                <th>DENDA</th>
                <th>TOTAL</th>
                <th>SISA</th>
                <th>PENYISIHAN</th>
                <th>NETTO</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $thn => $val)
                <?php
                    $sisa = $val['SISA'] ?? 0;
                    $total['POKOK'] += $val['POKOK'];
                    $total['DENDA'] += $val['DENDA'];
                    $total['TOTAL'] += $val['TOTAL'];
                    $total['PENYISIHAN'] += $val['PENYISIHAN'];
                ?>
                <tr>
                    <td>{{ $thn }}</td>
                    <td>{{ isset($val['SISA']) ? number_format($val['SISA'], 0, '', '.') : 'Data tidak ditemukan' }}</td>
                    <td>{{ number_format($val['POKOK'], 0, '', '.') }}</td>
                    <td>{{ number_format($val['DENDA'], 0, '', '.') }}</td>
                    <td>{{ number_format($val['TOTAL'], 0, '', '.') }}</td>
                    <td>{{ isset($val['SISA'], $val['POKOK']) ? number_format($val['SISA'] - $val['POKOK'], 0, '', '.') : 'Data tidak ditemukan' }}</td>
                    <td>{{ number_format($val['PENYISIHAN'], 0, '', '.') }}</td>
                    <td>{{ number_format($val['SISA']?? 0 - $val['POKOK'] - $val['PENYISIHAN'], 0, '', '.') }}</td>
                </tr>
            @endforeach
            <tr>
                <th>Total</th>
                <th>{{ number_format($total['SISA'], 0, '', '.') }}</th>
                <th>{{ number_format($total['POKOK'], 0, '', '.') }}</th>
                <th>{{ number_format($total['DENDA'], 0, '', '.') }}</th>
                <th>{{ number_format($total['TOTAL'], 0, '', '.') }}</th>
                <th>{{ number_format($total['SISA'] - $total['POKOK'], 0, '', '.') }}</th>
                <th>{{ number_format($total['PENYISIHAN'], 0, '', '.') }}</th>
                <th>{{ number_format($total['SISA'] - $total['POKOK'] - $total['PENYISIHAN'], 0, '', '.') }}</th>
            </tr>
        </tbody>
    </table>
    </div>
        </div>
</body>
@endsection