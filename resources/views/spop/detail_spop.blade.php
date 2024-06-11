@extends('kerangka.master')
@section('title', 'Detail Data SPOP')
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
                    <h3>Detail Data SPOP</h3>
                    <div class=" p-0 d-flex align-items-start" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                            <li class="breadcrumb-item"><a href="#">Dokumen</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('spop.index') }}">SPOP</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Detail Data SPOP</li>
                        </ol>
                    </div>
                </div>

                <div class="no-detail d-flex justify-content-center">
                    <b class="fs-3">-- 1 --</b>
                </div>

                <div class="BoxUtama">
                    <div class="Box1">
                        <form method="POST" action="{{ route('spop.store') }}" enctype="multipart/form-data" class="row g-4 p-3">
                            @csrf
                            <div class="col-md-12 d-flex justify-content-center">
                                <b>DETAIL</b>
                            </div>

                            <div class="col-md-12">
                                <label for="kd_prov" class="form-label">Kode Provinsi</label>
                                <input type="text" class="form-control" id="kd_prov" name="KD_PROPINSI" value="{{ $result->KD_PROPINSI }}" readonly>
                                <div class="invalid-feedback">
                                    Isi kolom ini terlebih dahulu!
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="kd_dati" class="form-label">Kode Dati 2</label>
                                <input type="text" class="form-control" id="kd_dati" name="KD_DATI2" value="{{ $result->KD_DATI2}}" readonly>
                                <div class="invalid-feedback">
                                    Isi kolom ini terlebih dahulu!
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="kd_kec" class="form-label">Kode Kecamatan</label>
                                <!-- <input type="text" class="form-control" id="kd_jenisTransaksi" name="kd_jenisTransaksi" disabled> -->
                                <input type="text" class="form-control" id="kd_kec" name="KD_KECAMATAN" value="{{ $result->KD_KECAMATAN}}" readonly>
                                <div class="invalid-feedback">
                                    Isi kolom ini terlebih dahulu!
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="kd_kel" class="form-label">Kode Kelurahan</label>
                                <input type="text" class="form-control" id="kd_kel" name="KD_KELURAHAN" value="{{ $result->KD_KELURAHAN}}" readonly>
                                <div class="invalid-feedback">
                                    Isi kolom ini terlebih dahulu!
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="kd_blok" class="form-label">Kode Blok</label>
                                <input type="text" class="form-control" id="kd_blok" name="KD_BLOK" value="{{ $result->KD_BLOK }}" readonly>
                                <div class="invalid-feedback">
                                    Isi kolom ini terlebih dahulu!
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="no_urut" class="form-label">No Urut</label>
                                <input type="text" class="form-control" id="no_urut" name="NO_URUT" value="{{ $result->NO_URUT }}" readonly>
                                <div class="invalid-feedback">
                                    Isi kolom ini terlebih dahulu!
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="kd_jenisOp" class="form-label">Kode Jenis Op</label>
                                <input type="text" class="form-control" id="kd_jenis" name="KD_JNS_OP" value="{{ $result->KD_JNS_OP }}" readonly>
                                <div class="invalid-feedback">
                                    Isi kolom ini terlebih dahulu!
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="kd_jenisTransaksi" class="form-label">Jenis Transaksi Op</label>
                                <!-- <input type="text" class="form-control" id="kd_jenisTransaksi" name="kd_jenisTransaksi" disabled> -->
                                <input type="text" class="form-control" id="kd_jenisTransaksi" name="JNS_TRANSAKSI_OP" value="{{ $result->JNS_TRANSAKSI_OP }}" readonly>
                                <div class="invalid-feedback">
                                    Isi kolom ini terlebih dahulu!
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="no_spptLama" class="form-label">No Sppt Lama</label>
                                <input type="text" class="form-control" id="no_spptLama" name="NO_SPPT_LAMA" value="{{ $result->NO_SPPT_LAMA }}" readonly>
                                <div class="invalid-feedback">
                                    Isi kolom ini terlebih dahulu!
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="sbj_pajak" class="form-label">Subjek Pajak ID</label>
                                <input type="text" class="form-control" id="sbj_pajak" name="SUBJEK_PAJAK_ID" value="{{ $result->SUBJEK_PAJAK_ID }}" readonly>
                                <div class="invalid-feedback">
                                    Isi kolom ini terlebih dahulu!
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="Box2">
                        <form enctype="multipart/form-data" class="row g-4 p-3">
                            @csrf
                            <div class="col-md-12 d-flex justify-content-center">
                                <b>DATA LETAK OBJEK PAJAK</b>
                            </div>

                            <div class="col-md-12">
                                <label for="jalan_op" class="form-label">Jalan Op</label>
                                <input type="text" class="form-control" id="jalan_op" name="JALAN_OP" value="{{ $result->JALAN_OP }}" readonly>
                            </div>
                            <div class="col-md-12">
                                <label for="blok_kav" class="form-label">Blok Kav No Op</label>
                                <input type="text" class="form-control" id="blok_kav" name="BLOK_KAV_NO_OP" value="{{ $result->BLOK_KAV_NO_OP }}" readonly>
                            </div>
                            <div class="col-md-12">
                                <label for="kel_op" class="form-label">Kelurahan Op</label>
                                <input type="text" class="form-control" id="kel_op" name="KEL_OP" value="{{ $result->KELURAHAN_OP }}" readonly>
                            </div>
                            <div class="col-md-12">
                                <label for="rw_op" class="form-label">RW Op</label>
                                <input type="text" class="form-control" id="rw_op" name="RW_OP" value="{{ $result->RW_OP }}" readonly>
                            </div>
                            <div class="col-md-12">
                                <label for="rt_op" class="form-label">RT Op</label>
                                <input type="text" class="form-control" id="rt_op" name="RT_OP" value="{{ $result->RT_OP }}" readonly>
                            </div>
                            <div class="col-md-12">
                                <label for="kd_statusWp" class="form-label">Kode Status Wp</label>
                                <input type="text" class="form-control" id="kd_statusWp" name="KD_STATUS_WP" value="{{ $result->KD_STATUS_WP }}" readonly>

                            </div>
                            <div class="col-md-12">
                                <label for="luas_bumi" class="form-label">Luas Bumi</label>
                                <input type="text" class="form-control" id="luas_bumi" name="LUAS_BUMI" value="{{ $result->LUAS_BUMI }}" readonly>
                            </div>
                            <div class="col-md-12">
                                <label for="kd_znt" class="form-label">Kode Znt</label>
                                <input type="text" class="form-control" id="kd_znt" name="KD_ZNT" value="{{ $result->KD_ZNT }}" readonly>
                            </div>
                            <div class="col-md-12">
                                <label for="jns_bumi" class="form-label">Jenis Bumi</label>
                                <input type="text" class="form-control" id="jns_bumi" name="JNS_BUMI" value="{{ $result->JNS_BUMI }}" readonly>

                            </div>
                            <div class="col-md-12">
                                <label for="hsl_stmBumi" class="form-label">Nilai Sistem Bumi</label>
                                <input type="text" class="form-control" id="hsl_stmBumi" name="NILAI_SISTEM_BUMI" value="{{ $result->NILAI_SISTEM_BUMI }}" readonly>
                            </div>

                        </form>
                    </div>
                    <div class="Box3">
                        <form method="POST" enctype="multipart/form-data" class="row g-4 p-3">
                            @csrf
                            <div class="col-md-12 d-flex justify-content-center">
                                <b>DATA BERSAMA</b>
                            </div>

                            <div class="col-md-12 ">
                                <label for="kd_prov_bersama" class="form-label">Kode Provinsi Bersama</label>
                                <input type="text" class="form-control" id="kd_prov_bersama" name="KD_PROPINSI_BERSAMA" value="{{ $result->KD_PROPINSI_BERSAMA }}" readonly>
                            </div>
                            <div class="col-md-12">
                                <label for="kd_dati2_bersama" class="form-label">Kode Dati2 Bersama</label>
                                <input type="text" class="form-control" id="kd_dati2_bersama" name="KD_DATI2_BERSAMA" value="{{ $result->KD_DATI2_BERSAMA }}" readonly>
                            </div>
                            <div class="col-md-12">
                                <label for="kd_kec_bersama" class="form-label">Kode Kecamatan Bersama</label>
                                <input type="text" class="form-control" id="kd_kec_bersama" name="KD_KECAMATAN_BERSAMA" value="{{ $result->KD_KECAMATAN_BERSAMA }}" readonly>
                            </div>
                            <div class="col-md-12 ">
                                <label for="kd_kel_bersama" class="form-label">Kode Kelurahan Bersama</label>
                                <input type="text" class="form-control" id="kd_kel_bersama" name="KD_KELURAHAN_BERSAMA" value="{{ $result->KD_KELURAHAN_BERSAMA }}" readonly>
                            </div>
                            <div class="col-md-12">
                                <label for="kd_blok_bersama" class="form-label">Kode Blok Bersama</label>
                                <input type="text" class="form-control" id="kd_blok_bersama" name="KD_BLOK_BERSAMA" value="{{ $result->KD_BLOK_BERSAMA }}" readonly>
                            </div>
                            <div class="col-md-12">
                                <label for="no_urut_bersama" class="form-label">No Urut Bersama</label>
                                <input type="text" class="form-control" id="no_urut_bersama" name="NO_URUT_BERSAMA" value="{{ $result->NO_URUT_BERSAMA }}" readonly>
                            </div>
                            <div class="col-md-12">
                                <label for="kd_jns_op_bersama" class="form-label">Kode Jenis OP Bersama</label>
                                <input type="text" class="form-control" id="kd_jns_op_bersama" name="KD_JNS_OP_BERSAMA" value="{{ $result->KD_JNS_OP_BERSAMA }}" readonly>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="BoxUtama">
                    <div class="Box1">
                        <form method="POST" enctype="multipart/form-data" class="row g-4 p-3">
                            @csrf
                            <div class="col-md-12 d-flex justify-content-center">
                                <b>DATA ASAL</b>
                            </div>

                            <div class="col-md-12 ">
                                <label for="kd_prov_asal" class="form-label">Kode Provinsi Asal</label>
                                <input type="text" class="form-control" id="kd_prov_asal" name="KD_PROPINSI_ASAL" value="{{ $result->KD_PROPINSI_ASAL }}" readonly>
                            </div>
                            <div class="col-md-12">
                                <label for="kd_dati2_asal" class="form-label">Kode Dati2 Asal</label>
                                <input type="text" class="form-control" id="kd_dati2_asal" name="KD_DATI2_ASAL" value="{{ $result->KD_DATI2_ASAL }}" readonly>
                            </div>
                            <div class="col-md-12">
                                <label for="kd_kec_asal" class="form-label">Kode Kecamatan Asal</label>
                                <input type="text" class="form-control" id="kd_kec_asal" name="KD_KECAMATAN_ASAL" value="{{ $result->KD_KECAMATAN_ASAL }}" readonly>
                            </div>
                            <div class="col-md-12 ">
                                <label for="kd_kel_asal" class="form-label">Kode Kelurahan Asal</label>
                                <input type="text" class="form-control" id="kd_kel_asal" name="KD_KELURAHAN_ASAL" value="{{ $result->KD_KELURAHAN_ASAL }}" readonly>
                            </div>
                            <div class="col-md-12">
                                <label for="kd_blok_asal" class="form-label">Kode Blok Asal</label>
                                <input type="text" class="form-control" id="kd_blok_asal" name="KD_BLOK_ASAL" value="{{ $result->KD_BLOK_ASAL }}" readonly>
                            </div>
                            <div class="col-md-12">
                                <label for="no_urut_asal" class="form-label">No Urut Asal</label>
                                <input type="text" class="form-control" id="no_urut_asal" name="NO_URUT_ASAL" value="{{ $result->NO_URUT_ASAL }}" readonly>
                            </div>
                            <div class="col-md-12 ">
                                <label for="kd_jns_op_asal" class="form-label">Kode Jenis OP Asal</label>
                                <input type="text" class="form-control" id="kd_jns_op_asal" name="KD_JNS_OP_ASAL" value="{{ $result->KD_JNS_OP_ASAL }}" readonly>
                            </div>
                        </form>
                    </div>
                    <div class="Box2">
                        <form method="POST" action="{{ route('provinsi.store') }}" enctype="multipart/form-data" class="row g-4 p-3">
                            @csrf
                            <div class="col-md-12 d-flex justify-content-center">
                                <b>DETAIL PENDATAAN OP</b>
                            </div>

                            <div class="col-md-12">
                                <label for="tgl_pendataanOp" class="form-label">Tanggal Pendataan OP</label>
                                <input type="text" class="form-control" id="tgl_pendataanOp" name="TGL_PENDATAAN_OP" value="{{ $result->TGL_PENDATAAN_OP }}" readonly>
                            </div>
                            <div class="col-md-12">
                                <label for="nm_pendataOp" class="form-label">Nama Pendata OP</label>
                                <input type="text" class="form-control" id="nm_pendataOp" name="NM_PENDATAAN_OP" value="{{ $result->NM_PENDATAAN_OP }}" readonly>
                            </div>
                            <div class="col-md-12">
                                <label for="nip_pendata" class="form-label">NIP Pendata</label>
                                <input type="text" class="form-control" id="nip_pendata" name="NIP_PENDATA" value="{{ $result->NIP_PENDATA }}" readonly>
                            </div>
                        </form>
                    </div>
                    <div class="Box3">
                        <form method="POST" enctype="multipart/form-data" class="row g-4 p-3">
                            @csrf
                            <div class="col-md-12 d-flex justify-content-center">
                                <b>DETAIL PEMERIKSAAN OP</b>
                            </div>

                            <div class="col-md-12">
                                <label for="tgl_pemeriksaanOp" class="form-label">Tanggal Pemeriksaan Op</label>
                                <input type="text" class="form-control" id="tgl_pemeriksaanOp" name="TGL_PEMERIKSAAN_OP" value="{{ $result->TGL_PEMERIKSAAN_OP }}" readonly>
                            </div>
                            <div class="col-md-12">
                                <label for="nm_pemeriksaOp" class="form-label">Nama Pemeriksa OP</label>
                                <input type="text" class="form-control" id="nm_pemeriksaOp" name="NM_PEMERIKSAAN_OP" value="{{ $result->NM_PEMERIKSAAN_OP }}" readonly>
                            </div>
                            <div class="col-md-12">
                                <label for="nip_pemeriksaOp" class="form-label">NIP Pemeriksa Op</label>
                                <input type="text" class="form-control" id="nip_pemeriksaOp" name="NIP_PEMERIKSA_OP" value="{{ $result->NIP_PEMERIKSA_OP }}" readonly>
                            </div>
                            <div class="col-md-12">
                                <label for="no_persil" class="form-label">No Persil</label>
                                <input type="text" class="form-control" id="no_persil" name="NO_PERSIL" value="{{ $result->NO_PERSIL }}" readonly>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="tombol d-flex justify-content-center align-items-center gap-2">
                    <a href="{{ route('spop.edit', $spop) }}"><button type="button">Update</button></a>
                    <form action="{{ route('spop.destroy', $spop) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-danger">Delete</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
    @endsection