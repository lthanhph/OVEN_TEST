<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Todo App</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ url('app/style.css') }}">
</head>
<body>
    <div id="main-container">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-9">
                    <div class="card">
                        <div class="card-header bg-success text-success d-flex justify-content-between">
                            <h3 class="text-light">Todo App</h3>
                            <div class="d-flex align-items-center">
                                <p class="text-light mb-0 me-2">Hello <span class="text-capitalize">{{ Auth::user()->name }}</span>,</p>
                                <form action="{{ url('logout') }}" method="post">
                                    @csrf
                                    <input type="submit" value="Logout" class="btn btn-dark">
                                </form>
                            </div>
                        </div>
                        <div class="card-body">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>