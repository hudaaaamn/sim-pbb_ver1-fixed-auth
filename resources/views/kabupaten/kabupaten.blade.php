@extends('kerangka.master')
@section('title', 'Kabupaten')
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
					<h3>Dati II</h3>
					<!-- <div aria-label="breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#">Beranda</a></li>
								<li class="breadcrumb-item"><a href="#">Daerah</a></li>
								<li class="breadcrumb-item active" aria-current="page">Kabupaten</li>
							</ol>
							</div> -->
					<div class=" p-0 d-flex align-items-start" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="#">Beranda</a></li>
							<li class="breadcrumb-item"><a href="#">Daerah</a></li>
							<li class="breadcrumb-item active" aria-current="page">Kabupaten</li>
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
					<!-- <p class="m-0">Menampilkan <b>{{ $data_kab->count() }}</b> data dari total <b>{{ $data_kab->total() }}</b> </p> -->
					<a href="{{ route('kabupaten.create') }}"><button type="button">+ Buat Baru</button></a>
				</div>

				<table id="example" class="table table-striped" style="width:100%">
					<thead>
						<tr>
							<td width="30px">No</td>
							<td>Kode Provinsi</td>
							<td>Kode Dati II</td>
							<td>Nama Dati II</td>
							<td width="200px" class="text-center">Opsi</td>
						</tr>
					</thead>

					<tbody>
						@foreach($data_kab as $kab)
						<tr>
							<td class="text-center">{{ $no++ }}</td>
							<td>{{ $kab->KD_PROPINSI }}</td>
							<td>{{ $kab->KD_DATI2 }}</td>
							<td>{{ $kab->NM_DATI2 }}</td>
							<td class="text-center">
								<a href="{{ route('kabupaten.show', [
										'kdPropinsi' => $kab->KD_PROPINSI,
										'kdDati2' => $kab->KD_DATI2,
										'no' => $no-1
									]) }}" class="text-center" style="display: inline;">Lihat detail</a>
									<!-- <li class="list-inline-item"><a href="#" class="active" id="info"><i class='bx bxs-edit'></i></a></li>
									<li class="list-inline-item"><a href="#" class="active" id="info"><i class='bx bx-trash'></i></a></li> -->
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
				<!-- <div class="d-flex justify-content-center">
					{{ $data_kab->links() }}
				</div> -->

			</div>
		</div>
	</div>
	@endsection