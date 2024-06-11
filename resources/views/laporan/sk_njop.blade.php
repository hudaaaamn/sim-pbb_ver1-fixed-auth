@extends('kerangka.master')

@section('title', 'SK-NJOP')

@section('content')

<div class="bgn">
    <h1 class="title">Selamat Datang, {{$fullname}}!</h1>
    <p class="greet">Selamat Datang di Sistem Informasi Pajak Bumi Bangunan</p>
</div>

<div class="data">
    <div class="box-container">
        <div class="detail">
            <div class="recentOrders">
                <div class="cardHeader">
                    <h3>SK-NJOP</h3>
                    <!-- <div aria-label="breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#">Beranda</a></li>
								<li class="breadcrumb-item"><a href="#">Laporan</a></li>
								<li class="breadcrumb-item active" aria-current="page">Realisasi Kelurahan</li>
							</ol>
							</div> -->
                    <div class=" p-0 d-flex align-items-start" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                            <li class="breadcrumb-item"><a href="#">Laporan</a></li>
                            <li class="breadcrumb-item active" aria-current="page">SK-NJOP</li>
                        </ol>
                    </div>
                </div>

                <div class="filterBox">
                    <form method="POST" action="{{ route('skNjop.cetak') }}" enctype="multipart/form-data" class="row g-4 p-3">
                        @csrf
                        <div class="col-md-6">
                            <label for="NOP" class="form-label">NOP</label>
                            <input type="text" class="form-control nop" id="NOP" name="nop" required>
                        </div>
                        <div class="col-md-6">
                            <label for="NoSurat" class="form-label">No Surat</label>
                            <input type="text" class="form-control" id="NoSurat" name="no_surat" placeholder="Ketik No Surat" required>
                        </div>
                        <div class="col-md-6">
                            <label for="NoPelayanan" class="form-label">No Pelayanan</label>
                            <input type="text" class="form-control" id="NoPelayanan" name="no_pelayanan" placeholder="Ketik No Pelayanan" required>
                        </div>
                        <div class="col-md-6">
                            <label for="Tahun" class="form-label">Tahun</label>
                            <input type="number" class="form-control" id="Tahun" name="tahun" placeholder="Tahun Pajak" value="<?= date('Y') ?>" required>
                        </div>

                        <div class="col-md-12 d-flex ">
                            <div class="me-2">
                                <input class="form-check-input border border-primary" type="checkbox" name="baru" id="baru" />
                            </div>
                            <label for="baru" class="form-label">Baru</label>
                        </div>
                        <div class="col-md-12 d-flex mt-1">
                            <div class="me-2">
                                <input class="form-check-input border border-primary" type="checkbox" name="ttd" id="ttd" />
                            </div>
                            <label for="ttd" class="form-label">Tanda Tangan</label>
                        </div>
                        <!-- <div class="col-md-6 d-flex justify-content-end ms-auto">
                            <label for="baru" class="form-label">Baru</label>
                            <div>
                                <input type="checkbox" name="baru" id="baru" />
                            </div>
                        </div> -->

                        <div class="col-md-12 d-flex justify-content-center ms-auto">
                            <button type="submit" class="btn btn-primary" style="width:150px;">Cetak</button>
                        </div>
                        <!-- <div class="col-md-6 d-flex justify-content-start me-auto">
                            <button type="submit" class="btn btn-primary" style="width:150px;">Cari</button>
                        </div> -->
                    </form>
                </div>

                <!-- <div class="dataBox" style="overflow-x: auto;">
                    <table>
                        <thead>
                            <tr>
                                <td>No</td>
                                <td>Kecamatan</td>
                                <td>Kelurahan</td>
                                <td>Pokok</td>
                                <td>Pokok Dibayar</td>
                                <td>Denda Dibayar</td>
                                <td>Total Dibayar</td>
                                <td>Kurang Bayar</td>
                                <td>Lebih Banyak</td>
                                <td>%</td>
                                <td>Opsi</td>
                            </tr>
                        </thead>

                        <tbody>

                            <tr>
                                <td>No</td>
                                <td>Wates</td>
                                <td>Bendungan</td>
                                <td>20</td>
                                <td>20</td>
                                <td>20</td>
                                <td>20</td>
                                <td>20</td>
                                <td>20</td>
                                <td>20</td>
                                <td>
                                    <ul class="list-inline">
                                        <li class="list-inline-item"><a href="#" class="active"><i class='bx bxs-show'></i></a></li>
                                        <li class="list-inline-item"><a href="#" class="active"><i class='bx bxs-edit'></i></a></li>
                                        <li class="list-inline-item"><a href="#" class="active"><i class='bx bxs-trash'></i></a></li>
                                    </ul>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center">
                               
                            </div>
                </div> -->

            </div>
        </div>
    </div>

    <script>
        $j = jQuery.noConflict();
        $j(document).ready(function() {
            $j(".nop").inputmask("99.99.999.999.999.9999.9");
            var errorMessage = "{{ session('error') }}";

            if (errorMessage) {
                Swal.fire({
                    title: 'Ups!',
                    text: errorMessage,
                    icon: 'error'
                });
            }
        });
    </script>
    @endsection