@extends('kerangka.master')

@section('title', 'Tambah Data LSPOP')

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
                    <h3>Tambah Data LSPOP</h3>
                    <div class=" p-0 d-flex align-items-start" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                            <li class="breadcrumb-item"><a href="#">Dokumen</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('lspop.index') }}">LSPOP</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Tambah Data LSPOP</li>
                        </ol>
                    </div>
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- KODE DATA-DATA SPOP -->
                <form action="{{ route('lspop.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="AddSpopBox">
                        <!-- KODE SURAT PEMBERITAHUAN OBJEK PAJAK -->
                        <h6 class="ms-3">Surat Pemberitahuan Objek Pajak</h6>
                        <div class="DetailSpopBox row g-4 p-3">
                            <div class="col-md-4">
                                <label for="nop" class="form-label">NOP</label>
                                <input type="text" class="form-control nop" id="nop" name="nop" required>
                            </div>
                            <div class="col-md-4">
                                <label for="tgl_kunjugan_kembali" class="form-label">Tanggal Kunjungan Kembali</label>
                                <input type="text" class="form-control" id="tgl_kunjugan_kembali" name="tgl_kunjugan_kembali" required>
                            </div>
                            <div class="col-md-4">
                                <label for="jenis_transaksi" class="form-label">Jenis Transaksi</label>
                                <input type="text" class="form-control nop" id="jenis_transaksi" name="jenis_transaksi" required>
                            </div>
                            <div class="col-md-4">
                                <label for="nomor_formulir" class="form-label">Nomor Formulir</label>
                                <input type="text" class="form-control nop" id="nomor_formulir" name="nomor_formulir" required>
                            </div>
                        </div>

                        <!-- KODE DATA LETAK OBJEK PAJAK -->
                        <h6 class="ms-3">Nilai Bangunan (per1000)</h6>
                        <div class="DetailSpopBox row g-4 p-3">
                            <div class="col-md-4">
                                <label for="bgn_total" class="form-label">Total</label>
                                <input type="text" class="form-control" id="bgn_total" name="bgn_total" required>
                            </div>
                            <div class="col-md-4">
                                <label for="bgn_tgl_pendataan" class="form-label">Tanggal Pendataan</label>
                                <input type="nomor" class="form-control" id="bgn_tgl_pendataan" name="bgn_tgl_pendataan" required>
                            </div>
                            <div class="col-md-1">
                                <label for="">NJOP m <sup>2</sup></label>
                                <p>jsdn</p>
                            </div>
                            <div class="col-md-1">
                                <label for="">Kelas</label>
                                <p>jsdn</p>
                            </div>
                            <div class="col-md-4">
                                <label for="bgn_individual" class="form-label">Individual</label>
                                <input type="text" class="form-control" id="bgn_individual" name="bgn_individual" required>
                            </div>
                            <div class="col-md-4">
                                <label for="bgn_nip_pendata" class="form-label">NIP Pendata</label>
                                <input type="nomor" class="form-control" id="bgn_nip_pendata" name="bgn_nip_pendata" required>
                            </div>
                        </div>

                        <!-- KODE DATA SUBJEK PAJAK -->
                        <h6 class="ms-3">Lain-lain</h6>
                        <div class="DetailSpopBox row g-4 p-3">
                            <div class="col-md-4">
                                <label for="bgn_luas" class="form-label">Luas</label>
                                <input type="nomor" class="form-control" id="bgn_luas" name="bgn_luas" required>
                            </div>
                            <div class="col-md-4">
                                <label for="bgn_kontruksi" class="form-label">Konstruksi</label>
                                <input type="text" class="form-control" id="bgn_kontruksi" name="bgn_kontruksi" required>
                            </div>
                            <div class="col-md-4">
                                <label for="bgn_dinding" class="form-label">Dinding</label>
                                <input type="nomor" class="form-control" id="bgn_dinding" name="bgn_dinding" required>
                            </div>
                            <div class="col-md-4">
                                <label for="bgn_jml_lantai" class="form-label">Jumlah Lantai</label>
                                <input type="text" class="form-control" id="bgn_jml_lantai" name="bgn_jml_lantai" required>
                            </div>
                            <div class="col-md-4">
                                <label for="bgn_langit_langit" class="form-label">Langit-langit</label>
                                <input type="nomor" class="form-control" id="bgn_langit_langit" name="bgn_langit_langit" required>
                            </div>
                            <div class="col-md-4">
                                <label for="bgn_lantai" class="form-label">Lantai</label>
                                <input type="text" class="form-control" id="bgn_lantai" name="bgn_lantai" required>
                            </div>
                            <div class="col-md-4">
                                <label for="bgn_kondisi" class="form-label">Kondisi</label>
                                <input type="text" class="form-control" id="bgn_kondisi" name="bgn_kondisi" required>
                            </div>
                            <div class="col-md-4">
                                <label for="bgn_atap" class="form-label">Atap</label>
                                <input type="text" class="form-control" id="bgn_atap" name="bgn_atap" required>
                            </div>
                            <div class="col-md-4">
                                <label for="bgn_listrik" class="form-label">Listrik</label>
                                <input type="text" class="form-control" id="bgn_listrik" name="bgn_listrik" required>
                            </div>
                        </div>

                        <div class="col-md-12 text-center mt-4">
                            <button type="submit" class="btn btn-primary" style="width:150px;">Tambah</button>
                        </div>
                    </div>
                </form>
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
                fetch("{{ route('lspop.store') }}", {
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