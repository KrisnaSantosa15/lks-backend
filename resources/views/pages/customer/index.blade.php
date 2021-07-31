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
							<th>Alamat</th>
							<th>No Hp</th>
							<th>Email</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($customer as $item)
						<tr>
							<td>{{ $loop->iteration }}</td>
							<td> {{ $item->nama_lengkap }} </td>
							<td> {{ $item->alamat_lengkap }} </td>
							<td> {{ $item->no_hp }} </td>
							<td> {{ $item->email }} </td>
							<td>
								<a class="btn btn-success btn-sm" data-toggle="modal"
									data-target="#modalEdit{{ $item->id }}"> <i class="fas fa-pencil-alt"></i>
								</a>
								<a class="btn btn-primary btn-sm" href="{{ route('customer.show',$item->id) }}"> <i
										class="fas fa-eye"></i>
								</a>
								<form action="{{ route('customer.destroy',$item->id) }}" method="post" class="d-inline">
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

			@if ($errors)
			<div class="row">
				<div class="col-md-5">
					@foreach ($errors->all() as $item)
					<ul>
						<li class="text-danger">{{ $item }}</li>
					</ul>
					@endforeach
				</div>
			</div>
			@endif


		</div>
	</div>
</div>

@foreach ($customer as $item)
<div class="modal fade" id="modalEdit{{ $item->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1"
	aria-labelledby="modalEdit" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalEditLabel">Edit Data {{ $item->nama_lengkap }}</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="{{ route('customer.update',$item->id) }}" method="post" enctype="multipart/form-data">
					@csrf
					@method('PUT')
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="">Nama customer</label>
								<input type="text" name="nama_lengkap" id="" class="form-control"
									value=" {{ old('nama_lengkap')? old('nama_lengkap'):$item->nama_lengkap }} ">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="">Password</label>
								<input type="password" name="password" id="" class="form-control">
								<small class="text-danger">Kosongkan jika tidak akan diubah</small>
							</div>
						</div>
					</div>
					<div class=" row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="">No Handphone</label>
								<input type="text" name="no_hp" id="" class="form-control" value="{{ $item->no_hp }}">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="">email</label>
								<input type="email" name="email" id="email" value="{{ $item->email }} " class="
									form-control">
							</div>
						</div>
					</div>
					<div class=" row">
						<div class="col-md-12">
							<label for="">Alamat</label>
							<textarea name="alamat_lengkap" id="summernote2"> {{ $item->alamat_lengkap }} </textarea>
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