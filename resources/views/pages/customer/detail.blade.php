@extends('layouts.main')

@section('container')
<div class="row mt-4">
	<div class="col-md-12">
		<div class="card">
			<div class="card-body">
				<table class=" table table-striped table-inverse" id="example2">
					<thead class="thead-default">
						<tr>
							<th>No</th>
							<th>Nama customer</th>
							<th>Kode Transaksi</th>
							<th>Tanggal</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($dataTransaksi as $item)
						<tr>
							<td>{{ $loop->iteration }}</td>
							<td>{{ $item->nama_lengkap }}</td>
							<td>{{ $item->kode }}</td>
							<td>{{ $item->tanggal }}</td>
							<td>
								<a href="{{ route('transaksi.show',$item->id) }}">Detail Transaksi</a>
							</td>
						</tr>
						@endforeach

					</tbody>
				</table>
			</div>


		</div>

	</div>
</div>

@endsection