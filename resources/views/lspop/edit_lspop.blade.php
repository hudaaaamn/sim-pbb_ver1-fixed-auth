@extends('kerangka.master')

@section('title', 'Edit Data LSPOP')

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
							<h3>Edit Data LSPOP</h3>
							<!-- <div aria-label="breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#">Beranda</a></li>
								<li class="breadcrumb-item"><a href="#">Dokumen</a></li>
								<li class="breadcrumb-item"><a href="{{ route('kelurahan.index') }}">LSPOP</a></li>
								<li class="breadcrumb-item active" aria-current="page">Edit Data LSPOP</li>
							</ol>
							</div> -->
                            <div class=" p-0 d-flex align-items-start" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                                    <li class="breadcrumb-item"><a href="#">Laporan</a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('lspop.index') }}">LSPOP</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Edit Data LSPOP</li>
                                </ol>
                            </div>
						</div>
						
                        <form method="POST" action="{{ route('lspop.store') }}" enctype="multipart/form-data" class="row g-4 p-5">
                        @csrf    
                            <div class="col-md-6">
                                <label for="KodeProvinsi" class="form-label">Kode Provinsi</label>
                                <input type="text" class="form-control" id="KodeProvinsi" name="KodeProvinsi" >
                            </div>
                            <div class="col-md-6">
                                <label for="KodeDati2" class="form-label">Kode Dati 2</label>
                                <input type="text" class="form-control" id="KodeDati2" name="KodeDati2">
                            </div>
                            <div class="col-md-6">
                                <label for="KodeKecamatan" class="form-label">Kode Kecamatan</label>
                                <input type="text" class="form-control" id="KodeKecamatan" name="KodeKecamatan">
                            </div>
                            <div class="col-md-6">
                                <label for="KodeKelurahan" class="form-label">Kode Kelurahan</label>
                                <input type="text" class="form-control" id="KodeKelurahan" name="KodeKelurahan">
                            </div>
                            <div class="col-md-6">
                                <label for="KodeBlok" class="form-label">Kode Blok</label>
                                <input type="text" class="form-control" id="KodeBlok" name="KodeBlok">
                            </div>
                            <div class="col-md-6">
                                <label for="NoUrut" class="form-label">No Urut</label>
                                <input type="text" class="form-control" id="NoUrut" name="NoUrut">
                            </div>
                            <div class="col-md-6">
                                <label for="KodeJenisOp" class="form-label">Kode Jenis Op</label>
                                <input type="text" class="form-control" id="KodeJenisOp" name="KodeJenisOp">
                            </div>
                            <div class="col-md-6">
                                <label for="NoBangunan" class="form-label">No Bangunan</label>
                                <input type="text" class="form-control" id="NoBangunan" name="NoBangunan">
                            </div>
                            <div class="col-md-6">
                                <label for="KodeJpb" class="form-label">Kode Jpb</label>
                                <input type="text" class="form-control" id="KodeJpb" name="KodeJpb" >
                            </div>
                            <div class="col-md-6">
                                <label for="NoFormulirLspop" class="form-label">No Formulir Lspop</label>
                                <input type="text" class="form-control" id="NoFormulirLspop" name="NoFormulirLspop">
                            </div>
                            <div class="col-md-6">
                                <label for="TahunDibangunBangunan" class="form-label">Tahun Dibangun Bangunan</label>
                                <input type="text" class="form-control" id="TahunDibangunBangunan" name="TahunDibangunBangunan">
                            </div>
                            <div class="col-md-6">
                                <label for="TahunRenovasiBangunan" class="form-label">Tahun Renovasi Bangunan</label>
                                <input type="text" class="form-control" id="TahunRenovasiBangunan" name="TahunRenovasiBangunan">
                            </div>
                            <div class="col-md-6">
                                <label for="LuasBangunan" class="form-label">Luas Bangunan</label>
                                <input type="text" class="form-control" id="LuasBangunan" name="LuasBangunan">
                            </div>
                            <div class="col-md-6">
                                <label for="JumlahLantaiBangunan" class="form-label">Julah Lantai Bangunan</label>
                                <input type="text" class="form-control" id="JumlahLantaiBangunan" name="JumlahLantaiBangunan">
                            </div>
                            <div class="col-md-6">
                                <label for="KondisiBangunan" class="form-label">Kondisi Bangunan</label>
                                <input type="text" class="form-control" id="KondisiBangunan" name="KondisiBangunan">
                            </div>
                            <div class="col-md-6">
                                <label for="JenisKonstruksiBangunan" class="form-label">Jenis Konstruksi Bangunan</label>
                                <input type="text" class="form-control" id="JenisKonstruksiBangunan" name="JenisKonstruksiBangunan">
                            </div>
                            <div class="col-md-6">
                                <label for="JenisAtapBangunan" class="form-label">Jenis Atap Bangunan</label>
                                <input type="text" class="form-control" id="JenisAtapBangunan" name="JenisAtapBangunan" >
                            </div>
                            <div class="col-md-6">
                                <label for="KdDinding" class="form-label">Kd Dinding</label>
                                <input type="text" class="form-control" id="KdDinding" name="KdDinding">
                            </div>
                            <div class="col-md-6">
                                <label for="KdLantai" class="form-label">Kd Lantai</label>
                                <input type="text" class="form-control" id="KdLantai" name="KdLantai">
                            </div>
                            <div class="col-md-6">
                                <label for="KdLangit-Langit" class="form-label">Kd Langit-Langit</label>
                                <input type="text" class="form-control" id="KdLangit-Langit" name="KdLangit-Langit">
                            </div>
                            <div class="col-md-6">
                                <label for="NilaiSistemBangunan" class="form-label">Nilai Sistem Bangunan</label>
                                <input type="text" class="form-control" id="NilaiSistemBangunan" name="NilaiSistemBangunan">
                            </div>
                            <div class="col-md-6">
                                <label for="JenisTransaksiKelurahan" class="form-label">Jenis Transaksi Bangunan</label>
                                <input type="text" class="form-control" id="JenisTransaksiKelurahan" name="JenisTransaksiKelurahan">
                            </div>
                            <div class="col-md-6">
                                <label for="TanggalPendataanBangunan" class="form-label">Tanggal Pendataan Bangunan</label>
                                <input type="text" class="form-control" id="TanggalPendataanBangunan" name="TanggalPendataanBangunan">
                            </div>
                            <div class="col-md-6">
                                <label for="NIPPendataBangunan" class="form-label">NIP Pendata Bangunan</label>
                                <input type="text" class="form-control" id="NIPPendataBangunan" name="NIPPendataBangunan" >
                            </div>
                            <div class="col-md-6">
                                <label for="TanggalPemeriksaanBangunan" class="form-label">Tanggal Pemeriksaan Bangunan</label>
                                <input type="text" class="form-control" id="TanggalPemeriksaanBangunan" name="TanggalPemeriksaanBangunan">
                            </div>
                            <div class="col-md-6">
                                <label for="NIPPemeriksaBangunan" class="form-label">NIP Pemeriksa Bangunan</label>
                                <input type="text" class="form-control" id="NIPPemeriksaBangunan" name="NIPPemeriksaBangunan">
                            </div>
                            <div class="col-md-6">
                                <label for="TanggalPerekamanBangunan" class="form-label">Tanggal Perekaman Bangunan</label>
                                <input type="text" class="form-control" id="TanggalPerekamanBangunan" name="TanggalPerekamanBangunan">
                            </div>
                            <div class="col-md-6">
                                <label for="NIPPerekamBangunan" class="form-label">NIP Perekam Bangunan</label>
                                <input type="text" class="form-control" id="NIPPerekamBangunan" name="NIPPerekamBangunan">
                            </div>
                            <div class="col-md-6">
                                <label for="TanggalKunjunganKembali" class="form-label">Tanggal Kunjungan Kembali</label>
                                <input type="text" class="form-control" id="TanggalKunjunganKembali" name="TanggalKunjunganKembali">
                            </div>
                            <div class="col-md-6">
                                <label for="NilaiIndividu" class="form-label">Nilai Individu</label>
                                <input type="text" class="form-control" id="NilaiIndividu" name="NilaiIndividu">
                            </div>
                            <div class="col-md-6">
                                <label for="Aktif" class="form-label">Aktif</label>
                                <input type="text" class="form-control" id="Aktif" name="Aktif">
                            </div>

                            <div class="col-md-12 col-md-12 text-center">
                                <button type="submit" class="btn btn-primary " style="width:150px;">Edit</button>
                                <button type="submit" class="btn btn-danger " style="width:150px;">Hapus</button>
                            </div>
                        </form>

					</div>
				</div>
			</div>
@endsection