@extends('kerangka.print_master')

@section('title', 'Realisasi Kelurahan')

@section('content')

<body>
    <div class="print-section">
        <center>
            <h3>SPPT Tahun {{ $tahun }}</h3>
            <h4>Tanggal Realisasi {{ $tanggal_realisasi }}</h4>
        </center>

        <?php
        $total_pokok = 0;
        $total_pokok_dibayar = 0;
        $total_denda_dibayar = 0;
        $total_dibayar = 0;
        $total_kurang_bayar = 0;
        $total_lebih_bayar = 0;
        ?>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kecamatan</th>
                    <th>Kelurahan</th>
                    <th>Pokok</th>
                    <th>Pokok Dibayar</th>
                    <th>Denda Dibayar</th>
                    <th>Total Dibayar</th>
                    <th>Kurang Bayar</th>
                    <th>Lebih Bayar</th>
                    <th>%</th>
                </tr>
            </thead>
            <tbody>

                @foreach($val as $item)
                <?php
                $total_pokok += $item->POKOK_TERHUTANG;
                $total_pokok_dibayar += $item->POKOK_BAYAR;
                $total_denda_dibayar += $item->DENDA_BAYAR;
                $total_dibayar += $item->JUMLAH_BAYAR;
                $total_kurang_bayar += $item->KURANG_BAYAR;
                $total_lebih_bayar += $item->LEBIH_BAYAR;
                ?>

                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $item->NM_KECAMATAN }}</td>
                    <td>{{ $item->NM_KELURAHAN }}</td>
                    <td>{{ number_format($total_pokok,0,'','.') }}</td>
                    <td>{{ number_format($total_pokok_dibayar,0,'','.') }}</td>
                    <td>{{ number_format($total_denda_dibayar,0,'','.') }}</td>
                    <td>{{ number_format($total_dibayar,0,'','.') }}</td>
                    <td>{{ number_format($total_kurang_bayar,0,'','.') }}</td>
                    <td>{{ number_format($total_lebih_bayar,0,'','.') }}</td>
                    <td>{{ $item->POKOK_TERHUTANG > 0 ? number_format(($item->POKOK_BAYAR / $item->POKOK_TERHUTANG) * 100, 2, ',', '.') : 0 }} %</td>
                </tr>
                @endforeach

                <tr>
                    <td colspan="3">Total</td>
                    <td>{{ number_format($total_pokok, 0, '', '.') }}</td>
                    <td>{{ number_format($total_pokok_dibayar, 0, '', '.') }}</td>
                    <td>{{ number_format($total_denda_dibayar, 0, '', '.') }}</td>
                    <td>{{ number_format($total_dibayar, 0, '', '.') }}</td>
                    <td>{{ number_format($total_kurang_bayar, 0, '', '.') }}</td>
                    <td>{{ number_format($total_lebih_bayar, 0, '', '.') }}</td>
                    <td>{{ $total_pokok > 0 ? number_format(($total_pokok_dibayar / $total_pokok) * 100, 2, ',', '.') : 0 }} %</td>
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