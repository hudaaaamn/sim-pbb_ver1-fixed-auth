@extends('kerangka.master')

@section('title', 'Edit Data Pengguna')

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
							<h3>Edit Data Pengguna</h3>
							<div aria-label="breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#">Beranda</a></li>
								<li class="breadcrumb-item"><a href="{{ route('user.index')}}">Pengguna</a></li>
								<li class="breadcrumb-item active" aria-current="page">Edit Data Pengguna</li>
							</ol>
							</div>
						</div>
						
                        <form method="POST" action="{{ route('user.update', ['user' => $data_user->id]) }}" enctype="multipart/form-data" class="row g-4 p-5 needs-validation" novalidate>
							@csrf
							@method('PUT')
                            <div class="col-md-6">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" name="username" value="{{ $data_user->username }}">
								<div class="invalid-feedback">
									Isi kolom ini terlebih dahulu!
								</div>
                            </div>
                            <div class="col-md-6">
                                <label for="fullname" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" id="fullname" name="fullname" value="{{ $data_user->fullname }}">
								<div class="invalid-feedback">
									Isi kolom ini terlebih dahulu!
								</div>
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control" id="email" name="email" value="{{ $data_user->email }}" >
								<div class="invalid-feedback">
									Isi kolom ini terlebih dahulu!
								</div>
                            </div>
                            <!-- <div class="col-md-6">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required >
								<div class="invalid-feedback">
									Isi kolom ini terlebih dahulu!
								</div>
                            </div> -->
                            <div class="col-md-6">
                                <label for="status" class="form-label">Status</label>
                                <input type="text" class="form-control" id="status" name="status" value="{{ $data_user->status }}">
								<div class="invalid-feedback">
									Isi kolom ini terlebih dahulu!
								</div>
                            </div>
                            <div class="col-md-6">
                                <label for="jabatan" class="form-label">Jabatan</label>
                                <input type="text" class="form-control" id="jabatan" name="jabatan" value="{{ $data_user->jabatan }}">
								<div class="invalid-feedback">
									Isi kolom ini terlebih dahulu!
								</div>
                            </div>
                            <div class="col-md-6">
                                <label for="role" class="form-label">Role</label>
                                <input type="text" class="form-control" id="role" name="role" value="{{ $data_user->role }}">
								<div class="invalid-feedback">
									Isi kolom ini terlebih dahulu!
								</div>
                            </div>
                            <div class="col-md-6">
                                <label for="nip" class="form-label">NIP</label>
                                <input type="text" class="form-control" id="nip" name="nip" value="{{ $data_user->nip }}">
								<div class="invalid-feedback">
									Isi kolom ini terlebih dahulu!
								</div>
                            </div>
                            <div class="col-md-6">
                                <label for="nomorponsel" class="form-label">Nomor Ponsel</label>
                                <input type="text" class="form-control" id="nomorponsel" name="nomor_ponsel" value="{{ $data_user->nomor_ponsel }}">
								<div class="invalid-feedback">
									Isi kolom ini terlebih dahulu!
								</div>
                            </div>

                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary" style="width:150px;">Simpan</button>
                            </div>
                        </form>

					</div>
				</div>
			</div>
@endsection