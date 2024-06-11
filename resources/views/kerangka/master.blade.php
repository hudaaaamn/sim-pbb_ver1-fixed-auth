<!DOCTYPE html>
<html lang="id">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Fontawesome CDN Link -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.19.0/font/bootstrap-icons.css" rel="stylesheet">
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
	<link rel="stylesheet" href="{{ asset('css/style.css') }}">
	<link rel="stylesheet" href="{{ asset('css/footer.css') }}">
	<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
	<link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
	<link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
	<link rel="stylesheet" href="{{ asset('css/spop.css') }}">
	<link rel="stylesheet" href="{{ asset('css/lspop.css') }}">
	<link rel="stylesheet" href="{{ asset('css/login.css') }}">
	<!-- Include jQuery -->
	<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

	
	<!-- Include DataTables Editor -->
	<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.1.60/inputmask/jquery.inputmask.js"></script>

	<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.1.1/css/buttons.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/1.3.4/css/select.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/datetime/1.1.1/css/dataTables.dateTime.min.css">
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.1.1/js/dataTables.buttons.min.js"></script>
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/select/1.3.4/js/dataTables.select.min.js"></script>
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/datetime/1.1.1/js/dataTables.dateTime.min.js"></script>

	<!-- Bootstrap CSS
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" integrity="sha384-MdN4viGQhL9RvZpctU5AyBQKM8tKfhgLApff2OpMW+dpj3dJMyqz0mEScFEmWIlA" crossorigin="anonymous"> -->


	<!-- <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha384-o5+OtszQ4WWMpNcZKSnbOuNAiwnkWHTzRnV5c2UUvIq2fk6b4F9oC58vcyIuAuFz" crossorigin="anonymous"></script> -->

	<!-- Bootstrap JS (optional, but needed for certain features) -->
	<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-EV6hIZe3V0Pz6Ii6fu8VEeSXeLNO1Mz3i3B7fN02h+sHM+0UOV85KlU5DDMNlZfY" crossorigin="anonymous"></script> -->


	<title>@yield('title')</title>
</head>

<body>

	<!-- SIDEBAR -->
	<section id="sidebar">
		@include('include.sidebar');
	</section>
	<!-- SIDEBAR -->

	<section id="content">

		<!-- NAVBAR -->
		@include('include.navbar')
		<!-- NAVBAR -->

		<div class="bg">
			<img src="{{ asset('image/bg.svg') }}" alt="bg">
		</div>

		<!-- MAIN -->
		<main>
			@yield('content')
		</main>
		<!-- MAIN -->

		<!-- FOOTER -->
		<!-- <footer>
			@include('include.footer')
		</footer> -->
		<!-- FOOTER -->
	</section>

	<script type="text/javascript">
		$(function() {
			$('#datepicker').datepicker({
				format: 'dd/mm/yyyy',
			});
		});
	</script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
	<script src="{{ asset('js/script.js') }}"></script>
	<!-- Include jQuery -->
	<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
	<script src="js/pagination.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/jquery.inputmask.bundle.min.js"></script>


	<!-- DATATABLE -->
	<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <!-- <script >new DataTable('#example');</script> -->


	<!-- popup/alert -->
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<!-- delete confirm alert -->
	<script>
		$(function() {
			$(document).on('click', '#delete', function(e) {
				e.preventDefault();
				var link = $(this).attr("href");
				var url = $(this).data('url');

				Swal.fire({
					title: 'Apakah Anda Yakin?',
					text: "Anda tidak akan bisa memulihkannya!",
					icon: 'warning',
					showCancelButton: true,
					confirmButtonColor: '#3085d6',
					cancelButtonColor: '#d33',
					confirmButtonText: 'Ya, hapus!'
				}).then((result) => {
					if (result.isConfirmed) {
						$('#deleteForm_' + id).submit();
						window.location.href = link;

						Swal.fire(
							'Terhapus!',
							'Data Anda berhasil dihapus!',
							'success'
						)
					}
				})
			});
		});
	</script>
	<!-- alert info -->
	<script>
		$(function() {
			$(document).on('click', '#info', function(e) {
				e.preventDefault();
				var link = $(this).attr("href");

				Swal.fire(
					'Informasi',
					'Anda tidak bisa melakukan aksi ini!',
					'info'
				)
			});
		});
	</script>

	<!-- multiple select -->
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

	<script>
		$(document).ready(function() {
			// Select2 Multiple
			$('#select2Multiple').select2({
				placeholder: "Pilih jenis pelayanan",
				allowClear: true
			});
		});
	</script>



</body>

</html>