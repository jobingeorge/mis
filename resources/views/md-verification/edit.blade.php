<!-- @extends('layouts.app') -->
@section('content')
<div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
            
                     @if(isset($data['formType']) && $data['formType']=='create')
                      <h3 class="page-header">MASTER DATA VERIFICATION CREATE</h3>
                    @endif
                   @if(isset($data['formType']) && $data['formType']=='edit')
                      <h1 class="page-header">Edit Officer Details</h1>
                    @endif
                    @if(isset($data['formType']) && $data['formType']=='show')
                      <h1 class="page-header"> Officer Details</h1>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                        <div class="panel-group">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                @if(isset($data['formType']) && $data['formType']=='create')
                                  <h5>Add new master data verification</h5p>
                                @endif
                                 @if(isset($data['formType']) && $data['formType']=='edit')
                                  <h5>Edit Officer Details</h5p>
                                @endif
                                 @if(isset($data['formType']) && $data['formType']=='show')
                                  <h5>Officer details</h5p>
                                @endif
                                </div>
                                <div id="addnewuser" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                    <?php 
                                    // echo "<pre>";
                                    // print_r($data['user']);
                                    // exit;
                                    // echo "</pre>";
                                    ?>
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
                                  
                                         <form role="form" action="{{route('md-verification.update',$data['verification'][0]['id'])}}" id="masterDataVerificationEditForm" name="masterDataVerificationEditForm" method="POST" class="row">
                                        @method('PUT')
                                         @csrf

                                          <div class="col-lg-4">
                                                <div class="form-group">
                                                <p>Select  date</p>
                                                <input type="text" class="form-control date" name='date' id='date'  placeholder="Date"  value="{{old('date',$data['verification'][0]['date'] ?? '')}}"  >
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                            <div class="form-group">
                                                <label>select time</label>
                                                <select type="text" name="from_time" id="from_time" class="form-control" placeholder="from">
                                            
                                                    <option value="">From </option>
                                                   
                                                    <option value="12:00AM" {{(isset($data['verification'][0]['from_time']) && $data['verification'][0]['from_time']=='12:00AM'?'selected':'')}} >12:00AM</option>
                                                    <option value="12:30AM" {{(isset($data['verification'][0]['from_time']) && $data['verification'][0]['from_time']=='12:30AM'?'selected':'')}}>12:30AM</option>
                                                    <option value="1:00AM" {{(isset($data['verification'][0]['from_time']) && $data['verification'][0]['from_time']=='1:00AM'?'selected':'')}}>1:00AM</option>
                                                    <option value="1:30AM" {{(isset($data['verification'][0]['from_time']) && $data['verification'][0]['from_time']=='1:30AM'?'selected':'')}}>1:30AM</option>
                                                    <option value="2:00AM"{{(isset($data['verification'][0]['from_time']) && $data['verification'][0]['from_time']=='2:00AM'?'selected':'')}}>2:00AM</option>
                                                    <option value="2:30AM"{{(isset($data['verification'][0]['from_time']) && $data['verification'][0]['from_time']=='2:30AM'?'selected':'')}}>2:30AM</option>
                                                    <option value="3:00AM"{{(isset($data['verification'][0]['from_time']) && $data['verification'][0]['from_time']=='3:00AM'?'selected':'')}}>3:00AM</option>
                                                    <option value="3:30AM"{{(isset($data['verification'][0]['from_time']) && $data['verification'][0]['from_time']=='3:30AM'?'selected':'')}}>3:30AM</option>
                                                    <option value="4:00AM"{{(isset($data['verification'][0]['from_time']) && $data['verification'][0]['from_time']=='4:00AM'?'selected':'')}}>4:00AM</option>
                                                    <option value="4:30AM"{{(isset($data['verification'][0]['from_time']) && $data['verification'][0]['from_time']=='4:30AM'?'selected':'')}}>4:30AM</option>
                                                    <option value="5:00AM"{{(isset($data['verification'][0]['from_time']) && $data['verification'][0]['from_time']=='5:00AM'?'selected':'')}}>5:00AM</option>
                                                    <option value="5:30AM"{{(isset($data['verification'][0]['from_time']) && $data['verification'][0]['from_time']=='5:30AM'?'selected':'')}}>5:30AM</option>
                                                    <option value="6:00AM"{{(isset($data['verification'][0]['from_time']) && $data['verification'][0]['from_time']=='6:00AM'?'selected':'')}}>6:00AM</option>
                                                    <option value="6:30AM"{{(isset($data['verification'][0]['from_time']) && $data['verification'][0]['from_time']=='6:30AM'?'selected':'')}}>6:30AM</option>
                                                    <option value="7:00AM"{{(isset($data['verification'][0]['from_time']) && $data['verification'][0]['from_time']=='7:00AM'?'selected':'')}}>7:00AM</option>
                                                    <option value="7:30AM"{{(isset($data['verification'][0]['from_time']) && $data['verification'][0]['from_time']=='7:30AM'?'selected':'')}}>7:30AM</option>
                                                    <option value="8:00AM"{{(isset($data['verification'][0]['from_time']) && $data['verification'][0]['from_time']=='8:00AM'?'selected':'')}}>8:00AM</option>
                                                    <option value="8:30AM"{{(isset($data['verification'][0]['from_time']) && $data['verification'][0]['from_time']=='8:30AM'?'selected':'')}}>8:30AM</option>
                                                    <option value="9:00AM"{{(isset($data['verification'][0]['from_time']) && $data['verification'][0]['from_time']=='9:00AM'?'selected':'')}}>9:00AM</option>
                                                    <option value="9:30AM"{{(isset($data['verification'][0]['from_time']) && $data['verification'][0]['from_time']=='9:30AM'?'selected':'')}}>9:30AM</option>
                                                    <option value="10:00AM"{{(isset($data['verification'][0]['from_time']) && $data['verification'][0]['from_time']=='10:00AM'?'selected':'')}}>10:00AM</option>
                                                    <option value="10:30AM"{{(isset($data['verification'][0]['from_time']) && $data['verification'][0]['from_time']=='10:30AM'?'selected':'')}}>10:30AM</option>
                                                    <option value="11:00AM"{{(isset($data['verification'][0]['from_time']) && $data['verification'][0]['from_time']=='11:00AM'?'selected':'')}}>11:00AM</option>
                                                    <option value="11:30AM"{{(isset($data['verification'][0]['from_time']) && $data['verification'][0]['from_time']=='11:30AM'?'selected':'')}}>11:30AM</option>
                                                    <option value="12:00PM"{{(isset($data['verification'][0]['from_time']) && $data['verification'][0]['from_time']=='12:00PM'?'selected':'')}}>12:00PM</option>
                                                    <option value="12:30PM"{{(isset($data['verification'][0]['from_time']) && $data['verification'][0]['from_time']=='12:30PM'?'selected':'')}}>12:30PM</option>
                                                    <option value="1:00PM"{{(isset($data['verification'][0]['from_time']) && $data['verification'][0]['from_time']=='1:00PM'?'selected':'')}}>1:00PM</option>
                                                    <option value="1:30PM"{{(isset($data['verification'][0]['from_time']) && $data['verification'][0]['from_time']=='1:30PM'?'selected':'')}}>1:30PM</option>
                                                    <option value="2:00PM"{{(isset($data['verification'][0]['from_time']) && $data['verification'][0]['from_time']=='2:00PM'?'selected':'')}}>2:00PM</option>
                                                    <option value="2:30PM"{{(isset($data['verification'][0]['from_time']) && $data['verification'][0]['from_time']=='2:30PM'?'selected':'')}}>2:30PM</option>

                                                     <option value="3:00PM"{{(isset($data['verification'][0]['from_time']) && $data['verification'][0]['from_time']=='3:00PM'?'selected':'')}}>3:00PM</option>
                                                   <option {{(isset($data['inspection'][0]['from_time']) && $data['verification'][0]['from_time']=='3:30PM'?'selected':'')}} value="3:30PM">3:30PM</option>
                                                        <option {{(isset($data['verification'][0]['from_time']) && $data['verification'][0]['from_time']=='4:00PM'?'selected':'')}} value="4:00PM">4:00PM</option>
                                                        <option {{(isset($data['verification'][0]['from_time']) && $data['verification'][0]['from_time']=='4:30PM'?'selected':'')}} value="4:30PM">4:30PM</option>
                                                        <option {{(isset($data['verification'][0]['from_time']) && $data['verification'][0]['from_time']=='5:00PM'?'selected':'')}} value="5:00PM">5:00PM</option>
                                                        <option {{(isset($data['verification'][0]['from_time']) && $data['verification'][0]['from_time']=='5:30PM'?'selected':'')}} value="5:30PM">5:30PM</option>
                                                        <option {{(isset($data['verification'][0]['from_time']) && $data['verification'][0]['from_time']=='6:00PM'?'selected':'')}} value="6:00PM">6:00PM</option>
                                                        <option {{(isset($data['verification'][0]['from_time']) && $data['verification'][0]['from_time']=='6:30PM'?'selected':'')}} value="6:30PM">6:30PM</option>
                                                        <option {{(isset($data['verification'][0]['from_time']) && $data['verification'][0]['from_time']=='7:00PM'?'selected':'')}} value="7:00PM">7:00PM</option>
                                                        <option {{(isset($data['verification'][0]['from_time']) && $data['verification'][0]['from_time']=='7:30PM'?'selected':'')}} value="7:30PM">7:30PM</option>
                                                        <option {{(isset($data['verification'][0]['from_time']) && $data['verification'][0]['from_time']=='8:00PM'?'selected':'')}} value="8:00PM">8:00PM</option>
                                                        <option {{(isset($data['verification'][0]['from_time']) && $data['verification'][0]['from_time']=='8:30PM'?'selected':'')}} value="8:30PM">8:30PM</option>
                                                        <option {{(isset($data['verification'][0]['from_time']) && $data['verification'][0]['from_time']=='9:00PM'?'selected':'')}} value="9:00PM">9:00PM</option>
                                                        <option {{(isset($data['verification'][0]['from_time']) && $data['verification'][0]['from_time']=='9:30PM'?'selected':'')}} value="9:30PM">9:30PM</option>
                                                        <option {{(isset($data['verification'][0]['from_time']) && $data['verification'][0]['from_time']=='10:00PM'?'selected':'')}} value="10:00PM">10:00PM</option>
                                                        <option {{(isset($data['verification'][0]['from_time']) && $data['verification'][0]['from_time']=='10:30PM'?'selected':'')}} value="10:30PM">10:30PM</option>
                                                        <option {{(isset($data['verification'][0]['from_time']) && $data['verification'][0]['from_time']=='11:00PM'?'selected':'')}} value="11:00PM">11:00PM</option>
                                                        <option {{(isset($data['verification'][0]['from_time']) && $data['verification'][0]['from_time']=='11:30PM'?'selected':'')}} value="11:30PM">11:30PM</option>
                                                    

                                                
                                                    </select>                                                  </div>
                                                    <div class="form-group">
                                                <label></label>
                                                <select type="text" name="to_time" id="to_time" class="form-control" placeholder="to">
                                            
                                                    <option value="">To</option>
                                                   
                                                     <option {{(isset($data['verification'][0]['to_time']) && $data['verification'][0]['to_time']=='12:00AM'?'selected':'')}} value="12:00AM">12:00AM</option>
                                                        <option {{(isset($data['verification'][0]['to_time']) && $data['verification'][0]['to_time']=='12:30AM'?'selected':'')}} value="12:30AM">12:30AM</option>
                                                        <option {{(isset($data['verification'][0]['to_time']) && $data['verification'][0]['to_time']=='1:00AM'?'selected':'')}} value="1:00AM">1:00AM</option>
                                                        <option {{(isset($data['verification'][0]['to_time']) && $data['verification'][0]['to_time']=='1:30AM'?'selected':'')}} value="1:30AM">1:30AM</option>
                                                        <option {{(isset($data['verification'][0]['to_time']) && $data['verification'][0]['to_time']=='2:00AM'?'selected':'')}} value="2:00AM">2:00AM</option>
                                                        <option {{(isset($data['verification'][0]['to_time']) && $data['verification'][0]['to_time']=='2:30AM'?'selected':'')}} value="2:30AM">2:30AM</option>
                                                        <option {{(isset($data['verification'][0]['to_time']) && $data['verification'][0]['to_time']=='3:00AM'?'selected':'')}} value="3:00AM">3:00AM</option>
                                                        <option {{(isset($data['verification'][0]['to_time']) && $data['verification'][0]['to_time']=='3:30AM'?'selected':'')}} value="3:30AM">3:30AM</option>
                                                        <option {{(isset($data['verification'][0]['to_time']) && $data['verification'][0]['to_time']=='4:00AM'?'selected':'')}} value="4:00AM">4:00AM</option>
                                                        <option {{(isset($data['verification'][0]['to_time']) && $data['verification'][0]['to_time']=='4:30AM'?'selected':'')}} value="4:30AM">4:30AM</option>
                                                        <option {{(isset($data['verification'][0]['to_time']) && $data['verification'][0]['to_time']=='5:00AM'?'selected':'')}} value="5:00AM">5:00AM</option>
                                                        <option {{(isset($data['verification'][0]['to_time']) && $data['verification'][0]['to_time']=='5:30AM'?'selected':'')}} value="5:30AM">5:30AM</option>
                                                        <option {{(isset($data['verification'][0]['to_time']) && $data['verification'][0]['to_time']=='6:00AM'?'selected':'')}} value="6:00AM">6:00AM</option>
                                                        <option {{(isset($data['verification'][0]['to_time']) && $data['verification'][0]['to_time']=='6:30AM'?'selected':'')}} value="6:30AM">6:30AM</option>
                                                        <option {{(isset($data['verification'][0]['to_time']) && $data['verification'][0]['to_time']=='7:00AM'?'selected':'')}} value="7:00AM">7:00AM</option>
                                                        <option {{(isset($data['verification'][0]['to_time']) && $data['verification'][0]['to_time']=='7:30AM'?'selected':'')}} value="7:30AM">7:30AM</option>
                                                        <option {{(isset($data['verification'][0]['to_time']) && $data['verification'][0]['to_time']=='8:00AM'?'selected':'')}} value="8:00AM">8:00AM</option>
                                                        <option {{(isset($data['verification'][0]['to_time']) && $data['verification'][0]['to_time']=='8:30AM'?'selected':'')}} value="8:30AM">8:30AM</option>
                                                        <option {{(isset($data['verification'][0]['to_time']) && $data['verification'][0]['to_time']=='9:00AM'?'selected':'')}} value="9:00AM">9:00AM</option>
                                                        <option {{(isset($data['verification'][0]['to_time']) && $data['verification'][0]['to_time']=='9:30AM'?'selected':'')}} value="9:30AM">9:30AM</option>
                                                        <option {{(isset($data['verification'][0]['to_time']) && $data['verification'][0]['to_time']=='10:00AM'?'selected':'')}} value="10:00AM">10:00AM</option>
                                                        <option {{(isset($data['verification'][0]['to_time']) && $data['verification'][0]['to_time']=='10:30AM'?'selected':'')}} value="10:30AM">10:30AM</option>
                                                        <option {{(isset($data['verification'][0]['to_time']) && $data['verification'][0]['to_time']=='11:00AM'?'selected':'')}} value="11:00AM">11:00AM</option>
                                                        <option {{(isset($data['verification'][0]['to_time']) && $data['verification'][0]['to_time']=='11:30AM'?'selected':'')}} value="11:30AM">11:30AM</option>
                                                        <option {{(isset($data['verification'][0]['to_time']) && $data['verification'][0]['to_time']=='12:00AM'?'selected':'')}} value="12:00PM">12:00PM</option>
                                                        <option {{(isset($data['verification'][0]['to_time']) && $data['verification'][0]['to_time']=='12:30PM'?'selected':'')}} value="12:30PM">12:30PM</option>
                                                        <option {{(isset($data['verification'][0]['to_time']) && $data['verification'][0]['to_time']=='1:00PM'?'selected':'')}} value="1:00PM">1:00PM</option>
                                                        <option {{(isset($data['verification'][0]['to_time']) && $data['verification'][0]['to_time']=='1:30PM'?'selected':'')}} value="1:30PM">1:30PM</option>
                                                        <option {{(isset($data['verification'][0]['to_time']) && $data['verification'][0]['to_time']=='2:00PM'?'selected':'')}} value="2:00PM">2:00PM</option>
                                                        <option {{(isset($data['verification'][0]['to_time']) && $data['verification'][0]['to_time']=='2:30PM'?'selected':'')}} value="2:30PM">2:30PM</option>
                                                        <option {{(isset($data['verification'][0]['to_time']) && $data['verification'][0]['to_time']=='3:00PM'?'selected':'')}} value="3:00PM">3:00PM</option>
                                                        <option {{(isset($data['verification'][0]['to_time']) && $data['verification'][0]['to_time']=='3:30PM'?'selected':'')}} value="3:30PM">3:30PM</option>
                                                        <option {{(isset($data['verification'][0]['to_time']) && $data['verification'][0]['to_time']=='4:00PM'?'selected':'')}} value="4:00PM">4:00PM</option>
                                                        <option {{(isset($data['verification'][0]['to_time']) && $data['verification'][0]['to_time']=='4:30PM'?'selected':'')}} value="4:30PM">4:30PM</option>
                                                        <option {{(isset($data['verification'][0]['to_time']) && $data['verification'][0]['to_time']=='5:00PM'?'selected':'')}} value="5:00PM">5:00PM</option>
                                                        <option {{(isset($data['verification'][0]['to_time']) && $data['verification'][0]['to_time']=='5:30PM'?'selected':'')}} value="5:30PM">5:30PM</option>
                                                        <option {{(isset($data['verification'][0]['to_time']) && $data['verification'][0]['to_time']=='6:00PM'?'selected':'')}} value="6:00PM">6:00PM</option>
                                                        <option {{(isset($data['verification'][0]['to_time']) && $data['verification'][0]['to_time']=='6:30PM'?'selected':'')}} value="6:30PM">6:30PM</option>
                                                        <option {{(isset($data['verification'][0]['to_time']) && $data['verification'][0]['to_time']=='7:00PM'?'selected':'')}} value="7:00PM">7:00PM</option>
                                                        <option {{(isset($data['verification'][0]['to_time']) && $data['verification'][0]['to_time']=='7:30PM'?'selected':'')}} value="7:30PM">7:30PM</option>
                                                        <option {{(isset($data['verification'][0]['to_time']) && $data['verification'][0]['to_time']=='8:00PM'?'selected':'')}} value="8:00PM">8:00PM</option>
                                                        <option {{(isset($data['verification'][0]['to_time']) && $data['verification'][0]['to_time']=='8:30PM'?'selected':'')}} value="8:30PM">8:30PM</option>
                                                        <option {{(isset($data['verification'][0]['to_time']) && $data['verification'][0]['to_time']=='9:00PM'?'selected':'')}} value="9:00PM">9:00PM</option>
                                                        <option {{(isset($data['verification'][0]['to_time']) && $data['verification'][0]['to_time']=='9:30PM'?'selected':'')}} value="9:30PM">9:30PM</option>
                                                        <option {{(isset($data['verification'][0]['to_time']) && $data['verification'][0]['to_time']=='10:00PM'?'selected':'')}} value="10:00PM">10:00PM</option>
                                                        <option {{(isset($data['verification'][0]['to_time']) && $data['verification'][0]['to_time']=='10:30PM'?'selected':'')}} value="10:30PM">10:30PM</option>
                                                        <option {{(isset($data['verification'][0]['to_time']) && $data['verification'][0]['to_time']=='11:00PM'?'selected':'')}} value="11:00PM">11:00PM</option>
                                                        <option {{(isset($data['verification'][0]['to_time']) && $data['verification'][0]['to_time']=='11:30PM'?'selected':'')}} value="11:30PM">11:30PM</option>
                                                    </select>                                                  </div>
                                                <div class="form-group">
                                                <label>revenue target</label>
                                                    <input type="text" name="revenue_target" id="revenue_target" class="form-control"  value="{{old('revenue_target',$data['verification'][0]['revenue_target'] ?? '')}}" placeholder="Revenue Target">
                                                </div>
                                                <div class="form-group">
                                                <label>financial year</label>
                                                    <input type="text" name="financial_year" id="financial_year" class="form-control"  value="{{old('financial_year',$data['verification'][0]['financial_year'] ?? '')}}" placeholder="2020-2021">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                 <div class="form-group">
                                                 <label>verification type</label>
                                                <select type="text" name="master_data_verification" id="master_data_verification" class="form-control" placeholder="Select verification type">
                                            
                                                    <option value="">Select verification type</option>
                                                   
                                                    <option value="original_verification" {{(isset($data['verification'][0]['master_data_verification']) && $data['verification'][0]['master_data_verification']=='original_verification'?'selected':'')}}>Original Verification</option>
                                                    <option value="re_verification"{{(isset($data['verification'][0]['master_data_verification']) && $data['verification'][0]['master_data_verification']=='re_verification'?'selected':'')}}>Re Verification</option>
                                                    
                                                    </select>                                                  </div>
                                                <div class="form-group">
                                                <label>nature</label>
                                                <select type="text" name="nature" id="nature" class="form-control" placeholder="Select nature">
                                            
                                                    <option value="">Select nature </option>
                                                   
                                                    <option value="camp"{{(isset($data['verification'][0]['nature']) && $data['verification'][0]['nature']=='camp'?'selected':'')}}>camp</option>
                                                    <option value="insitu" {{(isset($data['verification'][0]['nature']) && $data['verification'][0]['nature']=='insitu'?'selected':'')}}>Insitu</option>
                                                    
                                                    </select>                                                  </div>
                                                <div class="form-group" id=camp_div>
                                                <label>camp</label>
                                                    <input type="text" name="place" id="place" class="form-control"  value="{{old('place',$data['verification'][0]['place'] ?? '')}}" placeholder="camp">
                                                </div>

                                                <div class="form-group" id="veh_used_div">
                                                <label>vehicle used</label>
                                                <select type="text" name="vehicle_used" id="vehicle_used" class="form-control" placeholder="vehicle used">
                                            
                                                    <option value="">vehicle used </option>
                                                   
                                                    <option value="yes" {{(isset($data['verification'][0]['vehicle_used']) && $data['verification'][0]['vehicle_used']=='yes'?'selected':'')}}>Yes</option>
                                                    <option value="no" {{(isset($data['verification'][0]['vehicle_used']) && $data['verification'][0]['vehicle_used']=='no'?'selected':'')}}>No</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id=veh_id_div>
                                                <label>Vehicle Number</label>
                                                <select type="text" name="vehicle_id" id="vehicle_id" class="form-control" >
                                            
                                                    <option value="">vehicle number </option>
                                                   @foreach ($data['vehicles'] as $vehicle)
                                                        <option value="{{$vehicle['id']}}"
                                                         {{(isset($data['verification'][0]['vehicle_id']) && $data['verification'][0]['vehicle_id']==$vehicle['id'])?'selected':''}}>{{$vehicle['register_number']}}
                                                     </option>
                                                        @endforeach
                                                    </select>                                                  </div>
                                            </div>
                                            <div class="col-lg-4">
                                                 <div class="form-group">
                                                 <label>instruments verified</label>
                                                <select type="text" name="instruments_verified" id="instruments_verified" class="form-control" placeholder="instruments verified">
                                            
                                                    <option value="">Instruments Verified</option>
                                                   
                                                    <option value="iron_weights_parellelopiped" {{(isset($data['verification'][0]['instruments_verified']) && $data['verification'][0]['instruments_verified']=='iron_weights_parellelopiped'?'selected':'')}}>Iron Weights Parellelopiped</option>
                                                    <option value="iron_weights_hexagonal"  {{(isset($data['verification'][0]['instruments_verified']) && $data['verification'][0]['instruments_verified']=='iron_weights_hexagonal'?'selected':'')}}>Iron Weights Hexagonal</option>
                                                    <option value="bullion_weights"  {{(isset($data['verification'][0]['instruments_verified']) && $data['verification'][0]['instruments_verified']=='bullion_weights'?'selected':'')}}>Bullion Weights</option>
                                                    <option value="sheet_metal_weights"  {{(isset($data['verification'][0]['instruments_verified']) && $data['verification'][0]['instruments_verified']=='sheet_metal_weights'?'selected':'')}}>Sheet Metal Weights</option>
                                                    <option value="cylinderical_knob_type_weights"  {{(isset($data['verification'][0]['instruments_verified']) && $data['verification'][0]['instruments_verified']=='cylinderical_knob_type_weights'?'selected':'')}}>Cylinderical Knob Type Weights</option>
                                                    <option value="carat_weights"  {{(isset($data['verification'][0]['instruments_verified']) && $data['verification'][0]['instruments_verified']=='carat_weights'?'selected':'')}}>Carat Weights</option>
                                                    <option value="fuel_dispensor" {{(isset($data['verification'][0]['instruments_verified']) && $data['verification'][0]['instruments_verified']=='fuel_dispensor'?'selected':'')}}>Fuel Dispensor</option>
                                                    
                                                    
                                                    </select>                                                  </div>
                                                <div class="form-group">
                                                <label>no. of instruments verified</label>
                                                    <input type="text" name="no_of_instruments_verified" id="no_of_instruments_verified" class="form-control"  value="{{old('no_of_instruments_verified',$data['verification'][0]['no_of_instruments_verified'] ?? '')}}" placeholder="No of Instruments ">
                                                </div>
                                                <div class="form-group">
                                                <label>instruments rejected</label>
                                                <select type="text" name="instruments_rejected" id="instruments_rejected" class="form-control" placeholder="instruments rejected">
                                            
                                                    
                                                    <option value="iron_weights_parellelopiped" {{(isset($data['verification'][0]['instruments_rejected']) && $data['verification'][0]['instruments_rejected']=='iron_weights_parellelopiped'?'selected':'')}}>Iron Weights Parellelopiped</option>
                                                    <option value="iron_weights_hexagonal"  {{(isset($data['verification'][0]['instruments_rejected']) && $data['verification'][0]['instruments_rejected']=='iron_weights_hexagonal'?'selected':'')}}>Iron Weights Hexagonal</option>
                                                    <option value="bullion_weights"  {{(isset($data['verification'][0]['instruments_rejected']) && $data['verification'][0]['instruments_rejected']=='bullion_weights'?'selected':'')}}>Bullion Weights</option>
                                                    <option value="sheet_metal_weights"  {{(isset($data['verification'][0]['instruments_rejected']) && $data['verification'][0]['instruments_rejected']=='sheet_metal_weights'?'selected':'')}}>Sheet Metal Weights</option>
                                                    <option value="cylinderical_knob_type_weights"  {{(isset($data['verification'][0]['instruments_rejected']) && $data['verification'][0]['instruments_rejected']=='cylinderical_knob_type_weights'?'selected':'')}}>Cylinderical Knob Type Weights</option>
                                                    <option value="carat_weights"  {{(isset($data['verification'][0]['instruments_rejected']) && $data['verification'][0]['instruments_rejected']=='carat_weights'?'selected':'')}}>Carat Weights</option>
                                                    <option value="fuel_dispensor" {{(isset($data['verification'][0]['instruments_rejected']) && $data['verification'][0]['instruments_rejected']=='fuel_dispensor'?'selected':'')}}>Fuel Dispensor</option>
                                                    
                                                    </select>                                                  </div>
                                                <div class="form-group">
                                                <label>no. of instruments rejected</label>
                                                    <input type="text" name="no_of_instruments_rejected" id="countof_instruments_rejected" class="form-control"  value="{{old('no_of_instruments_rejected',$data['verification'][0]['no_of_instruments_rejected'] ?? '')}}" placeholder="No of Instruments ">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                 <div class="form-group">
                                                 <label>no of users (no of verification certificates issued)</label>
                                                    <input type="text" name="no_of_users" id="no_of_users" class="form-control" value="{{old('no_of_users',$data['verification'][0]['no_of_users'] ?? '')}}"  placeholder="Number of Users  ">
                                                    <!-- <p class="help-block">Example block-level help text here.</p> -->
                                                </div>
                                                <div class="form-group">
                                                 <label>verification fee(AUTO)</label>
                                                    <input type="text" name="verification_fee_auto" id="verification_fee_auto" class="form-control" value="{{old('verification_fee_auto',$data['verification'][0]['verification_fee_auto'] ?? '')}}"   placeholder="Verification Fee  ">
                                                    <!-- <p class="help-block">Example block-level help text here.</p> -->
                                                </div>
                                                <div class="form-group">
                                                <label>verification fee(OTHERS)</label>
                                                    <input type="text" name="verification_fee_others" id="verification_fee_others" class="form-control" value="{{old('verification_fee_others',$data['verification'][0]['verification_fee_others'] ?? '')}}"  placeholder="Verification Fee  ">
                                                    <!-- <p class="help-block">Example block-level help text here.</p> -->
                                                </div>
                                                <div class="form-group">
                                                <label>additional fee(AUTO)</label>
                                                    <input type="text" name="additional_fee_auto" id="additional_fee_auto" class="form-control" value="{{old('additional_fee_auto',$data['verification'][0]['additional_fee_auto'] ?? '')}}" placeholder="Additional Fee  ">
                                                    <!-- <p class="help-block">Example block-level help text here.</p> -->
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                 <div class="form-group">
                                                 <label>additional fee(OTHERS)</label>
                                                    <input type="text" name="additional_fee_others" id="additional_fee_others" class="form-control" value="{{old('additional_fee_others',$data['verification'][0]['additional_fee_others'] ?? '')}}" placeholder="Additional Fee Others  ">
                                                    <!-- <p class="help-block">Example block-level help text here.</p> -->
                                                </div>
                                                <div class="form-group">
                                                 <label>adjustment charge</label>
                                                    <input type="text" name="adjustment_charge" id="adjustment_charge" class="form-control" value="{{old('adjustment_charge',$data['verification'][0]['adjustment_charge'] ?? '')}}" placeholder=" Adjustment Charge">
                                                    <!-- <p class="help-block">Example block-level help text here.</p> -->
                                                </div>
                                                <div class="form-group">
                                                <label>user fee</label>
                                                    <input type="text" name="user_fee" id="user_fee" class="form-control" value="{{old('user_fee',$data['verification'][0]['user_fee'] ?? '')}}"   placeholder="User Fee  ">
                                                    <!-- <p class="help-block">Example block-level help text here.</p> -->
                                                </div>
                                                <div class="form-group">
                                                <label>miscellaneous fee</label>

                                                    <input type="text" name="miscellaneous_fee" id="miscellaneous_fee" class="form-control" value="{{old('miscellaneous_fee',$data['verification'][0]['miscellaneous_fee'] ?? '')}}"  placeholder="Miscellancous Fee  ">
                                                    <!-- <p class="help-block">Example block-level help text here.</p> -->
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                 <div class="form-group">
                                                 <label> </label>
                                                    <input type="text" name="details" id="details" class="form-control" value="{{old('details',$data['verification'][0]['details'] ?? '')}}"   placeholder="VerificationDetails  ">
                                                    <!-- <p class="help-block">Example block-level help text here.</p> -->
                                                </div>
                                                <div class="form-group">
                                                 <label> no of cases</label>
                                                    <input type="text" name="no_of_cases" id="no_of_cases" class="form-control" value="{{old('no_of_cases',$data['verification'][0]['no_of_cases'] ?? '')}}"  placeholder=" No of Cases">
                                                    <!-- <p class="help-block">Example block-level help text here.</p> -->
                                                </div>
                                                <div class="form-group">
                                                <label>amount</label>
                                                    <input type="text" name="case_amount" id="case_amount" class="form-control" value="{{old('case_amount',$data['verification'][0]['case_amount'] ?? '')}}" placeholder="Case amount  ">
                                                    <!-- <p class="help-block">Example block-level help text here.</p> -->
                                                </div>
                                            </div>
                                            <div class="form-group">

                                                <button type="submit" class="btn btn-primary">Save</button>
                                                <!-- <button type="reset" class="btn btn-default">Reset Form</button> -->
                                                <div>
                                           
                                        </form>
                                    </div>
                                </div>
                        <!-- </div> -->
                    </div>
                </div>   
            </div> 
         </div>
</div>

<script> 
$('.date').datepicker({
  multidate: false,
    format: 'dd-mm-yyyy'
});

 $('#camp_div').css('display','none');
       $('#veh_used_div').css('display','none');
       $('#veh_id_div').css('display','none');

@if(isset($data['verification'][0]['nature']) && 
        ( $data['verification'][0]['nature']=='camp') )
       $('#camp_div').css('display','block');
      
    @else
       $('#camp_div').css('display','none');
       $('#veh_used_div').css('display','block');
       $('#veh_id_div').css('display','block');
     @endif



    $(document).on('change','#nature',function(){
        var nature=$(this).val(); 
        if(nature == 'camp'){
           $('#camp_div').css('display','block');
        }else{
            $('#camp_div').css('display','none');
            $('#veh_used_div').css('display','block');

        } 
    });

    $(document).on('change','#vehicle_used',function(){
      
        var vehicle_used=$(this).val(); 
        if(vehicle_used=='yes'){
          $('#veh_id_div').css('display','block');
        } else { 
         $('#veh_id_div').css('display','none');
     }
    });

</script>
@endsection