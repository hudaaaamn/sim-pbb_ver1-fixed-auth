@extends('kerangka.master')

@section('title', 'Neraca KPP')

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
							<h3>Neraca KPP</h3>
							<!-- <div aria-label="breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#">Beranda</a></li>
								<li class="breadcrumb-item"><a href="#">Laporan</a></li>
								<li class="breadcrumb-item active" aria-current="page">Neraca KPP</li>
							</ol>
							</div> -->
                            <div class=" p-0 d-flex align-items-start" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                                    <li class="breadcrumb-item"><a href="#">Laporan</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Neraca KPP</li>
                                </ol>
                            </div>
						</div>
						
                        <div class="filterBox">
                            <form method="POST" action="{{ route('neracaKpp.cetak') }}" enctype="multipart/form-data" class="row g-4 p-3">
                                @csrf
                                <div class="col-md-6 ">
                                    <label for="TahunAwal" class="form-label">Tahun Awal</label>
                                    <input type="number" class="form-control" id="TahunAwal" name="tahun_awal" value="{{ date('Y') }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="TahunAkhir" class="form-label">Tahun Akhir</label>
                                    <input type="number" class="form-control" id="TahunAkhir" name="tahun_akhir" value="{{ date('Y') }}">
                                </div>
                                <div class="col-md-12">
                                    <label for="PerTanggalBayar" class="form-label">Per Tanggal Bayar</label>
                                    <input type="date" class="form-control" id="TanggalBayar" name="per_tanggal" value="{{ date('Y').'-12-31' }}">
                                </div>
                            
                                <div class="col-md-12 d-flex justify-content-center ms-auto">
                                    <button id="info" type="submit" class="btn btn-primary" style="width:150px;">Hitung Ulang</button>
                                </div>
                            </form>
                        </div>

					</div>
				</div>
			</div>
@endsection