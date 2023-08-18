<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>We Choose To Care</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <link rel="dns-prefetch" href="//fonts.bunny.net">
  <link href="{{ asset('/css/style.css') }}" rel="stylesheet">
  <link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('/css/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('/css/boxicons/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('/css/quill/quill.snow.css') }}" rel="stylesheet">
  <link href="{{ asset('/css/quill/quill.bubble.css') }}" rel="stylesheet">
  <link href="{{ asset('/css/remixicon/.css') }}" rel="stylesheet">
  <link href="{{ asset('/css/style.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Jul 27 2023 with Bootstrap v5.3.1
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>
<body>
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">We Choose To Care</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
     
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
        
        </li><!-- End Search Icon-->

        <li class="nav-item dropdown">
        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="{{ asset('/img/logo.png') }}" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2"></span>
          </a><!-- End Profile Iamge Icon -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <aside id="sidebar" class="sidebar">
    
    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="index.html">
          <i class="bi bi-grid"></i>
          <span>Choose Option</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="/getSupportWorkers">
          <i class="bi bi-person-plus"></i><span>Support Workers</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
      </li><!-- End Components Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="/getHealthCareWorkers">
          <i class="bi bi-person-plus"></i><span>Health Care Workers</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
      </li><!-- End Components Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="/getRGN">
          <i class="bi bi-person-plus"></i><span>Registered Nurses</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
      </li><!-- End Components Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="/getMentalHealthCareWorkers">
          <i class="bi bi-person-plus"></i><span>Mental Health Care Workers</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
      </li><!-- End Components Nav -->
    </ul>
  </aside>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
      <hr>
      <a class="btn btn-info" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class = "fa fa-exit"></i>
                                        {{ __('Logout') }}
                                    </a>
      <form id="logout-form" action="/logout" method="POST" class="d-none">
          @csrf
        </form></span>
      </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
      <div class="row">
        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">
            <!-- Sales Card -->
            <div class="col-xxl-12 col-md-6">
              <div class="card info-card sales-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Welcome <span>| {{$name}}</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                     <img src = "{{ asset('/img/logo.png') }}" class = "img-fluid"> 
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->
            <!-- Revenue Card -->
            <!-- Customers Card -->
            <!-- Recent Sales -->
            <div class="col-12">
              <div class="card recent-sales overflow-auto">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Statistics <span>| Today</span></h5>
                  <table class="table table-striped table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>Category</th>
                <th>Total People</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Support Workers</td>
                <td>{{ $supportWorkers }}</td>
            </tr>
            <tr>
                <td>Health Care Assistants</td>
                <td>{{ $healthCareAssistants }}</td>
            </tr>
            <tr>
                <td>Mental Health Care Assistants</td>
                <td>{{ $mentalHealthCareAssistants }}</td>
            </tr>
            <tr>
                <td>RGNs</td>
                <td>{{ $rgns }}</td>
            </tr>
        </tbody>
    </table>

                  
@section('content')
<div class="container">
    <h2>Results for Today</h2>

    
</div>
@endsection

                </div>

              </div>
            </div><!-- End Recent Sales -->
          </div>
        </div><!-- End Left side columns -->

          <!-- Website Traffic -->
          <div class="card">
            <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Filter</h6>
                </li>

              
              </ul>
            </div>
        </div><!-- End Right side columns -->

      </div>
    </section>

  </main><!-- End #main -->

    <!-- Vendor JS Files -->
    <script src="{{ asset('/js/main.js') }}"></script>
    <script src="{{ asset('/js/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('/js/vendor/chart.js/chart.umd.js')}}"></script>
    <script src="{{ asset('/js/vendor/echarts/chart.umd.js')}}"></script>
    <script src="{{ asset('/js/vendor/quill/quill.min.js')}}"></script>
    <script src="{{ asset('/js/vendor/simple-datatables/simple-datatables.js')}}"></script>
    <script src="{{ asset('/js/vendor/tinymce/tinymce.min.js')}}"></script>
    <script src="{{ asset('/js/vendor/php-email-form/validate.js')}}"></script>
    <!-- Template Main JS File -->
  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>B-E Digital</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      Developed By <a href="https://bootstrapmade.com/">Itai Neil Chiriseri</a>
    </div>
  </footer><!-- End Footer -->
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <!-- Vendor JS Files -->
  <!-- Vendor JS Files -->
  <!-- Template Main JS File -->
</body>
</html>
