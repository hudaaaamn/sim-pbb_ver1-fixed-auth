@extends('kerangka.master')

@section('title', 'Pelayanan')

@section('content')
<div class="bgn">
    <h1 class="title">Selamat Datang, {{ $fullname }}!</h1>
    <p class="greet">Selamat Datang di Sistem Informasi Pajak Bumi Bangunan</p>
</div>

<div class="data">
    <div class="box-container">
        <div class="detail">
            <div class="recentOrders">
                <div class="cardHeader">
                    <a href="#">
                        <h3>Pelayanan</h3>
                    </a>
                    <div class="p-0 d-flex align-items-start" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Pelayanan</li>
                        </ol>
                    </div>
                </div>

                <div class="pencarian d-flex justify-content-between align-items-end">
                    <div class="tombol">
                        <a href="{{ route('pelayanan.laporan') }}">
                            <button class="bg-success" type="button">Laporan Pelayanan</button>
                        </a>
                        <a href="{{ route('pelayanan.create') }}">
                            <button type="button">Buat Pelayanan</button>
                        </a>
                    </div>
                </div>

                <table id="example" class="table table-striped mt-3" style="width:100%; margin-top: 20px;">
                    <thead>
                        <tr class="mt-3">
                            <td width="30px">No</td>
                            <td>No Pelayanan</td>
                            <td>Nama Pemohon</td>
                            <td>Tanggal Pelayanan</td>
                            <td>Kecamatan</td>
                            <td>Kelurahan</td>
                            <td>Blok</td>
                            <td>No Urut</td>
                            <td>Kode Jenis Pelayanan</td>
                            <td>Status Pelayanan</td>
                            <td>Keterangan Berkas</td>
                            <td width="60px" class="text-center">Opsi</td>
                        </tr>
                    </thead>
                    <tbody id="pelayananTableBody">
                        <!-- Data will be injected here by DataTables -->
                    </tbody>
                </table>

                <div class="d-flex justify-content-center mt-3">
                    <!-- Pagination or other controls can be added here -->
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript -->
<script>
    $.noConflict();
    jQuery(document).ready(function($) {
        var table = $('#example').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": "{{ route('pelayanan.data') }}",
            "columns": [
                { "data": "DT_RowIndex", "orderable": false, "searchable": false },
                { "data": "NO_PELAYANAN" },
                { "data": "NAMA_PEMOHON" },
                { "data": "TANGGAL_PELAYANAN" },
                { "data": "KECAMATAN" },
                { "data": "KELURAHAN" },
                { "data": "KD_BLOK" },
                { "data": "NO_URUT" },
                { "data": "KD_JNS_PELAYANAN" },
                { "data": "STATUS_PELAYANAN" },
                { "data": "KETERANGAN_BERKAS" },
                {
                    "data": null,
                    "orderable": false,
                    "searchable": false,
                    "render": function(data, type, row) {
                        return `<ul class="list-inline">
                                    <li class="list-inline-item"><a href="#" class="active show-link" data-id="${row.ID}"><i class='bx bx-show'></i></a></li>
                                    <li class="list-inline-item"><a href="#" class="active edit-link" data-id="${row.ID}"><i class='bx bxs-edit'></i></a></li>
                                    <li class="list-inline-item">
                                        <form id="deleteForm_${row.ID}" action="/pelayanan/${row.ID}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                        <a href="#" class="active delete-link" data-id="${row.ID}" id="delete_${row.ID}">
                                            <i class='bx bx-trash'></i>
                                        </a>
                                    </li>
                                </ul>`;
                    }
                }
            ]
        });

        $('#example').on('click', '.show-link', function() {
            var id = $(this).data('id');
            window.location.href = "{{ url('/pelayanan/detail') }}/" + id;
        });

        $('#example').on('click', '.edit-link', function() {
            var id = $(this).data('id');
            window.location.href = "{{ url('/pelayanan/edit') }}/" + id;
        });

        $('#example').on('click', '.delete-link', function(e) {
            e.preventDefault();

            var id = $(this).data('id');
            var form = $('#deleteForm_' + id);

            Swal.fire({
                title: 'Apakah Anda Yakin?',
                text: "Anda tidak akan bisa memulihkannya!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });

        var successMessage = "{{ session('success') }}";

        if (successMessage) {
            Swal.fire({
                title: 'Terhapus!',
                text: successMessage,
                icon: 'success'
            });
        }
    });
</script>
@endsection
