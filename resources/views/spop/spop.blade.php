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
                    <h3>SPOP</h3>
                    <div class=" p-0 d-flex align-items-start" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                            <li class="breadcrumb-item"><a href="#">Dokumen</a></li>
                            <li class="breadcrumb-item active" aria-current="page">SPOP</li>
                        </ol>
                    </div>
                </div>
                
                <div class="pencarian d-flex justify-content-between align-items-end">
                    <a href="{{ route('spop.create') }}"><button type="button">Buat Baru</button></a>
                </div>

                <!-- KODE CARI SPOP -->
                <div class="AddSpopBox">
                    <h5 class="ms-3">Cari SPOP</h5>
                    <form method="POST" action="{{ route('spop.search') }}" id="myForm2" enctype="multipart/form-data" class="row g-4 p-3 ms-2">
                        @csrf
                        <div class="col-md-4">
                            <label for="cariNOP" class="form-label">Cari Berdasarkan NOP</label>
                            <input type="text" class="form-control nop" id="cariNOP" name="NOP" required>
                        </div>
                        <div class="col-md-6 d-flex align-items-end">
                            <button type="submit" class="btn btn-primary m-0" style="width:150px;">Lihat</button>
                        </div>
                    </form>
                </div>

                <!-- KODE DATA-DATA SPOP -->
                @if(isset($spopData))
                <div class="AddSpopBox">
                    <!-- KODE SURAT PEMBERITAHUAN OBJEK PAJAK -->
                    <h6 class="ms-3">Surat Pemberitahuan Objek Pajak</h6>
                    <div class="DetailSpopBox">
                        <form method="POST" id="myForm2" enctype="multipart/form-data" class="row g-4 p-3">
                            @csrf
                            <div class="col-md-4">
                                <label for="jns_transaksi" class="form-label">Jenis Transaksi</label>
                                <input type="text" class="form-control" id="jns_transaksi" name="JNS_TRANSAKSI" value="{{ $spopData->JNS_TRANSAKSI }} Pendaftaran Baru" readonly>
                            </div>
                            <div class="col-md-4">
                                <label for="nop" class="form-label">NOP</label>
                                <input type="text" class="form-control nop" id="nop" name="nop" value="{{ $spopData->NOP }}33.12.020.001.002" readonly>
                            </div>
                            <div class="col-md-4">
                                <label for="nop_bersama" class="form-label">NOP Bersama</label>
                                <input type="text" class="form-control nop" id="nop_bersama" name="NOP_BERSAMA" value="{{ $spopData->NOP_BERSAMA }}33.12.020.001.010" readonly>
                            </div>
                        </form>
                    </div>
                    <!-- KODE TAMBAHAN UNTUK DATA BARU -->
                    <h6 class="ms-3">Informasi Tambahan Untuk Data Baru</h6>
                    <div class="DetailSpopBox">
                        <form method="POST" id="myForm2" enctype="multipart/form-data" class="row g-4 p-3">
                            @csrf
                            <div class="col-md-4">
                                <label for="nop_asal" class="form-label">NOP Asal</label>
                                <input type="text" class="form-control nop" id="nop_asal" name="NOP_ASAL" value="{{ $spopData->NOP_ASAL }} 22.08.040.004.032" readonly>
                            </div>
                            <div class="col-md-4">
                                <label for="no_sppt_lama" class="form-label">NO SPPT Lama</label>
                                <input type="text" class="form-control nop" id="no_sppt_lama" name="NO_SPPT_LAMA" value="{{ $spopData->NO_SPPT_LAMA }}325367545" readonly>
                            </div>
                        </form>
                    </div>
                    <!-- KODE DATA LETAK OBJEK PAJAK -->
                    <h6 class="ms-3">Kode Data Letak Objek Pajak</h6>
                    <div class="DetailSpopBox">
                        <form method="POST" id="myForm2" enctype="multipart/form-data" class="row g-4 p-3">
                            @csrf
                            <div class="col-md-4">
                                <label for="jalan" class="form-label">Jalan</label>
                                <input type="text" class="form-control" id="jalan" name="JALAN" value="{{ $spopData->JALAN }}Jl. Kesatuan" readonly>
                            </div>
                            <div class="col-md-1">
                                <label for="rt" class="form-label">RT</label>
                                <input type="text" class="form-control" id="rt" name="RT" value="{{ $spopData->RT }}004" readonly>
                            </div>
                            <div class="col-md-1">
                                <label for="rw" class="form-label">RW</label>
                                <input type="text" class="form-control" id="rw" name="RW" value="{{ $spopData->RW }}007" readonly>
                            </div>
                            <div class="col-md-1">
                                <label for="no" class="form-label">No</label>
                                <input type="text" class="form-control" id="no" name="NO" value="{{ $spopData->NO }}48" readonly>
                            </div>

                            <div class="col-md-5"></div>

                            <div class="col-md-4">
                                <label for="kelurahan" class="form-label">Kelurahan</label>
                                <input type="text" class="form-control" id="kelurahan" name="KELURAHAN" value="{{ $spopData->KELURAHAN }} Jagakarsa" readonly>
                            </div>
                            <div class="col-md-3">
                                <label for="no_legalitas" class="form-label">Nomor Legalitas</label>
                                <input type="text" class="form-control" id="no_legalitas" name="NO_LEGALITAS" value="{{ $spopData->NO_LEGALITAS }}904637243" readonly>
                            </div>
                        </form>
                    </div>
                    <!-- KODE DATA SUBJEK PAJAK -->
                    <h6 class="ms-3">Kode Data Subjek Pajak</h6>
                    <div class="DetailSpopBox">
                        <form method="POST" id="myForm2" enctype="multipart/form-data" class="row g-4 p-3">
                            @csrf
                            <div class="col-md-4">
                                <label for="nik" class="form-label">NIK</label>
                                <input type="text" class="form-control" id="nik" name="NIK" value="{{ $spopData->NIK }} 3174092107000004" readonly>
                            </div>
                            <div class="col-md-4">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="nama" name="NAMA" value="{{ $spopData->NAMA }} Muhammad Rama" readonly>
                            </div>
                            <div class="col-md-4">
                                <label for="npwp" class="form-label">NPWP</label>
                                <input type="text" class="form-control" id="npwp" name="NPWP" value="{{ $spopData->NPWP }}01.234.567.8" readonly>
                            </div>

                            <div class="col-md-4">
                                <label for="alamat" class="form-label">Alamat</label>
                                <input type="text" class="form-control" id="alamat" name="ALAMAT" value="{{ $spopData->ALAMAT }}Jl. Kesatuan no.48" readonly>
                            </div>
                            <div class="col-md-1">
                                <label for="rw" class="form-label">RW</label>
                                <input type="text" class="form-control" id="rw" name="RW" value="{{ $spopData->RW }}007" readonly>
                            </div>
                            <div class="col-md-1">
                                <label for="rt" class="form-label">RT</label>
                                <input type="text" class="form-control" id="rt" name="RT" value="{{ $spopData->RT }}004" readonly>
                            </div>
                            <div class="col-md-2">
                                <label for="kodepos" class="form-label">Kode Pos</label>
                                <input type="text" class="form-control" id="kodepos" name="KODEPOS" value="{{ $spopData->KODEPOS }}12640" readonly>
                            </div>
                        </form>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection
