<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
  <title>Login Admin</title>
  <link rel="stylesheet" href="{{ url('asset/css/bootstrap.min.css') }}" />
  <link rel="icon" href="{{ url('asset/mobil.png') }}" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- Custom fonts for this template-->
  <link href="{{ url('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{ url('css/sb-admin-2.css') }}" rel="stylesheet">
  <!-- <link href="{{ url('css/sb-admin-2.min.css') }}" rel="stylesheet"> -->

</head>

<body class="bg-gradient-primary">


  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center" style="margin-bottom: 0px;">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg mb-4 mt-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <!-- <div class="col-lg-6 d-none d-lg-block bg-login-image"></div> -->
              <div class="col-lg-12">
                <div class="p-5">
                  <h1 class="sidebar-brand-text text-gray-900" style="text-transform: uppercase;" align="center">Rental Mobil Kevin</h1>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="card o-hidden border-0 shadow-lg my-2">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Login Admin</h1>
                  </div>
                  <form class="user" action="{{ url('check_login') }}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                      <input type="text" name="username" class="form-control form-control-user" id="username" aria-describedby="emailHelp" placeholder="Enter Username">
                    </div>
                    <div class="form-group">
                      <input type="password" name="password" class="form-control form-control-user" id="password" placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                      Login
                    </button>
                    <!-- <hr> -->
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="register.html">Create an Account!</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>





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
