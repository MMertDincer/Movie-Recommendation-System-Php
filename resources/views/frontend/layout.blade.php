<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="{{$description}}">
    <meta name="author" content="">

    <title>@yield('title')</title>

    <!-- Bootstrap core CSS -->
    <link href="/frontend/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/frontend/css/modern-business.css" rel="stylesheet">
    <link href="/frontend/css/custom.css" rel="stylesheet">

</head>

<body>

<!-- Navigation -->
<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{route('home.Index')}}">Movie Recommendation System</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('home.Index')}}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('movies.Index')}}">Movie</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('contact.Detail')}}">Contact Us</a>
                </li>
                <li>
                    <div class="form-group" style="margin: 8px;">
                        <input type="text" name="country_name" class="dropdown-toggle" id="country_name" class="form-control"
                               placeholder="Enter Movie Name" data-toggle="dropdown" aria-haspopup="true" class="dropdown-menu" aria-labelledby="country_name" class="dropdown-menu" aria-labelledby="country_name" autocomplete="off"/>
                        <div id="countryList">
                        </div>
                    </div>
                    {{ csrf_field() }}
                </li>
                @guest
                    <li class="nav-item">
                        <a class="nav-link btn btn-primary" style="color: white;" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{route('home')}}">
                                Profile
                            </a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest

            </ul>
        </div>
    </div>
</nav>


@yield('content')

<!-- Footer -->
<footer class="py-5 bg-dark footer">
    <div class="container">
        <p class="m-0 text-center text-white">{{$footer}}</p>
    </div>
    <!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->
<script src="/frontend/vendor/jquery/jquery.min.js"></script>
<script src="/frontend/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/js/custom.js"></script>

<script>
    $(document).ready(function () {

        $('#country_name').keyup(function () {
            var query = $(this).val();
            if (query != '') {
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: "{{ route('autocomplete.fetch') }}",
                    method: "POST",
                    data: {query: query, _token: _token},
                    success: function (data) {
                        $('#countryList').fadeIn();
                        $('#countryList').html(data);
                    }
                });
            }
        });

        $(document).on('click', 'li', function () {
            $('#country_name').val($(this).text());
            $('#countryList').fadeOut();
        });

    });
</script>

<script type="text/javascript">
    $(document).ready( function () {
        $(".form-control-range").on('change mousemove',function(){
            $("#formControlRangeValue").text($(".form-control-range").val())
        });
    });

</script>

</body>
</html>
