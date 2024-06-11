@extends('kerangka.master')
@section('title', 'Kecamatan')
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
					<h3>Kecamatan</h3>
					<!-- <div aria-label="breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#">Beranda</a></li>
								<li class="breadcrumb-item"><a href="#">Daerah</a></li>
								<li class="breadcrumb-item active" aria-current="page">Kecamatan</li>
							</ol>
							</div> -->
					<div class=" p-0 d-flex align-items-start" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="#">Beranda</a></li>
							<li class="breadcrumb-item"><a href="#">Daerah</a></li>
							<li class="breadcrumb-item active" aria-current="page">Kecamatan</li>
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
					<!-- <p class="m-0">Menampilkan <b>{{ $data_kecamatan->count() }}</b> data dari total <b>{{ $data_kecamatan->total() }}</b> </p> -->
					<a href="{{ route('kecamatan.create') }}"><button type="button">+ Buat Baru</button></a>
				</div>

				<table id="example" class="table table-striped" style="width:100%">
					<thead>
						<tr>
							<td width="30px">No</td>
							<td>Kode Provinsi</td>
							<td>Kode Dati II</td>
							<td>Kode Kecamatan</td>
							<td>Nama Kecamatan</td>
							<td width="200px" class="text-center">Opsi</td>
						</tr>
					</thead>

					<tbody>
						@foreach($data_kecamatan as $kecamatan)
						<tr>
							<td class="text-center">{{ $no++ }}</td>
							<td>{{ $kecamatan->KD_PROPINSI }}</td>
							<td>{{ $kecamatan->KD_DATI2 }}</td>
							<td>{{ $kecamatan->KD_KECAMATAN }}</td>
							<td>{{ $kecamatan->NM_KECAMATAN }}</td>
							<td class="text-center">
								<a href="{{ route('kecamatan.show', [
										'kdPropinsi' => $kecamatan->KD_PROPINSI,
										'kdDati2' => $kecamatan->KD_DATI2,
										'kdKecamatan' => $kecamatan->KD_KECAMATAN,
										'no' => $no-1
									]) }}" class="active">Lihat detail</a>
									
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
				<!-- <div class="d-flex justify-content-center">
					{{ $data_kecamatan->links() }}
				</div> -->

			</div>
		</div>
	</div>
	@endsection