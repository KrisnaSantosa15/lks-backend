<aside class="main-sidebar sidebar-dark-primary elevation-4">
	<!-- Brand Logo -->
	<a href="{{ asset('AdminLTE') }}/index3.html" class="brand-link">
		<img src="{{ asset('AdminLTE') }}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo/"
			class="brand-image img-circle elevation-3" style="opacity: .8">
		<span class="brand-text font-weight-light">AdminLTE 3</span> </a> <!-- Sidebar -->
	<div class="sidebar">
		<!-- Sidebar user (optional) -->
		<div class="user-panel mt-3 pb-3 mb-3 d-flex">
			<div class="image">
				<img src="{{ asset('AdminLTE') }}/dist/img/user2-160x160.jpg" class="img-circle elevation-2"
					alt="User Image">
			</div>
			<div class="info">
				<a href="#" class="d-block">Alexander Pierce</a>
			</div>
		</div>

		<!-- Sidebar Menu -->
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
				<!-- Add icons to the links using the .nav-icon class
	   with font-awesome or any other icon font library -->


				<li class="nav-header">Admin Panel</li>
				<li class="nav-item">
					<a href="{{ '#' }}" class="nav-link">
						<i class="nav-icon fas fa-th"></i>
						<p>Dashboard</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="{{ route('kategori.index') }}" class="nav-link">
						<i class="nav-icon fas fa-list" aria-hidden="true"></i>
						<p>Kategori</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="{{ route('produk.index') }}" class="nav-link">
						<i class="nav-icon fas fa-boxes"></i>
						<p>Produk</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="{{ route('customer.index') }}" class="nav-link">
						<i class="nav-icon fas fa-user-check"></i>
						<p>Customer</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="{{ route('transaksi.index') }}" class="nav-link">
						<i class="nav-icon fas fa-money-bill-alt"></i>
						<p>Buat Transaksi</p>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
								  document.getElementById('logout-form').submit();">
						<i class="nav-icon fas fa-sign-out-alt"></i>
						<p>Logout</p>
					</a>

					<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
						@csrf
					</form>
				</li>
			</ul>
		</nav>
		<!-- /.sidebar-menu -->
	</div>
	<!-- /.sidebar -->
</aside>