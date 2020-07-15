@extends('backend.layout')

@section('content')
    <section class="content-header">
        <div class="box box-primary">
            <div class="box-header with-border">
                <div class="row">
                    <div class="col-xs-4">
                        <h3>Edit Movie Page</h3>
                    </div>
                    <div class="col-xs-4">
                        <h3>Ratings <p style="color: gold;">{{$movies->voteaverage}}</p></h3>
                    </div>
                    <h3 style="text-align: center">{{$movies->releasedate}}</h3>
                </div>
            </div>
            <div class="box-body">
                <form action="{{route('movie.update', $movies->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-row">
                        <div class="form-group">
                            <div class="col-xs-6">
                                <label>Title</label>
                                <input class="form-control" type="text" name="movie_title" value="{{$movies->movie_title}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-6">
                                <label>Orginal Title</label>
                                <input class="form-control" type="text" name="movie_original_title" value="{{$movies->movie_original_title}}">
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="form-row">
                        <div class="form-group">
                            <div class="col-xs-3">
                                <label>Original Language</label>
                                <input class="form-control" type="text" name="movie_original_language" value="{{$movies->movie_original_language}}">
                            </div>
                            <div class="col-xs-3">
                                <label>Movie ID</label>
                                <input class="form-control" type="text" name="movie_id" value="{{$movies->movie_id}}">
                            </div>
                            <div class="col-xs-3">
                                <label>Status</label>
                                <input class="form-control" type="text" name="status" value="{{$movies->status}}">
                            </div>
                            <div class="col-xs-3">
                                <label>Keywords</label>
                                <input class="form-control" type="text" name="movie_keywords" value="{{$movies->movie_keywords}}">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Genres</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" name="movie_genres" value="{{$movies->movie_genres}}">
                            </div>
                        </div>
                    </div>

                    @isset($movies->movie_file)
                    <div class="form-group">
                        <label>Loaded Pic</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <img width="150" src="/images/movies/{{$movies->movie_file}}" alt="">
                            </div>
                        </div>
                    </div>
                    @endisset

                    <div class="form-group">
                        <label>Choose a Pic</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" type="file" name="movie_file" value="{{$movies->movie_file}}">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Slug</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" name="movie_slug" value="{{$movies->movie_slug}}">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Overview</label>
                        <div class="row">
                            <div class="col-xs-12">
                                    <textarea class="form-control" name="movie_content" id="editor1">{{$movies->movie_content}}</textarea>

                                <script>
                                    CKEDITOR.replace('editor1');
                                </script>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <select name="movie_status" class="form-control">
                                    <option {{$movies->movie_status=="1" ? "selected=''" : ""}} value="1">Active</option>
                                    <option {{$movies->movie_status=="0" ? "selected=''" : ""}} value="0">Passive</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="old_file" value="{{$movies->movie_file}}">

                    <div align="right" class="box-footer">
                        <button type="submit" class="btn btn-success">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

@endsection
@section('css')@endsection
@section('js')@endsection
