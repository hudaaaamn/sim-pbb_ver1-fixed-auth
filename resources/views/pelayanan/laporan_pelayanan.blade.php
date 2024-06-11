@extends('kerangka.master')

@section('title', 'Laporan Pelayanan')

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
                    <h3>Laporan Pelayanan</h3>
                    <!-- <div aria-label="breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#">Beranda</a></li>
								<li class="breadcrumb-item"><a href="#">Pelayanan</a></li>
								<li class="breadcrumb-item active" aria-current="page">Laporan Pelayanan</li>
							</ol>
							</div> -->
                    <div class=" p-0 d-flex align-items-start" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                            <li class="breadcrumb-item"><a href=" {{ route('pelayanan.index') }}">Pelayanan</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Laporan Pelayanan</li>
                        </ol>
                    </div>
                </div>

                <div class="filterBox">
                    <form method="POST" action="{{ route('pelayanan.excel') }}" enctype="multipart/form-data" class="row g-4 p-3">
                        @csrf
                        <!-- <div class="col-md-6">
                                    <label for="TahunAwal" class="form-label">Tahun Awal</label>
                                    <div class="input-group">
                                        <input type="text" class="datepicker_input form-control" placeholder="DD/MM/YYYY" required aria-label="Date input 3 (using aria-label)">
                                        <span class="input-group-text">
                                            <i class='bx bxs-calendar'></i>
                                        </span>
                                    </div>
                                </div> -->
                        <div class="col-md-6">
                            <label for="TanggalRealisasi" class="form-label">Tanggal Awal</label>
                            <input type="date" class="form-control" id="TanggalRealisasi" name="TGL_AWAL" value="{{ date('Y').'-12-31' }}">
                        </div>
                        <div class="col-md-6">
                            <label for="TanggalRealisasi" class="form-label">Tanggal Akhir</label>
                            <input type="date" class="form-control" id="TanggalRealisasi" name="TGL_AKHIR" value="{{ date('Y').'-12-31' }}">
                        </div>
                        <!-- <div class="col-md-6">
                                    <label for="TahunAkhir" class="form-label">Tahun Akhir</label>
                                    <div class="input-group">
                                        <input type="text" class="datepicker_input form-control" placeholder="DD/MM/YYYY" required aria-label="Date input 3 (using aria-label)">
                                        <span class="input-group-text">
                                            <i class='bx bxs-calendar'></i>
                                        </span>
                                    </div>
                                </div> -->
                        <!-- <div class="col-md-6">
                                    <label for="TahunAkhir" class="form-label">Tahun Akhir</label>
                                    <input type="text" class="form-control" id="TahunAkhir" name="TahunAkhir">
                                </div> -->
                        <div class="col-md-12">
                            <label for="JenisPelayanan" class="form-label">Jenis Pelayanan</label>
                            <select class="form-select" id="JenisPelayanan" name="JNS_PELAYANAN" required>
                                <option selected disabled value="">Choose...</option>
                                @foreach ($JNS_PELAYANAN as $value => $label)
                                <option value="{{ $value }}">{{ $label }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                Isi kolom ini terlebih dahulu!
                            </div>
                        </div>

                        <div class="col-md-12">
                            <label for="StatusPelayanan" class="form-label">Status Pelayanan</label>
                            <select class="form-select" id="StatusPelayanan" name="STATUS_PELAYANAN" required>
                                <option selected disabled value="">Choose...</option>
                                @foreach ($STATUS_PELAYANAN as $value => $label)
                                <option value="{{ $value }}">{{ $label }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                Isi kolom ini terlebih dahulu!
                            </div>
                        </div>

                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-primary" style="width:150px;">Export Excel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection