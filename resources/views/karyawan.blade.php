@extends("template")
@section("content")
<div class="container-fluid">
		<!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-0">
            <h3 class="h2 mb-3 text-danger">Data Karyawan</h3>
          </div>
<?php if (Session::has("message")): ?>
	<div class="alert alert-dismissible alert-info">
		{{ Session::get("message") }}
		<span class="close" data-dismiss="alert">&times;</span>
	</div>
<?php endif ?>
<form action="{{ url('karyawan/search') }}" method="post" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
    <div class="input-group">
      <input type="text" class="form-control bg-light border-1 small" placeholder="Cari Karyawan" name="search">
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
			<th>ID Karyawan</th>
			<th>Nama Karyawan</th>
			<th>Alamat</th>
			<th>Kontak</th>
			<th>Username</th>
			<th>Password</th>
			<th>Option</th>
		</tr>
	</thead>
	<tbody>
		@foreach($karyawans as $karyawan)
		<tr>
			<td>{{ $karyawan->id_karyawan }}</td>
			<td>{{ $karyawan->nama }}</td>
			<td>{{ $karyawan->alamat }}</td>
			<td>{{ $karyawan->kontak }}</td>
			<td>{{ $karyawan->username }}</td>
			<td>{{ $karyawan->password }}</td>
			<td>
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal" onclick='Edit({!! json_encode($karyawan) !!})'>
					Edit
				</button>
				<a href='{{ url("/delete_karyawan/$karyawan->id_karyawan") }}'>
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
				<h3>Form Tambah Karyawan</h3>
				<span class="close" data-dismiss="modal">&times;</span>
			</div>
			<form action="{{ url('save_karyawan') }}" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}
				<input type="hidden" name="action" id="action">
				<div class="modal-body">
					ID Karyawan
					<input type="text" name="id_karyawan" id="id_karyawan" class="form-control" required />
					Nama Karyawan
					<input type="text" name="nama" id="nama" class="form-control" required />
					Alamat
					<input type="text" name="alamat" id="alamat" class="form-control" required />
					Kontak
					<input type="text" name="kontak" id="kontak" class="form-control" required />
					Username
					<input type="text" name="username" id="username" class="form-control" required />
					Password
					<input type="text" name="password" id="password" class="form-control" required />
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
		$('#id_karyawan').val(""); //sama seperti document.getElementById
		$('#nama').val("");
		$('#alamat').val("");
		$('#kontak').val("");
		$('#username').val("");
		$('#password').val("");
		$('#action').val("insert");
	}

	function Edit(Karyawan) {
		$('#id_karyawan').val(Karyawan.id_karyawan); //sama seperti document.getElementById
		$('#nama').val(Karyawan.nama);
		$('#alamat').val(Karyawan.alamat);
		$('#kontak').val(Karyawan.kontak);
		$('#username').val(Karyawan.username);
		$('#password').val(Karyawan.password);
		$('#action').val("update");
	}
</script>
</div>
@endsection