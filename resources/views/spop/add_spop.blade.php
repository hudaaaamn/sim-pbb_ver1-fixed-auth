@extends('kerangka.master')
@section('title', 'Tambah Data SPOP')
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
                    <h3>Tambah Data SPOP</h3>
                    <div class="p-0 d-flex align-items-start" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                            <li class="breadcrumb-item"><a href="#">Laporan</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('spop.index') }}">SPOP</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Tambah Data SPOP</li>
                        </ol>
                    </div>
                </div>

                <!-- KODE DATA-DATA SPOP -->
                <form action="{{ route('spop.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="AddSpopBox">
                        <!-- KODE SURAT PEMBERITAHUAN OBJEK PAJAK -->
                        <h6 class="ms-3">Surat Pemberitahuan Objek Pajak</h6>
                        <div class="DetailSpopBox row g-4 p-3">
                            <div class="col-md-4">
                                <label for="jns_transaksi" class="form-label">Jenis Transaksi</label>
                                <input type="text" class="form-control" id="jns_transaksi" name="JNS_TRANSAKSI">
                            </div>
                            <div class="col-md-4">
                                <label for="nop" class="form-label">NOP</label>
                                <input type="text" class="form-control nop" id="nop" name="nop" required>
                            </div>
                            <div class="col-md-4">
                                <label for="nop_bersama" class="form-label">NOP Bersama</label>
                                <input type="text" class="form-control nop" id="nop_bersama" name="NOP_BERSAMA" required>
                            </div>
                        </div>

                        <!-- KODE TAMBAHAN UNTUK DATA BARU -->
                        <h6 class="ms-3">Informasi Tambahan Untuk Data Baru</h6>
                        <div class="DetailSpopBox row g-4 p-3">
                            <div class="col-md-4">
                                <label for="nop_asal" class="form-label">NOP Asal</label>
                                <input type="text" class="form-control nop" id="nop_asal" name="NOP_ASAL" required>
                            </div>
                            <div class="col-md-4">
                                <label for="no_sppt_lama" class="form-label">NO SPPT Lama</label>
                                <input type="text" class="form-control nop" id="no_sppt_lama" name="NO_SPPT_LAMA" required>
                            </div>
                        </div>

                        <!-- KODE DATA LETAK OBJEK PAJAK -->
                        <h6 class="ms-3">Kode Data Letak Objek Pajak</h6>
                        <div class="DetailSpopBox row g-4 p-3">
                            <div class="col-md-4">
                                <label for="jalan" class="form-label">Jalan</label>
                                <input type="text" class="form-control" id="jalan" name="JALAN" required>
                            </div>
                            <div class="col-md-1">
                                <label for="rt" class="form-label">RT</label>
                                <input type="number" class="form-control" id="rt" name="RT" required>
                            </div>
                            <div class="col-md-1">
                                <label for="rw" class="form-label">RW</label>
                                <input type="number" class="form-control" id="rw" name="RW" required>
                            </div>
                            <div class="col-md-1">
                                <label for="no" class="form-label">No</label>
                                <input type="number" class="form-control" id="no" name="NO" required>
                            </div>

                            <div class="col-md-5"></div>

                            <div class="col-md-4">
                                <label for="kelurahan" class="form-label">Kelurahan</label>
                                <input type="text" class="form-control" id="kelurahan" name="KELURAHAN" required>
                            </div>
                            <div class="col-md-3">
                                <label for="no_legalitas" class="form-label">Nomor Legalitas</label>
                                <input type="number" class="form-control" id="no_legalitas" name="NO_LEGALITAS" required>
                            </div>
                        </div>

                        <!-- KODE DATA SUBJEK PAJAK -->
                        <h6 class="ms-3">Kode Data Subjek Pajak</h6>
                        <div class="DetailSpopBox row g-4 p-3">
                            <div class="col-md-4">
                                <label for="nik" class="form-label">NIK</label>
                                <input type="number" class="form-control" id="nik" name="NIK" required>
                            </div>
                            <div class="col-md-4">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="nama" name="NAMA" required>
                            </div>
                            <div class="col-md-4">
                                <label for="npwp" class="form-label">NPWP</label>
                                <input type="number" class="form-control" id="npwp" name="NPWP" required>
                            </div>

                            <div class="col-md-4">
                                <label for="alamat" class="form-label">Alamat</label>
                                <input type="text" class="form-control" id="alamat" name="ALAMAT" required>
                            </div>
                            <div class="col-md-1">
                                <label for="rw" class="form-label">RW</label>
                                <input type="number" class="form-control" id="rw" name="RW" required>
                            </div>
                            <div class="col-md-1">
                                <label for="rt" class="form-label">RT</label>
                                <input type="number" class="form-control rt" id="rt" name="RT" required>
                            </div>
                            <div class="col-md-1">
                                <label for="no" class="form-label">No</label>
                                <input type="number" class="form-control" id="no" name="NO" required>
                            </div>
                            <div class="col-md-1">
                                <label for="pos" class="form-label">Pos</label>
                                <input type="number" class="form-control" id="pos" name="POS" required>
                            </div>
                            <div class="col-md-4">
                                <label for="kelurahan" class="form-label">Kelurahan</label>
                                <input type="text" class="form-control" id="kelurahan" name="KELURAHAN" required>
                            </div>

                            <div class="col-md-4">
                                <label for="status" class="form-label">Status</label>
                                <input type="text" class="form-control" id="status" name="STATUS" required>
                            </div>
                            <div class="col-md-4">
                                <label for="pekerjaan" class="form-label">Pekerjaan</label>
                                <input type="text" class="form-control" id="pekerjaan" name="PEKERJAAN" required>
                            </div>
                        </div>

                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-primary" style="width:150px;">Tambah</button>
                        </div>
                    </div>
                </form>  
            </div>
        </div>
    </div>
    <!-- Toast Container -->
    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div id="toast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <strong class="me-auto">Bootstrap</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                Data telah berhasil disimpan!
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const toastElement = document.getElementById('toast');
            const toast = new bootstrap.Toast(toastElement);

            function showToast() {
                toast.show();
            }
        });
    </script>
</div>

    

 @endsection
 