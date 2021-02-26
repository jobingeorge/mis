<!-- @extends('layouts.app') -->
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">RTI PENALTY</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group" role="group" aria-label="Basic example">
                        <a href="{{route('rti-penalty.create')}}" class="float-right btn-right">
                        <button type="button" class="btn btn-secondary" title="Add new penalty" data-original-title="Add New penalty">
                        <i class="fa fa-plus" aria-hidden="true"></i> CREATE NEW PENALTY</button>
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
                            RTI PENALTIES
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example" style="width:100%;">
                                    <thead>
                                        <tr>
                                            <th>Region</th>
                                            <th>District</th>
                                            <th>Office</th>
                                            <th>Officer</th>
                                            <th>Penalty type</th>
                                            <th>Date of collection</th>
                                            <th>Amount collected</th>
                                            <th>Detail of penalty imposed</th>
                                             <th>Previous pending</th>
                                            <th>Status</th>
                                            <th>Date of replay</th>
                                            <th>Act</th>
                                            <th>Date of rejected</th>
                                            <th>Reason for reject</th>
                                            <th style="min-width: 106px;">Operations</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                         @foreach($data as $dt)
                                    <tr class="odd gradeX">
                                        <td>{{$dt['region']}}</td>
                                        <td>{{$dt['district_name']}}</td>
                                        <td>{{$dt['office_name']}}</td>
                                        <td>{{$dt['designation']}} {{$dt['user_type_name']}} </td>
                                        <td class="center">{{$dt['penalty_type']}}</td>
                                        <td class="center">{{$dt['date_of_collection']}}</td> 
                                        <td class="center">{{$dt['total_amount']}}</td>
                                         <td class="center">{{$dt['details_penalty_imposed']}}</td>
                                        <td class="center">{{$dt['penalty_previous_pending']}}</td>
                                        <td class="center">{{$dt['status']}}</td>
                                        <td class="center">{{$dt['date_replay']}}</td>
                                        <td class="center">{{$dt['act']}}</td>
                                        <td class="center">{{$dt['date_rejection']}}</td>
                                        <td class="center">{{$dt['rejection_reason']}}</td>
                                        <td>
                                            <a class="btn btn-default"    href="{{route('rti-penalty.edit',$dt['id'])}}"    title="Edit" data-toggle="tooltip"><i class="fa fa-edit "></i></a>&nbsp;&nbsp;
                                            <!-- <a class="btn btn-default"   href="{{route('users.show',$dt['id'])}}"    title="View" data-toggle="tooltip"><i class="fa fa-eye"></i></a>&nbsp;&nbsp; -->
                                            <button  class="btn btn-danger" href="{{route('rti-penalty.destroy',$dt['id'])}}" title="Delete" data-toggle="tooltip" name="deleteRtiPenalty"  ><i class="fa fa-trash"></i></button>
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
                            title:'Rti Penalty list',
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
                            title:'Rti Penalty list',
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

                $('button[name="deleteRtiPenalty"]').on('click', function(e) {
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