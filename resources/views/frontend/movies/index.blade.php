@extends('frontend.layout')
@section('title',"Anasayfa Title")
@section('content')


    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <h1 class="mt-4 mb-3">Movies</h1>

        <div class="row">

            <!-- Movie Entries Column -->
            <div class="col-md-8">

                @foreach($data['movies'] as $movies)
                <div class="card mb-4">
                    <img class="card-img-top" src="{{'https://image.tmdb.org/t/p/w500'.$movies->movie_cover_link}}" alt="Card image cap">
                    <div class="card-body">
                        <h2 class="card-title">{{$movies->movie_title}}</h2>
                        <p class="card-text">{!! substr($movies->movie_content,0,140) !!}</p>
                        <a href="{{route('movies.Detail',$movies->movie_slug)}}" class="btn btn-primary">Read More &rarr;</a>
                    </div>
                </div>
                @endforeach

                <!-- Pagination -->
                <ul class="pagination justify-content-center mb-4">
                    <li class="page-item">
                        {{$data['movies']->links()}}
                    </li>
                </ul>


            </div>

            <!-- Sidebar Widgets Column -->
            <div class="col-md-4">

                <!-- Search Widget -->
                <div class="card mb-4">
                    <h5 class="card-header">Search</h5>
                    <div class="card-body">
                        <div class="input-group">
                            <input type="text" name="country_name" id="country_name" class="form-control" placeholder="Search for...">
                            <div id="countryList">
                            </div>
                                {{ csrf_field() }}

                        </div>
                    </div>
                </div>

                <!-- Side Widget -->
                <div class="card my-4">
                    <h5 class="card-header">Side Widget</h5>
                    <div class="card-body">
                        You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
                    </div>
                </div>

            </div>

        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->


@endsection
@section('css') @endsection
@section('js') @endsection

