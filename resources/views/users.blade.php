<!-- @extends('layouts.app') -->
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">OFFICERS IN CMS</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group" role="group" aria-label="Basic example">
                        <a href="{{route('users.create')}}" class="float-right btn-right">
                        <button type="button" class="btn btn-secondary" title="Add new user" data-original-title="Add New User">
                        <i class="fa fa-plus" aria-hidden="true"></i> ADD NEW USER</button>
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
                            Officers in MIS
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Pen</th>
                                            <th>Region</th>
                                            <th>District</th>
                                            <th>Office name</th>
                                            <th>Designation</th>
                                            <th>Cug</th>
                                             <th>Operations</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data as $dt)
                                    <tr class="odd gradeX">
                                        <td>{{$dt['name']}}</td>
                                        <td>{{$dt['email']}}</td>
                                        <td>{{$dt['pen']}}</td>
                                        <td class="center">{{$dt['region']}}</td>
                                        <td class="center">{{$dt['district_name']}}</td> 
                                        <td class="center">{{$dt['office_name']}}</td>
                                         <td class="center">{{$dt['designation']}}-{{$dt['user_type_name']}}</td>
                                        <td class="center">{{$dt['cug']}}</td>
                                        <td>
                                            <!-- <a class="btn btn-default"    href="{{route('users.edit',$dt['id'])}}"    title="Edit" data-toggle="tooltip"><i class="fa fa-edit "></i></a>&nbsp;&nbsp; -->
                                            <!-- <a class="btn btn-default"   href="{{route('users.show',$dt['id'])}}"    title="View" data-toggle="tooltip"><i class="fa fa-eye"></i></a>&nbsp;&nbsp; -->
                                            <button  class="btn btn-danger" href="{{route('users.destroy',$dt['id'])}}" title="Delete" data-toggle="tooltip" name="deleteUser"  ><i class="fa fa-trash"></i></button>
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
                            title:'MIS Users',
                            className: 'btn btn-default',
                                // exportOptions: {
                                // columns: 'th:not(:last-child)'
                                // }
                            },
                             {
                            extend: 'copy',
                            text: 'Copy',
                            className: 'btn btn-default',
                                // exportOptions: {
                                // columns: 'th:not(:last-child)'
                                // }
                            },
                             {
                            extend: 'print',
                            text: 'Print',
                            title:'MIS uers',
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

                $('button[name="deleteUser"]').on('click', function(e) {
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

                $("#stateLevelOfficer").css('display','none');
                $("#districtLevelOfficer").css('display','none');
                $("#officeLevelOfficer").css('display','none');
                $("#userLevel").change(function(){
                   var userLevel=$(this).val();
                   if(userLevel && userLevel!=0)
                   {
                       alert(userLevel);
                   }
                })
            });
        </script>
@endsection