<!DOCTYPE html>
<html lang="en">

@include('partials.header')

<body class="hold-transition sidebar-mini">
	<!-- Site wrapper -->
	<div class="wrapper">
		@include('partials.navbar')

		<!-- Main Sidebar Container -->
		@include('partials.sidebar')

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">

			<!-- Main content -->
			<section class="content mt-2">
				@yield('container')
			</section>
			<!-- /.content -->
		</div>
		<!-- /.content-wrapper -->

		@include('partials.footer')

	</div>
	<!-- ./wrapper -->

	@include('sweetalert::alert')

	@stack('before-script')
	@include('partials.script')
	@stack('after-script')
</body>

</html>