<link href="{{ asset('/css/style.css') }}" rel="stylesheet">
<link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> 
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="jumbotron">
                <h1 class="display-4">Support Workers</h1>
                <hr class="my-4">
                <p>This is a place where support workers can connect, collaborate, and find important information.</p>
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
                    <form method="POST" action="{{ route('removeEntry') }}">
                        @csrf
                        <div class="form-group">
                            <label for="date">{{ __('Date') }}</label>
                            <input id="date" type="date" class="form-control @error('date') is-invalid @enderror" name="date" required>
                            @error('date')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="num_people">{{ __('Number of People') }}</label>
                            <input id="num_people" type="number" class="form-control @error('num_people') is-invalid @enderror" name="num_people" required>
                            @error('num_people')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="shift">{{ __('Shift') }}</label>
                            <!--<select id="shift" class="form-control @error('shift') is-invalid @enderror" name="shift" required>
                                <option value="morning">Morning Shift</option>
                                <option value="late">Late Shift</option>
                                <option value="night">Night Shift</option>
                                <option value="long">Long Day</option>
                            </select>!-->
                            <select class="form-control" id="shift" name="shift">
                            @foreach ($shiftOptions as $value => $text)
                            <option value="{{ $value }}">{{ $text }}</option>
                            @endforeach
                            </select>
                            @error('shift')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">
                            {{ __('Remove') }}
                        </button>
                        <div class="col-md-8 offset-md-2">
                        <a href="{{ route('viewResults') }}" class="btn btn-danger">View Results</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

