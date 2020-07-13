@extends('frontend.layout')
@section('title',"Anasayfa Title")
@section('content')

    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <h1 class="mt-4 mb-3">Contact Page
        </h1>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(session()->has('success'))
            <div class="alert alert-success">
                <p>{{session('success')}}</p>
            </div>
        @endif

        <!-- Contact Form -->
        <!-- In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
        <div class="row">
            <div class="col-lg-8 mb-4">
                <form method="POST">
                    @CSRF
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Full Name:</label>
                            <input type="text" class="form-control" name="name">
                            <p class="help-block"></p>
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Phone Number:</label>
                            <input type="tel" class="form-control" name="phone">
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Email Address:</label>
                            <input type="email" class="form-control" name="email">
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Message:</label>
                            <textarea rows="14" cols="100" class="form-control" name="message"></textarea>
                        </div>
                    </div>
                    <div id="success"></div>
                    <!-- For success/fail messages -->
                    <button type="submit" class="btn btn-primary">Send Message</button>
                </form>


            </div>
            <!-- Contact Details Column -->
            <div class="col-lg-4 mb-4">
                <h3>Contact Details</h3>
                <p>
                    {!! $address !!}
                    <br>
                    {{$district}} / {{$province}}
                    <br>
                    {{$phone_gsm}}
                    <br>
                    {{$phone_sabit}}
                    <br>
                    {{$mail}}

                </p>
            </div>

        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->

@endsection
@section('css') @endsection
@section('js') @endsection

