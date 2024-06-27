@extends('kerangka.master')
@section('title', 'SPOP')
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
                                <input type="text" class="form-control" id="jns_transaksi" name="JNS_TRANSAKSI" value="{{ $spopData->jenis_transaksi }} " readonly>
                            </div>
                            <div class="col-md-4">
                                <label for="nop" class="form-label">NOP</label>
                                <input type="text" class="form-control nop" id="nop" name="nop" value="{{ $spopData->nop }} " readonly>
                            </div>
                            <div class="col-md-4">
                                <label for="nop_bersama" class="form-label">NOP Bersama</label>
                                <input type="text" class="form-control nop" id="nop_bersama" name="NOP_BERSAMA" value="{{ $spopData->nop_bersama }}" readonly>
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
                                <input type="text" class="form-control nop" id="nop_asal" name="NOP_ASAL" value="{{ $spopData->nop_asal }} " readonly>
                            </div>
                            <div class="col-md-4">
                                <label for="no_sppt_lama" class="form-label">NO SPPT Lama</label>
                                <input type="text" class="form-control nop" id="no_sppt_lama" name="NO_SPPT_LAMA" value="{{ $spopData->no_sppt_lama }} " readonly>
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
                                <input type="text" class="form-control" id="jalan" name="JALAN" value="{{ $spopData->jalan }}" readonly>
                            </div>
                            <div class="col-md-1">
                                <label for="rt" class="form-label">RT</label>
                                <input type="text" class="form-control" id="rt" name="RT" value="{{ $spopData->rt }}" readonly>
                            </div>
                            <div class="col-md-1">
                                <label for="rw" class="form-label">RW</label>
                                <input type="text" class="form-control" id="rw" name="RW" value="{{ $spopData->rw }}" readonly>
                            </div>
                            <div class="col-md-1">
                                <label for="no" class="form-label">No</label>
                                <input type="text" class="form-control" id="no" name="NO" value="{{ $spopData->no }}" readonly>
                            </div>

                            <div class="col-md-5"></div>

                            <div class="col-md-4">
                                <label for="kelurahan" class="form-label">Kelurahan</label>
                                <input type="text" class="form-control" id="kelurahan" name="KELURAHAN" value="{{ $spopData->kelurahan }} " readonly>
                            </div>
                            <div class="col-md-3">
                                <label for="no_legalitas" class="form-label">Nomor Legalitas</label>
                                <input type="text" class="form-control" id="no_legalitas" name="NO_LEGALITAS" value="{{ $spopData->nomor_legalitas }}" readonly>
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
                                <input type="text" class="form-control" id="nik" name="NIK" value="{{ $spopData->nik }}" readonly>
                            </div>
                            <div class="col-md-4">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="nama" name="NAMA" value="{{ $spopData->nama }} " readonly>
                            </div>
                            <div class="col-md-4">
                                <label for="npwp" class="form-label">NPWP</label>
                                <input type="text" class="form-control" id="npwp" name="NPWP" value="{{ $spopData->npwp }} " readonly>
                            </div>

                            <div class="col-md-4">
                                <label for="alamat" class="form-label">Alamat</label>
                                <input type="text" class="form-control" id="alamat" name="ALAMAT" value="{{ $spopData->alamat }} " readonly>
                            </div>
                            <div class="col-md-1">
                                <label for="rw" class="form-label">RW</label>
                                <input type="text" class="form-control" id="rw" name="RW" value="{{ $spopData->rw_alamat }}" readonly>
                            </div>
                            <div class="col-md-1">
                                <label for="rt" class="form-label">RT</label>
                                <input type="text" class="form-control" id="rt" name="RT" value="{{ $spopData->rt_alamat }}" readonly>
                            </div>
                            <div class="col-md-2">
                                <label for="kodepos" class="form-label">Kode Pos</label>
                                <input type="text" class="form-control" id="kodepos" name="KODEPOS" value="{{ $spopData->kode_pos }}" readonly>
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
