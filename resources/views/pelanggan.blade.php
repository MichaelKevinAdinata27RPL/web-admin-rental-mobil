@extends("template")
@section("content")
<div class="container-fluid">
	<!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-0">
            <h3 class="h2 mb-3 text-danger">Data Pelanggan</h3>
          </div>
	<?php if (Session::has("message")): ?>
	<div class="alert alert-dismissible alert-info">
		{{ Session::get("message") }}
		<span class="close" data-dismiss="alert">&times;</span>
	</div>
<?php endif ?>
<form action="{{ url('customer/search') }}" method="post" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
    <div class="input-group">
      <input type="text" class="form-control bg-light border-1 small" placeholder="Cari Pelanggan" name="search">
      <div class="input-group-append">
        <button class="btn btn-primary" type="submit">
          <i class="fas fa-search fa-sm"></i>
        </button>
      </div>
    </div>
</form>
<br>
<br>
<table class="table">
	<thead>
		<tr>
			<th>ID Pelanggan</th>
			<th>Nama Pelanggan</th>
			<th>Alamat</th>
			<th>Kontak</th>
			<th>Foto Pelanggan</th>
			<th>Option</th>
		</tr>
	</thead>
	<tbody>
		@foreach($pelanggans as $pelanggan)
		<tr>
			<td>{{ $pelanggan->id_pelanggan }}</td>
			<td>{{ $pelanggan->nama }}</td>
			<td>{{ $pelanggan->alamat }}</td>
			<td>{{ $pelanggan->kontak }}</td>
			<td><img src="{{ url('storage/fotoPelanggan/'.$pelanggan->image) }}" width="100" class="image">
			</td>
			<td>
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal" onclick='Edit({!! json_encode($pelanggan) !!})'>
					Edit
				</button>
				<a href='{{ url("/delete_pelanggan/$pelanggan->id_pelanggan") }}'>
					<button type="button" class="btn btn-danger"> Hapus </button>
				</a>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal" onclick="Add()"> Tambah Data </button>

<div class="modal fade" id="modal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h3>Form Tambah Pelanggan</h3>
				<span class="close" data-dismiss="modal">&times;</span>
			</div>
			<form action="{{ url('save_pelanggan') }}" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}
				<input type="hidden" name="action" id="action">
				<div class="modal-body">
					ID Pelanggan
					<input type="text" name="id_pelanggan" id="id_pelanggan" class="form-control" required />
					Nama Pelanggan
					<input type="text" name="nama" id="nama" class="form-control" required />
					Alamat
					<input type="text" name="alamat" id="alamat" class="form-control" required />
					Kontak
					<input type="text" name="kontak" id="kontak" class="form-control" required />
					Foto Pelanggan
					<input type="file" name="image" id="image" class="form-control" accept="image/jpg" />
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-info">Simpan</button>
				</div>
			</form>	
		</div>
	</div>
</div>

<script type="text/javascript">
	function Add() {
		$('#id_pelanggan').val(""); //sama seperti document.getElementById
		$('#nama').val("");
		$('#alamat').val("");
		$('#kontak').val("");
		$('#image').val("");
		$('#image').prop("required",true); //enable required prop
		$('#action').val("insert");
	}

	function Edit(Pelanggan) {
		$('#id_pelanggan').val(Pelanggan.id_pelanggan); //sama seperti document.getElementById
		$('#nama').val(Pelanggan.nama);
		$('#alamat').val(Pelanggan.alamat);
		$('#kontak').val(Pelanggan.kontak);
		$('#image').val("");
		$('#image').prop("required",false); //enable required prop
		$('#action').val("update");
	}
</script>
</div>
@endsection