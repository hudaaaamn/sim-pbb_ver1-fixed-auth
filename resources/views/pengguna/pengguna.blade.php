@extends('kerangka.master')
@section('title', 'Pengguna')
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
					<a href="">
						<h3>Pengguna</h3>
					</a>
					<div aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="#">Beranda</a></li>
							<li class="breadcrumb-item active" aria-current="page">Pengguna</li>
						</ol>
					</div>
				</div>
				<!-- <form action="#">
								<div class="form-group">
									<input type="text" placeholder="Search...">
									<i class='bx bx-search icon' ></i>
								</div>
						</form> -->
				<div class="pencarian d-flex justify-content-between align-items-end">
					<!-- <p class="m-0">Menampilkan <b>{{ $data_users->count() }}</b> data dari total <b>{{ $data_users->total() }}</b> </p> -->
					<a href="{{ route('user.create') }}"><button type="button">+ Buat Baru</button></a>
				</div>

				<table id="example" class="table table-striped" style="width:100%">
					<thead>
						<tr>
							<td width="30px">No</td>
							<td>Username</td>
							<td>Nama Lengkap</td>
							<td width="60px" class="text-center">Opsi</td>
						</tr>
					</thead>
					<tbody>
						@foreach($data_users as $user)
						<tr>
							<td class="text-center">{{ $no++ }}</td>
							<td>{{ $user->username }}</td>
							<td>{{ $user->fullname }}</td>
							<td>
								<ul class="list-inline">
									<li class="list-inline-item"><a href="{{ route('user.show', [
										'user' => $user->id,
										'no' => $no-1
									]) }}" class="active"><i class='bx bx-show'></i></a></li>

									<li class="list-inline-item"><a href="{{ route('user.edit', [
										'user' => $user->id,
									]) }}" class="active"><i class='bx bxs-edit '></i></a></li>

									<li class="list-inline-item">
										<form id="deleteForm_{{ $user->id }}" action="{{ route('user.destroy', ['user' => $user->id]) }}" method="POST">
											@csrf
											@method('DELETE')
										</form>

										<a href="#" class="delete-link active" onclick="deleteConfirmation('{{ $user->id }}')" data-id="{{ $user->id }}">
											<i class='bx bx-trash'></i>
										</a>


									</li>
								</ul>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<script>
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