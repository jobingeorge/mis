<!-- @extends('layouts.app') -->
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="page-header">FILE DISPOSAL</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group" role="group" aria-label="Basic example">
                        <a href="{{route('file-disposal.create')}}" class="float-right btn-right">
                        <button type="button" class="btn btn-secondary" title="Add new user" data-original-title="Add New User">
                        <i class="fa fa-plus" aria-hidden="true"></i>ADD FILE DISPOSAL</button>
                        </a>
                    </div>    
                </div>   
            </div> 
            <div class="row">
                <div class="col-lg-12">
                @if (Session()->has('message'))
                <div class="alert alert-dismissable alert-success" id="flash-message">
                <button type="button"class="close"data-dismiss="alert"aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                <strong>
               {{ Session::get('message') }}
                </strong>
                </div>
                @endif
                </div>
            </div>    
            <div class="row" style="min-height:800px;">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            FILE DISPOSAL
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr> <th>Name of seat or auction</th>
                                            <th>NUMBER OF FILES PENDING DURING THE LAST MONTH</th>
                                            <th>NUMBER OF THAPALS RECEIVED DURING THE MONTH</th>
                                            <th>ACTION TAKING DURING THE MONTH</th>
                                            <th>ACTION TAKEN %</th>
                                            <th>% OF DISPOSAL</th>
                                            <th>Operations</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                         @foreach($data as $dt)
                                    <tr class="odd gradeX">
                                        <td>{{$dt['name']}}</td>
                                        <td>
                                            <table border='1'>
                                            <tr><td>English = {{$dt['pendingEnglish']}}</td>
                                            <td>Malayalam = {{$dt['pendingMalayalam']}}</td> 
                                            <td>Others = {{$dt['pendingOthers']}}</td>
                                            </tr>
                                            <tr ><td colspan="3">Total = {{$dt['files_pending_count']}}</td></tr>
                                            </table>
                                        </td>
                                        <td>
                                        <table border='1'>
                                            <tr><td>English = {{$dt['actionEnglish']}}</td>
                                            <td>Malayalam = {{$dt['actionMalayalam']}}</td> 
                                            <td>Others = {{$dt['actionOthers']}}</td>
                                            </tr>
                                            <tr ><td colspan="3">Total = {{$dt['action_count']}}</td></tr>
                                        </table>
                                        
                                        </td>
                                        <td>
                                       
                                        <table border='1'>
                                            <tr><td>English = {{$dt['thapalEnglish']}}</td>
                                            <td>Malayalam = {{$dt['thapalMalayalam']}}</td> 
                                            <td>Others =  {{$dt['thapalOthers']}}</td>
                                            </tr>
                                            <tr ><td colspan="3">Total = {{$dt['action_count']}}</td></tr>
                                        </table>
                                        </td>
                                        <td>
                                        <table border='1'>
                                            <tr><td>English = {{$dt['actionPercentageEnglish']}}</td>
                                            <td>Malayalam = {{$dt['actionPercentageMalayalam']}}</td> 
                                            <td>Others =  {{$dt['actionPercentageOthers']}}</td>
                                            </tr>
                                            <tr ><td colspan="3">Total = {{$dt['action_taken_count']}}</td></tr>
                                        </table>
                                        </td>
                                        <td>
                                        <table border='1'>
                                            <tr><td>English = {{$dt['disposalEnglish']}}</td>
                                            <td>Malayalam = {{$dt['disposalMalayalam']}}</td> 
                                            <td>Others =  {{$dt['disposalOthers']}}</td>
                                            </tr>
                                            <tr ><td colspan="3">Total = {{$dt['file_disposal_count']}}</td></tr>
                                        </table>
                                        </td>
                                        <td>
                                            <a class="btn btn-default"    href="{{route('file-disposal.edit',$dt['id'])}}"    title="Edit" data-toggle="tooltip"><i class="fa fa-edit "></i></a>&nbsp;&nbsp;
                                            <!-- <a class="btn btn-default"   href="{{route('users.show',$dt['id'])}}"    title="View" data-toggle="tooltip"><i class="fa fa-eye"></i></a>&nbsp;&nbsp; -->
                                            <button  class="btn btn-danger" href="{{route('file-disposal.destroy',$dt['id'])}}" title="Delete" data-toggle="tooltip" name="deleteRtiDiciplinary"  ><i class="fa fa-trash"></i></button>
                                        </td>
                                    </tr> 
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
        </div>
     </div>
                     <script>
            $(document).ready(function() {
                $('#dataTables-example').DataTable({
                        responsive: true,
                        dom: 'Bfrtip',
                        buttons: [
                            {
                            extend: 'excel',
                            text: 'Export As Exel',
                            title:'File disposal',
                            className: 'btn btn-default',
                                exportOptions: {
                                columns: 'th:not(:last-child)'
                                }
                            },
                             {
                            extend: 'copy',
                            text: 'Copy',
                            className: 'btn btn-default',
                                exportOptions: {
                                columns: 'th:not(:last-child)'
                                }
                            },
                             {
                            extend: 'print',
                            text: 'Print',
                            title:'File disposal',
                            className: 'btn btn-default',
                                exportOptions: {
                                columns: 'th:not(:last-child)'
                                }
                            },
                             {
                            extend: 'colvis',
                             text: 'Column Visibility',
                            className: 'btn btn-default',
                            columns: ':not(.noVis)',
                            }
                           ]
                });

                $('button[name="deleteRtiDiciplinary"]').on('click', function(e) {
                    e.preventDefault();
                      var url = $(this).attr('href');
                    bootbox.confirm("Are you sure?", function(result) {
                         if(result) {
                         $.ajax({
                            url:url,
                            type:'POST',
                            data : {"_token": "{{ csrf_token() }}","_method":"DELETE"},
                            success: function(res) {
                                bootbox.alert(res, function() {
                                location.reload();
                                });
                            
                            }
                        });
                    }
                   
                  });
                });
            });
        </script>   
@endsection