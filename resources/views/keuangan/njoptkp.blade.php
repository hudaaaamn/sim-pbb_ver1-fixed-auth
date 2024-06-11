@extends('kerangka.master')
@section('title', 'NJOPTKP')
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
						<h3>NJOPTKP</h3>
					</a>
					<!-- <div aria-label="breadcrumb">
							<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="#">Beranda</a></li>
							<li class="breadcrumb-item"><a href="#">Daerah</a></li>
							<li class="breadcrumb-item active" aria-current="page">Provinsi</li>
							</ol>
							</div> -->
					<div class=" p-0 d-flex align-items-start" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="#">Beranda</a></li>
							<li class="breadcrumb-item"><a href="#">Keuangan</a></li>
							<li class="breadcrumb-item active" aria-current="page">NJOPTKP</li>
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
					<!-- <p class="m-0">Menampilkan <b>{{ $results->count() }} </b> data dari total <b>{{ $results->total() }}</b> </p> -->
					<!-- <a href="{{ route('provinsi.create') }}"><button type="button">+ Buat Baru</button></a> -->
				</div>
				<table id="example" class="table table-striped" style="width:100%">
					<thead>
						<tr>
							<td width="50px">No</td>
							<td>Nama Wajib Pajak</td>
							<td>Subjek Pajak ID</td>
							<td>NOP</td>
							<td>MAX NJOP SPPT</td>
							<td>NJOPTKP</td>
						</tr>
					</thead>

					<tbody>
						@foreach($results as $result)
						<tr>
							<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

							<td class="text-center">{{ $no++ }}</td>
							<td>{{ $result->NM_WP_SPPT }}</td>
							<td>{{ $result->subjek_pajak_id }}</td>
							<td>{{ $result->KD_PROPINSI.$result->KD_DATI2.$result->KD_KECAMATAN.$result->KD_KELURAHAN.$result->KD_BLOK.$result->NO_URUT.$result->KD_JNS_OP }}</td>
							<td>{{ number_format($result->max_NJOP_SPPT,0,'','.') }}</td>
							<td>
								<span class="display-mode">{{ number_format($result->NJOPTKP_SPPT, 0, '', '.') }}</span>
								<a href="#" class="edit-btn active" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo"><i class='bx bxs-edit'></i></a>
								<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
									<div class="modal-dialog modal-dialog-centered">
										<div class="modal-content">
											<form method="POST" action="{{ route('njoptkp.update', ['kdPropinsi' => $result->KD_PROPINSI, 'kdDati2' => $result->KD_DATI2, 'kdKecamatan' => $result->KD_KECAMATAN, 'kdKelurahan' => $result->KD_KELURAHAN, 'kdBlok' => $result->KD_BLOK, 'noUrut' => $result->NO_URUT, 'kdJenisOp' => $result->KD_JNS_OP, 'thnPajakSppt' => $result->THN_PAJAK_SPPT]) }}" enctype="multipart/form-data">
												@csrf
												<div class="modal-header">
													<h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Nilai NJOPTKP SPPT</h1>
													<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
												</div>
												<div class="modal-body">
													<div class="mb-3">
														<label for="njoptkp" class="col-form-label">NJOPTKP SPPT:</label>
														<input type="text" class="form-control" id="njoptkp" name="NJOPTKP_SPPT">
													</div>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
													<button type="submit" class="btn btn-primary">Simpan</button>
												</div>
											</form>
										</div>
									</div>
								</div>
							</td>

						</tr>
						@endforeach
					</tbody>
				</table>

				<div class="d-flex justify-content-center mt-3">
					{{ $results->links() }}
				</div>

			</div>
		</div>
	</div>

	@endsection