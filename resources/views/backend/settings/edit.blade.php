@extends('backend.layout')

@section('content')
    <section class="content-header">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Settings</h3>
            </div>
            <div class="box-body">
                <form action="{{route('settings.Update', ['id'=> $settings ->id])}}" method="POST"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Description</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" readonly type="text"
                                       value="{{$settings->settings_description}}">
                            </div>
                        </div>
                    </div>

                    @if($settings->settings_type=="file")
                        <div class="form-group">
                            <label>Choose a Pic</label>
                            <div class="row">
                                <div class="col-xs-12">
                                    <input class="form-control" type="file" required name="settings_value"
                                           value="{{$settings->settings_description}}">
                                </div>
                            </div>
                        </div>
                    @endif

                    <div class="form-group">
                        <label>Content</label>
                        <div class="row">
                            <div class="col-xs-12">
                                @if($settings->settings_type=="text")
                                    <input class="form-control" type="text" name="settings_value" required
                                           value="{{$settings->settings_value}}">
                                @endif

                                @if($settings->settings_type=="textarea")
                                    <textarea class="form-control" name="settings_value"
                                    >{{$settings->settings_value}}</textarea>
                                @endif

                                @if($settings->settings_type=="ckeditor")
                                    <textarea class="form-control" name="settings_value" id="editor1"
                                    >{{$settings->settings_value}}</textarea>
                                @endif

                                @if($settings->settings_type=="file")
                                    <img width="150" src="/images/settings/{{$settings->settings_value}}">
                                @endif

                                <script>
                                    CKEDITOR.replace('editor1');
                                </script>
                            </div>
                        </div>
                    </div>

                    @if($settings->settings_type=="file")
                        <input type="hidden" name="old_file" value="{{$settings->settings_value}}">
                    @endif

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
