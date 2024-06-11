@extends('kerangka.master')

@section('title', 'Detail Data Pengguna')

@section('content')

<div class="bgn">
	<h1 class="title">Selamat Datang</h1>
	<p class="greet">Selamat Datang di Sistem Informasi Pajak Bumi Bangunan</p>
</div>

<div class="data">
	<div class="box-container">
		<div class="detail">
			<div class="recentOrders">
				<div class="cardHeader">
					<h3>Detail Data Pengguna</h3>
					<!-- <div aria-label="breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#">Beranda</a></li>
								<li class="breadcrumb-item"><a href="#">Daerah</a></li>
								<li class="breadcrumb-item"><a href=" {{ route('provinsi.index') }}">Provinsi</a></li>
								<li class="breadcrumb-item active" aria-current="page">Tambah Data Provinsi</li>
							</ol>
							</div> -->
					<div class=" p-0 d-flex align-items-start" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="#">Beranda</a></li>
							<li class="breadcrumb-item"><a href=" {{ route('user.index') }}">Pengguna</a></li>
							<li class="breadcrumb-item active" aria-current="page">Detail Data Pengguna</li>
						</ol>
					</div>
				</div>

				<div class="table-detail d-flex flex-column align-items-center justify-content-center">
					<div class="no-detail">
						<b class="fs-3">-- {{ $no }} --</b>
					</div>
					<table class="table table-borderless custom-table">
						<tbody>
							<tr class="mb-3">

								<th width="200" class="align-middle table-primary border-bottom border-top-left ">ID</th>
								<td class="border-top-right"> {{ $data_user->id }} </td>
							</tr>
							<tr class="mb-3">
								<th width="200" class="align-middle table-primary border-bottom">Username</th>
								<td> {{ $data_user->username }}</td>
							</tr>
		
							<tr class="mb-3">
								<th width="200" class="align-middle table-primary border-bottom">Email</th>
								<td> {{ $data_user->email}}</td>
							</tr>
							<tr class="mb-3">
								<th width="200" class="align-middle table-primary border-bottom">Status</th>
								<td> {{ $data_user->status }} </td>
							</tr>
							<tr class="mb-3">
								<th width="200" class="align-middle table-primary border-bottom">Jabatan</th>
								<td> {{ $data_user->jabatan }}</td>
							</tr>
							<tr class="mb-3">
								<th width="200" class="align-middle table-primary border-bottom">Role</th>
								<td> {{ $data_user->role }}</td>
							</tr>
							<tr class="mb-3">
								<th width="200" class="align-middle table-primary border-bottom">Nama Lengkap</th>
								<td> {{ $data_user->fullname }}</td>
							</tr>
							<tr class="mb-3">
								<th width="200" class="align-middle table-primary border-bottom">NIP</th>
								<td> {{ $data_user->nip }}</td>
							</tr>
							<tr class="mb-3">
								<th width="200" class="align-middle table-primary border-bottom">Nomor Ponsel</th>
								<td> {{ $data_user->nomor_ponsel }}</td>
							</tr>
							<tr class="mb-3">
								<th width="200" class="align-middle table-primary border-bottom">Created At</th>
								<td>{{ $data_user->created_at }}</td>
							</tr>
							<tr>
								<th class="align-middle table-primary border-bottom-left">Updated At</th>
								<td class="border-bottom-right">{{ $data_user->updated_at }}</td>
							</tr>
							</tr>
						</tbody>
					</table>
					<div class="tombol d-flex justify-content-center align-items-center gap-2">
						<a href="{{ route('user.edit', ['user' => $data_user->id]) }}"><button type="button">Update</button></a>
						<form action="{{ route('user.destroy', ['user' => $data_user->id]) }}" method="POST">
							@csrf
							@method('DELETE')
							<button type="submit" class="bg-danger">Delete</button>
						</form>
					</div>
				</div>

			</div>
		</div>
	</div>
	@endsection