@extends('kerangka.master')

@section('title', 'Catatan Pembayaran')

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
                    <h3>Catatan Pembayaran</h3>
                    <!-- <div aria-label="breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#">Beranda</a></li>
								<li class="breadcrumb-item active" aria-current="page">Tunggakan</li>
							</ol>
							</div> -->
                    <div class=" p-0 d-flex align-items-start" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Tunggakan</li>
                        </ol>
                    </div>
                </div>

                <div class="filterBox">
                    <form method="POST" action="{{ route('tunggakan.cetak') }}" enctype="multipart/form-data" class="row g-4 p-3">
                        @csrf
                        <div class="col-md-6">
                            <label for="NOP" class="form-label">NOP</label>
                            <input type="text" class="form-control nop" id="NOP" name="nop" required>
                        </div>
                        <div class="col-md-6">
                            <label for="TanggalRealisasi" class="form-label">Tahun Awal</label>
                            <input type="number" class="form-control" id="TanggalRealisasi" name="tahun_awal" value="1991">
                        </div>
                        <div class="col-md-6">
                            <label for="TanggalRealisasi" class="form-label">Tahun Akhir</label>
                            <input type="number" class="form-control" id="TanggalRealisasi" name="tahun_akhir" value="{{ date('Y') }}">
                        </div>
                        <div class="col-md-12 d-flex ">
                            <div class="me-2">
                                <input class="form-check-input border border-primary " type="checkbox" name="only_tunggakan" id="baru" value="1" />
                            </div>
                            <label for="baru" class="form-label">Hanya yang belum lunas</label>
                        </div>
                        <div class="col-md-12 d-flex mt-1">
                            <div class="me-2">
                                <input class="form-check-input border border-primary" type="checkbox" name="ttd" id="ttd" value="1" />
                            </div>
                            <label for="ttd" class="form-label">Tanda Tangan</label>
                        </div>

                        <div class="form-group" style="display: none">
                            <label for="input6" class="control-label">SIM-PBB</label>
                            <div>
                                <input type="checkbox" checked="checked" class="checkbox" name="simpbb" value="1" />
                            </div>
                        </div>

                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-primary" style="width:200px;">Lihat Tunggakan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.1.60/inputmask/jquery.inputmask.js"></script>
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