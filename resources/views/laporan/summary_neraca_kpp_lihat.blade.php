@extends('kerangka.master')
@section('title', 'Lihat Summary Neraca')
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
						<h3>Neraca Tahun</h3>
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
							<li class="breadcrumb-item"><a href="{{ route('summaryNerKPP.index') }}">Summary Neraca KPP</a></li>
							<li class="breadcrumb-item active" aria-current="page">Lihat Summary Neraca</li>
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
								<td>TAHUN</td>
								<td>AWAL</td>
								<td>POKOK</td>
								<td>DENDA</td>
								<td>TOTAL</td>
								<td>SISA</td>
								<td>PENYISIHAN</td>
								<td>NETTO</td>
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