@extends('frontend.layout')

@section('content')
    <div class="container content">
        <div class="row mt-4 justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <h3>Recommended Movies for You:</h3>
                        @foreach($data['movies'] as $movie)
                            <div class="dropdown col-sm-6">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{$movie->movie_title}}
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    @foreach($movie->like_movies as $like_movie)
                                    <a class="dropdown-item" href="{{route('movies.Detail' ,$like_movie->movie_slug)}}">{{$like_movie->movie_title}}</a>
                                    @endforeach
                                </div>
                            </div>
                            <br>
                            @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
