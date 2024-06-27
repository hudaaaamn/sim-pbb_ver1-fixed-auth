@extends('kerangka.master')
@section('title', 'Tambah Data Pelayanan')
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
                    <h3>Tambah Data Pelayanan</h3>
                    <div class="p-0 d-flex align-items-start" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('pelayanan.index') }}">Pelayanan</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Tambah Data Pelayanan</li>
                        </ol>
                    </div>
                </div>
                <div class="row m-5">
                    <div class="col-md-6">
                        <form id="addDataForm" class="row g-4 p-3 needs-validation" novalidate>
                            @csrf
                            <div class="col-md-12">
                                <label for="NO_PELAYANAN" class="form-label">No Pelayanan</label>
                                <input type="text" class="form-control" id="NO_PELAYANAN" name="NO_PELAYANAN" required>
                                <div class="invalid-feedback">
                                    Isi kolom ini terlebih dahulu!
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="KD_DATI2" class="form-label">Kode Dati 2</label>
                                <input type="text" class="form-control" id="KD_DATI2" name="KD_DATI2" required>
                                <div class="invalid-feedback">
                                    Isi kolom ini terlebih dahulu!
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="KD_JNS_PELAYANAN" class="form-label">Kode Jenis Pelayanan</label>
                                <select class="form-select" id="KD_JNS_PELAYANAN" name="KD_JNS_PELAYANAN" required>
                                    <option selected disabled value="">Choose...</option>
                                    <option value="1">[010] WAKANDA SELATAN</option>
                                    <option value="2">[020] WAKANDA TIMUR </option>
                                </select>
                                <div class="invalid-feedback">
                                    Isi kolom ini terlebih dahulu!
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="KETERANGAN_BERKAS" class="form-label">Lampiran Dokumen</label>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col" width="15%" class="text-center p-3">Check</th>
                                            <th scope="col" class="text-center p-3">Dokumen</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row" class="text-center">
                                                <input class="form-check-input border border-primary" type="checkbox" name="PENGAJUAN_PERMOHONAN" id="PENGAJUAN_PERMOHONAN" />
                                            </th>
                                            <td class="p-2">1. Pengajuan Permohonan</td>
                                        </tr>
                                        <tr>
                                            <th scope="row" class="text-center">
                                                <input class="form-check-input border border-primary" type="checkbox" name="SURAT_KUASA" id="SURAT_KUASA" />
                                            </th>
                                            <td class="p-2">2. Surat Kuasa</td>
                                        </tr>
                                        <tr>
                                            <th scope="row" class="text-center">
                                                <input class="form-check-input border border-primary" type="checkbox" name="COPY_KTP" id="COPY_KTP" />
                                            </th>
                                            <td class="p-2">3. Copy KTP</td>
                                        </tr>
                                        <tr>
                                            <th scope="row" class="text-center">
                                                <input class="form-check-input border border-primary" type="checkbox" name="COPY_SERTIFIKAT_TANAH" id="COPY_SERTIFIKAT_TANAH" />
                                            </th>
                                            <td class="p-2">4. Copy Sertifikat Tanah</td>
                                        </tr>
                                        <tr>
                                            <th scope="row" class="text-center">
                                                <input class="form-check-input border border-primary" type="checkbox" name="ASLI_SPPT" id="ASLI_SPPT" />
                                            </th>
                                            <td class="p-2">5. Asli SPPT</td>
                                        </tr>
                                        <tr>
                                            <th scope="row" class="text-center">
                                                <input class="form-check-input border border-primary" type="checkbox" name="COPY_IMB" id="COPY_IMB" />
                                            </th>
                                            <td class="p-2">6. Copy IMB</td>
                                        </tr>
                                        <tr>
                                            <th scope="row" class="text-center">
                                                <input class="form-check-input border border-primary" type="checkbox" name="COPY_AK_JUALBELI" id="COPY_AK_JUALBELI" />
                                            </th>
                                            <td class="p-2">7. Copy Ak. Jual Beli/ Hibah</td>
                                        </tr>
                                        <tr>
                                            <th scope="row" class="text-center">
                                                <input class="form-check-input border border-primary" type="checkbox" name="COPY_SK_PENSIUN" id="COPY_SK_PENSIUN" />
                                            </th>
                                            <td class="p-2">8. Copy SK Pensiun</td>
                                        </tr>
                                        <tr>
                                            <th scope="row" class="text-center">
                                                <input class="form-check-input border border-primary" type="checkbox" name="COPY_SPPT/SPPD" id="COPY_SPPT/SPPD" />
                                            </th>
                                            <td class="p-2">9. Copy SPPT/SPPD</td>
                                        </tr>
                                        <tr>
                                            <th scope="row" class="text-center">
                                                <input class="form-check-input border border-primary" type="checkbox" name="ASLI_SPPD" id="ASLI_SPPD" />
                                            </th>
                                            <td class="p-2">10. Asli SPPD</td>
                                        </tr>
                                        <tr>
                                            <th scope="row" class="text-center">
                                                <input class="form-check-input border border-primary" type="checkbox" name="COPY_SK_PENGURANGAN" id="COPY_SK_PENGURANGAN" />
                                            </th>
                                            <td class="p-2">11. Copy SK Pengurangan</td>
                                        </tr>
                                        <tr>
                                            <th scope="row" class="text-center">
                                                <input class="form-check-input border border-primary" type="checkbox" name="COPY_SK_KEBERATAN" id="COPY_SK_KEBERATAN" />
                                            </th>
                                            <td class="p-2">12. Copy SK Keberatan</td>
                                        </tr>
                                        <tr>
                                            <th scope="row" class="text-center">
                                                <input class="form-check-input border border-primary" type="checkbox" name="COPY_SSPD_BPHTB" id="COPY_SSPD_BPHTB" />
                                            </th>
                                            <td class="p-2">13. Copy SSPD BPHTB</td>
                                        </tr>
                                        <tr>
                                            <th scope="row" class="text-center">
                                                <input class="form-check-input border border-primary" type="checkbox" name="SURAT_PERNYATAAN_MILIK" id="SURAT_PERNYATAAN_MILIK" />
                                            </th>
                                            <td class="p-2">14. Surat Pernyataan Milik</td>
                                        </tr>
                                        <tr>
                                            <th scope="row" class="text-center">
                                                <input class="form-check-input border border-primary" type="checkbox" name="LAIN_LAIN" id="LAIN_LAIN" />
                                            </th>
                                            <td class="p-2">15. Lain-lain</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </form>
                    </div>

                    <div class="col-md-6">
                        <form id="addDataForm2" class="row g-4 p-3 needs-validation" novalidate>
                            @csrf
                            <div class="col-md-12">
                                <label for="NAMA_PEMOHON" class="form-label">Nama Pemohon</label>
                                <input type="text" class="form-control" id="NAMA_PEMOHON" name="NAMA_PEMOHON" required>
                                <div class="invalid-feedback">
                                    Isi kolom ini terlebih dahulu!
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="ALAMAT_PEMOHON" class="form-label">Alamat Pemohon</label>
                                <input type="text" class="form-control" id="ALAMAT_PEMOHON" name="ALAMAT_PEMOHON" required>
                                <div class="invalid-feedback">
                                    Isi kolom ini terlebih dahulu!
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="NOP" class="form-label">NOP</label>
                                <input type="text" class="form-control" id="NOP" name="NOP" required>
                                <div class="invalid-feedback">
                                    Isi kolom ini terlebih dahulu!
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="KETERANGAN" class="form-label">Keterangan</label>
                                <textarea class="form-control" id="KETERANGAN" name="KETERANGAN" rows="4"></textarea>
                                <div class="invalid-feedback">
                                    Isi kolom ini terlebih dahulu!
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="LETAK_OP" class="form-label">Letak Op</label>
                                <input type="text" class="form-control" id="LETAK_OP" name="LETAK_OP" required>
                                <div class="invalid-feedback">
                                    Isi kolom ini terlebih dahulu!
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="KECAMATAN" class="form-label">Kecamatan</label>
                                <select class="form-select" id="KECAMATAN" name="KECAMATAN" required>
                                    <option selected disabled value="">Choose...</option>
                                    <option value="1">Jagakarsa</option>
                                    <option value="2">Srengseng</option>
                                    <option value="3">Sawah</option>
                                    <option value="4">Depok</option>
                                    <option value="5">Giwangan</option>
                                </select>
                                <div class="invalid-feedback">
                                    Isi kolom ini terlebih dahulu!
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="KELURAHAN" class="form-label">Kelurahan</label>
                                <select class="form-select" id="KELURAHAN" name="KELURAHAN" required>
                                    <option selected disabled value="">Choose...</option>
                                    <option value="1">Jagakarsa</option>
                                    <option value="2">Srengseng</option>
                                    <option value="3">Sawah</option>
                                    <option value="4">Depok</option>
                                    <option value="5">Giwangan</option>
                                </select>
                                <div class="invalid-feedback">
                                    Isi kolom ini terlebih dahulu!
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="TGL_SELESAI" class="form-label">Tanggal Perkiraan Selesai</label>
                                <input type="text" class="form-control" id="TGL_SELESAI" name="TGL_SELESAI" required>
                                <div class="invalid-feedback">
                                    Isi kolom ini terlebih dahulu!
                                </div>
                            </div>
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary" style="width:150px;">Tambah</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div id="toast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <strong class="me-auto">Bootstrap</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                Data telah berhasil disimpan!
            </div>
        </div>
    </div>
    

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const toastElement = document.getElementById('toast');
            const toast = new bootstrap.Toast(toastElement);

            // Example of showing toast after form submission
            document.querySelector('form').addEventListener('submit', function (event) {
                event.preventDefault(); // Prevent default form submission

                // Assuming an AJAX call to submit the form
                fetch("{{ route('pelayanan.store') }}", {
                    method: 'POST',
                    body: new FormData(this),
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        toast.show();
                    }
                })
                .catch(error => console.error('Error:', error));
            });
        });
    </script>
</div>
@endsection
