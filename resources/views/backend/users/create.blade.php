@extends('backend.layout')

@section('content')
    <section class="content-header">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Add New User Page</h3>
            </div>
            <div class="box-body">
                <form action="{{route('user.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>User Name</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" name="name">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" type="email" name="email">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Choose a Pic</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" type="file" required name="user_file">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" type="password" name="password">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <select name="user_status" class="form-control">
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
