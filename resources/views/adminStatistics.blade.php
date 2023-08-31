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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.4.1/jspdf.debug.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- =======================================================
    * Template Name: NiceAdmin
    * Updated: Jul 27 2023 with Bootstrap v5.3.1
    * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
</head>
<body>
<script>
    function generatePDF() {
        var doc = new jsPDF();
        // HTML content to be converted
        var htmlContent = document.getElementById('pdf-content').innerHTML;
        doc.text('Daily Statistics Report', 10, 10); // Title
        doc.fromHTML(htmlContent, 10, 20, {
            width: 190
        });
        // Save the PDF
        doc.save('DailyReport.pdf');
    }
</script>
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
                </a><!-- End Profile Iamge Icon -->
            </li><!-- End Profile Nav -->

        </ul>
    </nav><!-- End Icons Navigation -->

</header><!-- End Header -->

<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="/home">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
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
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="/getMidwives">
                <i class="bi bi-person-plus"></i><span>Midwives</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="/getStatistics">
                <i class="bi bi-person-plus"></i><span>Todays Statistics</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
        </li>
    </ul>
</aside>
<main id="main" class="main">
    <div class="pagetitle">
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/home">Home</a></l>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-tcitle">Stats For Today</h5>
                        <!-- Line Chart -->
                        <canvas id="healthcareChart"></canvas>
                        <script>
                            // Processed data from your PHP code
                            var supportWorkers = <?php echo $supportWorkers; ?>;
                            var healthCareAssistants = <?php echo $healthCareAssistants; ?>;
                            var mentalHealthCareAssistants = <?php echo $mentalHealthCareAssistants; ?>;
                            var midwives = <?php echo $midwives; ?>;
                            var rgns = <?php echo $rgns; ?>;

                            // Chart.js code focr a pie chart
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
                        <!-- End Line CHart -->

                    </div>
                </div>
            </div>
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
        Developed By <a href="https//www.b-e.digital.com">B-E Digital</a>
    </div>
</footer><!-- End Footer -->
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
<!-- Vendor JS Files -->
<!-- Vendor JS Files -->
<!-- Template Main JS File -->
</body>
</html>
