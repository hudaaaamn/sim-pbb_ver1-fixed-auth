@extends('kerangka.master')

@section('title', 'Informasi PBB')

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
                    <h3>Informasi PBB</h3>
                    <div class=" p-0 d-flex align-items-start" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                            <li class="breadcrumb-item"><a href="#">Laporan</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Informasi PBB</li>
                        </ol>
                    </div>
                </div>

                <div class="filterBox">
                    <form method="POST" action="{{ route('informasiPbb.cetak') }}" enctype="multipart/form-data" class="row g-4 p-3">
                        @csrf
                        <div class="col-md-6 ">
                            <label for="NOP" class="form-label">NOP</label>
                            <input type="text" class="form-control" id="NOP" name="nop" required>
                        </div>
                        <div class="col-md-6">
                            <label for="NoPelayanan" class="form-label">No Pelayanan</label>
                            <input type="text" class="form-control" id="NoPelayanan" name="no_pelayanan" placeholder="Ketik No Pelayanan" required>
                        </div>
                        <div class="col-md-12">
                            <label for="Tahun" class="form-label">Tahun</label>
                            <input type="number" class="form-control" id="Tahun" name="tahun" placeholder="Tahun Pajak" value="<?= date('Y') ?>" required>
                        </div>

                        <div class="col-md-6 d-flex justify-content-end ms-auto">
                            <button type="submit" class="btn btn-primary" style="width:150px;">Cetak</button>
                        </div>
                        <div class="col-md-6 d-flex justify-content-start me-auto">
                            <button class="btn btn-primary" id="btnBatal" style="width:150px;">Batal</button>
                        </div>
                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                // Temukan tombol "Batal" berdasarkan ID
                                var btnBatal = document.getElementById('btnBatal');

                                // Tambahkan event listener untuk menanggapi klik tombol "Batal"
                                btnBatal.addEventListener('click', function() {
                                    // Temukan semua elemen input dalam formulir
                                    var formElements = document.querySelectorAll('form input');

                                    // Hapus nilai dari setiap elemen input
                                    formElements.forEach(function(input) {
                                        input.value = '';
                                    });
                                });
                            });
                        </script>

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