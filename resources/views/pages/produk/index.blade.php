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
							<th>Nama Produk</th>
							<th>harga</th>
							<th>gambar</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($produk as $item)
						<tr>
							<td>{{ $loop->iteration }}</td>
							<td> {{ $item->nama_produk }} </td>
							<td> {{ $item->harga }} </td>
							<td> <img class="img-fluid" width="70px" src="{{ asset('gambar/'.$item->gambar) }}"> </td>
							<td> <a class="btn btn-success btn-sm" data-toggle="modal"
									data-target="#modalEdit{{ $item->id }}"> <i class="fas fa-pencil-alt"></i>
								</a>
								<form action="{{ route('produk.destroy',$item->id) }}" method="post" class="d-inline">
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
				<h4 class="text-center">Tambah Produk</h4>
				<form action="{{ route('produk.store') }}" method="post" enctype="multipart/form-data">
					@csrf
					<div class="form-group">
						<label for="">Nama produk</label>
						<input type="text" name="nama_produk" value="{{ old('nama_produk') }}" class="form-control mb-2"
							placeholder="Baju Muslim">
						@error('nama_produk')
						<p class="text-danger">{{ $message }}</p>
						@enderror

						<label for="">Kategori</label>
						<select class="form-control mb-2 select2" name="kategori_id" id="select2">
							<option value="" disabled>Pilih Kategori</option>
							@foreach ($kategori as $k)
							<option value="{{ $k->id }}">{{ $k->nama_kategori }}</option>
							@endforeach
						</select>

						<label for="">Deskripsi</label>
						<textarea name="deskripsi" id="summernote">{{ old('deskripsi') }}</textarea>
						@error('nama_produk')
						<p class="text-danger">{{ $message }}</p>
						@enderror

						<label for="">Harga</label>
						<input type="number" name="harga" value="{{ old('harga') }}" class="form-control mb-2">
						@error('harga')
						<p class="text-danger">{{ $message }}</p>
						@enderror

						<label for="">Gambar</label>
						<input type="file" accept="image/*" name="gambar" value="{{ old('gambar') }}"
							class="form-control mb-2">
						@error('gambar')
						<p class="text-danger">{{ $message }}</p>
						@enderror

					</div>
					<button class="btn btn-primary float-right">Tambah</button>
				</form>
			</div>
		</div>
	</div>
</div>

@foreach ($produk as $item)
<div class="modal fade" id="modalEdit{{ $item->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1"
	aria-labelledby="modalEdit" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalEditLabel">Edit Data {{ $item->nama_produk }}</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="{{ route('produk.update',$item->id) }}" method="post" enctype="multipart/form-data">
					@csrf
					@method('PUT')
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="">Nama Produk</label>
								<input type="text" name="nama_produk" id="" class="form-control"
									value=" {{ old('nama_produk')? old('nama_produk'):$item->nama_produk }} ">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="">Kategori</label>
								<select class="form-control mb-2" name="kategori_id" id="select2">
									<option value="" disabled>Pilih Kategori</option>
									@foreach ($kategori as $k)
									@if ($k->id == $item->kategori_id)
									<option selected value="{{ $k->id }}">{{ $k->nama_kategori }}</option>
									@else
									<option value="{{ $k->id }}">{{ $k->nama_kategori }}</option>
									@endif
									@endforeach
								</select>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="">Harga</label>
								<input type="text" name="harga" id="" class="form-control" value="{{ $item->harga }}">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="">Gambar</label>
								<input type="file" name="gambar" id="gambar" class="form-control">
							</div>
						</div>
					</div>
					<div class=" row">
						<div class="col-md-8">
							<textarea name="deskripsi" id="summernote2"> {{ $item->deskripsi }} </textarea>
						</div>
						<div class="col-md-4">
							<img class="img-fluid" src=" {{ asset('gambar/'.$item->gambar) }} "
								alt="{{ $item->nama_produk }}">
						</div>
					</div>
					<button class=" btn btn-primary float-right">Edit Data</button>
				</form>
			</div>
		</div>
	</div>
</div>
@endforeach


@endsection