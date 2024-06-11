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
                    <form method="POST" action="{{ route('pelayananLap.look') }}" enctype="multipart/form-data" class="row g-4 p-3">
                        @csrf
                        <div class="col-md-6">
                            <label for="TanggalRealisasi" class="form-label">Tanggal Awal</label>
                            <input type="date" class="form-control" id="TanggalRealisasi" name="tgl_awal" value="{{ date('Y').'-12-31' }}">
                        </div>
                        <div class="col-md-6">
                            <label for="TanggalRealisasi" class="form-label">Tanggal Akhir</label>
                            <input type="date" class="form-control" id="TanggalRealisasi" name="tgl_akhir" value="{{ date('Y').'-12-31' }}">
                        </div>
                        <div class="col-md-12">
                            <label for="select2Multiple" class="form-label">Jenis Pelayanan</label>
                            <select class="form-select border border-primary" name="jns_pelayanan[]" multiple="multiple" id="select2Multiple">
                                @foreach ($jenis_pelayanan as $value => $label)
                                <option value="{{ $value }}">{{ $label }}</option>
                                @endforeach
                            </select>

                            <div class="invalid-feedback">
                                Isi kolom ini terlebih dahulu!
                            </div>
                        </div>



                        <div class="col-md-12">
                            <label for="Tahun" class="form-label">Tahun</label>
                            <input type="number" class="form-control" id="Tahun" name="thn_awal" value="{{ date('Y')}}" required>
                            <div class="invalid-feedback">
                                Isi kolom ini terlebih dahulu!
                            </div>
                        </div>

                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-primary" style="width:150px;">Lihat Laporan Pelayanan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    @endsection