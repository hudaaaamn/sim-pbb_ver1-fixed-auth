@extends('kerangka.master')

@section('title', 'Assign NOP')

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
							<h3>Assign NOP</h3>
                            <div class=" p-0 d-flex align-items-start" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                                    <li class="breadcrumb-item"><a href="#">Laporan</a></li>
                                    <li class="breadcrumb-item"><a href="#">Validasi</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Assign NOP</li>
                                </ol>
                            </div>
						</div>
						
                            <form method="POST" action="{{ route('provinsi.store') }}" enctype="multipart/form-data" class="row g-4 p-5">
                                @csrf
                                <div class="box1 row g-4">
                                    <div class="col-md-4">
                                        <label for="KD_KECAMATAN" class="form-label">KECAMATAN</label>
                                        <select class="form-select" id="KD_KECAMATAN" name="KD_KECAMATAN" required>
                                            <!-- <option selected disabled value="">Choose...</option> -->
                                            <option value="1">WAKANDA SELATAN</option>
                                            <option value="2">WAKANDA TIMUR</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Isi kolom ini terlebih dahulu!
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="KD_KELURAHAN" class="form-label">KELURAHAN</label>
                                        <!-- <input type="text" class="form-control" id="kd_statusWp" name="kd_statusWp" required> -->
                                        <select class="form-select" id="KD_KELURAHAN" name="KD_KELURAHAN" required  disabled>
                                            <option selected disabled value=""> </option>
                                            <option value="1">PEMILIK</option>
                                            <option value="2">PENYEWA</option>
                                            <option value="3">PENGELOLA</option>
                                            <option value="4">PEMAKAI</option>
                                            <option value="5">SENGKETA</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Isi kolom ini terlebih dahulu!
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="KD_BLOK" class="form-label">BLOK</label>
                                        <select class="form-select" id="KD_BLOK" name="KD_BLOK" required  disabled>
                                            <option selected disabled value=""> </option>
                                            <option value="1">PEMILIK</option>
                                            <option value="2">PENYEWA</option>
                                            <option value="3">PENGELOLA</option>
                                            <option value="4">PEMAKAI</option>
                                            <option value="5">SENGKETA</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Isi kolom ini terlebih dahulu!
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="PBB_MINIMAL" class="form-label">PBB Minimal</label>
                                        <input type="number" class="form-control" id="PBB_MINIMAL" name="PBB_MINIMAL" value="0">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="PBB_MAKSIMAL" class="form-label">PBB Maksimal</label>
                                        <input type="number" class="form-control" id="PBB_MAKSIMAL" name="PBB_MAKSIMAL" value="1000000000">
                                    </div>

                                    <div class="tombolAksi ">
                                        <div class="col-md-6">
                                            <button type="submit" class="btn btn-primary" >Lihat NOP</button>
                                        </div>
                                    </div>

                                    <hr>

                                </div>

                                <div class="box2 row g-4">

                                    <hr>

                                    <div class="col-md-3">
                                        <label for="VALIDASI_KE" class="form-label">Validasi Ke</label>
                                        <input type="text" class="form-control" id="VALIDASI_KE" name="VALIDASI_KE" placeholder="Tidak usah di update" >
                                    </div>
                                    <div class="col-md-3">
                                        <label for="IS_CETAK" class="form-label">Is Cetak</label>
                                        <!-- <input type="number" class="form-control" id="TahunAwal" name="TahunAwal" value="{{ date('Y') }}"> -->
                                        <select class="form-select" id="IS_CETAK" name="IS_CETAK" required>
                                            <option value="1">Tidak usah di update</option>
                                            <option value="2">Belum</option>
                                            <option value="3">Sudah</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Isi kolom ini terlebih dahulu!
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="IS_VALIDATED" class="form-label">Is Validated</label>
                                        <!-- <input type="number" class="form-control" id="TahunAkhir" name="TahunAkhir" value="{{ date('Y') }}"> -->
                                        <select class="form-select" id="IS_VALIDATED" name="IS_VALIDATED" required>
                                            <option value="1">Tidak usah di update</option>
                                            <option value="2">Belum</option>
                                            <option value="3">Sudah</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Isi kolom ini terlebih dahulu!
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="KELOMPOK" class="form-label">Kelompok</label>
                                        <input type="text" class="form-control" id="KELOMPOK" name="KELOMPOK" placeholder="Tidak usah di update" >
                                    </div>
                                    <div class="col-md-6">
                                        <label for="KATEGORI" class="form-label">Kategori</label>
                                        <select class="form-select" id="KATEGORI" name="KATEGORI" required>
                                            <option value="1">Tidak usah di update</option>
                                            <option value="2">Objek Pajak tidak dapat ditemukan lokasinya di lapangan</option>
                                            <option value="3">Objek Pajak memiliki dua atau lebih NOP untuk lokasi yang sama</option>
                                            <option value="3">Objek Pajak yang subjek pajaknya tidak dapat teridentifikasi dengan jelas atau objek pajak sudah terjual</option>
                                            <option value="3">Objek Pajak dan subjek pajaknya teridentifikasi dengan jelas</option>
                                            <option value="3">Objek Pajak dan subjek pajaknya teridentifikasi tetapi data tidak sesuai</option>
                                            <option value="3">(tanpa kategori)</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Isi kolom ini terlebih dahulu!
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="KETERANGAN" class="form-label">Keterangan</label>
                                        <input type="text" class="form-control" id="KETERANGAN" name="KETERANGAN" value="Tidak usah di update" >
                                        <div class="invalid-feedback">
                                            Isi kolom ini terlebih dahulu!
                                        </div>
                                    </div>

                                    <div class="tombolAksi ">
                                        <div class="col-md-6">
                                            <button type="submit" class="btn btn-primary" >Simpan</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
					</div>
				</div>
			</div>
@endsection