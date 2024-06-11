@extends('kerangka.master')
@section('title', 'Lihat Pelayanan')
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
						<h3>Lihat Pelayanan</h3>
					</a>
					<!-- <div aria-label="breadcrumb">
							<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="#">Beranda</a></li>
							<li class="breadcrumb-item active" aria-current="page">Pelayanan</li>
							</ol>
							</div> -->
					<div class=" p-0 d-flex align-items-start" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="#">Beranda</a></li>
							<li class="breadcrumb-item"><a href="#">Laporan</a></li>
							<li class="breadcrumb-item"><a href="#">Pelayanan</a></li>
							<li class="breadcrumb-item active" aria-current="page">Lihat Pelayanan</li>
						</ol>
					</div>
				</div>
				<!-- <form action="#">
								<div class="form-group">
									<input type="text" placeholder="Search...">
									<i class='bx bx-search icon' ></i>
								</div>
						</form> -->
				<div class="pencarian d-flex justify-content-betw  align-items-end">
					<p class="m-0">Menampilkan <b>2</b> data dari total <b>2</b> </p>
				</div>

				<div class="dataTable2" style="overflow-x: auto;">
					<table>
						<thead>
							<tr>
								<td width="50px">No</td>
								<td>No Pelayanan</td>
								<td>Kode Pelayanan</td>
								<td>Tanggal Pelayanan</td>
								<td>Nama Sebelum</td>
								<td>NOP Sebelum</td>
								<td>Lt Sebelum</td>
								<td>Lb Sebelum</td>
								<td>Ketetapan Lama</td>
								<td>Nama Baru</td>
								<td>NOP Baru</td>
								<td>Lt Baru</td>
								<td>Lb Baru</td>
								<td>Ketetapan Baru</td>
								<td>Selisih Ketetapan</td>
								<td>Keterangan</td>
								<td>Catatan</td>
							</tr>
						</thead>

						<tbody>
							<tr>
								<td>{{ $no++ }} </td>
                                <td>12</td>
                                <td>Wates</td>
                                <td>Bendungan</td>
                                <td>20</td>
                                <td>20</td>
                                <td>20</td>
                                <td>20</td>
                                <td>20</td>
                                <td>20</td>
                                <td>20</td>
                                <td>20</td>
                                <td>20</td>
                                <td>20</td>
                                <td>20</td>
                                <td>20</td>
                                <td>20</td>
							</tr>
						</tbody>
					</table>
				</div>

				<div class="d-flex justify-content-center mt-3">
				</div>

			</div>
		</div>
	</div>
	@endsection