@extends('kerangka.master')

@section('title', 'Realisasi Kelurahan')

@section('content')


<script>
        function setAction(formId, action) {
            $('#' + formId).attr('action', action).submit();
        }
    </script>
<div class="bgn">
    <h1 class="title">Selamat Datang, {{ $fullname }}!</h1>
    <p class="greet">Selamat Datang di Sistem Informasi Pajak Bumi Bangunan</p>
</div>

<div class="data">
    <div class="box-container">
        <div class="detail">
            <div class="recentOrders">
                <div class="cardHeader">
                    <h3>Realisasi Kelurahan</h3>

                    <div class=" p-0 d-flex align-items-start" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                            <li class="breadcrumb-item"><a href="#">Laporan</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Realisasi Kelurahan</li>
                        </ol>
                    </div>
                </div>

                <div class="filterBox">
                    <form method="POST" id="myForm2" enctype="multipart/form-data" class="row g-4 p-3">
                        @csrf
                        <div class="col-md-6">
                            <label for="Tahun" class="form-label">Tahun</label>
                            <input type="number" class="form-control" id="Tahun" name="THN_PAJAK_SPPT" value="{{ date('Y') }}">
                        </div>
                        <div class="col-md-6">
                            <label for="PBBMinimum" class="form-label">PBB Minimum</label>
                            <input type="number" class="form-control" id="PBBMinimum" name="PBB_MIN" value="0">
                        </div>
                        <div class="col-md-6">
                            <label for="PBBMaximum" class="form-label">PBB Maximum</label>
                            <input type="number" class="form-control" id="PBBMaximum" name="PBB_MAX" value="100000000000">
                        </div>
                        <div class="col-md-6">
                            <label for="TanggalRealisasi" class="form-label">Tanggal Realisasi</label>
                            <input type="date" class="form-control" id="TanggalRealisasi" name="TGL_REALISASI" value="{{ date('Y').'-12-31' }}">
                        </div>

                        <div class="col-md-6 d-flex justify-content-end ms-auto">
                            <a href="{{ route('realisasiKel.index') }}">
                                <button type="button" class="btn btn-primary" style="width:150px;">Batal</button>
                            </a>
                        </div>
                        <div class="col-md-6 d-flex justify-content-start me-auto">
                            <a href="#"><button type="button" onclick="setAction('myForm2', '/realisasiKel/lihat')" class="btn btn-primary" style="width:150px;">Lihat</button></a>
                        </div>
                    </form>
                </div>

                <form id="myForm" method="POST" enctype="multipart/form-data" class="dataBox" style="overflow-x: auto;">
                    @csrf
                    @if (isset($val))
                    <div class="pencarian d-flex justify-content-between align-items-end">
                        <p class="m-0">Menampilkan <b>{{ $val->count() }}</b> data</p>
                        <div class="d-flex justify-content-end gap-2">
                            <a href="#"><button type="button" onclick="setAction('myForm', '/realisasiKel/cetak')">Cetak</button></a>
                            <a href="#"><button type="button" onclick="setAction('myForm2', '/realisasiKel/export_excel')">Ekspor Excel</button></a>
                        </div>
                    </div>
                    @endif

                    <div class="dataTable" style="overflow-x: auto;">
                        <table>
                            <thead>
                                <tr>
                                    <td width="50px">No</td>
                                    <td>Kecamatan</td>
                                    <td>Kelurahan</td>
                                    <td>Pokok</td>
                                    <td>Pokok Dibayar</td>
                                    <td>Denda Dibayar</td>
                                    <td>Total Dibayar</td>
                                    <td>Kurang Bayar</td>
                                    <td>Lebih Bayar</td>
                                    <td width="100px" class="text-center">%</td>
                                    <!-- <td>Opsi</td> -->
                                </tr>
                            </thead>

                            <tbody>
                                <?php $total_pokok = 0;
                                $total_pokok_dibayar = 0;
                                $total_denda_dibayar = 0;
                                $total_dibayar = 0;
                                $total_kurang_bayar = 0;
                                $total_lebih_bayar = 0; ?>
                                @if (isset($val))

                                @foreach ($val as $item)
                                <?php $total_pokok += $item->POKOK_TERHUTANG;
                                $total_pokok_dibayar += $item->POKOK_BAYAR;
                                $total_denda_dibayar += $item->DENDA_BAYAR;
                                $total_dibayar += $item->JUMLAH_BAYAR;
                                $total_kurang_bayar += $item->KURANG_BAYAR;
                                $total_lebih_bayar += $item->LEBIH_BAYAR; ?>

                                <tr>
                                    <td class="text-center">{{ $no++ }}</td>
                                    <td>{{ $item->NM_KECAMATAN }}</td>
                                    <td>{{ $item->NM_KELURAHAN }}</td>
                                    <td>{{ number_format($item->POKOK_TERHUTANG,0,'','.') }}</td>
                                    <td>{{ number_format($item->POKOK_BAYAR,0,'','.') }}</td>
                                    <td>{{ number_format($item->DENDA_BAYAR,0,'','.') }}</td>
                                    <td>{{ number_format($item->JUMLAH_BAYAR,0,'','.') }}</td>
                                    <td>{{ number_format($item->KURANG_BAYAR,0,'','.') }}</td>
                                    <td>{{ number_format($item->LEBIH_BAYAR,0,'','.') }}</td>
                                    <td>{{ $item->POKOK_TERHUTANG > 0 ? number_format(($item->POKOK_BAYAR / $item->POKOK_TERHUTANG) * 100, 2, ',', '.') : 0 }} %</td>
                                    <!-- <td>
                                        <ul class="list-inline">
                                            <li class="list-inline-item"><a href="#" class="active"><i class='bx bxs-show'></i></a></li>
                                            <li class="list-inline-item"><a href="#" class="active"><i class='bx bxs-edit'></i></a></li>
                                            <li class="list-inline-item"><a href="#" class="active"><i class='bx bxs-trash'></i></a></li>
                                        </ul>
                                    </td> -->
                                </tr>
                                @endforeach
                                @endif
                                <tr>
                                    <td colspan="3">Total</td>
                                    <td><?= number_format($total_pokok, 0, '', '.') ?></td>
                                    <td><?= number_format($total_pokok_dibayar, 0, '', '.') ?></td>
                                    <td><?= number_format($total_denda_dibayar, 0, '', '.') ?></td>
                                    <td><?= number_format($total_dibayar, 0, '', '.') ?></td>
                                    <td><?= number_format($total_kurang_bayar, 0, '', '.') ?></td>
                                    <td><?= number_format($total_lebih_bayar, 0, '', '.') ?></td>
                                    <td><?= $total_pokok > 0 ? number_format(($total_pokok_dibayar / $total_pokok) * 100, 2, ',', '.') : 0 ?> %</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- <div class="d-flex justify-content-center mt-3">
                               
                    </div> -->
                </form>


            </div>
        </div>
    </div>
  
    @endsection