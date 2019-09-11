@extends('template')
@section('content')
<div class="col-sm-12">
	<div class="card">
		<div class="card-header bg-primary text-white">
			<h3>Form Sewa</h3>
		</div>
		<div class="card-body">
			<?php if (Session::has("message")): ?>
				<div class="alert alert-dismissible alert-info">
					{{ Session::get("message") }}
					<span class="close" data-dismiss="alert">&times;</span>
				</div>
			<?php endif ?>
			<form action="{{ url('save_rent') }}" method="post">
				{{ csrf_field() }}
				<div class="row">
					<div class="col-sm-3">
						Pilih Mobil
					</div>
					<div class="col-sm-9">
						<select class="form-control" name="id_mobil" id="id_mobil" required>
							@foreach($mobils as $m)
							<option value="{{ $m->id_mobil }}">
								{{ $m->merk }}
							</option>
							@endforeach
						</select>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-sm-3">
						Pilih Pelanggan
					</div>
					<div class="col-sm-9">
						<select class="form-control" name="id_pelanggan" id="id_pelanggan" required>
							@foreach($pelanggans as $p)
							<option value="{{ $p->id_pelanggan }}">
								{{ $p->nama }}
							</option>
							@endforeach
						</select>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-sm-3">
						Tanggal Sewa
					</div>
					<div class="col-sm-9">
						<input type="date" name="tgl_sewa" id="tgl_sewa" class="form-control" required>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-sm-3">
						Tanggal Kembali
					</div>
					<div class="col-sm-9">
						<input type="date" name="tgl_kembali" id="tgl_kembali" class="form-control" required>
					</div>
				</div>
				<br>
				<button type="submit" class="btn btn-success">
					Sewa
				</button>
			</form>
		</div>
	</div>
</div>
@endsection