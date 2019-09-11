@extends('template')
@section('content')
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-0">
            <h1 class="h2 mb-0 text-gray-800">Dashboard</h1>
            
          </div>
          <hr class="sidebar-divider d-none d-md-block">

          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-m font-weight-bold text-primary text-uppercase mb-1">Mobil</div>
                      <div class="h1 mb-2 font-weight-bold text-gray-800">{{ $mobil }}</div>
                      <!-- <br> -->
                      <a href="{{ url('/mobil') }}" class="text-black">Lebih Detail <i class="fas fa-angle-double-right"></i></a>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-car fa-3x text-black-500"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-m font-weight-bold text-primary text-uppercase mb-1">Pelanggan</div>
                      <div class="h1 mb-2 font-weight-bold text-gray-800">{{ $pelanggan }}</div>
                      <!-- <br> -->
                      <a href="{{ url('/pelanggan') }}" class="text-black">Lebih Detail <i class="fas fa-angle-double-right"></i></a>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-3x text-black-500"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-dark shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-m font-weight-bold text-primary text-uppercase mb-1">Karyawan</div>
                      <div class="h1 mb-2 font-weight-bold text-gray-800">{{ $karyawan }}</div>
                      <!-- <br> -->
                      <a href="{{ url('/karyawan') }}" class="text-black">Lebih Detail <i class="fas fa-angle-double-right"></i></a>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-user fa-3x text-black-500"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-m font-weight-bold text-primary text-uppercase mb-1">Laporan</div>
                      <div class="h1 mb-2 font-weight-bold text-gray-800">{{ $sewa }}</div>
                      <!-- <br> -->
                      <a href="{{ url('/laporan') }}" class="text-black">Lebih Detail <i class="fas fa-angle-double-right"></i></a>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard fa-3x text-black-500"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>


          </div>

        </div>
        <!-- /.container-fluid -->
@endsection    