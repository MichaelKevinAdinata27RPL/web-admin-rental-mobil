@extends("template")
@section("content")
<div class="containe-fluid">
	<!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-0">
            <h3 class="h2 mb-3 text-danger">Data Mobil</h3>
          </div>
<?php if (Session::has("message")): ?>
	<div class="alert alert-dismissible alert-info">
		{{ Session::get("message") }}
		<span class="close" data-dismiss="alert">&times;</span>
	</div>
<?php endif ?>
<form action="{{ url('car/search') }}" method="post" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
    <div class="input-group">
      <input type="text" class="form-control bg-light border-1 small" placeholder="Cari Mobil" name="search">
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
			<th>ID Mobil</th>
			<th>Nomor Mobil</th>
			<th>Merk</th>
			<th>Warna</th>
			<th>Stok</th>
			<th>Biaya Sewa</th>
			<th>Foto Mobil</th>
			<th>Option</th>
		</tr>
	</thead>
	<tbody>
		@foreach($mobils as $mobil)
		<tr>
			<td>{{ $mobil->id_mobil }}</td>
			<td>{{ $mobil->nomor_mobil }}</td>
			<td>{{ $mobil->merk }}</td>
			<td>{{ $mobil->warna }}</td>
			<td>{{ $mobil->stok }}</td>
			<td>{{ $mobil->biaya_sewa }}</td>
			<td><img src="{{ url('storage/fotoMobil/'.$mobil->image) }}" width="100" class="image">
			</td>
			<td>
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal" onclick='Edit({!! json_encode($mobil) !!})'>
					Edit
				</button>
				<a href='{{ url("/delete_mobil/$mobil->id_mobil") }}'>
					<button type="button" class="btn btn-danger"> Hapus </button>
				</a>
			</td>
		</tr>
		@endforeach
		{{ $mobils->links() }}
	</tbody>
</table>
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal" onclick="Add()"> Tambah Data </button>

<div class="modal fade" id="modal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h3>Form Tambah Mobil</h3>
				<span class="close" data-dismiss="modal">&times;</span>
			</div>
			<form action="{{ url('save_mobil') }}" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}
				<input type="hidden" name="action" id="action">
				<div class="modal-body">
					ID Mobil
					<input type="text" name="id_mobil" id="id_mobil" class="form-control" required />
					Nomor Mobil
					<input type="text" name="nomor_mobil" id="nomor_mobil" class="form-control" required />
					Merk
					<input type="text" name="merk" id="merk" class="form-control" required />
					Warna
					<input type="text" name="warna" id="warna" class="form-control" required />
					Stok
					<input type="number" name="stok" id="stok" class="form-control" required />
					Biaya Sewa (Rp)
					<input type="number" name="biaya_sewa" id="biaya_sewa" class="form-control" required />
					Foto Mobil
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
		$('#id_mobil').val(""); //sama seperti document.getElementById
		$('#nomor_mobil').val("");
		$('#merk').val("");
		$('#warna').val("");
		$('#stok').val("");
		$('#biaya_sewa').val("");
		$('#image').val("");
		$('#image').prop("required",true); //enable required prop
		$('#action').val("insert");
	}

	function Edit(Mobil) {
		$('#id_mobil').val(Mobil.id_mobil); //sama seperti document.getElementById
		$('#nomor_mobil').val(Mobil.nomor_mobil);
		$('#merk').val(Mobil.merk);
		$('#warna').val(Mobil.warna);
		$('#stok').val(Mobil.stok);
		$('#biaya_sewa').val(Mobil.biaya_sewa);
		$('#image').val("");
		$('#image').prop("required",false); //enable required prop
		$('#action').val("update");
	}
</script>
</div>
@endsection