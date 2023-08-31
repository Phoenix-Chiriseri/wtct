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

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
<!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/material-icons@3.0.1/iconfont/material-icons.min.css">
    <link href="{{ asset('/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/boxicons/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/remixicon/.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>
<style>
#temperature{

  color:red;
}
.temperature{

  color:navy;
}
#sunIcon{

 color:maroon;
}
</style>
<body>
<script>
    new WOW().init();
</script>
<script>
$(document).ready(function(){
    const apiKey = "a2755480e2c07f45b35fe4669c73ec53";
    const apiUrl = `http://api.openweathermap.org/data/2.5/weather?lat=51.5074&lon=-0.1278&units=metric&appid=${apiKey}`;
    // Show the spinner while the data is being fetched
    $(".spinner").show();
    // Make an AJAX call to the server and get the weather from the OpenWeatherMap API for a UK location in metric units
    $.ajax({
        url: apiUrl,
        type: "GET"
    }).done(function(response){
        const ukTemperature = response.main.temp;
        // Hide the spinner after data is fetched
        $(".spinner").hide();
        //Display the data in the weather card using ES6 template literals
        const weatherCard = `
            <div class="weather-card">
                <div class="temperature"><i class="bi bi-thermometer-sun" id = "sunIcon"></i></span> Temperature ${ukTemperature}°C</div>
            </div>
        `;
        // Append the card to the weather container in your HTML
        $("#weatherContainer").append(weatherCard);
    });
});
 </script>
  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block wow fadeIn">We Choose To Care</span>
      </a>

      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->
    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">
        <li class="nav-item dropdown">
        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="{{ asset('/img/logo.png') }}" alt="Profile" class="rounded-circle">
          </a><!-- End Profile Iamge Icon -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="index.html">
          <i class="bi bi-grid"></i>
          <span>Navigate</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="/viewClientSupportWorkers">
          <i class="bi bi-person-plus"></i><span>Support Workers</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
      </li><!-- End Components Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="/viewClientHealthCareWorkers">
          <i class="bi bi-person-plus"></i><span>Health Care Workers</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
      </li><!-- End Components Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="/viewClientRegisteredNurses">
          <i class="bi bi-person-plus"></i><span>Registered Nurses</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
      </li><!-- End Components Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="/showClientMentalHealthWorkers">
          <i class="bi bi-person-plus"></i><span>Mental Health Care Workers</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
      </li><!-- End Components Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="/viewClientMidwives">
          <i class="bi bi-person-plus"></i><span>Midwives</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
      </li><!-- End Components Nav -->
    </ul>

  </aside><!-- End Sidebar-->
  <div class="pagetitle">
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/"></a></li>
        <li class="breadcrumb-item active">Navigate</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <main id="main" class="main">
    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">
          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
              <img src="{{ asset('img/logo.png') }}" alt="Profile" class="img-thumbnail animate__animated animate__slideInUp">
              <h2>We Choose To Care</h2>
              <hr>
              <h6><i class="bi bi-calendar-plus-fill"></i> Date {{$currentDate}}</h6>
              <div class="row">
                <div class="spinner">
                  <i class="fa fa-spinner fa-spin"></i>
              </div>
                <div id = "weatherContainer" class = "wow fadeIn" data-wow-duration="2s"></div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                </li>
              </ul>
              <div class="tab-content pt-2">
                  <canvas id="healthcareChart"></canvas>
                  <script>
                      // Processed data from your PHP code
                      var supportWorkers = <?php echo $supportWorkers; ?>;
                      var healthCareAssistants = <?php echo $healthCareAssistants; ?>;
                      var mentalHealthCareAssistants = <?php echo $mentalHealthCareAssistants; ?>;
                      var midwives = <?php echo $midwives; ?>;
                      var rgns = <?php echo $rgns; ?>;

                      // Chart.js code for a pie chart
                      var ctx = document.getElementById('healthcareChart').getContext('2d');
                      var healthcareChart = new Chart(ctx, {
                          type: 'bar',
                          data: {
                              labels: ['Support Workers', 'Healthcare Assistants', 'Mental Health Assistants', 'Midwives', 'RGNs'],
                              datasets: [{
                                  data: [supportWorkers, healthCareAssistants, mentalHealthCareAssistants, midwives, rgns],
                                  backgroundColor: [
                                      'rgba(255, 99, 132, 0.5)',
                                      'rgba(54, 162, 235, 0.5)',
                                      'rgba(255, 206, 86, 0.5)',
                                      'rgba(75, 192, 192, 0.5)',
                                      'rgba(153, 102, 255, 0.5)'
                                  ],
                                  borderColor: [
                                      'rgba(255, 99, 132, 1)',
                                      'rgba(54, 162, 235, 1)',
                                      'rgba(255, 206, 86, 1)',
                                      'rgba(75, 192, 192, 1)',
                                      'rgba(153, 102, 255, 1)'
                                  ],
                                  borderWidth: 1
                              }]
                          }
                      });
                  </script>

                <!--<div class="tab-pane fade show active profile-overview" id="profile-overview">
                  <h5 class="card-title">About</h5>
                  <p class="small fst-italic animate__animated animate__slideInUp" data-wow-duration="2s">
                  WECHOOSETOCARE Ltd is a recruitment agency that offers highly personalised recruitment solutions to the healthcare industry.
                n  Our recruitment solutions can either be on a permanent or temporary basis industry. Our recruitment solutions can either be on a permanent or temporary basis</p>

                  <h5 class="card-title">Details</h5>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label animate__animated animate__slideInLeft" data-wow-duration="3s">Address</div>
                    <div class="col-lg-9 col-md-8 animate__animated animate__slideInRight" data-wow-duration="3s">5 Codrington Gardens, Gravesend, England, DA12 508</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label animate__animated animate__slideInLeft">Phone</div>
                    <div class="col-lg-9 col-md-8 animate__animated animate__slideInRight">0754 314 8624</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label animate__animated animate__slideInLeft">Email</div>
                    <div class="col-lg-9 col-md-8 animate__animated animate__slideInRight">info@wctc.care</div>
                  </div>

                   !-->
                </div>

                  </form><!-- End Profile Edit Form -->

                </div>

                <div class="tab-pane fade pt-3" id="profile-settings">

                  <!-- Settings Form -->
                  <form>

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Email Notifications</label>
                      <div class="col-md-8 col-lg-9">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="changesMade" checked>
                          <label class="form-check-label" for="changesMade">
                            Changes made to your account
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="newProducts" checked>
                          <label class="form-check-label" for="newProducts">
                            Information on new products and services
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="proOffers">
                          <label class="form-check-label" for="proOffers">
                            Marketing and promo offers
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="securityNotify" checked disabled>
                          <label class="form-check-label" for="securityNotify">
                            Security alerts
                          </label>
                        </div>
                      </div>
                    </div>

                  </form><!-- End settings Form -->
                </div>
                <div class="tab-pane fade pt-3" id="profile-change-password">
                  <!-- Change Password Form -->
                  <form>

                    <div class="row mb-3">
                      <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="password" type="password" class="form-control" id="currentPassword">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="newpassword" type="password" class="form-control" id="newPassword">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="renewpassword" type="password" class="form-control" id="renewPassword">
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Change Password</button>
                    </div>
                  </form><!-- End Change Password Form -->

                </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer" style="margin-top: 200px;">
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      <!--Developed by <a href="https://bootstrapmade.com/">Itai Neil Chiriseri</a>!-->
      <a href = "https://www.b-e.digital/" target="_blank">Powered by Brand Evangelicals</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

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
  <script src="assets/js/main.js"></script>

</body>

</html>
