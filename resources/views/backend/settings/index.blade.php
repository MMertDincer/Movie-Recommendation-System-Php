@extends('backend.layout')

@section('content')
    <section class="content-header">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Settings</h3>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        @php $counter = 1; @endphp
                        <th>Id</th>
                        <th>Explanation</th>
                        <th>Content</th>
                        <th>Key Value</th>
                        <th>Type</th>
                        <th></th>
                        <th></th>
                    </tr>
                    <tbody id="sortable">
                    @foreach($data['adminSettings'] as $adminSettings)
                        <tr id="item-{{$adminSettings->id}}">
                            <td class="sortable">{{$counter}}</td>
                            <td>{{$adminSettings['settings_description']}}</td>
                            <td>
                                @if($adminSettings->settings_type=="file")
                                    <img width="150" src="/images/settings/{{$adminSettings->settings_value}}">
                                @else
                                    {{$adminSettings->settings_value}}
                                @endif
                            </td>
                            <td>{{$adminSettings->settings_key}}</td>
                            <td>{{$adminSettings->settings_type}}</td>
                            <td width="5"><a href="{{route('settings.Edit', ['id'=>$adminSettings->id])}}"><i class="fa fa-pencil-square-o"></i></a></td>
                            <td width="5">
                                @if($adminSettings->settings_delete)
                                <a href="javascript:void(0)"><i id="@php echo $adminSettings->id @endphp" class="fa fa-trash-o"></i></a>
                                    @endif
                            </td>
                        </tr>
                        @php $counter++; @endphp
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
                        url: "{{route('settings.Sortable')}}",
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
                location.href="/admin/settings/delete/" + destroy_id;
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
