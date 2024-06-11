@extends('kerangka.master')
@section('title', 'Tarif')
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
						<h3>Tarif</h3>
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
							<li class="breadcrumb-item active" aria-current="page">Tarif</li>
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
					<!-- <p class="m-0">Menampilkan <b>{{ $data_tarif->count()}}</b> data dari total <b>{{ $data_tarif->total()}} </b> </p> -->
					<a href="{{ route('tarif.create') }}"><button type="button">+ Buat Baru</button></a>
				</div>
				<table id="example" class="table table-striped" style="width:100%">
					<thead>
						<tr>
							<td width="30px">No</td>
							<td>Kode Provinsi</td>
							<td>Kode Dati2</td>
							<td>Tahun Awal</td>
							<td>Tahun Akhir</td>
							<td>NJOP Minimal</td>
							<td>NJOP Maximal</td>
							<td>Nilai Tarif</td>
							<td width="60px" class="text-center">Opsi</td>
						</tr>
					</thead>

					<tbody>
						@foreach($data_tarif as $tarif)
						<tr>
							<td class="text-center">{{ $no++ }}</td>
							<td>{{ $tarif->KD_PROPINSI }}</td>
							<td>{{ $tarif->KD_DATI2 }}</td>
							<td>{{ $tarif->THN_AWAL }}</td>
							<td>{{ $tarif->THN_AKHIR }}</td>
							<td>{{ $tarif->NJOP_MIN }}</td>
							<td>{{ $tarif->NJOP_MAX }}</td>
							<td>{{ $tarif->NILAI_TARIF }}</td>
							<td>
								<ul class="list-inline">
									<li class="list-inline-item"><a class="active" id="info"><i class='bx bx-show' ></i></a></li>
									<li class="list-inline-item"><a href="{{ route('tarif.edit', ['KD_PROPINSI' => $tarif->KD_PROPINSI, 'KD_DATI2' => $tarif->KD_DATI2, 'THN_AWAL' => $tarif->THN_AWAL, 'THN_AKHIR' => $tarif->THN_AKHIR, 'NJOP_MIN' => $tarif->NJOP_MIN]) }}" class="active"><i class='bx bxs-edit'></i></a></li>
									<li class="list-inline-item">

										<form id="deleteForm_{{ $tarif->KD_PROPINSI,$tarif->KD_DATI2,$tarif->THN_AWAL,$tarif->THN_AKHIR,$tarif->NJOP_MIN }}" action="{{ route('tarif.destroy', ['KD_PROPINSI' => $tarif->KD_PROPINSI, 'KD_DATI2' => $tarif->KD_DATI2, 'THN_AWAL' => $tarif->THN_AWAL, 'THN_AKHIR' => $tarif->THN_AKHIR, 'NJOP_MIN' => $tarif->NJOP_MIN]) }}" method="POST">
											@csrf
											@method('DELETE')
										</form>

										<a href="#" onclick="deleteConfirmation('{{ $tarif->KD_PROPINSI,$tarif->KD_DATI2,$tarif->THN_AWAL,$tarif->THN_AKHIR,$tarif->NJOP_MIN }}')">
											<i class='bx bx-trash'></i>
										</a>

										<script>
											function deleteConfirmation(tarif_id) {
												if (confirm('Anda yakin untuk menghapus?')) {
													document.getElementById('deleteForm_' + tarif_id).submit();
												}
											}
										</script>
									</li>
								</ul>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>

				<div class="d-flex justify-content-center mt-3">
					{{ $data_tarif->links() }}
				</div>

			</div>
		</div>
	</div>
	@endsection