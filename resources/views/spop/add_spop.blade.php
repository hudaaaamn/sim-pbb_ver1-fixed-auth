@extends('kerangka.master')
@section('title', 'Tambah Data SPOP')
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
                    <h3>Tambah Data SPOP</h3>
                    <div class="p-0 d-flex align-items-start" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                            <li class="breadcrumb-item"><a href="#">Laporan</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('spop.index') }}">SPOP</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Tambah Data SPOP</li>
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

                <form action="{{ route('spop.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="AddSpopBox">
                        <h6 class="ms-3">Surat Pemberitahuan Objek Pajak</h6>
                        <div class="DetailSpopBox row g-4 p-3">
                            <div class="col-md-4">
                                <label for="jenis_transaksi" class="form-label">Jenis Transaksi</label>
                                <input type="text" class="form-control" id="jenis_transaksi" name="jenis_transaksi" required>
                            </div>
                            <div class="col-md-4">
                                <label for="nop" class="form-label">NOP</label>
                                <input type="text" class="form-control" id="nop" name="nop" required>
                            </div>
                            <div class="col-md-4">
                                <label for="nop_bersama" class="form-label">NOP Bersama</label>
                                <input type="text" class="form-control" id="nop_bersama" name="nop_bersama" required>
                            </div>
                        </div>

                        <h6 class="ms-3">Informasi Tambahan Untuk Data Baru</h6>
                        <div class="DetailSpopBox row g-4 p-3">
                            <div class="col-md-4">
                                <label for="nop_asal" class="form-label">NOP Asal</label>
                                <input type="text" class="form-control" id="nop_asal" name="nop_asal" required>
                            </div>
                            <div class="col-md-4">
                                <label for="no_sppt_lama" class="form-label">NO SPPT Lama</label>
                                <input type="text" class="form-control" id="no_sppt_lama" name="no_sppt_lama" required>
                            </div>
                        </div>

                        <h6 class="ms-3">Kode Data Letak Objek Pajak</h6>
                        <div class="DetailSpopBox row g-4 p-3">
                            <div class="col-md-4">
                                <label for="jalan" class="form-label">Jalan</label>
                                <input type="text" class="form-control" id="jalan" name="jalan" required>
                            </div>
                            <div class="col-md-1">
                                <label for="rt" class="form-label">RT</label>
                                <input type="number" class="form-control" id="rt" name="rt" required>
                            </div>
                            <div class="col-md-1">
                                <label for="rw" class="form-label">RW</label>
                                <input type="number" class="form-control" id="rw" name="rw" required>
                            </div>
                            <div class="col-md-1">
                                <label for="no" class="form-label">No</label>
                                <input type="number" class="form-control" id="no" name="no" required>
                            </div>
                            <div class="col-md-5"></div>
                            <div class="col-md-4">
                                <label for="kelurahan" class="form-label">Kelurahan</label>
                                <input type="text" class="form-control" id="kelurahan" name="kelurahan" required>
                            </div>
                            <div class="col-md-3">
                                <label for="nomor_legalitas" class="form-label">Nomor Legalitas</label>
                                <input type="number" class="form-control" id="nomor_legalitas" name="nomor_legalitas" required>
                            </div>
                        </div>

                        <h6 class="ms-3">Kode Data Subjek Pajak</h6>
                        <div class="DetailSpopBox row g-4 p-3">
                            <div class="col-md-4">
                                <label for="nik" class="form-label">NIK</label>
                                <input type="number" class="form-control" id="nik" name="nik" required>
                            </div>
                            <div class="col-md-4">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="nama" name="nama" required>
                            </div>
                            <div class="col-md-4">
                                <label for="npwp" class="form-label">NPWP</label>
                                <input type="number" class="form-control" id="npwp" name="npwp" required>
                            </div>
                            <div class="col-md-4">
                                <label for="alamat" class="form-label">Alamat</label>
                                <input type="text" class="form-control" id="alamat" name="alamat" required>
                            </div>
                            <div class="col-md-1">
                                <label for="rw_alamat" class="form-label">RW</label>
                                <input type="number" class="form-control" id="rw_alamat" name="rw_alamat" required>
                            </div>
                            <div class="col-md-1">
                                <label for="rt_alamat" class="form-label">RT</label>
                                <input type="number" class="form-control" id="rt_alamat" name="rt_alamat" required>
                            </div>
                            <div class="col-md-1">
                                <label for="no_alamat" class="form-label">No</label>
                                <input type="number" class="form-control" id="no_alamat" name="no_alamat" required>
                            </div>
                            <div class="col-md-1">
                                <label for="kode_pos" class="form-label">Pos</label>
                                <input type="number" class="form-control" id="kode_pos" name="kode_pos" required>
                            </div>
                            <div class="col-md-4">
                                <label for="kelurahan_alamat" class="form-label">Kelurahan</label>
                                <input type="text" class="form-control" id="kelurahan_alamat" name="kelurahan_alamat" required>
                            </div>
                            <div class="col-md-4">
                                <label for="status" class="form-label">Status</label>
                                <input type="text" class="form-control" id="status" name="status" required>
                            </div>
                            <div class="col-md-4">
                                <label for="pekerjaan" class="form-label">Pekerjaan</label>
                                <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" required>
                            </div>
                        </div>

                        <div class="col-md-12 text-center">
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

            function showToast() {
                toast.show();
            }
        });
    </script>
</div>

@endsection
