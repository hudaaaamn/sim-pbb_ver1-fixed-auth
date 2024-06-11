@extends('kerangka.master')

@section('title', 'Tambah Data Kabupaten')

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
							<h3>Tambah Data Dati 2</h3>
							<!-- <div aria-label="breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#">Beranda</a></li>
								<li class="breadcrumb-item"><a href="#">Daerah</a></li>
								<li class="breadcrumb-item"><a href="{{ route('kabupaten.index') }}">Kabupaten</a></li>
								<li class="breadcrumb-item active" aria-current="page">Tambah Data Dati 2</li>
							</ol>
							</div> -->
							<div class=" p-0 d-flex align-items-start" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                                    <li class="breadcrumb-item"><a href="#">Daerah</a></li>
									<li class="breadcrumb-item"><a href="{{ route('kabupaten.index') }}">Kabupaten</a></li>
									<li class="breadcrumb-item active" aria-current="page">Tambah Data Dati 2</li>
                                </ol>
                            </div>
						</div>
						
                        <form method="POST" action="{{ route('kabupaten.store') }}" enctype="multipart/form-data" class="row g-4 p-5 needs-validation" novalidate>
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
                                <label for="inputNamaDati2" class="form-label">Nama Dati 2</label>
                                <input type="text" class="form-control" id="inputNamaDati2" name="inputNamaDati2" required> 
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