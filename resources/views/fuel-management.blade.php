<!-- @extends('layouts.app') -->
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="page-header">Fuel Management</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group" role="group" aria-label="Basic example">
                        <a href="{{route('fuel-management.create')}}" class="float-right btn-right">
                        <button type="button" class="btn btn-secondary" title="Add new user" data-original-title="Add New User">
                        <i class="fa fa-plus" aria-hidden="true"></i>ADD NEW DATA</button>
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
                        Fuel Management
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Registration</th>
                                            <th>Fuel Economy</th>
                                             <th>Operations</th>
                                        </tr>
                                    </thead>
                                    @foreach($data as $dt)
                                    <tr class="odd gradeX">
                                        <td>{{$dt['register_number']}}</td>
                                        <td>{{$dt['fuel_efficiancy']}}</td>
                                        <td>
                                            <a class="add" href="{{route('fuel-management.edit',$dt['id'])}}"  title="Edit" data-toggle="tooltip"><i class="fa fa-edit "></i></a>&nbsp;&nbsp;
                                            <button  class="btn btn-danger" href="{{route('fuel-management.destroy',$dt['id'])}}" title="Delete" data-toggle="tooltip" name="deleteFuelManagementData"  ><i class="fa fa-trash"></i></button>
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
                            title:'Fuel Management Data',
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
                            title:'Fuel Management Data',
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
    });
        $('button[name="deleteFuelManagementData"]').on('click', function(e) {
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
    </script>    
@endsection