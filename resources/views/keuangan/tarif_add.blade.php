@extends('kerangka.master')

@section('title', 'Tambah Data Tarif')

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
							<h3>Tambah Data Tarif</h3>
							<div class=" p-0 d-flex align-items-start" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                                    <li class="breadcrumb-item"><a href="#">Keuangan</a></li>
									<li class="breadcrumb-item"><a href=" {{ route('tarif.index') }}">Tarif</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Tambah Data Tarif</li>
                                </ol>
                            </div>
						</div>
						
                        <form method="POST" action="{{ route('tarif.store') }}" enctype="multipart/form-data" class="row g-4 p-5 needs-validation" novalidate>
							@csrf
                            <div class="col-md-6">
                                <label for="kd_propinsi" class="form-label">Kode Provinsi</label>
                                <input type="text" class="form-control" id="kd_propinsi" name="KD_PROPINSI" required>
								<div class="invalid-feedback">
									Isi kolom ini terlebih dahulu!
								</div>
                            </div>
                            <div class="col-md-6">
                                <label for="kd_dati2" class="form-label">Kode Dati 2</label>
                                <input type="text" class="form-control" id="kd_dati2" name="KD_DATI2" required>
								<div class="invalid-feedback">
									Isi kolom ini terlebih dahulu!
								</div>
                            </div>
                            <div class="col-md-6 ">
                                <label for="TahunAwal" class="form-label">Tahun Awal</label>
                                <input type="number" class="form-control" id="TahunAwal" name="THN_AWAL" value="{{ date('Y') }}" required>
                                <div class="invalid-feedback">
									Isi kolom ini terlebih dahulu!
								</div>
                            </div>
                            <div class="col-md-6">
                                <label for="TahunAkhir" class="form-label">Tahun Akhir</label>
                                <input type="number" class="form-control" id="TahunAkhir" name="THN_AKHIR" value="{{ date('Y') }}" required>
                                <div class="invalid-feedback">
									Isi kolom ini terlebih dahulu!
								</div>
                            </div>
                            <div class="col-md-6">
                                <label for="NJOPMinimum" class="form-label">NJOP Minimum</label>
                                <input type="number" class="form-control" id="NJOPMinimum" name="NJOP_MIN" value="0">
                            </div>
                            <div class="col-md-6">
                                <label for="PBBMaximum" class="form-label">NJOP Maximum</label>
                                <input type="number" class="form-control" id="PBBMaximum" name="NJOP_MAX" value="100000000000">
                            </div>
                            <div class="col-md-6">
                                <label for="NilaiTarif" class="form-label">Nilai Tarif</label>
                                <input type="number" step="0.001" class="form-control" id="NilaiTarif" name="NILAI_TARIF" value="0.1">
                            </div>


                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary" style="width:150px;">Simpan</button>
                            </div>
                        </form>
						
					</div>
				</div>
			</div>
@endsection