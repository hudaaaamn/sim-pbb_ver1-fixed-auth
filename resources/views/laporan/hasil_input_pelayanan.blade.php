@extends('kerangka.master')

@section('title', 'Hasil Input Pelayanan')

@section('content')

<div class="bgn">
    <h1 class="title">Selamat Datang, {{ $fullname }}!</h1>
    <p class="greet">Selamat Datang di Sistem Informasi Pajak Bumi Bangunan</p>
</div>

<div class="data">
    <div class="box-container">
        <div class="detail">
            <div class="recentOrders">
                <div class="cardHeader">
                    <h3>Hasil Input Pelayanan</h3>
                    <div class=" p-0 d-flex align-items-start" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                            <li class="breadcrumb-item"><a href="#">Laporan</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Hasil Input Pelayanan</li>
                        </ol>
                    </div>
                </div>

                <div class="filterBox">
                    <form method="POST" action="{{ route('hasilInputPelayanan.cetak') }}" enctype="multipart/form-data" class="row g-4 p-3">
                        @csrf
                        <div class="col-md-6 ">
                            <label for="NOP" class="form-label">NOP</label>
                            <input type="text" class="form-control" id="NOP" name="nop" required>
                        </div>
                        <div class="col-md-6">
                            <label for="NoPelayanan" class="form-label">No Pelayanan</label>
                            <input type="text" class="form-control" id="no_pelayanan" placeholder="Ketik No Pelayanan" name="no_pelayanan" required>
                        </div>
                        <div class="col-md-6">
                            <label for="Tahun" class="form-label">Tahun</label>
                            <input type="number" class="form-control" id="tahun" name="tahun" value="{{ date('Y') }}" required>
                        </div>
                        <div class="col-md-12 d-flex ">
                            <div class="me-2">
                                <input class="form-check-input border border-primary " type="checkbox" name="baru" id="baru" />
                            </div>
                            <label for="baru" class="form-label">Data Baru</label>
                        </div>

                        <div class="col-md-12 d-flex justify-content-center ms-auto">
                            <button type="submit" class="btn btn-primary" style="width:150px;">Cetak</button>
                        </div>
                    </form>
                </div>
             
            </div>
        </div>
    </div>
    <script>
        $j = jQuery.noConflict();
        $j(document).ready(function() {
            $j("#NOP").inputmask("99.99.999.999.999.9999.9");
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