<link href="{{ asset('/css/style.css') }}" rel="stylesheet">
<link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="container" style="margin-top: 10px;">
<section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Delete Health Care Workers</h5>
             
            </div>
          </div>
        </div>
      </div>
    </section>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header texty-center"></div>
                <div class="card-body">
                @if(Session::has('success'))
                <script type="text/javascript">
                function massge() {
                Swal.fire(
                'Success',
                'Support Worker Added Successfully'
                    );
                    }
                    window.onload = massge;
                    </script>
                    @endif
                    <form method="POST" action="{{ route('deleteMentalHealthAction') }}">
                        @csrf
                        <div class="form-group">
                            <label for="date">{{ __('From Date') }}</label>
                            <input id="date" type="date" class="form-control @error('date') is-invalid @enderror" name="from_date" required>
                            @error('date')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <hr>
                        <div class="form-group">
                            <label for="date">{{ __('To Date') }}</label>
                            <input id="date" type="date" class="form-control @error('date') is-invalid @enderror" name="to_date" required>
                            @error('date')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <hr>
                        <button type="submit" class="btn btn-secondary">
                            <i class="fa-regular fa-user"></i>{{ __('Delete Records ') }}</button>
                    </form>
                    <br>
                    </button>
                    <a href="/home" class="btn btn-danger">Home</a>
            </div>
        </div>
    </div>
</div>

