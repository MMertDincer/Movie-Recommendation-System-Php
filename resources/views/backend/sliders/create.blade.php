@extends('backend.layout')

@section('content')
    <section class="content-header">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Add New Slider Page</h3>
            </div>
            <div class="box-body">
                <form action="{{route('slider.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Title</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" name="slider_title">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" name="slider_description">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Choose a Pic</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" type="file" required name="slider_file">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Slug</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" name="slider_slug">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>URL</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" name="slider_url">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Content</label>
                        <div class="row">
                            <div class="col-xs-12">
                                    <textarea class="form-control" name="slider_content" id="editor1"></textarea>

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
                                <select name="slider_status" class="form-control">
                                    <option value="1">Active</option>
                                    <option value="0">Passive</option>
                                </select>
                            </div>
                        </div>
                    </div>


                    <div align="right" class="box-footer">
                        <button type="submit" class="btn btn-success">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

@endsection
@section('css')@endsection
@section('js')@endsection
