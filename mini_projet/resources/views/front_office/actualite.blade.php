<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta name="description" content="Découvrez les dernières actualités et tendances de l'intelligence artificielle . Restez informé des derniers développements en matière d'IA dans différents domaines.">
  <meta property="og:title" content="Actualités de l'intelligence artificielle">
  <meta property="og:description" content="Découvrez les dernières actualités et tendances de l'intelligence artificielle . Restez informé des derniers développements d'IA dans différents domaines.">
  <meta property="og:image" content="https://exemple.com/images/ia.jpg">
  <meta name="keywords" content="Intelligence artificielle, IA, actualités, tendances, santé, industrie, commerce ,evolution">

  <title>Actualités de l'intelligence artificielle </title>


  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{secure_asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">


  <!-- Template Main CSS File -->
  <link href="{{secure_asset('assets/css/style.css')}}" rel="stylesheet">


</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
    
       
       <span class="d-none d-lg-block">INTELLIGENCE .ARTICIELLE</span>
    
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="get" action="{{url('search')}}">
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
                    <a href="{{ route('domaine',['id_domaine'=>md5($tab->id_domaine)])}}"><li class="nav-item"><strong>{{$tab->libelle}}</strong></li></a>
                    <br>
                @endforeach

              </ul>
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <ul class="sidebar-nav" id="sidebar-nav">
                    @foreach ($data2 as $tab)
                        <br>
                        <a href="{{ route('secteur',['id_secteur'=>md5($tab->id_secteur)])}}"><li class="nav-item"><strong>{{$tab->libelle}}</strong></li></a>
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
          <li class="breadcrumb-item">Acctualite</li>
          <li class="breadcrumb-item">Secteur</li>
          <li class="breadcrumb-item">Domaine</li>

        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">

        @foreach ($data as $tab)
        <div class="col-lg-6">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">ACTU</h5>

              <!-- Slides with controls -->
              <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">



                  <div class="carousel-item active">
                    <img src="/uploads/base64,{{$tab->image}}" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="/uploads/base64,{{$tab->image}}" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="/uploads/base64,{{$tab->image}}" class="d-block w-100" alt="...">
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
                <a href="{{ route('voir',['id_contenu'=>md5($tab->id_contenu)])}}"> <h5><strong>Titre : {{ $tab->titre}}</strong></h5></a>
                <p> le {{ $tab->date_sortie }}</p>
                <h5> Domaine : {{  $tab->domaine }}</h5>
                <h5> Secteur : {{  $tab->secteur }}</h5>

              </div>

            </div>
          </div>


        </div>
        @endforeach
      </div>
      <div class="row mb-12">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
               <li>{{ $data->links() }}</li>
            </ul>

    </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>Intelligence_Artificiele</span></strong>.
    </div>

  </footer><!-- End Footer -->
    



 <script src="{{ secure_asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{secure_asset('assets/js/main.js')}}"></script>

</body>

</html>
