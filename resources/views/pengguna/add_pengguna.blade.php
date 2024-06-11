@extends('kerangka.master')

@section('title', 'Tambah Data Pengguna')

@section('content')

<div class="bgn">
	<h1 class="title">Selamat Datang, Arviansyah Eka!</h1>
	<p class="greet">Selamat Datang di Sistem Informasi Pajak Bumi Bangunan</p>
</div>

<div class="data">
	<div class="box-container">
		<div class="detail">
			<div class="recentOrders">
				<div class="cardHeader">
					<h3>Tambah Data Pengguna</h3>
					<div aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="#">Beranda</a></li>
							<li class="breadcrumb-item"><a href="{{ route('user.index')}}">Pengguna</a></li>
							<li class="breadcrumb-item active" aria-current="page">Tambah Data Pengguna</li>
						</ol>
					</div>
				</div>

				<form method="POST" action="{{ route('user.store') }}" enctype="multipart/form-data" class="row g-4 p-5 needs-validation" novalidate>
					@csrf
					<div class="col-md-6">
						<label for="username" class="form-label">Username</label>
						<input type="text" class="form-control" id="username" name="username" required>
						<div class="invalid-feedback">
							Isi kolom ini terlebih dahulu!
						</div>
					</div>
					<div class="col-md-6">
						<label for="fullname" class="form-label">Nama Lengkap</label>
						<input type="text" class="form-control" id="fullname" name="fullname" required>
						<div class="invalid-feedback">
							Isi kolom ini terlebih dahulu!
						</div>
					</div>
					<div class="col-md-6">
						<label for="email" class="form-label">Email</label>
						<input type="text" class="form-control" id="email" name="email" required>
						<div class="invalid-feedback">
							Isi kolom ini terlebih dahulu!
						</div>
					</div>
					<div class="col-md-6">
						<label for="status" class="form-label">Status</label>
						<input type="text" class="form-control" id="status" name="status" required>
						<div class="invalid-feedback">
							Isi kolom ini terlebih dahulu!
						</div>
					</div>
					<div class="col-md-6">
						<label for="jabatan" class="form-label">Jabatan</label>
						<input type="text" class="form-control" id="jabatan" name="jabatan" required>
						<div class="invalid-feedback">
							Isi kolom ini terlebih dahulu!
						</div>
					</div>
					<div class="col-md-6">
						<label for="role" class="form-label">Role</label>
						<input type="text" class="form-control" id="role" name="role" required>
						<div class="invalid-feedback">
							Isi kolom ini terlebih dahulu!
						</div>
					</div>
					<div class="col-md-6">
						<label for="nip" class="form-label">NIP</label>
						<input type="text" class="form-control" id="nip" name="nip" required>
						<div class="invalid-feedback">
							Isi kolom ini terlebih dahulu!
						</div>
					</div>
					<div class="col-md-6">
						<label for="nomorponsel" class="form-label">Nomor Ponsel</label>
						<input type="text" class="form-control" id="nomorponsel" name="nomor_ponsel" required>
						<div class="invalid-feedback">
							Isi kolom ini terlebih dahulu!
						</div>
					</div>

					<div class="col-md-6">
						<label for="password" class="form-label text-md-end text-start">Password</label>
						<input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
						@if ($errors->has('password'))
						<span class="text-danger">{{ $errors->first('password') }}</span>
						@endif

					</div>

					<div class="col-md-6">
						<label for="password_confirmation" class="form-label text-md-end text-start">Confirm Password</label>
						<input type="password" class="form-control" id="password_confirmation" name="password_confirmation">

					</div>


					<div class="col-md-12 text-center">
						<button type="submit" class="btn btn-primary" style="width:150px;">Tambah</button>
					</div>
				</form>

			</div>
		</div>
	</div>
	@endsection

	<script>
		$(document).ready(function() {
			$("#togglePassword").on("click", function() {
				const passwordField = $("#password");
				const fieldType = passwordField.attr("type");
				passwordField.attr("type", fieldType === "password" ? "text" : "password");
			});

			$("#toggleConfirmPassword").on("click", function() {
				const confirmPasswordField = $("#confirm_password");
				const fieldType = confirmPasswordField.attr("type");
				confirmPasswordField.attr("type", fieldType === "password" ? "text" : "password");
			});
		});
	</script>