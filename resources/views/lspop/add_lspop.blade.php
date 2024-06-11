@extends('kerangka.master')

@section('title', 'Tambah Data LSPOP')

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
                    <h3>Tambah Data LSPOP</h3>
                    <div class=" p-0 d-flex align-items-start" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                            <li class="breadcrumb-item"><a href="#">Laporan</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('lspop.index') }}">LSPOP</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Tambah Data LSPOP</li>
                        </ol>
                    </div>
                </div>

                <!-- KODE DATA-DATA SPOP -->
        <div class="AddSpopBox">
          <!-- KODE SURAT PEMBERITAHUAN OBJEK PAJAK -->
          <h6 class="ms-3">Surat Pemberitahuan Objek Pajak</h6>
          <div class="DetailSpopBox">
          	<form method="POST" id="myForm2" enctype="multipart/form-data" class="row g-4 p-3">
              @csrf
              <div class="col-md-3">
                <label for="nop" class="form-label">NOP</label>
                <input type="text" class="form-control nop" id="nop" name="nop" required>
              </div>
							<div class="col-md-3">
              	<label for="jns_transaksi" class="form-label">Tanggal Kunjungan Kembali</label>
                <input type="text" class="form-control" id="jns_transaksi" name="JNS_TRANSAKSI">
              </div>
              <div class="col-md-3">
                <label for="nop_bersama" class="form-label">Jenis Transaksi</label>
                <input type="text" class="form-control nop" id="nop_bersama" name="NOP_BERSAMA" required>
              </div>
              <div class="col-md-3">
                <label for="nop_bersama" class="form-label">Nomor Formulir</label>
                <input type="text" class="form-control nop" id="nop_bersama" name="NOP_BERSAMA" required>
              </div>
            </form>
        	</div>

                    <!-- KODE DATA LETAK OBJEK PAJAK -->
                    <h6 class="ms-3">Nilai Bangunan (per1000)</h6>
                    <div class="DetailSpopBox">
                        <form method="POST" id="myForm2" enctype="multipart/form-data" class="row g-4 p-3">
                            @csrf
                            <div class="col-md-4">
                              <label for="jalan" class="form-label">Total</label>
                              <input type="text" class="form-control" id="jalan" name="JALAN" required>
                            </div>
                            <div class="col-md-4">
                              <label for="rt" class="form-label">Tanggal Pendataan</label>
                              <input type="nomor" class="form-control" id="rt" name="RT" required>
                            </div>
														<div class="col-md-1">
															<label for="">NJOP m <sup>2</sup></label>
															<p>jsdn</p>
														</div>
														<div class="col-md-1">
															<label for="">Kelas</label>
															<p>jsdn</p>
														</div>

                            <div class="col-md-4">
                                <label for="kelurahan" class="form-label">Individual</label>
                                <input type="text" class="form-control" id="kelurahan" name="KELURAHAN" required>
                            </div>
                            <div class="col-md-4">
                                <label for="no_legalitas" class="form-label">NIP Pendata</label>
                                <input type="nomor" class="form-control" id="no_legalitas" name="NO_LEGALITAS" required>
                            </div>
                        </form>
                    </div>
                    <!-- KODE DATA SUBJEK PAJAK -->
                    <h6 class="ms-3">Lain-lain</h6>
                    <div class="DetailSpopBox">
                        <form method="POST" id="myForm2" enctype="multipart/form-data" class="row g-4 p-3">
                            @csrf
                            <div class="col-md-4">
                                <label for="nik" class="form-label">Luas</label>
                                <input type="nomor" class="form-control" id="nik" name="NIK" required>
                            </div>
                            <div class="col-md-4">
                                <label for="nama" class="form-label">Konstruksi</label>
                                <input type="text" class="form-control" id="nama" name="NAMA" required>
                            </div>
                            <div class="col-md-4">
                                <label for="npwp" class="form-label">Dinding</label>
                                <input type="nomor" class="form-control" id="npwp" name="NPWP" required>
                            </div>

                            <div class="col-md-4">
                                <label for="alamat" class="form-label">Jumlah Lantai</label>
                                <input type="text" class="form-control" id="alamat" name="ALAMAT" required>
                            </div>
                            <div class="col-md-4">
                                <label for="rw" class="form-label">Langit-langit</label>
                                <input type="nomor" class="form-control" id="rw" name="RW" required>
                            </div>
                            <div class="col-md-4">
                                <label for="kelurahan" class="form-label">Lantai</label>
                                <input type="text" class="form-control" id="kelurahan" name="KELURAHAN" required>
                            </div>

                            <div class="col-md-4">
                                <label for="status" class="form-label">Kondisi</label>
                                <input type="text" class="form-control" id="status" name="STATUS" required>
                            </div>
                            <div class="col-md-4">
                                <label for="pekerjaan" class="form-label">Atap</label>
                                <input type="text" class="form-control" id="pekerjaan" name="PEKERJAAN" required>
                            </div>
                            <div class="col-md-4">
                                <label for="pekerjaan" class="form-label">Listrik</label>
                                <input type="text" class="form-control" id="pekerjaan" name="PEKERJAAN" required>
                            </div>
                        </form>
                    </div>
                                <div class="col-md-12 text-center mt-4">
                                    <button type="submit" class="btn btn-primary" style="width:150px;">Tambah</button>
                                </div>
                </form>

            </div>
        </div>
    </div>
    @endsection