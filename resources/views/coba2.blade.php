@extends('kerangka.master')
@section('title', 'Dashboard')
@section('content')
			<div class="bgn">
				<h1 class="title">Selamat Datang, {{$fullname}}!</h1>
				<p class="greet">Selamat Datang di Sistem Informasi Pajak Bumi Bangunan</p>
			</div>


			<div class="data">
				<div class="box-container">
					<div class="content-data">
						<div class="grafik-harga-tanah">
							<div class="head">
								<h3></h3>
								<div class="menu">
									<i class='bx bx-dots-horizontal-rounded icon'></i>
									<ul class="menu-link">
										<li><a href="#">Edit</a></li>
										<li><a href="#">Save</a></li>
										<li><a href="#">Remove</a></li>
									</ul>
										<label for="tahun" style="margin-right: 10px;">Tahun : </label>
										<select id="tahun">
											<option value="2022">2022</option>
											<option value="2023">2023</option>
											<option value="2024">2024</option>
										</select>
								</div>
							</div>
							<div class="info">
								<p>102.534</p>
								<h6>Jumlah Objek Pajak</h6>
							</div>
							<div class="info">
								<p>13.426.678</p>
								<h6>Luas Bangunan Total</h6>
							</div>
						</div>
					</div>
				</div>
				<div class="info-data">
					<div class="kartu">
						<div class="head">
							<div>
								<h6>Total Pendapatan PBB</h6>
								<p>Rp 72.234.897.463.563</p>
							</div>
						</div>
					</div>
					<div class="kartu">
						<div class="head">
							<div>
								<h6>Jumlah PBB Lunas</h6>
								<p>Rp 234.897.463.563</p>
							</div>
						</div>
					</div>
					<div class="kartu">
						<div class="head">
							<div>
								<h6>Jumlah PBB Belum Lunas</h6>
								<p>Rp 98.573.547.659</p>
							</div>
						</div>
					</div>
				</div>
				<div class="box-container3">
					<div class="content-data">
						<div class="grafik-harga-tanah">
							<div class="head">
								<h4>Grafik Pergerakan PBB</h4>
								<div class="menu">
									<i class='bx bx-dots-horizontal-rounded icon'></i>
									<ul class="menu-link">
										<li><a href="#">Edit</a></li>
										<li><a href="#">Save</a></li>
										<li><a href="#">Remove</a></li>
									</ul>
								</div>
							</div>
							<div class="chart">
								<div id="chart"></div>
							</div>
						</div>
					</div>
				</div>
				<!-- <div class="box-container3">
					<div class="detail">
						<div class="recentOrders">
							<div class="cardHeader">
								<h3>Daftar Klien</h3>
								<a href="#" class="btn">View All</a>
							</div>

							<table>
								<thead>
									<tr>
										<td>Name</td>
										<td>Tanggal Pelayanan</td>
										<td>NOP</td>
									</tr>
								</thead>

								<tbody>
									<tr>
										<td>Star Refrigerator</td>
										<td>$1200</td>
										<td>Paid</td>
									</tr>

									<tr>
										<td>Dell Laptop</td>
										<td>$110</td>
										<td>Due</td>
									</tr>

									<tr>
										<td>Apple Watch</td>
										<td>$1200</td>
										<td>Paid</td>
									</tr>

									<tr>
										<td>Addidas Shoes</td>
										<td>$620</td>
										<td>Due</td>
									</tr>

									<tr>
										<td>Star Refrigerator</td>
										<td>$1200</td>
										<td>Paid</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div> -->
				<!-- <div class="box-container2">
					<div class="content-data">
							<div class="atur-akun">
								<div class="head">
									<h3>Atur Akun Anda</h3>
									<div class="menu">
										<i class='bx bx-dots-horizontal-rounded icon'></i>
										<ul class="menu-link">
											<li><a href="#">Edit</a></li>
											<li><a href="#">Save</a></li>
											<li><a href="#">Remove</a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div> -->
			</div>
@endsection