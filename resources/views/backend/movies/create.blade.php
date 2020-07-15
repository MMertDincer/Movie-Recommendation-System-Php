@extends('backend.layout')

@section('content')
    <section class="content-header">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Add New Movie Page</h3>
            </div>
            <div class="box-body">
                <form action="{{route('movie.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="form-group">
                            <div class="col-xs-6">
                                <label>Title</label>
                                <input class="form-control" type="text" name="movie_title">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-6">
                                <label>Orginal Title</label>
                                <input class="form-control" type="text" name="movie_original_title">
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="form-row">
                        <div class="form-group">
                            <div class="col-xs-3">
                                <label>Original Language</label>
                                <input class="form-control" type="text" name="movie_original_language">
                            </div>
                            <div class="col-xs-3">
                                <label>Movie ID</label>
                                <input class="form-control" type="text" name="movie_id">
                            </div>
                            <div class="col-xs-3">
                                <label>Status</label>
                                <input class="form-control" type="text" name="status">
                            </div>
                            <div class="col-xs-3">
                                <label>Keywords</label>
                                <input class="form-control" type="text" name="movie_keywords">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Genres</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" name="movie_genres">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Choose a Pic</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" type="file" name="movie_file">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Slug</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" name="movie_slug">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Overview</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <textarea class="form-control" name="movie_content" id="editor1"></textarea>

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
                                    <option value="1">Active</option>
                                    <option value="0">Passive</option>
                                </select>
                            </div>
                        </div>
                    </div>

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
