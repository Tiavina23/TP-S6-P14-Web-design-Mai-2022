
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>IA</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <link href="{{ secure_asset('assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <!-- Favicons -->
  <link href="{{ secure_asset('assets/img/logo.png')}}" rel="icon">
  <link href="{{ secure_asset('assets/img/logo.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ secure_asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{ secure_asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{ secure_asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{ secure_asset('assets/vendor/quill/quill.snow.css')}}" rel="stylesheet">
  <link href="{{ secure_asset('assets/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
  <link href="{{ secure_asset('assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{ secure_asset('assets/vendor/simple-datatables/style.css')}}" rel="stylesheet">

  <link href="{{ secure_asset('assets/css/style.css')}}" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">




  </header>


  <main id="main" class="main">
    <section class="section dashboard">

        <div class="row justify-content-center">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="card recent-sales overflow-auto">

                        <div class="card-body">
                          <h5 class="card-title"><span>LOGIN</span></h5>



                      <form action="{{ url('logintraitement') }}" method="POST">
                        @csrf
                        <div class="row mb-3">
                          <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                          <div class="col-sm-10">
                            <input type="email" class="form-control" name="email" value="ravaka@gmail.com">
                          </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Mot de pass</label>
                            <div class="col-sm-10">
                              <input type="password" class="form-control" name="mdp" value="ravaka123">
                            </div>
                          </div>

                        <div class="row mb-3">

                          <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">se connecter</button>
                          </div>
                        </div>

                      </form>

                        </div>
                    </div>
                </div>
                <div class="col-md-3"></div>



          </div>




      </section>
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>Intelligence_Artificiele</span></strong>.
    </div>

  </footer><!-- End Footer -->





</body>

</html>
