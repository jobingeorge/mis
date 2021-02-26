<!-- @extends('layouts.app') -->
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="page-header">MONTHLY PROGRAMS</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group" role="group" aria-label="Basic example">
                        <a href="{{route('monthly-programms.create')}}" class="float-right btn-right">
                        <button type="button" class="btn btn-secondary" title="Add new user" data-original-title="Add New User">
                        <i class="fa fa-plus" aria-hidden="true"></i>CREATE NEW PROGRAM</button>
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
                         MONTHLY PROGRAMS
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>District</th>
                                            <th>Camp</th>
                                            <th>Office</th>
                                            <th>Nature od duty</th>
                                            <th>Remarks</th>
                                             <th>Operations</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data as $dt)
                                    <tr class="odd gradeX">
                                        <td>{{$dt['date']}}</td>
                                        <td>{{$dt['district_name']}}</td>
                                        <td>{{$dt['camp']}}</td>
                                        <td>{{$dt['office_name']}}</td>
                                         <td>{{$dt['nature_of_duty']}}</td>
                                          <td>{{$dt['remarks']}}</td>
                                        <td>
                                            <a class="btn btn-default"    href="{{route('monthly-programms.edit',$dt['id'])}}"    title="Edit" data-toggle="tooltip"><i class="fa fa-edit "></i></a>&nbsp;&nbsp;
                                            <!-- <a class="btn btn-default"   href="{{route('users.show',$dt['id'])}}"    title="View" data-toggle="tooltip"><i class="fa fa-eye"></i></a>&nbsp;&nbsp; -->
                                            <button  class="btn btn-danger" href="{{route('monthly-programms.destroy',$dt['id'])}}" title="Delete" data-toggle="tooltip" name="deleteMonthlyPrograms"  ><i class="fa fa-trash"></i></button>
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
                            title:'Monthly program',
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
                            title:'Monthly program',
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

                $('button[name="deleteMonthlyPrograms"]').on('click', function(e) {
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