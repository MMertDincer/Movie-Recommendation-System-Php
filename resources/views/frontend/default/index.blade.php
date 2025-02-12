@extends('frontend.layout')
@section('content')

    <h1 style="display: none">{{$title}}</h1>
<header>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">

        <div class="carousel-inner" role="listbox">
            @php($count=0)
            @foreach($data['slider'] as $slider)
            <div class="carousel-item @if($count++==0) active @endif" style="background-image: url('/images/sliders/{{$slider->slider_file}}')">
                <div class="carousel-caption d-none d-md-block">
                    @if (strlen($slider->slider_url)>0)
                    <a href="{{$slider->slider_url}}">
                        <h3>{{$slider->slider_title}}</h3>
                    </a>
                    @else <h3>{{$slider->slider_title}}</h3> @endif

                    <p>{{$slider->slider_description}}</p>
                </div>
            </div>
            @endforeach

        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</header>

<!-- Page Content -->
<div class="container">

    <h1 class="my-4">Movies</h1>

    <div class="row">

        @foreach($data['movie'] as $movie)
        <div class="col-lg-4 col-sm-6 portfolio-item">
            <div class="card h-100">
                <a href="{{route('movies.Detail',$movie->movie_slug)}}"><img class="card-img-top" src="{{'https://image.tmdb.org/t/p/w500'.$movie->movie_cover_link}}" alt=""></a>
                <div class="card-body">
                    <h4 class="card-title">
                        <a href="{{route('movies.Detail',$movie->movie_slug)}}">{{$movie->movie_title}}</a>
                    </h4>
                    <p class="card-text">{!! substr($movie->movie_content,0,140) !!}</p>
                </div>
            </div>
        </div>
        @endforeach

    </div>
    <!-- /.row -->

    <!-- Features Section -->
    <div class="row">
        <div class="col-lg-6">
            <h2>{{$home_title}}</h2>
            {!! $home_detail !!}
        </div>
        <div class="col-lg-6">
            <img class="img-fluid rounded" width="450" src="/images/settings/{{$home_image}}" alt="">
        </div>
    </div>
    <!-- /.row -->

    <hr>

    <!-- Call to Action Section -->
    <div class="row mb-4">
        <div class="col-md-8">
            <p>{{$slogan}}</p>
        </div>
        <div class="col-md-4">
            <a class="btn btn-lg btn-secondary btn-block" href="{{route('contact.Detail')}}">Contact us</a>
        </div>
    </div>

</div>
<!-- /.container -->
@endsection
@section('css') @endsection
@section('js') @endsection

