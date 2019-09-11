@extends("template")
@section("content")
<div class="container-fluid"> 
<div class=" card">
  <div class="card-header bg-info text-white">
    <h4>Data Sewa</h4>
  </div>
  <br>
  <form action="{{ url('laporan/search') }}" method="post" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
    <div class="input-group">
      <input type="text" class="form-control bg-light border-1 small" placeholder="Cari Sewa" name="search">
      <div class="input-group-append">
        <button class="btn btn-primary" type="submit">
          <i class="fas fa-search fa-sm"></i>
        </button>
      </div>
    </div>
</form>
  <div class="card-body">
    <table class="table">
      <thead>
        <tr>
          <th>ID Beli</th>
          <th>Nama Pelanggan</th>
          <th>Nomor Telepon</th>
          <th>Merk Mobil</th>
          <th>Biaya Sewa</th>
          <th>Tanggal Sewa</th>
          <th>Tanggal Kembali</th>
          <th>Total Harga</th>
        </tr>
      </thead> 
      <tbody>
        @foreach ($report as $data)
          <tr>
            <td>{{$data->id_sewa}}</td>
            <td>{{$data->pelanggan->nama}}</td>
            <td>{{$data->pelanggan->kontak}}</td>
            <td>{{$data->mobil->merk}}</td>
            <td>{{$data->mobil->biaya_sewa}}</td>
            <td>{{$data->tgl_sewa}}</td>
            <td>{{$data->tgl_kembali}}</td>
            <td>{{$data->total_bayar}}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
</div> 
</div>
@endsection