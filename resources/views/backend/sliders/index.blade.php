@extends('backend.layout')

@section('content')
    <section class="content-header">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Sliders</h3>

                <div align="right">
                    <a href="{{route('slider.create')}}" class="btn btn-success">Add</a>
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <thead>
                    <tr>@php $counter = 1; @endphp
                        <th>Id</th>
                        <th>Slider Image</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th></th>
                        <th></th>
                    </tr>
                    <tbody id="sortable">
                    @foreach($data['slider'] as $slider)
                        <tr id="item-{{$slider->id}}">
                            <td width="10">#{{$counter}}</td>
                            <td class="sortable" width="150"><img width="150" src="/images/sliders/{{$slider->slider_file}}" alt=""></td>
                            <td width="300">{{$slider['slider_title']}}</td>
                            <td>{{$slider->slider_description}}</td>
                            <td width="5"><a href="{{route('slider.edit',$slider->id)}}"><i
                                        class="fa fa-pencil-square-o"></i></a></td>
                            <td width="5"><a href="javascript:void(0)"><i id="@php echo $slider->id @endphp"
                                                                          class="fa fa-trash-o"></i></a></td>
                        </tr>
                        @php $counter++ @endphp
                    @endforeach
                    </tbody>
                    </thead>
                </table>
            </div>
        </div>
    </section>

    <script type="text/javascript">
        $(function () {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#sortable').sortable({
                revert: true,
                handle: ".sortable",
                stop: function (event, ui) {
                    var data = $(this).sortable('serialize');
                    $.ajax({
                        type: "POST",
                        data: data,
                        url: "{{route('slider.Sortable')}}",
                        success: function (msg) {
                            // console.log(msg);
                            if (msg) {
                                alertify.success("Process Successful");
                            } else {
                                alertify.error("Process Unsuccessful");
                            }
                        }
                    });

                }
            });
            $('#sortable').disableSelection();

        });

        $(".fa-trash-o").click(function () {
            destroy_id = $(this).attr('id');

            alertify.confirm('Confirm Delete!', 'This operation cannot be undone!',
                function () {
                    $.ajax({
                        type: "DELETE",
                        url: "slider/" + destroy_id,
                        success: function (msg) {
                            if (msg) {
                                $("#item-"+destroy_id).remove();
                                alertify.success("Process Successful!");
                            } else {
                                alertify.error("Process Unsuccessful!");
                            }
                        }
                    });
                },
                function () {
                    alertify.error('Deletion canceled.');
                }
            );
        });
    </script>

@endsection
@section('css')@endsection
@section('js')@endsection
