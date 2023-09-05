@extends('layouts.welcomelayout')
@section('content')
<div class="row mt-4">
  <div class="col-lg-12 mb-lg-0 mb-4">
    <div class="card">
      <div class="card-body p-3">
        <div class="row">
          <div class="col-lg-6 mb-lg-0 mb-4">
            <div class="d-flex flex-column h-100">
              <p class="mb-1 pt-2 text-bold"></p>
              <br><br>
              <h1 class="font-weight-bolder" style="margin-left: 5%">We Chose To Care</h1>
              <p class="mb-1 pt-2 text-bold" style="margin-left: 5%"> <strong>You are our priority - get the latest work updates from us.</strong> </p>
              <a class="text-dark font-weight-bold ps-1 mb-0 icon-move-left mt-auto" href="javascript:;">
                
              </a>
            </div>
          </div>
          <div class="col-lg-4 me-auto ms-0 text-center">
            <div class="bg-gradient-primary border-radius-lg min-height-200">
              <img src="../../img/shapes/waves-white.svg" class="position-absolute h-100 top-0 d-md-block d-none" alt="waves">
              <div class="position-relative pt-5 pb-4">
                <img class="max-width-500 w-100 position-relative z-index-2" src="'../../img/logo.png" 
                style="height: 20%;width:20%; margin-left: 45%">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
 </div>

 <br><br>
    <section class="section profile">
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">CARE GIVERS</p>
                    <h5 class="font-weight-bolder">
                      10
                    </h5>
                    <p class="mb-0">
                      <span class="text-warning text-sm font-weight-bolder"> Available <br> positions</span>
                    </p>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-warning shadow-success text-center rounded-circle">
                    <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">DRIVERS</p>
                    <h5 class="font-weight-bolder">
                      25
                    </h5>
                    <p class="mb-0">
                      <span class="text-warning text-sm font-weight-bolder"> Available <br> positions</span>
                    </p>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-warning shadow-success text-center rounded-circle">
                    <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Nurses</p>
                    <h5 class="font-weight-bolder">
                      8
                    </h5>
                    <p class="mb-0">
                      <span class="text-warning text-sm font-weight-bolder"> Available <br> positions</span>
                    </p>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-warning shadow-success text-center rounded-circle">
                    <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Security Guards</p>
                    <h5 class="font-weight-bolder">
                      5 
                    </h5>
                    <p class="mb-0">
                      <span class="text-warning text-sm font-weight-bolder"> Available <br> positions</span>
                    </p>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-warning shadow-success text-center rounded-circle">
                    <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 mt-4">
          <div class="card">
            <div class="card-header pb-0 px-3">
              <h6 class="mb-0">Featured Jobs</h6>
            </div>
            <div class="card-body pt-4 p-3">
              <ul class="list-group">
                <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                  <div class="d-flex flex-column">
                   
                    <span class="mb-2 text-xs">Company Name: <span class="text-dark font-weight-bold ms-sm-2">BE - DIGITAL</span></span>
                    <span class="mb-2 text-xs">Postion: <span class="text-dark ms-sm-2 font-weight-bold">GRAPHICS DESIGNER</span></span>
                    <span class="text-xs">Shift: <span class="text-dark ms-sm-2 font-weight-bold">DAYTIME</span></span>
                  </div>
                  <div class="ms-auto text-end">
                    <a class="btn btn-link text-warning text-gradient px-3 mb-0" href="{{route('job_summary')}}"><i class="far fa-trash-alt me-2"></i>VIEW DETAILS</a>
                  
                  </div>
                </li>
                <li class="list-group-item border-0 d-flex p-4 mb-2 mt-3 bg-gray-100 border-radius-lg">
                  <div class="d-flex flex-column">
                   
                    <span class="mb-2 text-xs">Company Name: <span class="text-dark font-weight-bold ms-sm-2">Alpha Medical</span></span>
                    <span class="mb-2 text-xs">Postion: <span class="text-dark ms-sm-2 font-weight-bold">Nurses</span></span>
                    <span class="text-xs">Shift: <span class="text-dark ms-sm-2 font-weight-bold">DAYTIME</span></span>
                  </div>
                  <div class="ms-auto text-end">
                    <a class="btn btn-link text-warning text-gradient px-3 mb-0" href="javascript:;"><i class="far fa-trash-alt me-2"></i>VIEW DETAILS</a>
                  
                  </div>
                </li>
                <li class="list-group-item border-0 d-flex p-4 mb-2 mt-3 bg-gray-100 border-radius-lg">
                  <div class="d-flex flex-column">
                    <span class="mb-2 text-xs">Company: <span class="text-dark ms-sm-2 font-weight-bold">PRIVATE</span></span>
                    <span class="mb-2 text-xs">Postion: <span class="text-dark ms-sm-2 font-weight-bold">DRIVER</span></span>
                    <span class="text-xs">Shift: <span class="text-dark ms-sm-2 font-weight-bold">NIGHT</span></span>
                  </div>
                  <div class="ms-auto text-end">
                    <a class="btn btn-link text-warning text-gradient px-3 mb-0" href="javascript:;"><i class="far fa-trash-alt me-2"></i>VIEW DETAILS</a>
                  
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      
      </div>
      {{-- <div class="row">
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

// Filter out negative values
supportWorkers = Math.max(supportWorkers, 0);
healthCareAssistants = Math.max(healthCareAssistants, 0);
mentalHealthCareAssistants = Math.max(mentalHealthCareAssistants, 0);
midwives = Math.max(midwives, 0);
rgns = Math.max(rgns, 0);

// Blue color values
var blueColors = [
    'rgba(0, 0, 255, 0.5)',
    'rgba(0, 0, 255, 0.5)',
    'rgba(0, 0, 255, 0.5)',
    'rgba(0, 0, 255, 0.5)',
    'rgba(0, 0, 255, 0.5)'
];

// Chart.js code for a bar chart
var ctx = document.getElementById('healthcareChart').getContext('2d');
var healthcareChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Support Workers', 'Healthcare Assistants', 'Mental Health Assistants', 'Midwives', 'RGNs'],
        datasets: [{
            data: [supportWorkers, healthCareAssistants, mentalHealthCareAssistants, midwives, rgns],
            backgroundColor: blueColors, // Use blue color values
            borderColor: blueColors, // Use the same blue color for the border
            borderWidth: 1
        }]
    }
});

                  </script> --}}
                </div>
                </form>
                </div>
              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>
@endsection