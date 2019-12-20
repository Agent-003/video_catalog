<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.6">
    <title>Which movie to watch?</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/all.css') }}">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>
<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="{{route('main')}}">Which movie to watch? <i class="fas fa-video"></i></a>

    <form class="form-inline col-sm-9 col-md-10" action="{{route('search')}}" method="post">
        @csrf
        <div class="form-group ">
            <input type="text" name="word" placeholder="Search" class="form-control form-control-dark w-100  mr-1">
        </div>
        <button type="submit" class="btn btn-light" >Search <i class="fas fa-search"></i></button>
    </form>
</nav>
<div class="container-fluid">
    <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
            <div class="sidebar-sticky">
{{--                <ul class="nav flex-column">--}}
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link active" href="#">--}}
{{--                            <span data-feather="home"></span> 1--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link" href="#"> <span data-feather="file"></span> Orders </a>--}}
{{--                    </li>--}}
{{--                </ul>--}}

{{--                <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">--}}
{{--                    <span>Saved reports</span>--}}
{{--                    <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">--}}
{{--                        <span data-feather="plus-circle"></span>--}}
{{--                    </a>--}}
{{--                </h6>--}}
{{--                <ul class="nav flex-column mb-2">--}}
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link" href="#">--}}
{{--                            <span data-feather="file-text"></span>--}}
{{--                            Current month--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
            </div>
        </nav>
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            @yield('content')
        </main>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
