<!-- @extends('layouts.app') -->
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">RTI APPLICATIONS</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group" role="group" aria-label="Basic example">
                        <a href="{{route('rti-new-application.create')}}" class="float-right btn-right">
                        <button type="button" class="btn btn-secondary" title="Add new user" data-original-title="Add New User">
                        <i class="fa fa-plus" aria-hidden="true"></i> CREATE NEW RTI APPLICATION</button>
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
                            RTI Applications
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                        <th></th>
                                            <th>Name of applicant</th>
                                            <th>Address of applicant</th>
                                            <th>File Nmuber</th>
                                            <th>Mode of receipt</th>
                                            <th>Date id receipt</th>
                                            <th>Nature of information</th>
                                             <th>Nature of public</th>
                                             <th>Status</th>
                                             <th>Date of replay</th>
                                              <th>Act</th>
                                              <th>Date of rejection</th>
                                              <th>Rejection reason</th>
                                              <th>Amount released</th>
                                              <th>remarks</th>
                                             <th>Operations</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data as $dt)
                                    <tr class="odd gradeX">
                                    <td></td>
                                        <td>{{$dt['name_of_aplicant']}}</td>
                                        <td>{{$dt['address_of_aplicant']}}</td>
                                        <td>{{$dt['file_number']}}</td>
                                        <td class="center">{{$dt['mode_of_receipt']}}</td>
                                        <td class="center">{{$dt['date_of_receipt']}}</td> 
                                        <td class="center">{{$dt['nature_of_information']}}</td>
                                         <td class="center">{{$dt['nature_of_public']}}</td>
                                        <td class="center">{{$dt['status']}}</td>
                                        <td class="center">{{$dt['date_reply']}}</td>
                                        <td class="center">{{$dt['act']}}</td>
                                        <td class="center">{{$dt['date_rejection']}}</td>
                                        <td class="center">{{$dt['rejection_reason']}}</td>
                                        <td class="center">{{$dt['amount_released']}}</td>
                                        <td class="center">{{$dt['amount_released']}}</td>
                                        <td>
                                            <a class="btn btn-default"    href="{{route('rti-new-application.edit',$dt['id'])}}"    title="Edit" data-toggle="tooltip"><i class="fa fa-edit "></i></a>&nbsp;&nbsp;
                                            <!-- <a class="btn btn-default"   href="{{route('users.show',$dt['id'])}}"    title="View" data-toggle="tooltip"><i class="fa fa-eye"></i></a>&nbsp;&nbsp; -->
                                            <button  class="btn btn-danger" href="{{route('rti-new-application.destroy',$dt['id'])}}" title="Delete" data-toggle="tooltip" name="deleteRtiApplication"  ><i class="fa fa-trash"></i></button>
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
                        select: true,
                        responsive: true,
                        dom: 'Bfrtip',
                        
                        buttons: [
                            {
                            extend: 'excel',
                            text: 'Export As Exel',
                            title:'RTI New application',
                            className: 'btn btn-default',
                                exportOptions: {
                                columns: 'th:not(:last-child)',
                                    modifier: {
                                    checked: true
                                    }
                                },
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
                            title:'RTI New application',
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
                           ],
                            'columnDefs': [
                            {
                            'targets': 0,
                            'checkboxes': {
                            'selectRow': true
                            }
                            }
                            ],
                            select: {
                            style:    'os',
                            selector: 'td:first-child',
                            'style': 'multi'
                            },
                            order: [[ 1, 'asc' ]]
                });

                $('button[name="deleteRtiApplication"]').on('click', function(e) {
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