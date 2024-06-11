


@extends('kerangka.master')
@section('title', 'SPOP')
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
					<h3>SPOP</h3>
					<div class=" p-0 d-flex align-items-start" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="#">Beranda</a></li>
							<li class="breadcrumb-item"><a href="#">Dokumen</a></li>
							<li class="breadcrumb-item active" aria-current="page">SPOP</li>
						</ol>
					</div>
				</div>
                
				<div class="pencarian d-flex justify-content-between align-items-end">
					<a href="{{ route('spop.create') }}"><button type="button">Buat Baru</button></a>
				</div>

				<table id="example" class="table table-striped" style="width:100%">
					<thead>
						<tr>
							<td width="50px">No</td>
							<td>NOP</td>
							<td>Subjek Pajak ID</td>
							<td>Jalan Objek Pajak</td>
							<td>Luas Bumi</td>
							<td width="100px" class="text-center">Opsi</td>
						</tr>
					</thead>
				</table>
			</div>
		</div>
	</div>


	<script>
    $.noConflict();
    jQuery(document).ready(function($) {
        $('#example').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": "{{ route('spop.data') }}", // Replace with your actual route for server-side processing
            "columns": [{
                    "data": "DT_RowIndex"
                }, // Replace "id" with the actual column name
                {
                    "data": "nop"
                },
                {
                    "data": "SUBJEK_PAJAK_ID"
                },
                {
                    "data": "JALAN_OP",

                },
                {
                    "data": "LUAS_BUMI"
                },
                {
                    "data": null,
                    "render": function(data, type, row) {
                        // Customize the rendering of the "Opsi" column
                    return `<ul class="list-inline">
                                <li class="list-inline-item"><a href="#" class="active show-link" data-id="${row.nop}"><i class='bx bx-show'></i></a></li>
                                <li class="list-inline-item"><a href="#" class="active edit-link" data-id="${row.nop}"><i class='bx bxs-edit'></i></a></li>
                                <li class="list-inline-item">
                                    <form id="deleteForm_${row.nop}" action="/spop/${row.nop}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                    <a href="#" class="active delete-link" data-id="${row.nop}" id="delete_${row.nop}">
                                        <i class='bx bx-trash'></i>
                                    </a>

                                </li>
                            </ul>`
                    ;
                    }
                }

            ]
            // Add other DataTables configurations as needed
        });

        $('#example').on('click', '.show-link', function() {
            var id = $(this).data('id');
            window.location.href = "{{ url('/spop/detail') }}/" + id;
        });

        $('#example').on('click', '.edit-link', function() {
            var id = $(this).data('id');
            window.location.href = "{{ url('/spop') }}/" + id + "/edit";
        });

        $(document).ready(function() {
            $('#example').on('click', '.delete-link', function(e) {
                e.preventDefault();

                var id = $(this).data('id');
                var link = $(this).attr("href");
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
        });
        // Listen for the success flash message
    var successMessage = "{{ session('success') }}";

    if (successMessage) {
        Swal.fire({
            title: 'Berhasil!',
            text: successMessage,
            icon: 'success'
        });
    }

    });
</script>

	@endsection