<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>INTELLIGENCE_ARTIFICIELLE</title>


  <!-- Favicons -->
  <link href="{{secure_asset('assets/img/logo.png')}}" rel="icon">
  <link href="{{secure_asset('assets/img/logo.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ secure_asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{secure_asset('assets/vendor/simple-datatables/style.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{secure_asset('assets/css/style.css')}}" rel="stylesheet">


</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">INTEL_ARTIF</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="{{url('search')}}">
        @csrf
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->


  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">
    <div class="card">
        <div class="card-body">
          <h5 class="card-title"></h5>

          <!-- Default Tabs -->
          <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
              <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Domaine</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Secteur</button>
            </li>

          </ul>
          <div class="tab-content pt-2" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

              <ul class="sidebar-nav" id="sidebar-nav">
                @foreach ($data1 as $tab)
                    <br>
                    <a href="{{ route('domaine',['id_domaine'=>md5($tab->id_domaine)])}}"><li class="nav-item">{{$tab->libelle}}</li></a>
                    <br>
                @endforeach

              </ul>
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <ul class="sidebar-nav" id="sidebar-nav">
                    @foreach ($data2 as $tab)
                        <br>
                        <a href="{{ route('secteur',['id_secteur'=>md5($tab->id_secteur)])}}"><li class="nav-item">{{$tab->libelle}}</li></a>
                        <br>
                    @endforeach

                  </ul>
            </div>

          </div><!-- End Default Tabs -->

        </div>
      </div>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>| INTELLIGENCE ARTIFICIELLE</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Acctualite</a></li>
          <li class="breadcrumb-item">Secteur</li>
          <li class="breadcrumb-item">Domaine</li>

        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">


        <div class="col-lg-8">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">ACTU</h5>

              <!-- Slides with controls -->
              <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">

                <div class="carousel-inner">


                    <div class="carousel-item active">
                        <img src="data:image/{{ $data['extension'] }};base64,{{ $data['image'] }}" class="d-block w-100" alt="..."  >
                      </div>

                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                  </button>
                  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                  </button>



              </div><!-- End Slides with controls -->
              <div>
                <br>
                <br>
              </div>
              <div class="row mb-12">
                <label>  <h2><strong>Titre</strong> {{$data['titre']}}</h2></label>

                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label"> <strong>Domaine </strong> {{$data['domaine']}}</label>

                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label"> <strong>Illutrateur </strong> {{$data['illustrateur']}}</label>

                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label"> <strong>Secteur </strong> {{$data['secteur']}}</label>

                </div>
                <div class="row mb-12">
                    <label class="col-sm-2 col-form-label"> <strong>Date de sortie </strong> {{$data['date_sortie']}}</label>

                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label"> <strong>Secteur </strong> {{$data['secteur']}}</label>

                </div>
                <div class="row mb-12">
                    <label> <strong>description </strong> {!!$data['description']!!}</label>

                </div>
            </div>
          </div>


        </div>
        <div class="col-lg-4">

            <!-- Recent Activity -->
            <div class="card">
              <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                  <li class="dropdown-header text-start">
                    <h6>Filter</h6>
                  </li>

                  <li><a class="dropdown-item" href="{{url('genere_contenu')}}">gerer le contenu</a></li>
                  <li><a class="dropdown-item" href="{{url('ajout')}}">ajouter de contenu</a></li>

                </ul>
              </div>
              @if(!empty($images))
              @foreach ($images as $t)
              <div class="card-body">
                <h5 class="card-title">I A <span>| Today</span></h5>

                <div class="activity">


                    <img class="card-body p-0" src="/uploads/{{$t->image}}" alt="..." style="width: 400px;height: 300px;">


                </div>

              </div>
              @endforeach
                 @else
              @for($i = 0; $i < 3; $i++)
              <div class="card-body">
                <h5 class="card-title">I A <span>| Today</span></h5>
              <div class="activity">
                <img class="card-body p-0" src="/uploads/1.jpg}}" alt="..." style="width: 400px;height: 300px;">
                </div>
            </div>
            @endfor
              @endif
            </div><!-- End Recent Activity -->
            <!-- Recent Activity -->





          </div><!-- End Right side columns -->
      </div>

    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>Intelligence_Artificiele</span></strong>.
    </div>

  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <script src="{{ secure_asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{secure_asset('assets/js/main.js')}}"></script>


</body>

</html>
