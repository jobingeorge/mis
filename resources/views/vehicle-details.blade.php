<!-- @extends('layouts.app') -->
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                @if($data['formType']=='create')
                <h1 class="page-header">Add New Vehicle</h1>
                @csrf
                @endif
                @if($data['formType']=='edit')
                <h1 class="page-header">Edit Vehicle</h1>
                @csrf
                @endif
                @if($data['formType']=='show')
                <h1 class="page-header">View Vehicle</h1>
                @csrf
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel-group">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse">Vehicle Details</a>
                            </h4>
                        </div>
                        <div id="addnewvehicle" class="panel-collapse collapse in">
                            <div class="panel-body">
                                <!-- for display form validation errors -->
                                @if ($errors->any())
                                <script> $("#addnewuser").addClass('in');</script>
                                <div class="alert alert-danger">
                                    <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                    </ul>
                                </div>
                                @endif
                                <!-- end display form validation errors -->
                                @if($data['formType']=='create')
                                <form role="form" action="{{route('vehicle-management.store')}}" id="vehicleAddForm" name="vehicleAddForm" method="POST" class="row">
                                @csrf
                                @endif
                                @if($data['formType']=='edit')
                                <form role="form" action="{{route('vehicle-management.update',$data['vehicle'][0]['id'])}}" id="vehicleAddForm" name="vehicleAddForm" method="POST" class="row">
                                @method('PUT')
                                @csrf
                                @endif
                                @if($data['formType']=='show')
                                <form role="form" id="vehicleAddForm" name="vehicleAddForm" class="row">
                                @csrf
                                @endif
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <input type="text" name="reg_no" id="reg_no" class="form-control" value="{{old('register_number',$data['vehicle'][0]['register_number'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}}  placeholder="VEHICLE REGISTER NUMBER">
                                        <!-- <p class="help-block">Example block-level help text here.</p> -->
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <input type="text" name="dealer_name" id="dealer_name" class="form-control" value="{{old('dealer_name',$data['vehicle'][0]['dealer_name'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}} placeholder="DEALERS NAME">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <input type="text" name="dealer_address" id="dealer_address" class="form-control"  value="{{old('dealer_address',$data['vehicle'][0]['dealer_address'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}} placeholder="DEALERS ADDRESS">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <input type="text" name="vehicle_class" id="vehicle_class" class="form-control"  value="{{old('vehicle_class',$data['vehicle'][0]['vehicle_class'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}} placeholder="VEHICLE CLASS">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <input type="text" name="chasis_no" id="chasis_no" class="form-control"  value="{{old('chasis_no',$data['vehicle'][0]['chasis_no'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}} placeholder="CHASIS NUMBER">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <input type="text" name="engine_no" id="engine_no" class="form-control"  value="{{old('engine_no',$data['vehicle'][0]['engine_no'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}} placeholder="ENGINE NUMBER">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <select name="fuel_type" class="form-control">
                                                <option value="-1">Please Select</option>
                                                <option value="1" {{(isset($data['vehicle'][0]['fuel_type']) && $data['vehicle'][0]['fuel_type']==1)?'selected':''}}>Petrol</option>
                                                <option value="2" {{(isset($data['vehicle'][0]['fuel_type']) && $data['vehicle'][0]['fuel_type']==2)?'selected':''}}>Diesel</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <input type="text" name="color" id="color" class="form-control"  value="{{old('color',$data['vehicle'][0]['color'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}} placeholder="COLOR">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                        <select name="manufacture_month" class="form-control">
                                                <option value="-1">MANUFACTURE MONTH</option>
                                                <option value="1" {{(isset($data['vehicle'][0]['manufacture_month']) && $data['vehicle'][0]['manufacture_month']==1)?'selected':''}}>January</option>
                                                <option value="2" {{(isset($data['vehicle'][0]['manufacture_month']) && $data['vehicle'][0]['manufacture_month']==2)?'selected':''}}>February</option>
                                                <option value="3" {{(isset($data['vehicle'][0]['manufacture_month']) && $data['vehicle'][0]['manufacture_month']==3)?'selected':''}}>March</option>
                                                <option value="4" {{(isset($data['vehicle'][0]['manufacture_month']) && $data['vehicle'][0]['manufacture_month']==4)?'selected':''}}>April</option>
                                                <option value="5" {{(isset($data['vehicle'][0]['manufacture_month']) && $data['vehicle'][0]['manufacture_month']==5)?'selected':''}}>May</option>
                                                <option value="6" {{(isset($data['vehicle'][0]['manufacture_month']) && $data['vehicle'][0]['manufacture_month']==6)?'selected':''}}>June</option>
                                                <option value="7" {{(isset($data['vehicle'][0]['manufacture_month']) && $data['vehicle'][0]['manufacture_month']==7)?'selected':''}}>July</option>
                                                <option value="8" {{(isset($data['vehicle'][0]['manufacture_month']) && $data['vehicle'][0]['manufacture_month']==8)?'selected':''}}>August</option>
                                                <option value="9" {{(isset($data['vehicle'][0]['manufacture_month']) && $data['vehicle'][0]['manufacture_month']==9)?'selected':''}}>September</option>
                                                <option value="10" {{(isset($data['vehicle'][0]['manufacture_month']) && $data['vehicle'][0]['manufacture_month']==10)?'selected':''}}>October</option>
                                                <option value="11" {{(isset($data['vehicle'][0]['manufacture_month']) && $data['vehicle'][0]['manufacture_month']==11)?'selected':''}}>November</option>
                                                <option value="12" {{(isset($data['vehicle'][0]['manufacture_month']) && $data['vehicle'][0]['manufacture_month']==12)?'selected':''}}>December</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <input type="text" name="manufacture_year" id="manufacture_year" class="form-control"  value="{{old('manufacture_year',$data['vehicle'][0]['manufacture_year'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}} placeholder="MANUFACTURE YEAR">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <input type="text" name="makers_name" id="makers_name" class="form-control"  value="{{old('makers_name',$data['vehicle'][0]['makers_name'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}} placeholder="MAKERS NAME">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <input type="text" name="year_of_purchase" id="year_of_purchase" class="form-control"  value="{{old('year_of_purchase',$data['vehicle'][0]['year_of_purchase'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}} placeholder="YEAR OF PURCHASE">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <input type="text" name="tank_capacity" id="tank_capacity" class="form-control"  value="{{old('tank_capacity',$data['vehicle'][0]['tank_capacity'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}} placeholder="TANK CAPACITY">
                                        </div>
                                    </div>
                                    <div class="col-xs-12">
                                        <h3>INSURANCE & WARRANTY DETAILS</h3>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>Policy Number</label>
                                            <input type="text" name="policy_number" id="policy_number" class="form-control"  value="{{old('policy_number',$data['vehicle'][0]['policy_number'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}} placeholder="POLICY NUMBER">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>Policy From</label>
                                            <input type="date" name="policy_from" id="policy_from" class="form-control"  value="{{old('policy_from',$data['vehicle'][0]['policy_from'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}} placeholder="POLICY FROM">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>Policy To</label>
                                            <input type="date" name="policy_to" id="policy_from" class="form-control"  value="{{old('policy_to',$data['vehicle'][0]['policy_to'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}} placeholder="POLICY TO">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>Assured Amount</label>
                                            <input type="text" name="assured_amount" id="assured_amount" class="form-control"  value="{{old('assured_amount',$data['vehicle'][0]['assured_amount'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}} placeholder="ASSURED AMOUNT">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>Warranty upto</label>
                                            <input type="date" name="warranty_to" id="warranty_to" class="form-control"  value="{{old('warranty_to',$data['vehicle'][0]['warranty_to'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}} placeholder="WARRANTY TO">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>Renewal Policy Number</label>
                                            <input type="text" name="renewal_policy_no" id="renewal_policy_no" class="form-control"  value="{{old('renewal_policy_no',$data['vehicle'][0]['renewal_policy_no'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}} placeholder="RENEWAL POLICY NUMBER">
                                        </div>
                                    </div>
                                    <div class="col-xs-12">
                                        <div class="form-group">
                                            @if($data['formType']!='show')
                                            <button type="submit" class="btn btn-default">Save</button>
                                            @endif
                                        <div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- </div> -->
                    </div>
                </div>   
            </div> 
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