@extends('kerangka.master')

@section('title', 'Detail Data Provinsi')

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
							<h3>Detail Data Provinsi</h3>
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
									<li class="breadcrumb-item"><a href=" {{ route('provinsi.index') }}">Provinsi</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Detail Data Provinsi</li>
                                </ol>
                            </div>
						</div>
						
						<div class="table-detail d-flex flex-column align-items-center justify-content-center">
							<div class="no-detail">
								<b class="fs-3">-- {{ $no }} --</b>
							</div>
							<table class="table table-borderless custom-table">
								<tbody>
									<tr class="mb-3">
										<th width="200" class="align-middle table-primary border-bottom border-top-left ">Kode Provinsi</th>
										<td class="border-top-right">{{ $provinsi->KD_PROPINSI }}</td>
									</tr>
									<tr>
										<th  class="align-middle table-primary border-bottom-left">Nama Provinsi</th>
										<td class="border-bottom-right"> {{ $provinsi->NM_PROPINSI }} </td>
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