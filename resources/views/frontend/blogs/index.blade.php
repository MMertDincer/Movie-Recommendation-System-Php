@extends('frontend.layout')
@section('title',"Anasayfa Title")
@section('content')


    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <h1 class="mt-4 mb-3">Blogs</h1>

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                @foreach($data['blogs'] as $blogs)
                <div class="card mb-4">
                    <img class="card-img-top" src="/images/blogs/{{$blogs->blog_file}}" alt="Card image cap">
                    <div class="card-body">
                        <h2 class="card-title">{{$blogs->blog_title}}</h2>
                        <p class="card-text">{!! substr($blogs->blog_content,0,140) !!}</p>
                        <a href="{{route('blogs.Detail',$blogs->blog_slug)}}" class="btn btn-primary">Read More &rarr;</a>
                    </div>
                    <div class="card-footer text-muted">
                        Posted on {{$blogs->created_at->format('d-m-Y h:i')}}
                    </div>
                </div>
                @endforeach

                <!-- Pagination -->
                <ul class="pagination justify-content-center mb-4">
                    <li class="page-item">
                        <a class="page-link" href="#">&larr; Older</a>
                    </li>
                    <li class="page-item disabled">
                        <a class="page-link" href="#">Newer &rarr;</a>
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
                            <input type="text" class="form-control" placeholder="Search for...">
                            <span class="input-group-btn">
                <button class="btn btn-secondary" type="button">Go!</button>
              </span>
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

