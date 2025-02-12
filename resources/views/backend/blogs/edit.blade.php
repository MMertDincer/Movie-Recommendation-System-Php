@extends('backend.layout')

@section('content')
    <section class="content-header">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Edit Blog Page</h3>
            </div>
            <div class="box-body">
                <form action="{{route('blog.update', $blogs->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label>Title</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" name="blog_title" value="{{$blogs->blog_title}}">
                            </div>
                        </div>
                    </div>

                    @isset($blogs->blog_file)
                    <div class="form-group">
                        <label>Loaded Pic</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <img width="150" src="/images/blogs/{{$blogs->blog_file}}" alt="">
                            </div>
                        </div>
                    </div>
                    @endisset

                    <div class="form-group">
                        <label>Choose a Pic</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" type="file" name="blog_file" value="{{$blogs->blog_file}}">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Slug</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" name="blog_slug" value="{{$blogs->blog_slug}}">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Content</label>
                        <div class="row">
                            <div class="col-xs-12">
                                    <textarea class="form-control" name="blog_content" id="editor1">{{$blogs->blog_content}}</textarea>

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
                                <select name="blog_status" class="form-control">
                                    <option {{$blogs->blog_status=="1" ? "selected=''" : ""}} value="1">Active</option>
                                    <option {{$blogs->blog_status=="0" ? "selected=''" : ""}} value="0">Passive</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="old_file" value="{{$blogs->blog_file}}">

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
