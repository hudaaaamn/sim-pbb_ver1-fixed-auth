  <!-- <a href="#" class="brand"><i class='icon' src="image/logo.svg"></i> SIM-PBB</a> -->
  <a href="#" class="brand">
  	<img class="icon-utama" src="{{asset('
				image/logo.svg')}}" alt="Logo">
  	SIM-PBB
  </a>
  <ul class="side-menu">
  	<li class="divider" data-text="Home">Home</li>
  	<li><a href="{{ route('dashboard') }}"><i class='bx bxs-dashboard icon'></i> Dashboard</a></li>
  	<li class="divider" data-text="Pilihan ">Pilihan </li>
  	<li><a href="{{ route('pelayanan.index') }}"><i class='bx bxs-cog icon'></i> Pelayanan</a></li>
  	<li>
  		<a href="#"><i class='bx bx-bookmarks icon'></i> Dokumen <i class='bx bx-chevron-right icon-right'></i></a>
  		<ul class="side-dropdown">
  			<li><a href="{{ route('spop.index') }}"><i class='bx bxs-circle icon-dot'></i>SPOP</a></li>
  			<li><a href="{{ route('lspop.index') }}"><i class='bx bxs-circle icon-dot'></i>LSPOP</a></li>
  		</ul>
  	</li>
  	<li>
  		<a href="#"><i class='bx bx-file icon'></i> Laporan <i class='bx bx-chevron-right icon-right'></i></a>
  		<ul class="side-dropdown">
  			<li><a href="{{ route('realisasiKel.index') }}"><i class='bx bxs-circle icon-dot'></i>Realisasi Kelurahan</a></li>
  			<li><a href="{{ route('pelayananLap.index')}}"><i class='bx bxs-circle icon-dot'></i>Pelayanan</a></li>
  			<li><a href="{{ route('skNjop.index') }}"><i class='bx bxs-circle icon-dot'></i>SK NJOP</a></li>
  			<li><a href="{{ route('informasiPbb.index') }}"><i class='bx bxs-circle icon-dot'></i>Informasi PBB</a></li>
  			<li><a href="{{ route('neracaKpp.index') }}"><i class='bx bxs-circle icon-dot'></i>Neraca KPP</a></li>
  			<li><a href="{{ route('summaryNerKPP.index') }}"><i class='bx bxs-circle icon-dot'></i>Total Neraca KPP</a></li>
  			<li><a href="{{ route('neracaBpk.index') }}"><i class='bx bxs-circle icon-dot'></i>Neraca BPK</a></li>
  			<li><a href="{{ route('summaryNerBPK.index') }}"><i class='bx bxs-circle icon-dot'></i>Total Neraca BPK</a></li>
  			<li><a href="{{ route('validasi.index') }}"><i class='bx bxs-circle icon-dot'></i>Validasi</a></li>
  			<li><a href="{{ route('hasilInputPelayanan.index') }}"><i class='bx bxs-circle icon-dot'></i>Hasil Input Pelayanan</a></li>
  		</ul>
  	</li>
  	<li>
  		<a href="#"><i class='bx bxs-inbox icon'></i> Keuangan <i class='bx bx-chevron-right icon-right'></i></a>
  		<ul class="side-dropdown">
  			<li><a href="{{ route('tunggakan.index') }}"><i class='bx bxs-circle icon-dot'></i>Tunggakan</a></li>
  			<li><a href="{{ route('tarif.index')}}"><i class='bx bxs-circle icon-dot'></i>Tarif</a></li>
  			<li><a href="{{ route('njoptkp.index') }}"><i class='bx bxs-circle icon-dot'></i>NJOPTKP</a></li>
  		</ul>
  	</li>
  	<li>
  		<a href="#"><i class='bx bxs-map icon'></i> Daerah <i class='bx bx-chevron-right icon-right'></i></a>
  		<ul class="side-dropdown">
  			<li><a href="{{ route('provinsi.index') }}"><i class='bx bxs-circle icon-dot'></i>Provinsi</a></li>
  			<li><a href="{{ route('kabupaten.index') }}"><i class='bx bxs-circle icon-dot'></i>Kabupaten</a></li>
  			<li><a href="{{ route('kecamatan.index') }}"><i class='bx bxs-circle icon-dot'></i>Kecamatan</a></li>
  			<li><a href="{{ route('kelurahan.index') }}"><i class='bx bxs-circle icon-dot'></i>Kelurahan</a></li>
  		</ul>
  	</li>
  	<li><a href="{{ route('user.index') }}"><i class='bx bxs-user icon'></i> Pengguna</a></li>

  	<li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"><i class='bx bx-log-out icon'></i>Log Out</a>
  		<form id="logout-form" action="{{ route('logout') }}" method="POST">
  			@csrf
  		</form>
  	</li>
  </ul>
  <!-- <div class="ads">
			<div class="wrapper">
				<a href="#" class="btn-upgrade">LOGOUT</a>
			</div>
		</div> -->