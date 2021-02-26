<!-- @extends('layouts.app') -->
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">RTI APPEAL APPLICATION</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group" role="group" aria-label="Basic example">
                        <a href="{{route('rti-appeal-application.create')}}" class="float-right btn-right">
                        <button type="button" class="btn btn-secondary" title="Add new user" data-original-title="Add New User">
                        <i class="fa fa-plus" aria-hidden="true"></i> CREATE APPEAL APPLICATION</button>
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
                            RTI APPEAL APPLICATION
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>File Nmuber</th>
                                            <th>Appeal From</th>
                                            <th>Address</th>
                                            <th>Appeal Againist</th>
                                             <th>Brief Description</th>
                                             <th>Status</th>
                                              <th>Date of replay</th>
                                              <th>Act</th>
                                              <th>Date of rejection</th>
                                              <th>Rejection reason</th>
                                              <th>Brief Order</th>
                                             <th>Operations</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data as $dt)
                                    <tr class="odd gradeX">
                                        <td>{{$dt['file_number']}}</td>
                                        <td>{{$dt['appeal_from']}}</td>
                                        <td>{{$dt['address']}}</td>
                                        <td class="center">{{$dt['appeal_aganist']}}</td>
                                        <td class="center">{{$dt['brief_description']}}</td> 
                                        <td class="center">{{$dt['status']}}</td>
                                         <td class="center">{{$dt['date_reply']}}</td>
                                        <td class="center">{{$dt['act']}}</td>
                                        <td class="center">{{$dt['date_rejection']}}</td>
                                        <td class="center">{{$dt['rejection_reason']}}</td>
                                        <td class="center">{{$dt['brief_order']}}</td>

                                        <td>
                                            <a class="btn btn-default"    href="{{route('rti-appeal-application.edit',$dt['id'])}}"    title="Edit" data-toggle="tooltip"><i class="fa fa-edit "></i></a>&nbsp;&nbsp;
                                            <!-- <a class="btn btn-default"   href="{{route('users.show',$dt['id'])}}"    title="View" data-toggle="tooltip"><i class="fa fa-eye"></i></a>&nbsp;&nbsp; -->
                                            <button  class="btn btn-danger" href="{{route('rti-appeal-application.destroy',$dt['id'])}}" title="Delete" data-toggle="tooltip" name="deleteAppealApplication"  ><i class="fa fa-trash"></i></button>
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
                            title:'RTI Appeal application',
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
                            title:'RTI Appeal application',
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

                $('button[name="deleteAppealApplication"]').on('click', function(e) {
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