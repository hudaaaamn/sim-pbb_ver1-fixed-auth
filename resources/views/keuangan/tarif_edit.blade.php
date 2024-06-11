@extends('kerangka.master')

@section('title', 'Edit Data Tarif')

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
							<h3>Edit Data Tarif</h3>
							<div class=" p-0 d-flex align-items-start" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                                    <li class="breadcrumb-item"><a href="#">Keuangan</a></li>
									<li class="breadcrumb-item"><a href=" {{ route('tarif.index') }}">Tarif</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Edit Data Tarif</li>
                                </ol>
                            </div>
						</div>
						
                        <form method="POST" action="{{ route('tarif.update') }}" enctype="multipart/form-data" class="row g-4 p-5 needs-validation" novalidate>
							@csrf
                            <div class="col-md-6">
                                <label for="kd_propinsi" class="form-label">Kode Provinsi</label>
                                <input type="text" class="form-control" id="kd_propinsi" name="KD_PROPINSI" value="{{ $result->KD_PROPINSI }}" readonly>
								<div class="invalid-feedback">
									Isi kolom ini terlebih dahulu!
								</div>
                            </div>
                            <div class="col-md-6">
                                <label for="kd_dati2" class="form-label">Kode Dati 2</label>
                                <input type="text" class="form-control" id="kd_dati2" name="KD_DATI2" value="{{ $result->KD_DATI2 }}" readonly>
								<div class="invalid-feedback">
									Isi kolom ini terlebih dahulu!
								</div>
                            </div>
                            <div class="col-md-6 ">
                                <label for="TahunAwal" class="form-label">Tahun Awal</label>
                                <input type="number" class="form-control" id="TahunAwal" name="THN_AWAL" value="{{ $result->THN_AWAL }}" readonly>
                                <div class="invalid-feedback">
									Isi kolom ini terlebih dahulu!
								</div>
                            </div>
                            <div class="col-md-6">
                                <label for="TahunAkhir" class="form-label">Tahun Akhir</label>
                                <input type="number" class="form-control" id="TahunAkhir" name="THN_AKHIR" value="{{ $result->THN_AKHIR }}" readonly>
                                <div class="invalid-feedback">
									Isi kolom ini terlebih dahulu!
								</div>
                            </div>
                            <div class="col-md-6">
                                <label for="NJOPMinimum" class="form-label">NJOP Minimum</label>
                                <input type="number" class="form-control" id="NJOPMinimum" name="NJOP_MIN" value="{{ $result->NJOP_MIN }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="PBBMaximum" class="form-label">NJOP Maximum</label>
                                <input type="number" class="form-control" id="PBBMaximum" name="NJOP_MAX" value="{{ $result->NJOP_MAX }}">
                            </div>
                            <div class="col-md-6">
                                <label for="NilaiTarif" class="form-label">Nilai Tarif</label>
                                <input type="number" step="0.001" class="form-control" id="NilaiTarif" name="NILAI_TARIF" value="{{ $result->NILAI_TARIF }}">
                            </div>


                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary" style="width:150px;">Simpan</button>
                            </div>
                        </form>
						
					</div>
				</div>
			</div>
@endsection