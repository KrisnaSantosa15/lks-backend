@extends('layouts.main')

@section('container')
<div class="row mt-4">
	<div class="col-md-8">
		<div class="card">
			<div class="card-body">
				<table class=" table table-striped table-inverse" id="example2">
					<thead class="thead-default">
						<tr>
							<th>No</th>
							<th>Nama Kategori</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($kategori as $item)
						<tr>
							<td>{{ $loop->iteration }}</td>
							<td> {{ $item->nama_kategori }} </td>
							<td> <a class="btn btn-success btn-sm" data-toggle="modal"
									data-target="#modalEdit{{ $item->id }}"> <i class="fas fa-pencil-alt"></i>
								</a>
								<form action="{{ route('kategori.destroy',$item->id) }}" method="post" class="d-inline">
									@csrf
									@method('delete')
									<button onclick="return confirm('yakin hapus data?')" class="btn btn-danger btn-sm">
										<i class="fas fa-trash-alt"></i> </button>
								</form>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>

		</div>
	</div>
	<div class="col-md-4">
		<div class="card">
			<div class="card-body">
				<h4 class="text-center">Tambah Kategori</h4>
				<form action="{{ route('kategori.store') }}" method="post">
					@csrf
					<div class="form-group">
						<label for="">Nama Kategori</label>
						<input type="text" name="nama_kategori" value="{{ old('nama_kategori') }}" class="form-control"
							placeholder="Baju">
						@error('nama_kategori')
						<p class="text-danger">{{ $message }}</p>
						@enderror
					</div>
					<button class="btn btn-primary float-right">Tambah</button>
				</form>
			</div>
		</div>
	</div>
</div>

@foreach ($kategori as $item)
<div class="modal fade" id="modalEdit{{ $item->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1"
	aria-labelledby="modalEdit" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalEditLabel">{{ $item->nama_kategori }}</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="{{ route('kategori.update',$item->id) }}" method="post">
					@csrf
					@method('PUT')
					<div class="form-group">
						<label for="">Nama Kategori</label>
						<input type="text" name="nama_kategori" id="" class="form-control"
							value=" {{ old('nama_kategori')? old('nama_kategori'):$item->nama_kategori }} ">
					</div>
					<button class="btn btn-primary float-right">Edit Data</button>
				</form>
			</div>

		</div>
	</div>
</div>
@endforeach


@endsection