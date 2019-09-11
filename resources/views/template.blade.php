<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
	<title>Rental Mobil</title>
	<link rel="stylesheet" href="{{ url('asset/css/bootstrap.min.css') }}" />
	<link rel="icon" href="{{ url('asset/mobil.png') }}" />
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- Custom fonts for this template-->
  <link href="{{ url('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{ url('css/sb-admin-2.min.css') }}" rel="stylesheet">
</head>

<body id="page-top" class="sidebar-toggled">
    <!-- Page Wrapper -->
  <div id="wrapper" >

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
        <div >
            <a class="sidebar-brand d-flex align-items-center justify-content-center text-white">
        <div class="sidebar-brand-icon">
          <i class="fas fa-car"></i>
        </div>
        <div class="sidebar-brand-text mx-2">Rental Mobil</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/dashboard') }}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Utama
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('/mobil') }}">
          <i class="fas fa-fw fa-car"></i>
          <span>Mobil</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('/pelanggan') }}">
          <i class="fas fa-fw fa-users"></i>
          <span>Pelanggan</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('/karyawan') }}">
          <i class="fas fa-fw fa-user"></i>
          <span>Karyawan</span>
        </a>
      </li>

      <hr class="sidebar-divider">

      <div class="sidebar-heading">
        Fitur
      </div>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('/rent') }}">
          <i class="fas fa-fw fa-truck-moving"></i>
          <span>Pinjam</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('/laporan') }}">
          <i class="fas fa-fw fa-clipboard"></i>
          <span>Laporan</span>
        </a>
      </li>



      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->

      

        </div>
      <!-- Sidebar - Brand -->
      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>
      
    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                  {{ Session::get('karyawan')->nama }}
                </span>
                <i class="fas fa-user" style="font-size: 20px; margin-left: 10px;"></i>
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="{{ url('/logout') }}">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

            <div class="container">
        @yield("content")
    </div>
      </div>
      <!-- End of Main Content -->

    <script src="{{ url('vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ url('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{ url('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{ url('js/sb-admin-2.min.js') }}"></script>

  <!-- Page level plugins -->
  <script src="{{ url('vendor/chart.js/Chart.min.js') }}"></script>

  <!-- Page level custom scripts -->
  <script src="{{ url('js/demo/chart-area-demo.js') }}"></script>
  <script src="{{ url('js/demo/chart-pie-demo.js') }}"></script>

</body>
</html>