@extends('backend.layout')

@section('content')
    <section class="content-header">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Edit User Page</h3>
            </div>
            <div class="box-body">
                <form action="{{route('user.update', $users->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label>Name</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" name="name" value="{{$users->name}}">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" name="email" value="{{$users->email}}">
                            </div>
                        </div>
                    </div>

                    @isset($users->user_file)
                    <div class="form-group">
                        <label>Loaded Pic</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <img width="150" src="/images/users/{{$users->user_file}}" alt="">
                            </div>
                        </div>
                    </div>
                    @endisset

                    <div class="form-group">
                        <label>Choose a Pic</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" type="file" name="user_file" value="{{$users->user_file}}">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" type="password" name="password">
                                <small>Leave the field blank if you don't want to change the password.</small>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <select name="user_status" class="form-control">
                                    <option {{$users->user_status=="1" ? "selected=''" : ""}} value="1">Active</option>
                                    <option {{$users->user_status=="0" ? "selected=''" : ""}} value="0">Passive</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="old_file" value="{{$users->user_file}}">

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
