@extends('auth.layout')

@section('content')
    <div id="login" class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-sm-8 col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-header bg-success text-center">
                        <h3 class="card-center text-light">Login</h3>
                    </div>
                    <div class="card-body">

                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                @foreach($errors->all() as $error)
                                <p>{{ $error }}</p>
                                @endforeach

                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        
                        <form action="{{ url('login') }}" method="POST" class="d-flex flex-column mb-3">
                            @csrf
                            <label for="email" class="form-label">Email</label>
                            <input type="text" id="email" name="email" value="{{ old('email') }}" class="form-control mb-1">
                            
                            <label for="password" class="form-label">Password</label>
                            <input type="password" id="password" name="password" class="form-control mb-1">

                            <input type="submit" value="Login" class="mt-3 btn btn-success">
                        </form>
                        <a href="{{ url('register') }}">Register if you do not have an account</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
