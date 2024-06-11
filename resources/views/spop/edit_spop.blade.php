@extends('kerangka.master')
@section('title', 'Edit Data SPOP')
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
                    <h3>Edit Data SPOP</h3>
                    <div class=" p-0 d-flex align-items-start" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                            <li class="breadcrumb-item"><a href="#">Dokumen</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('spop.index') }}">SPOP</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Data SPOP</li>
                        </ol>
                    </div>
                </div>

                <form method="POST" action="{{ route('spop.update', $spop) }}" enctype="multipart/form-data" class="row g-4 p-5 needs-validation" novalidate>
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row g-4 p-5 needs-validation" novalidate>
                                <div class="col-md-12">
                                    <label for="kd_prov" class="form-label">Kode Provinsi</label>
                                    <input type="text" class="form-control" id="kd_prov" name="KD_PROPINSI" value="51" readonly  >
                                    <div class="invalid-feedback">
                                        Isi kolom ini terlebih dahulu!
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label for="kd_dati" class="form-label">Kode Dati 2</label>
                                    <input type="text" class="form-control" id="kd_dati" name="KD_DATI2" value="71" readonly  >
                                    <div class="invalid-feedback">
                                        Isi kolom ini terlebih dahulu!
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label for="kd_kec" class="form-label">Kode Kecamatan</label>
                                    <!-- <input type="text" class="form-control" id="kd_jenisTransaksi" name="kd_jenisTransaksi"  > -->
                                    <select class="form-select" id="kd_kec" name="KD_KECAMATAN"  >
                                        <option value="" {{ $data_spop->KD_KECAMATAN == '' ? 'selected' : '' }}>Pilih...</option>
                                        @foreach ($kecamatanOptions as $value => $label)
                                        <option value="{{ $value }}" {{ $data_spop->KD_KECAMATAN == $value ? 'selected' : '' }}>{{ $label }}</option>
                                        @endforeach
                                    </select>

                                    <div class="invalid-feedback">
                                        Isi kolom ini terlebih dahulu!
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label for="kd_kel" class="form-label">Kode Kelurahan</label>
                                    <select class="form-select" id="kd_kel" name="KD_KELURAHAN"  >
                                        <option value="" {{ $data_spop->KD_KELURAHAN == '' ? 'selected' : '' }}>Pilih...</option>
                                        @foreach ($kelurahanOptions as $kecamatanId => $kelurahanArray)
                                        @foreach ($kelurahanArray as $kelurahanData)
                                        <option value="{{ $kelurahanData[0] }}" {{ $data_spop->KD_KELURAHAN == $kelurahanData[0] ? 'selected' : '' }} class="kecamatan-option kecamatan-{{ $kecamatanId }}">
                                            [{{ $kelurahanData[0] }}] {{ $kelurahanData[1] }}
                                        </option>
                                        @endforeach
                                        @endforeach
                                    </select>

                                    <div class="invalid-feedback">
                                        Isi kolom ini terlebih dahulu!
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label for="kd_blok" class="form-label">Kode Blok</label>
                                    <input type="text" class="form-control" id="kd_blok" name="KD_BLOK" value="{{ $data_spop->KD_BLOK }}"  >
                                    <div class="invalid-feedback">
                                        Isi kolom ini terlebih dahulu!
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label for="no_urut" class="form-label">No Urut</label>
                                    <input type="text" class="form-control" id="no_urut" name="NO_URUT" value="{{ $data_spop->NO_URUT }}"  >
                                    <div class="invalid-feedback">
                                        Isi kolom ini terlebih dahulu!
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label for="kd_jenisOp" class="form-label">Kode Jenis Op</label>
                                    <input type="text" class="form-control" id="kd_jenis" name="KD_JNS_OP" value="{{ $data_spop->KD_JNS_OP }}"  >
                                    <div class="invalid-feedback">
                                        Isi kolom ini terlebih dahulu!
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label for="kd_jenisTransaksi" class="form-label">Jenis Transaksi Op</label>
                                    <!-- <input type="text" class="form-control" id="kd_jenisTransaksi" name="kd_jenisTransaksi"  > -->
                                    <select class="form-select" id="kd_jenisTransaksi" name="JNS_TRANSAKSI_OP"  >
                                        <option value="" {{ $data_spop->JNS_TRANSAKSI_OP == '' ? 'selected' : '' }}>Pilih...</option>
                                        <option value="1" {{ $data_spop->JNS_TRANSAKSI_OP == '1' ? 'selected' : '' }}>Perekaman Data</option>
                                        <option value="2" {{ $data_spop->JNS_TRANSAKSI_OP == '2' ? 'selected' : '' }}>Pemutakhiran Data</option>
                                        <option value="3" {{ $data_spop->JNS_TRANSAKSI_OP == '3' ? 'selected' : '' }}>Penghapusan Data</option>
                                    </select>

                                    <div class="invalid-feedback">
                                        Isi kolom ini terlebih dahulu!
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label for="nop_bersama" class="form-label">NOP Bersama</label>
                                    <input type="text" class="form-control" id="nop_bersama" name="NOP_BERSAMA" value="{{ $data_spop->NOP_BERSAMA }}"  >
                                    <div class="invalid-feedback">
                                        Isi kolom ini terlebih dahulu!
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label for="no_formulir_spop" class="form-label">No Formulir SPOP</label>
                                    <input type="text" class="form-control" id="no_formulir_spop" value="{{ $data_spop->NO_FORMULIR_SPOP }}" name="NO_FORMULIR_SPOP"  >
                                    <div class="invalid-feedback">
                                        Isi kolom ini terlebih dahulu!
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label for="nop_asal" class="form-label">NOP Asal</label>
                                    <input type="text" class="form-control" id="nop_asal" value="{{ $data_spop->NOP_ASAL }}" name="NOP_ASAL"  >
                                    <div class="invalid-feedback">
                                        Isi kolom ini terlebih dahulu!
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label for="no_spptLama" class="form-label">No Sppt Lama</label>
                                    <input type="text" class="form-control" id="no_spptLama" value="{{ $data_spop->NO_SPPT_LAMA }}" name="NO_SPPT_LAMA"  >
                                    <div class="invalid-feedback">
                                        Isi kolom ini terlebih dahulu!
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="row g-4 p-5 needs-validation" novalidate>
                                <div class="col-md-12">
                                    <label for="jalan_op" class="form-label">Jalan Op</label>
                                    <input type="text" class="form-control" id="jalan_op" value="{{ $data_spop->JALAN_OP }}" name="JALAN_OP"  >
                                    <div class="invalid-feedback">
                                        Isi kolom ini terlebih dahulu!
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label for="blok_kav" class="form-label">Blok Kav No Op</label>
                                    <input type="text" class="form-control" id="blok_kav" value="{{ $data_spop->BLOK_KAV_NO_OP }}" name="BLOK_KAV_NO_OP"  >
                                    <div class="invalid-feedback">
                                        Isi kolom ini terlebih dahulu!
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label for="rw_op" class="form-label">RW Op</label>
                                    <input type="text" class="form-control" id="rw_op" value="{{ $data_spop->RW_OP }}" name="RW_OP"  >
                                    <div class="invalid-feedback">
                                        Isi kolom ini terlebih dahulu!
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label for="rt_op" class="form-label">RT Op</label>
                                    <input type="text" class="form-control" id="rt_op" value="{{ $data_spop->RT_OP }}" name="RT_OP"  >
                                    <div class="invalid-feedback">
                                        Isi kolom ini terlebih dahulu!
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label for="kd_statusWp" class="form-label">Kode Status Wp</label>
                                    <!-- <input type="text" class="form-control" id="kd_statusWp" name="kd_statusWp"  > -->
                                    <select class="form-select" id="kd_statusWp" name="KD_STATUS_WP"  >
                                        <option value="" {{ $data_spop->KD_STATUS_WP == '' ? 'selected' : '' }}>Choose...</option>
                                        <option value="1" {{ $data_spop->KD_STATUS_WP == '1' ? 'selected' : '' }}>PEMILIK</option>
                                        <option value="2" {{ $data_spop->KD_STATUS_WP == '2' ? 'selected' : '' }}>PENYEWA</option>
                                        <option value="3" {{ $data_spop->KD_STATUS_WP == '3' ? 'selected' : '' }}>PENGELOLA</option>
                                        <option value="4" {{ $data_spop->KD_STATUS_WP == '4' ? 'selected' : '' }}>PEMAKAI</option>
                                        <option value="5" {{ $data_spop->KD_STATUS_WP == '5' ? 'selected' : '' }}>SENGKETA</option>
                                    </select>

                                    <div class="invalid-feedback">
                                        Isi kolom ini terlebih dahulu!
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="row g-4 p-5 needs-validation" novalidate>
                                <div class="col-md-12">
                                    <label for="sbj_pajak" class="form-label">Subjek Pajak ID</label>
                                    <input type="text" class="form-control" id="sbj_pajak" name="SUBJEK_PAJAK_ID" value="{{ $data_spop->SUBJEK_PAJAK_ID }}"  >
                                    <div class="invalid-feedback">
                                        Isi kolom ini terlebih dahulu!
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label for="nama_wp" class="form-label">Nama Wajib Pajak</label>
                                    <input type="text" class="form-control" id="nama_wp" name="NM_WP" value="{{ $data_wp->NM_WP }}"  >
                                    <div class="invalid-feedback">
                                        Isi kolom ini terlebih dahulu!
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label for="jln_wp" class="form-label">Jalan Wajib Pajak</label>
                                    <input type="text" class="form-control" id="jln_wp" name="JALAN_WP" value="{{ $data_wp->JALAN_WP }}"  >
                                    <div class="invalid-feedback">
                                        Isi kolom ini terlebih dahulu!
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label for="blok_kav_wp" class="form-label">Blok Kav No Wajib Pajak</label>
                                    <input type="text" class="form-control" id="blok_kav_wp" name="BLOK_KAV_WP" value="{{ $data_wp->BLOK_KAV_WP }}"  >
                                    <div class="invalid-feedback">
                                        Isi kolom ini terlebih dahulu!
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label for="rw_wp" class="form-label">RW Wajib Pajak</label>
                                    <input type="text" class="form-control" id="rw_wp" name="RW_WP" value="{{ $data_wp->RW_WP }}"  >
                                    <div class="invalid-feedback">
                                        Isi kolom ini terlebih dahulu!
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label for="rt_wp" class="form-label">RT Wajib Pajak</label>
                                    <input type="text" class="form-control" id="rt_wp" name="RT_WP" value="{{ $data_wp->RT_WP }}"  >
                                    <div class="invalid-feedback">
                                        Isi kolom ini terlebih dahulu!
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label for="kelurahan_wp" class="form-label">Kelurahan Wajib Pajak</label>
                                    <input type="text" class="form-control" id="kelurahan_wp" value="{{ $data_wp->KELURAHAN_WP }}" name="KELURAHAN_WP"  >
                                    <div class="invalid-feedback">
                                        Isi kolom ini terlebih dahulu!
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label for="kota_wp" class="form-label">Kota Wajib Pajak</label>
                                    <input type="text" class="form-control" id="kota_wp" value="{{ $data_wp->KOTA_WP }}" name="KOTA_WP"  >
                                    <div class="invalid-feedback">
                                        Isi kolom ini terlebih dahulu!
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label for="kd_pos_wp" class="form-label">Kode Pos Wajib Pajak</label>
                                    <input type="text" class="form-control" id="kd_pos_wp" value="{{ $data_wp->KD_POS_WP }}" name="KD_POS_WP"  >
                                    <div class="invalid-feedback">
                                        Isi kolom ini terlebih dahulu!
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label for="tlp_wp" class="form-label">Telepon Wajib Pajak</label>
                                    <input type="text" class="form-control" id="tlp_wp" value="{{ $data_wp->TELEPON_WP }}" name="TELEPON_WP"  >
                                    <div class="invalid-feedback">
                                        Isi kolom ini terlebih dahulu!
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label for="npwp" class="form-label">NPWP</label>
                                    <input type="text" class="form-control" id="npwp" value="{{ $data_wp->NPWP }}" name="NPWP"  >
                                    <div class="invalid-feedback">
                                        Isi kolom ini terlebih dahulu!
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label for="status_pekerjaan_wp" class="form-label">Status Pekerjaan Wajib Pajak</label>
                                    <!-- <input type="text" class="form-control" id="kd_statusWp" name="kd_statusWp"  > -->
                                    <select class="form-select" id="status_pekerjaan_wp" name="STATUS_PEKERJAAN_WP"  >
                                        <option value="" {{ $data_wp->STATUS_PEKERJAAN_WP == '' ? 'selected' : '' }}>Choose...</option>
                                        <option value="1" {{ $data_wp->STATUS_PEKERJAAN_WP == '1' ? 'selected' : '' }}>PNS</option>
                                        <option value="2" {{ $data_wp->STATUS_PEKERJAAN_WP == '2' ? 'selected' : '' }}>ABRI</option>
                                        <option value="3" {{ $data_wp->STATUS_PEKERJAAN_WP == '3' ? 'selected' : '' }}>PENSIUNAN</option>
                                        <option value="4" {{ $data_wp->STATUS_PEKERJAAN_WP == '4' ? 'selected' : '' }}>Badan</option>
                                        <option value="5" {{ $data_wp->STATUS_PEKERJAAN_WP == '5' ? 'selected' : '' }}>Lainnya..</option>
                                    </select>

                                    <div class="invalid-feedback">
                                        Isi kolom ini terlebih dahulu!
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="row g-4 p-5 needs-validation" novalidate>
                                <div class="col-md-12">
                                    <label for="luas_bumi" class="form-label">Luas Bumi</label>
                                    <input type="text" class="form-control" value="{{ $data_spop->LUAS_BUMI }}" id="luas_bumi" name="LUAS_BUMI"  >
                                    <div class="invalid-feedback">
                                        Isi kolom ini terlebih dahulu!
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label for="kd_znt" class="form-label">Kode Znt</label>
                                    <input type="text" class="form-control" value="{{ $data_spop->KD_ZNT }}" id="kd_znt" name="KD_ZNT"  >
                                    <div class="invalid-feedback">
                                        Isi kolom ini terlebih dahulu!
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label for="jns_bumi" class="form-label">Jenis Bumi</label>
                                    <!-- <input type="text" class="form-control" id="kd_statusWp" name="kd_statusWp"  > -->
                                    <select class="form-select" id="jns_bumi" name="JNS_BUMI"  >
                                        <option value="" {{ $data_spop->JNS_BUMI == '' ? 'selected' : '' }}>Choose...</option>
                                        <option value="1" {{ $data_spop->JNS_BUMI == '1' ? 'selected' : '' }}>Tanah + Bangunan</option>
                                        <option value="2" {{ $data_spop->JNS_BUMI == '2' ? 'selected' : '' }}>Kavling Siap Bangun</option>
                                        <option value="3" {{ $data_spop->JNS_BUMI == '3' ? 'selected' : '' }}>Tanah Kosong</option>
                                        <option value="4" {{ $data_spop->JNS_BUMI == '4' ? 'selected' : '' }}>Fasilitas Umum</option>
                                        <option value="5" {{ $data_spop->JNS_BUMI == '5' ? 'selected' : '' }}>Pertanian</option>
                                    </select>

                                    <div class="invalid-feedback">
                                        Isi kolom ini terlebih dahulu!
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label for="hsl_stmBumi" class="form-label">Nilai Sistem Bumi</label>
                                    <input type="text" class="form-control" id="hsl_stmBumi" name="NILAI_SISTEM_BUMI" value="{{ $data_spop->NILAI_SISTEM_BUMI }}"  >
                                    <div class="invalid-feedback">
                                        Isi kolom ini terlebih dahulu!
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label for="tgl_pendataanOp" class="form-label">Tanggal Pendataan Op</label>
                                    <input type="date" class="form-control" id="tgl_pendataanOp" name="TGL_PENDATAAN_OP" value="{{ (new DateTime($data_spop->TGL_PENDATAAN_OP))->format('Y-m-d')  }}" readonly  >
                                    <div class="invalid-feedback">
                                        Isi kolom ini terlebih dahulu!
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label for="nip_pendata" class="form-label">NIP Pendata</label>
                                    <input type="text" class="form-control" id="nip_pendata" name="NIP_PENDATA" value="{{ $data_spop->NIP_PENDATA }}" readonly  >
                                    <div class="invalid-feedback">
                                        Isi kolom ini terlebih dahulu!
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label for="tgl_pemeriksaanOp" class="form-label">Tanggal Pemeriksaan OP</label>
                                    <input type="date" class="form-control" id="tgl_pemeriksaanOp" name="TGL_PEMERIKSAAN_OP" value="{{ (new DateTime($data_spop->TGL_PEMERIKSAAN_OP))->format('Y-m-d') }}"  >
                                    <div class="invalid-feedback">
                                        Isi kolom ini terlebih dahulu!
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label for="nip_pemeriksaOp" class="form-label">NIP Pemeriksa Op</label>
                                    <input type="text" class="form-control" id="nip_pemeriksaOp" name="NIP_PEMERIKSA_OP" value="{{ $data_spop->NIP_PEMERIKSA_OP }}"  >
                                    <div class="invalid-feedback">
                                        Isi kolom ini terlebih dahulu!
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label for="no_persil" class="form-label">No Persil</label>
                                    <input type="text" class="form-control" id="no_persil" name="NO_PERSIL" value="{{ $data_spop->NO_PERSIL }}"  >
                                    <div class="invalid-feedback">
                                        Isi kolom ini terlebih dahulu!
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-primary" style="width:150px;">Simpan</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <script>
        // Script to dynamically update Kelurahan dropdown based on selected Kecamatan
        var kecamatanDropdown = document.getElementById('kd_kec');
        var kelurahanDropdown = document.getElementById('kd_kel');

        // Check the initial state of Kode Kecamatan and disable/enable Kelurahan dropdown accordingly
        kelurahanDropdown.disabled = !kecamatanDropdown.value;

        kecamatanDropdown.addEventListener('change', function() {
            var selectedKecamatan = this.value;

            // Reset Kelurahan dropdown to default state when Kode Kecamatan changes
            kelurahanDropdown.value = '';
            kelurahanDropdown.disabled = !selectedKecamatan;

            // Hide all Kelurahan options
            var kelurahanOptions = document.getElementsByClassName('kecamatan-option');
            for (var i = 0; i < kelurahanOptions.length; i++) {
                kelurahanOptions[i].style.display = 'none';
            }

            // Show Kelurahan options for the selected Kecamatan
            if (selectedKecamatan) {
                var selectedKelurahanOptions = document.getElementsByClassName('kecamatan-' + selectedKecamatan);
                for (var i = 0; i < selectedKelurahanOptions.length; i++) {
                    selectedKelurahanOptions[i].style.display = 'block';
                }
            }
        });
    </script>


    <script>
        $j = jQuery.noConflict();
        $j(document).ready(function() {
            $j("#no_urut").inputmask("999");
            $j("#kd_blok").inputmask("999");
            $j("#no_spptLama").inputmask("9999");
            $j("#kd_jenis").inputmask("9");
        })
    </script>
    @endsection