@extends('kerangka.master')
@section('title', 'Edit Data Pelayanan')
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
							<h3>Edit Data Pelayanan</h3>
							<!-- <div aria-label="breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#">Beranda</a></li>
								<li class="breadcrumb-item"><a href="{{ route('pelayanan.index') }}">Pelayanan</a></li>
								<li class="breadcrumb-item active" aria-current="page">Tambah Data Pelayanan</li>
							</ol>
							</div> -->
                            <div class=" p-0 d-flex align-items-start" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('pelayanan.index') }}">Pelayanan</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Edit Data Pelayanan</li>
                                </ol>
                            </div>
						</div>
						
                        <div class="row m-5 ">
                            <div class="col-md-6">
                                <form method="POST" action="{{ route('spop.store') }}" class="row g-4 p-3 needs-validation" novalidate>
                                    <div class="col-md-12">
                                        <label for="kd_prov" class="form-label">No Pelayanan</label>
                                        <input type="text" class="form-control" id="kd_prov" name="KD_PROPINSI" required>
                                        <div class="invalid-feedback">
                                            Isi kolom ini terlebih dahulu!
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="kd_dati" class="form-label">Kode Dati 2</label>
                                        <input type="text" class="form-control" id="kd_dati" name="KD_DATI2" required>
                                        <div class="invalid-feedback">
                                            Isi kolom ini terlebih dahulu!
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="kd_kec" class="form-label">Kode Jenis Pelayanan</label>
                                        <!-- <input type="text" class="form-control" id="kd_jenisTransaksi" name="kd_jenisTransaksi" required> -->
                                        <select class="form-select" id="kd_kec" name="KD_KECAMATAN" required>
                                            <option selected disabled value="">Choose...</option>
                                            <option value="1">[010] WAKANDA SELATAN</option>
                                            <option value="2">[020] WAKANDA TIMUR </option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Isi kolom ini terlebih dahulu!
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <label for="kd_kec" class="form-label">Lampiran Dokumen</label>
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th scope="col" width="15%" class="text-center p-3">Check</th>
                                                    <th scope="col" class="text-center p-3">Dokumen</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr >
                                                    <th scope="row" class="text-center">
                                                        <input class="form-check-input border border-primary" type="checkbox" name="ttd" id="ttd" />
                                                    </th>
                                                    <td class="p-2">1. Pengajuan Permohonan</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" class="text-center">
                                                        <input class="form-check-input border border-primary" type="checkbox" name="ttd" id="ttd" />
                                                    </th>
                                                    <td class="p-2">2. Surat Kuasa</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" class="text-center">
                                                        <input class="form-check-input border border-primary" type="checkbox" name="ttd" id="ttd" />
                                                    </th>
                                                    <td class="p-2">3. Copy KTP</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" class="text-center">
                                                        <input class="form-check-input border border-primary" type="checkbox" name="ttd" id="ttd" />
                                                    </th>
                                                    <td class="p-2">4. Copy Sertifikat Tanah</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" class="text-center">
                                                        <input class="form-check-input border border-primary" type="checkbox" name="ttd" id="ttd" />
                                                    </th>
                                                    <td class="p-2">5. Asli SPPT</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" class="text-center">
                                                        <input class="form-check-input border border-primary" type="checkbox" name="ttd" id="ttd" />
                                                    </th>
                                                    <td class="p-2">6. Copy IMB</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" class="text-center">
                                                        <input class="form-check-input border border-primary" type="checkbox" name="ttd" id="ttd" />
                                                    </th>
                                                    <td class="p-2">7. Copy Ak. Jual Beli/ Hibah</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" class="text-center">
                                                        <input class="form-check-input border border-primary" type="checkbox" name="ttd" id="ttd" />
                                                    </th>
                                                    <td class="p-2">8. Copy SK Pensiun</td>
                                                </tr>
                                                <tr>
                                                <th scope="row" class="text-center">
                                                        <input class="form-check-input border border-primary" type="checkbox" name="ttd" id="ttd" />
                                                    </th>
                                                    <td class="p-2">9. Copy SK Pensiun</td>
                                                </tr>
                                                <tr>
                                                <th scope="row" class="text-center">
                                                        <input class="form-check-input border border-primary" type="checkbox" name="ttd" id="ttd" />
                                                    </th>
                                                    <td class="p-2">10. Asli SPPD</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" class="text-center">
                                                        <input class="form-check-input border border-primary" type="checkbox" name="ttd" id="ttd" />
                                                    </th>
                                                    <td class="p-2">11. Copy SK Pengurangan</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" class="text-center">
                                                        <input class="form-check-input border border-primary" type="checkbox" name="ttd" id="ttd" />
                                                    </th>
                                                    <td class="p-2">12. Copy SK Keberatan</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" class="text-center">
                                                        <input class="form-check-input border border-primary" type="checkbox" name="ttd" id="ttd" />
                                                    </th>
                                                    <td class="p-2">13. Copy SSPD BPHTB</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" class="text-center">
                                                        <input class="form-check-input border border-primary" type="checkbox" name="ttd" id="ttd" />
                                                    </th>
                                                    <td class="p-2">14. Surat Pernyataan Milik</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" class="text-center">
                                                        <input class="form-check-input border border-primary" type="checkbox" name="ttd" id="ttd" />
                                                    </th>
                                                    <td class="p-2">15. Lain-lain</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                    
                                </form>
                            </div>
                            

                            <div class="col-md-6">
                                <form method="POST" action="{{ route('spop.store') }}" class="row g-4 p-3 needs-validation" novalidate>
                                    <div class="col-md-12">
                                        <label for="jalan_op" class="form-label">Nama Pemohon</label>
                                        <input type="text" class="form-control" id="jalan_op" name="JALAN_OP" required>
                                        <div class="invalid-feedback">
                                            Isi kolom ini terlebih dahulu!
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="blok_kav" class="form-label">Alamat Pemohon</label>
                                        <input type="text" class="form-control" id="blok_kav" name="BLOK_KAV_NO_OP" required>
                                        <div class="invalid-feedback">
                                            Isi kolom ini terlebih dahulu!
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="rw_op" class="form-label">NOP</label>
                                        <input type="text" class="form-control" id="blok_kav" name="BLOK_KAV_NO_OP" required>                                        
                                        <div class="invalid-feedback">
                                            Isi kolom ini terlebih dahulu!
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="rw_op" class="form-label">Keterangan</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
                                        <div class="invalid-feedback">
                                            Isi kolom ini terlebih dahulu!
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="rt_op" class="form-label">Letak Op</label>
                                        <input type="text" class="form-control" id="rt_op" name="RT_OP" required>
                                        <div class="invalid-feedback">
                                            Isi kolom ini terlebih dahulu!
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="kd_statusWp" class="form-label">Kecamatan</label>
                                        <!-- <input type="text" class="form-control" id="kd_statusWp" name="kd_statusWp" required> -->
                                        <select class="form-select" id="kd_statusWp" name="KD_STATUS_WP" required>
                                            <option selected disabled value="">Choose...</option>
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
                                    <div class="col-md-12">
                                        <label for="kd_statusWp" class="form-label">Kelurahan</label>
                                        <!-- <input type="text" class="form-control" id="kd_statusWp" name="kd_statusWp" required> -->
                                        <select class="form-select" id="kd_statusWp" name="KD_STATUS_WP" required  disabled>
                                            <option selected disabled value="">Choose...</option>
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
                                    <div class="col-md-12">
                                        <label for="rw_op" class="form-label">Keterangan</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
                                        <div class="invalid-feedback">
                                            Isi kolom ini terlebih dahulu!
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="rt_op" class="form-label">Tanggal Perkiraan Selesai</label>
                                        <input type="text" class="form-control" id="rt_op" name="RT_OP" required>
                                        <div class="invalid-feedback">
                                            Isi kolom ini terlebih dahulu!
                                        </div>
                                    </div>
                                </form> 
                            </div>

                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary" style="width:150px;">Simpan</button>
                            </div>
                        </div>
					</div>
				</div>
			</div>
@endsection