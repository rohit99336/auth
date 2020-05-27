<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <script src="{{asset('js/app.js')}}"></script>
    <title>@yield('title')</title>
</head>
<body class='bg-secondary'>

    {{-- start --}}
    @if ($message = Session::get('success'))
        {{-- <div class="alert alert-danger">
            <p>{{ $message }}</p>
        </div> --}}
    @endif
    <!-- end -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">DashBoard</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        @if (!Session::get('success'))
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="logon">login</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="reg">registration</a>
                    </li>
                </ul>
            </div>
            @else
            <h5 style="float: right;">{{ Auth::user()->firstname }}</h5>
            <form action="logout" method="post" class="float-right">
                @csrf
                {{-- <input type="submit"  value="logout"> --}}
                <button type="submit" class="btn btn-info" style="float: right;">Logout</button>
            </form>

        @endif



      </nav>
    @section('body')


    @show
</body>
</html>
