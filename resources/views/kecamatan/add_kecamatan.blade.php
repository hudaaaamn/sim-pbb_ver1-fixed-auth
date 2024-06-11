@extends('kerangka.master')
@section('title', 'Tambah Data Kecamatan')
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
							<h3>Tambah Data Kecamatan</h3>
							<!-- <div aria-label="breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#">Beranda</a></li>
								<li class="breadcrumb-item"><a href="#">Daerah</a></li>
								<li class="breadcrumb-item"><a href="{{ route('kecamatan.index') }}">Kecamatan</a></li>
								<li class="breadcrumb-item active" aria-current="page">Tambah Data Kecamatan</li>
							</ol>
							</div> -->
							<div class=" p-0 d-flex align-items-start" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                                    <li class="breadcrumb-item"><a href="#">Daerah</a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('kecamatan.index') }}">Kecamatan</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Tambah Data Kecamatan</li>
                                </ol>
                            </div>
						</div>
						
                        <form method="POST" action="{{ route('kecamatan.store') }}" enctype="multipart/form-data" class="row g-4 p-5 needs-validation" novalidate>
							@csrf
                            <div class="col-md-6">
                                <label for="inputKodeProvinsi" class="form-label">Kode Provinsi</label>
                                <input type="text" class="form-control" id="inputKodeProvinsi" name="inputKodeProvinsi" required>
								<div class="invalid-feedback">
									Isi kolom ini terlebih dahulu!
								</div>
                            </div>
                            <div class="col-md-6">
                                <label for="inputKodeDati2" class="form-label">Kode Dati 2</label>
                                <input type="text" class="form-control" id="inputKodeDati2" name="inputKodeDati2" required>
								<div class="invalid-feedback">
									Isi kolom ini terlebih dahulu!
								</div>
                            </div>
                            <div class="col-md-6">
                                <label for="inputKodeKecamatan" class="form-label">Kode Kecamatan</label>
                                <input type="text" class="form-control" id="inputKodeKecamatan" name="inputKodeKecamatan" required>
								<div class="invalid-feedback">
									Isi kolom ini terlebih dahulu!
								</div>
                            </div>
                            <div class="col-md-6">
                                <label for="inputNamaKecamatan" class="form-label">Nama Kecamatan</label>
                                <input type="text" class="form-control" id="inputNamaKecamatan" name="inputNamaKecamatan" required>
								<div class="invalid-feedback">
									Isi kolom ini terlebih dahulu!
								</div>
                            </div>

                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary" style="width:150px;">Tambah</button>
                            </div>
                        </form>

					</div>
				</div>
			</div>
@endsection