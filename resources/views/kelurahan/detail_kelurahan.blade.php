@extends('kerangka.master')

@section('title', 'Detail Data Kelurahan')

@section('content')

			<div class="bgn">
				<h1 class="title">Selamat Datang</h1>
				<p class="greet">Selamat Datang di Sistem Informasi Pajak Bumi Bangunan</p>
			</div>

			<div class="data">
				<div class="box-container">
				<div class="detail">
					<div class="recentOrders">
						<div class="cardHeader">
							<h3>Detail Data Kelurahan</h3>
							<!-- <div aria-label="breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#">Beranda</a></li>
								<li class="breadcrumb-item"><a href="#">Daerah</a></li>
								<li class="breadcrumb-item"><a href=" {{ route('provinsi.index') }}">Provinsi</a></li>
								<li class="breadcrumb-item active" aria-current="page">Tambah Data Provinsi</li>
							</ol>
							</div> -->
							<div class=" p-0 d-flex align-items-start" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                                    <li class="breadcrumb-item"><a href="#">Daerah</a></li>
									<li class="breadcrumb-item"><a href=" {{ route('kelurahan.index') }}">Kelurahan</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Detail Data Kelurahan</li>
                                </ol>
                            </div>
						</div>
						
						<div class="table-detail d-flex flex-column align-items-center justify-content-center">
							<div class="no-detail">
								<b class="fs-3">-- {{ $no }}--</b>
							</div>
							<table class="table table-borderless custom-table">
								<tbody>
									<tr class="mb-3">
										<th width="200" class="align-middle table-primary border-bottom border-top-left ">Kode Provinsi</th>
										<td class="border-top-right">{{ $kelurahan->KD_PROPINSI }}</td>
									</tr>
									<tr class="mb-3">
										<th width="200" class="align-middle table-primary border-bottom">Kode Dati 2</th>
										<td>{{ $kelurahan->KD_DATI2 }}</td>
									</tr>
									<tr class="mb-3">
										<th width="200" class="align-middle table-primary border-bottom">Kode Kecamatan</th>
										<td> {{ $kelurahan->KD_KECAMATAN }}</td>
									</tr>
									<tr class="mb-3">
										<th width="200" class="align-middle table-primary border-bottom">Kode Kelurahan</th>
										<td>{{ $kelurahan->KD_KELURAHAN }}</td>
									</tr>
									<tr class="mb-3">
										<th width="200" class="align-middle table-primary border-bottom">Kode Sektor</th>
										<td>{{ $kelurahan->KD_SEKTOR }}</td>
									</tr>
									<tr class="mb-3">
										<th width="200" class="align-middle table-primary border-bottom">Nama Kelurahan</th>
										<td>{{ $kelurahan->NM_KELURAHAN }}</td>
									</tr>
									<tr class="mb-3">
										<th width="200" class="align-middle table-primary border-bottom">Nomor Kelurahan</th>
										<td>{{ $kelurahan->NO_KELURAHAN }}</td>
									</tr>
									<tr>
										<th  class="align-middle table-primary border-bottom-left">Kode Pos Kelurahan</th>
										<td class="border-bottom-right">{{ $kelurahan->KD_POS_KELURAHAN }}</td>
									</tr>
									</tr>
								</tbody>
							</table>
							<!-- <div class="tombol d-flex justify-content-center align-items-center gap-2">
								<a href="#"><button type="button">Update</button></a>
								<a href="#"><button type="button" class="bg-danger">Delete</button></a>
							</div> -->
						</div>

					</div>
				</div>
			</div>
@endsection