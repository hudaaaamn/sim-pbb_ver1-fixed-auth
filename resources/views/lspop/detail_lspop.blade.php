@extends('kerangka.master')

@section('title', 'Detail Data LSPOP')

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
							<h3>Detail Data LSPOP</h3>
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
                                    <li class="breadcrumb-item"><a href="#">Dokumen</a></li>
									<li class="breadcrumb-item"><a href=" {{ route('lspop.index') }}">LSPOP</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Detail Data LSPOP</li>
                                </ol>
                            </div>
						</div>
						
						<div class="table-detail d-flex flex-column align-items-center justify-content-center">
							<div class="no-detail">
								<b class="fs-3">Detail LSPOP {{ $lspop }}</b>
							</div>
							<table class="table table-striped table-hover table-bordered">
								<tbody>
									<tr class="mb-3">
										<th  scope="row" class="align-middle" width="300px">Kode Provinsi</th>
										<td >{{ $data_lspop->KD_PROPINSI }}</td>
									</tr>
									<tr class="mb-3">
										<th width="200" class="align-middle">Kode Dati2</th>
										<td>{{ $data_lspop->KD_DATI2 }}</td>
									</tr>
									<tr class="mb-3">
										<th scope="row" class="align-middle">Kode Kecamatan</th>
										<td>{{ $data_lspop->KD_KECAMATAN }}</td>
									</tr>
									<tr class="mb-3">
										<th scope="row" class="align-middle">Kode Kelurahan</th>
										<td>{{ $data_lspop->KD_KELURAHAN }}</td>
									</tr>
									<tr class="mb-3">
										<th scope="row" class="align-middle">Kode Blok</th>
										<td>{{ $data_lspop->KD_BLOK }}</td>
									</tr>
									<tr class="mb-3">
										<th scope="row" class="align-middle">No Urut</th>
										<td>{{ $data_lspop->NO_URUT }}</td>
									</tr>
									<tr class="mb-3">
										<th scope="row" class="align-middle">Kode Jenis Op</th>
										<td>{{ $data_lspop->KD_JNS_OP }}</td>
									</tr>
									<tr class="mb-3">
										<th scope="row" class="align-middle">No Bangunan</th>
										<td>{{ $data_lspop->NO_BNG }}</td>
									</tr>
									<tr class="mb-3">
										<th scope="row" class="align-middle">Kode Jpb</th>
										<td>{{ $data_lspop->KD_JPB }}</td>
									</tr>
									<tr class="mb-3">
										<th scope="row" class="align-middle">No Formulir Lspop</th>
										<td> {{ $data_lspop->NO_FORMULIR_LSPOP }} </td>
									</tr>
									<tr class="mb-3">
										<th scope="row" class="align-middle">Tahun Dibangun Bangunan</th>
										<td>{{ $data_lspop->THN_DIBANGUN_BNG }}</td>
									</tr>
									<tr class="mb-3">
										<th scope="row" class="align-middle">Tahun Renovasi Bangunan</th>
										<td>{{ $data_lspop->THN_RENOVASI_BNG }}</td>
									</tr>
									<tr class="mb-3">
										<th scope="row" class="align-middle">Luas Bangunan</th>
										<td>{{ $data_lspop->LUAS_BNG }}</td>
									</tr>
									<tr class="mb-3">
										<th scope="row" class="align-middle">Jumlah Lantai Bagunan</th>
										<td>{{ $data_lspop->JML_LANTAI_BNG }}</td>
									</tr>
									<tr class="mb-3">
										<th scope="row" class="align-middle">Kondisi Bangunan</th>
										<td>{{ $data_lspop->KONDISI_BNG }}</td>
									</tr>
									<tr class="mb-3">
										<th scope="row" class="align-middle">Jenis Konstruksi Bangunan</th>
										<td>{{ $data_lspop->JNS_KONSTRUKSI_BNG }}</td>
									</tr>
									<tr class="mb-3">
										<th scope="row" class="align-middle">Jenis Atap Bangunan</th>
										<td>{{ $data_lspop->JNS_ATAP_BNG }}</td>
									</tr>
									<tr class="mb-3">
										<th scope="row" class="align-middle">Kode Dinding</th>
										<td>{{ $data_lspop->KD_DINDING }}</td>
									</tr>
									<tr class="mb-3">
										<th scope="row" class="align-middle">Kd Lantai</th>
										<td>{{ $data_lspop->KD_LANTAI }}</td>
									</tr>
									<tr class="mb-3">
										<th scope="row" class="align-middle">Kd Langit-Langit</th>
										<td>{{ $data_lspop->KD_LANGIT_LANGIT }}</td>
									</tr>
									<tr class="mb-3">
										<th scope="row" class="align-middle">Nilai Sistem Bangunan</th>
										<td>{{ $data_lspop->NILAI_SISTEM_BNG }}</td>
									</tr>
									<tr class="mb-3">
										<th scope="row" class="align-middle">Jenis Transaksi Bangunan</th>
										<td>{{ $data_lspop->JNS_TRANSAKSI_BNG }}</td>
									</tr>
									<tr class="mb-3">
										<th scope="row" class="align-middle">Tanggal Pendataan Bangunan</th>
										<td>{{ $data_lspop->TGL_PENDATAAN_BNG }}</td>
									</tr>
									<tr class="mb-3">
										<th scope="row" class="align-middle">NIP Pendata Bangunan</th>
										<td>{{ $data_lspop->NIP_PENDATA_BNG }}</td>
									</tr>
									<tr class="mb-3">
										<th scope="row" class="align-middle">Tanggal Pemeriksaan Bangunan</th>
										<td>{{ $data_lspop->TGL_PEMERIKSAAN_BNG }}</td>
									</tr>
									<tr class="mb-3">
										<th scope="row" class="align-middle">NIP Pemeriksa Bangunan</th>
										<td>{{ $data_lspop->NIP_PEMERIKSA_BNG }}</td>
									</tr>
									<tr class="mb-3">
										<th scope="row" class="align-middle">Tanggal Perekaman Bangunan</th>
										<td></td>
									</tr>
									<tr class="mb-3">
										<th scope="row" class="align-middle">NIP Perekam Bangunan</th>
										<td></td>
									</tr>
									<tr class="mb-3">
										<th scope="row" class="align-middle">Tanggal Kunjungan Kembali</th>
										<td>{{ $data_lspop->TGL_KUNJUNGAN_KEMBALI }}</td>
									</tr>
									<tr class="mb-3">
										<th scope="row" class="align-middle">Nilai Individu</th>
										<td>{{ $data_lspop->NILAI_INDIVIDU }}</td>
									</tr>
									<tr>
										<th  class="align-middle ">Aktif</th>
										<td class="border-bottom-right">{{ $data_lspop->AKTIF }}</td>
									</tr>
									</tr>
								</tbody>
							</table>
							<div class="tombol d-flex justify-content-center align-items-center gap-2">
								<a href="#"><button type="button">Update</button></a>
								<a href="#"><button type="button" class="bg-danger">Delete</button></a>
							</div>
						</div>

					</div>
				</div>
			</div>
@endsection