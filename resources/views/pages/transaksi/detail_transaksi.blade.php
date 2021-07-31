@extends('layouts.main')

@section('container')
<div class="row mt-4">
	<div class="col-md-12">
		<div class="card">
			<div class="card-body">
				<h5>Data Detail Transaksi</h5>
			</div>
			<table class="table table-striped table-inverse">
				<thead class="thead-inverse">
					<tr>
						<th>No</th>
						<th>Produk</th>
						<th>Harga</th>
						<th>Jumlah</th>
						<th>Kode</th>
						<th>Alamat Lengkap</th>
						<th>Tanggal</th>
						<th>Total Harga</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($detailTransaksi as $item)
					<tr>
						<td> {{ $loop->iteration }} </td>
						<td><img width="70px" class="img-fluid"
								src="{{ asset($item->gambar) }}">{{ $item->nama_produk }}
						</td>
						<td>{{ $item->harga }}</td>
						<td>{{ $item->jumlah }}</td>
						<td>{{ $item->kode }} | {{ $item->nama_lengkap }}</td>
						<td>{{ $item->alamat_lengkap }}</td>
						<td>{{ $item->tanggal }}</td>
						<td>{{ ($item->harga*$item->jumlah) }}</td>
					</tr>
					@endforeach

				</tbody>
			</table>

		</div>
		<a href="{{ route('customer.index') }}" class="btn btn-secondary">Data Costumer</a>

	</div>
</div>

@endsection