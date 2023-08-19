<link href="{{ asset('/css/style.css') }}" rel="stylesheet">
<link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> 
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="jumbotron">
                <h1 class="display-4">Add New Position</h1>
                <hr class="my-4">
            </div>
        </div>
    </div>
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
                    <form method="POST" action="{{ route('postNewPosition') }}">
                        @csrf
                        <div class="form-group">
                            <label for="date">{{ __('Position') }}</label>
                            <input id="" type="text" class="form-control @error('date') is-invalid @enderror" name="position" required>
                            @error('date')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <hr>
                        <button type="submit" class="btn btn-primary">
                            {{ __('Add Or Remove') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

