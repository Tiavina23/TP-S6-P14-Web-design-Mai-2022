<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>ajout_info</title>
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
  <script src="{{ secure_asset('ckeditor/ckeditor.js') }}"></script>
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
        <a href="" class="logo d-flex align-items-center">
          <img src="assets/img/logo.png" alt="">
          <span class="d-none d-lg-block">INTELLIGENCE .ARTICIELLE</span>
        </a>

      </div>




  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">


    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <script>
    function modif($id,$illustrateur,$titre){

        document.getElementById('id').value=$id;
        document.getElementById('titre').value=$titre;
        document.getElementById('ill').value=$illustrateur;


    }
    </script>
    <section class="section dashboard">
      <div class="row">


          <div class="row">

            <!-- Recent Sales -->
            <div class="col-12">
              <div class="card recent-sales overflow-auto">
 <div class="col-12">

                <div class="search-bar">
                    <form class="search-form d-flex align-items-center" action="{{url('recherche')}}" method="POST" >
                        @csrf
                      <input type="text" name="query" placeholder="">
                      <button type="submit" title="Search"><i class="bi bi-search"></i></button>
                    </form>

                </div>

              <table class="table datatable">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Titre</th>
                            <th scope="col">Date de sortie</th>
                            <th scope="col">Domaine</th>
                            <th scope="col">Secteur</th>
                            <th scope="col">Illustrateur</th>
                        </tr>
                        </thead>
                <tbody>

                    @foreach ($data as $tab)
                    <tr>
                        <th scope="row">{{ $tab->id_contenu }}</th>
                        <td>{{ $tab->titre }}</td>
                        <td>{{ $tab->date_sortie}}</td>
                        <td>{{ $tab->domaine }}</td>
                        <td>{{ $tab->secteur }}</td>
                        <td>{{ $tab->illustrateur }}</td>
                        <td><button type="submit" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#basicModal" id="modif" onclick="modif('{{ $tab->id_contenu }}','{{ $tab->illustrateur }}','{{ $tab->titre}}')">Modifier</button></td>
                        <td><a href="{{ route('delete',['id_contenu'=>md5($tab->id_contenu)]) }}"><button type="submit" class="btn btn-dark">Supprimer</button></a></td>
                      </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $data->links() }}
        </div>
                <div class="modal fade" id="basicModal" tabindex="-1">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <form action="{{ url('update') }}" method="POST">
                             @csrf
                             <div class="col-sm-10">
                                <input type="hidden" class="form-control" name="id" id="id">
                              </div>
                             <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Titre</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="titre" id="titre">
                                </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Date de sortie</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" name="titre" id="date" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Illustrateur</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="illustrateur" id="ill">
                                    </div>
                                    </div>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Image</label>
                                    <div class="col-sm-10">
                                        <input type="file" class="form-control" name="image" id="image">
                                    </div>
                                    </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label"> Domaine</label>
                                    <div class="col-sm-10">
                                    <select class="form-select" aria-label="Default select example" name="domaine" required>
                                        <option selected></option>
                                        @foreach ( $data1 as $tab )
                                        <option value={{ $tab->id_domaine}}>{{ $tab->libelle}}</option>
                                        @endforeach


                                    </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label"> Secteur</label>
                                    <div class="col-sm-10">
                                    <select class="form-select" aria-label="Default select example" name="secteur">
                                        <option selected></option>
                                        @foreach ( $data2 as $tab )
                                        <option value={{ $tab->id_secteur}}>{{ $tab->libelle}}</option>
                                        @endforeach


                                    </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label"> Description</label>
                                    <div class="col-sm-10">
                                        <textarea name="desc" id="editor" cols="30" rows="10"></textarea>
                                        <script>
                                            CKEDITOR.replace( 'editor', {

                                                filebrowserUploadMethod: 'form'
                                            } );
                                        </script>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" >annuler</button>
                                    <button type="submit" class="btn btn-primary">sauver</button>
                                </div>
                            </form>

                        </div>

                      </div>
                    </div>
                  </div>


                </div>
            </div>


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

  <!-- Vendor JS Files -->
  <script src="{{ secure_asset('assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
  <script src="{{ secure_asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{ secure_asset('assets/vendor/chart.js/chart.umd.js')}}"></script>
  <script src="{{ secure_asset('assets/vendor/echarts/echarts.min.js')}}"></script>
  <script src="{{ secure_asset('assets/vendor/quill/quill.min.js')}}"></script>
  <script src="{{ secure_asset('assets/vendor/simple-datatables/simple-datatables.js')}}"></script>
  <script src="{{ secure_asset('assets/vendor/tinymce/tinymce.min.js')}}"></script>
  <script src="{{ secure_asset('assets/vendor/php-email-form/validate.js')}}"></script>
  <!-- Template Main JS File -->
  <script src="{{ secure_asset('assets/js/main.js')}}"></script>

</body>

</html>
