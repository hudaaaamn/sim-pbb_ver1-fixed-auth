@extends('kerangka.master')
@section('title', 'Detail Data Pelayanan')
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
							<h3>Detail Data Pelayanan</h3>
							<!-- <div aria-label="breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#">Beranda</a></li>
								<li class="breadcrumb-item"><a href="#">Pelayanan</a></li>
								<li class="breadcrumb-item active" aria-current="page">Edit Data Pelayanan</li>
							</ol>
							</div> -->
                            <div class=" p-0 d-flex align-items-start" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('pelayanan.index') }}">Pelayanan</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Detail Data Pelayanan</li>
                                </ol>
                            </div>
						</div>
						
                        <form class="row g-4 p-5">
                        <div class="col-md-6">
                                <label for="id" class="form-label">ID</label>
                                <input type="text" class="form-control" id="id" name="id" value="{{ $model->ID }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="keterangan" class="form-label">Keterangan</label>
                                <input type="text" class="form-control" id="keterangan" name="keterangan" value="{{ $model->KETERANGAN }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="nm_pemohon" class="form-label">Nama Pemohon</label>
                                <input type="text" class="form-control" id="nm_pemohon" name="nm_pemohon" value="{{ $model->NAMA_PEMOHON }}">
                            </div>
                            <div class="col-md-6">
                                <label for="tgl_masukPenilai" class="form-label">Tanggal Masuk Penilai</label>
                                <input type="text" class="form-control" id="tgl_masukPenilai" name="tgl_masukPenilai" value="{{ optional($model->TGL_MASUK_PENILAI)->format('Y-m-d') ?? '(Kosong)' }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="alamat_pemohon" class="form-label">Alamat Pemohon</label>
                                <input type="text" class="form-control" id="alamat_pemohon" name="alamat_pemohon" value="{{ $model->ALAMAT_PEMOHON }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="nip_masukPenilai" class="form-label">Nip Masuk Penilai</label>
                                <input type="text" class="form-control" id="nip_masukPenilai" name="nip_masukPenilai" value="{{ $model->NIP_MASUK_PENILAI }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="no_pelayanan" class="form-label">No Pelayanan</label>
                                <input type="text" class="form-control" id="no_pelayanan" value="{{ $model->NO_PELAYANAN }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="tgl_selesai" class="form-label">Tanggal Selesai</label>
                                <input type="text" class="form-control" id="tgl_selesai" name="tgl_selesai" value="{{ optional($model->TGL_SELESAI)->format('Y-m-d') ?? '(Kosong)' }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="tgl_pelayanan" class="form-label">Tanggal Pelayanan</label>
                                <input type="text" class="form-control" id="tgl_pelayanan" name="tgl_pelayanan" value="{{ optional($model->TANGGAL_PELAYANAN)->format('Y-m-d') ?? '(Kosong)' }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="nip_selesai" class="form-label">NIP Selesai</label>
                                <input type="text" class="form-control" id="nip_selesai" name="nip_selesai" value="{{ $model->NIP_SELESAI }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="kd_prov" class="form-label">Kode Provinsi</label>
                                <input type="text" class="form-control" id="kd_prov" name="kd_prov" value="{{ $model->KD_PROPINSI }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="tgl_konfirmasiWp" class="form-label">Tanggal Konfirmasi Wp</label>
                                <input type="text" class="form-control" id="tgl_konfirmasiWp" name="tgl_konfirmasiWp" value="{{ optional($model->TGL_TERKONFIRMASI_WP)->format('Y-m-d') ?? '(Kosong)' }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="kd_dati" class="form-label">Kode Dati</label>
                                <input type="text" class="form-control" id="kd_dati" name="kd_dati" value="{{ $model->KD_DATI2 }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="nip_terkonfirmasiWp" class="form-label">NIP Terkonfirmasi Wp</label>
                                <input type="text" class="form-control" id="nip_terkonfirmasiWp" name="nip_terkonfirmasiWp" value="{{ $model->NIP_TERKONFIRMASI_WP }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="Kecamatan" class="form-label">Kecamatan</label>
                                <input type="text" class="form-control" id="Kecamatan" name="Kecamatan" value="{{ $model->KD_KECAMATAN }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="ttd_jabatanKiri" class="form-label">Tanda Tangan Jabatan Kiri</label>
                                <input type="text" class="form-control" id="ttd_jabatanKiri" name="ttd_jabatanKiri" value="{{ $model->TTD_JABATAN_KIRI }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="kelurahan" class="form-label">Kelurahan</label>
                                <input type="text" class="form-control" id="kelurahan" name="kelurahan" value="{{ $model->KD_KELURAHAN }}" readonly >
                            </div>
                            <div class="col-md-6">
                                <label for="ttd_namaKiri" class="form-label">Tanda Tangan Nama Kiri</label>
                                <input type="text" class="form-control" id="ttd_namaKiri" name="ttd_namaKiri" value="{{ $model->TTD_NAMA_KIRI }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="blk" class="form-label">BLK</label>
                                <input type="text" class="form-control" id="blk" name="blk" value="{{ $model->KD_BLOK }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="ttd_nipKiri" class="form-label">Tanda Tangan NIP Kiri</label>
                                <input type="text" class="form-control" id="ttd_nipKiri" name="ttd_nipKiri" value="{{ $model->TTD_NIP_KIRI }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="urut" class="form-label"> No Urut</label>
                                <input type="text" class="form-control" id="urut" name="urut" value="{{ $model->NO_URUT }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="ttd_jabatanKanan" class="form-label"> Tanda Tangan Jabatan kanan </label>
                                <input type="text" class="form-control" id="ttd_jabatanKanan" name="ttd_jabatanKanan" value="{{ $model->TTD_JABATAN_KANAN }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="kd_jenis_op" class="form-label">Kode Jenis OP</label>
                                <input type="text" class="form-control" id="kd_jenis_op" name="KD_JNS_OP" value="{{ $model->KD_JNS_OP }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="TTD_NAMA_KANAN" class="form-label"> Tanda Tangan Nama Kanan</label>
                                <input type="text" class="form-control" id="TTD_NAMA_KANAN" name="TTD_NAMA_KANAN" value="{{ $model->TTD_NAMA_KANAN }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="KD_JNS_PELAYANAN" class="form-label"> Kode Jenis Pelayanan</label>
                                <input type="text" class="form-control" id="KD_JNS_PELAYANAN" name="KD_JNS_PELAYANAN" value="{{ $model->KD_JNS_PELAYANAN }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="TTD_NIP_KANAN" class="form-label">Tanda Tangan NIP Kanan </label>
                                <input type="text" class="form-control" id="TTD_NIP_KANAN" name="TTD_NIP_KANAN" value="{{ $model->TTD_NIP_KANAN }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="TANGGAL_PERKIRAAN_SELESAI" class="form-label"> Tanggal Perkiraan Selesai</label>
                                <input type="text" class="form-control" id="TANGGAL_PERKIRAAN_SELESAI" name="TANGGAL_PERKIRAAN_SELESAI" value="{{ optional($model->TANGGAL_PERKIRAAN_SELESAI)->format('Y-m-d') ?? '(Kosong)' }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="TGL_PENETAPAN" class="form-label">Tanggal Penetapan</label>
                                <input type="text" class="form-control" id="TGL_PENETAPAN" name="TGL_PENETAPAN" value="{{ optional($model->TGL_PENETAPAN)->format('Y-m-d') ?? '(Kosong)' }}" readonly>
                            </div>


                            <div class="col-md-6">
                                <label for="STATUS_PELAYANAN" class="form-label">Status Pelayanan </label>
                                <input type="text" class="form-control" id="STATUS_PELAYANAN" name="STATUS_PELAYANAN" value="{{ $model->STATUS_PELAYANAN }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="NIP_PENETAPAN" class="form-label"> NIP Penetapan</label>
                                <input type="text" class="form-control" id="NIP_PENETAPAN" name="NIP_PENETAPAN" value="{{ $model->NIP_PENETAPAN }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="NIP_PETUGAS_PENERIMA" class="form-label">NIP Petugas Penerima </label>
                                <input type="text" class="form-control" id="NIP_PETUGAS_PENERIMA" name="NIP_PETUGAS_PENERIMA" value="{{ $model->NIP_PETUGAS_PENERIMA }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="TGL_BERKAS_DITUNDA" class="form-label"> Tanggal Berkas Ditunda</label>
                                <input type="text" class="form-control" id="TGL_BERKAS_DITUNDA" name="TGL_BERKAS_DITUNDA" value="{{ optional($model->TGL_BERKAS_DITUNDA)->format('Y-m-d') ?? '(Kosong)' }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="NAMA_PETUGAS_PENERIMA" class="form-label">Nama Petugas Penerima</label>
                                <input type="text" class="form-control" id="NAMA_PETUGAS_PENERIMA" name="NAMA_PETUGAS_PENERIMA" value="{{ $model->NAMA_PETUGAS_PENERIMA }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="NIP_BERKAS_DITUNDA" class="form-label">NIP Berkas Ditunda</label>
                                <input type="text" class="form-control" id="NIP_BERKAS_DITUNDA" name="NIP_BERKAS_DITUNDA" value="{{ $model->NIP_BERKAS_DITUNDA }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="NIP_AR" class="form-label">NIP AR</label>
                                <input type="text" class="form-control" id="NIP_AR" name="NIP_AR" value="{{ $model->NIP_AR }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="LETAK_OP" class="form-label">Letak OP </label>
                                <input type="text" class="form-control" id="LETAK_OP" name="LETAK_OP" value="{{ $model->LETAK_OP }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="nama_ar" class="form-label">Nama AR</label>
                                <input type="text" class="form-control" id="nama_ar" name="nama_ar" value="{{ $model->NAMA_AR }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="Kecamatan" class="form-label"> Kecamatan </label>
                                <input type="text" class="form-control" id="Kecamatan" name="Kecamatan" value="{{ $model->KECAMATAN }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="catatan" class="form-label">Catatan</label>
                                <input type="text" class="form-control" id="catatan" name="catatan" value="{{ $model->CATATAN }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="kelurahan" class="form-label">Kelurahan</label>
                                <input type="text" class="form-control" id="kelurahan" name="kelurahan" value="{{ $model->KELURAHAN }}" readonly>
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