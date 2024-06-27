@extends('kerangka.master')
@section('title', 'LSPOP')
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
                    <h3>LSPOP</h3>
                    <div class="p-0 d-flex align-items-start" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                            <li class="breadcrumb-item"><a href="#">Dokumen</a></li>
                            <li class="breadcrumb-item active" aria-current="page">LSPOP</li>
                        </ol>
                    </div>
                </div>

                <div class="pencarian d-flex justify-content-between align-items-end">
                    <a href="{{ route('lspop.create') }}"><button type="button">Buat Baru</button></a>
                </div>

                <!-- KODE CARI SPOP -->
                <div class="AddSpopBox">
                    <h5 class="ms-3">Cari LSPOP</h5>
                    <form method="POST" action="{{ route('lspop.search') }}" id="myForm2" enctype="multipart/form-data" class="row g-4 p-3 ms-2">
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
                @if(isset($lspopData))
                <div class="AddSpopBox">
                    <!-- KODE SURAT PEMBERITAHUAN OBJEK PAJAK -->
                    <h6 class="ms-3">Surat Pemberitahuan Objek Pajak</h6>
                    <div class="DetailSpopBox">
                        <form method="POST" id="myForm2" enctype="multipart/form-data" class="row g-4 p-3">
                            @csrf
                            <div class="col-md-4">
                                <label for="nop" class="form-label">NOP</label>
                                <input type="text" class="form-control nop" id="nop" name="nop" value="{{ $lspopData->nop }}" readonly>              
                            </div>
                            <div class="col-md-4">
                                <label for="tgl_kunjungan_kembali" class="form-label">Tanggal Kunjungan Kembali</label>
                                <input type="text" class="form-control nop" id="tgl_kunjungan_kembali" name="tgl_kunjungan_kembali" value="{{ $lspopData->tgl_kunjungan_kembali }}" readonly>
                            </div>
                            <div class="col-md-4">
                                <label for="jenis_transaksi" class="form-label">Jenis Transaksi</label>
                                <input type="text" class="form-control nop" id="jenis_transaksi" name="jenis_transaksi" value="{{ $lspopData->jenis_transaksi }}" readonly>
                            </div>
                            <div class="col-md-4">
                                <label for="nomor_formulir" class="form-label">Nomor Formulir</label>
                                <input type="text" class="form-control nop" id="nomor_formulir" name="nomor_formulir" value="{{ $lspopData->nomor_formulir }}" readonly>
                            </div>
                        </form>
                    </div>
                    <!-- KODE DATA LETAK OBJEK PAJAK -->
                    <h6 class="ms-3">Nilai Bangunan (per1000)</h6>
                    <div class="DetailSpopBox">
                        <form method="POST" id="myForm2" enctype="multipart/form-data" class="row g-4 p-3">
                            @csrf
                            <div class="col-md-4">
                                <label for="bgn_total" class="form-label">Total bangunan</label>
                                <input type="text" class="form-control nop" id="bgn_total" name="bgn_total" value="{{ $lspopData->bgn_total }}" readonly>
                            </div>
                            <div class="col-md-4">
                                <label for="bgn_tgl_pendataan" class="form-label">Tanggal Pendataan</label>
                                <input type="text" class="form-control nop" id="bgn_tgl_pendataan" name="bgn_tgl_pendataan" value="{{ $lspopData->bgn_tgl_pendataan }}" readonly>
                            </div>
                            <div class="col-md-4">
                                <label for="bgn_individual" class="form-label">Individual</label>
                                <input type="text" class="form-control nop" id="bgn_individual" name="bgn_individual" value="{{ $lspopData->bgn_individual }}" readonly>
                            </div>
                            <div class="col-md-4">
                                <label for="bgn_nip_pendata" class="form-label">NIP Pendata</label>
                                <input type="text" class="form-control nop" id="bgn_nip_pendata" name="bgn_nip_pendata" value="{{ $lspopData->bgn_nip_pendata }}" readonly>
                            </div>
                        </form>
                    </div>
                    <!-- KODE DATA SUBJEK PAJAK -->
                    <h6 class="ms-3">Lain-lain</h6>
                    <div class="DetailSpopBox">
                        <form method="POST" id="myForm2" enctype="multipart/form-data" class="row g-4 p-3">
                            @csrf
                            <div class="col-md-4">
                                <label for="bgn_luas" class="form-label">Luas</label>
                                <input type="text" class="form-control nop" id="bgn_luas" name="bgn_luas" value="{{ $lspopData->bgn_luas }}" readonly>
                            </div>
                            <div class="col-md-4">
                                <label for="bgn_kontruksi" class="form-label">Konstruksi</label>
                                <input type="text" class="form-control nop" id="bgn_kontruksi" name="bgn_kontruksi" value="{{ $lspopData->bgn_kontruksi }}" readonly>
                            </div>
                            <div class="col-md-4">
                                <label for="bgn_dinding" class="form-label">Dinding</label>
                                <input type="text" class="form-control nop" id="bgn_dinding" name="bgn_dinding" value="{{ $lspopData->bgn_dinding }}" readonly>
                            </div>
                            <div class="col-md-4">
                                <label for="bgn_jml_lantai" class="form-label">Jumlah Lantai</label>
                                <input type="text" class="form-control nop" id="bgn_jml_lantai" name="bgn_jml_lantai" value="{{ $lspopData->bgn_jml_lantai }}" readonly>
                            </div>
                            <div class="col-md-4">
                                <label for="bgn_langit_langit" class="form-label">Langit_langit</label>
                                <input type="text" class="form-control nop" id="bgn_langit_langit" name="bgn_langit_langit" value="{{ $lspopData->bgn_langit_langit }}" readonly>
                            </div>
                            <div class="col-md-4">
                                <label for="bgn_lantai" class="form-label">Lantai</label>
                                <input type="text" class="form-control nop" id="bgn_lantai" name="bgn_lantai" value="{{ $lspopData->bgn_lantai }}" readonly>
                            </div>
                            <div class="col-md-4">
                                <label for="bgn_kondisi" class="form-label">Kondisi</label>
                                <input type="text" class="form-control nop" id="bgn_kondisi" name="bgn_kondisi" value="{{ $lspopData->bgn_kondisi }}" readonly>
                            </div>
                            <div class="col-md-4">
                                <label for="bgn_atap" class="form-label">Atap</label>
                                <input type="text" class="form-control nop" id="bgn_atap" name="bgn_atap" value="{{ $lspopData->bgn_atap }}" readonly>
                            </div>
                            <div class="col-md-4">
                                <label for="bgn_listrik" class="form-label">Listrik</label>
                                <input type="text" class="form-control nop" id="bgn_listrik" name="bgn_listrik" value="{{ $lspopData->bgn_listrik }}" readonly>
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
