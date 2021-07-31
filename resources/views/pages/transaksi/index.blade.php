@extends('layouts.main')

@section('container')
<div class="row mt-4">
	<div class="col-md-8">
		<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="">Nama Customer</label>
							<select class="form-control" name="customer_id" id="select2">
								<option value="" disabled>Pilih Customer</option>
								@foreach ($customer as $cus)
								<option value="{{ $cus->id }}">{{ $cus->nama_lengkap }}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="">Produk</label>
							<select class="form-control select2 select2-danger" multiple name="produk_id" id="select2">
								<option value="" disabled>Pilih Produk</option>
								@foreach ($produk as $prod)
								<option value="{{ $prod->id }}">{{ $prod->nama_produk }}</option>
								@endforeach
							</select>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection