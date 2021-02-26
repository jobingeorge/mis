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
                                    <!-- end display form validation errors -->
                                         @if(isset($data['formType']) && $data['formType']=='create')
                                         <form role="form" action="{{route('md-verification.store')}}" id="userCreateForm" name="mdVerificationForm" method="POST" class="row">
                                          @csrf
                                         @endif
                                        @if(isset($data['formType']) && $data['formType']=='show')
                                         <form role="form" action="#" id="mdVerificationForm" name="userCreateForm" method="POST" class="row">
                                         @csrf
                                         @endif
                                           <div class="col-lg-4">
                                                <div class="form-group">
                                                <p>Select  date</p>
                                                <input type="text" class="form-control date" name='date' id='date' placeholder="Date">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                            <div class="form-group">
                                                <label>select time</label>
                                                <select type="text" name="from_time" id="from_time" class="form-control" placeholder="from">
                                            
                                                    <option value="">From </option>
                                                   
                                                    <option value="12:00AM">12:00AM</option>
                                                    <option value="12:30AM">12:30AM</option>
                                                    <option value="1:00AM">1:00AM</option>
                                                    <option value="1:30AM">1:30AM</option>
                                                    <option value="2:00AM">2:00AM</option>
                                                    <option value="2:30AM">2:30AM</option>
                                                    <option value="3:00AM">3:00AM</option>
                                                    <option value="3:30AM">3:30AM</option>
                                                    <option value="4:00AM">4:00AM</option>
                                                    <option value="4:30AM">4:30AM</option>
                                                    <option value="5:00AM">5:00AM</option>
                                                    <option value="5:30AM">5:30AM</option>
                                                    <option value="6:00AM">6:00AM</option>
                                                    <option value="6:30AM">6:30AM</option>
                                                    <option value="7:00AM">7:00AM</option>
                                                    <option value="7:30AM">7:30AM</option>
                                                    <option value="8:00AM">8:00AM</option>
                                                    <option value="8:30AM">8:30AM</option>
                                                    <option value="9:00AM">9:00AM</option>
                                                    <option value="9:30AM">9:30AM</option>
                                                    <option value="10:00AM">10:00AM</option>
                                                    <option value="10:30AM">10:30AM</option>
                                                    <option value="11:00AM">11:00AM</option>
                                                    <option value="11:30AM">11:30AM</option>
                                                    <option value="12:00PM">12:00PM</option>
                                                    <option value="12:30PM">12:30PM</option>
                                                    <option value="1:00PM">1:00PM</option>
                                                    <option value="1:30PM">1:30PM</option>
                                                    <option value="2:00PM">2:00PM</option>
                                                    <option value="2:30PM">2:30PM</option>
                                                    <option value="3:00PM">3:00PM</option>
                                                    <option value="3:30PM">3:30PM</option>
                                                    <option value="4:00PM">4:00PM</option>
                                                    <option value="4:30PM">4:30PM</option>
                                                    <option value="5:00PM">5:00PM</option>
                                                    <option value="5:30PM">5:30PM</option>
                                                    <option value="6:00PM">6:00PM</option>
                                                    <option value="6:30PM">6:30PM</option>
                                                    <option value="7:00PM">7:00PM</option>
                                                    <option value="7:30PM">7:30PM</option>
                                                    <option value="8:00PM">8:00PM</option>
                                                    <option value="8:30PM">8:30PM</option>
                                                    <option value="9:00PM">9:00PM</option>
                                                    <option value="9:30PM">9:30PM</option>
                                                    <option value="10:00PM">10:00PM</option>
                                                    <option value="10:30PM">10:30PM</option>
                                                    <option value="11:00PM">11:00PM</option>
                                                    <option value="11:30PM">11:30PM</option>
                                                    

                                                
                                                    </select>                                                  </div>
                                                    <div class="form-group">
                                                <label></label>
                                                <select type="text" name="to_time" id="to_time" class="form-control" placeholder="to">
                                            
                                                    <option value="">To</option>
                                                   
                                                    <option value="12:00AM">12:00AM</option>
                                                    <option value="12:30AM">12:30AM</option>
                                                    <option value="1:00AM">1:00AM</option>
                                                    <option value="1:30AM">1:30AM</option>
                                                    <option value="2:00AM">2:00AM</option>
                                                    <option value="2:30AM">2:30AM</option>
                                                    <option value="3:00AM">3:00AM</option>
                                                    <option value="3:30AM">3:30AM</option>
                                                    <option value="4:00AM">4:00AM</option>
                                                    <option value="4:30AM">4:30AM</option>
                                                    <option value="5:00AM">5:00AM</option>
                                                    <option value="5:30AM">5:30AM</option>
                                                    <option value="6:00AM">6:00AM</option>
                                                    <option value="6:30AM">6:30AM</option>
                                                    <option value="7:00AM">7:00AM</option>
                                                    <option value="7:30AM">7:30AM</option>
                                                    <option value="8:00AM">8:00AM</option>
                                                    <option value="8:30AM">8:30AM</option>
                                                    <option value="9:00AM">9:00AM</option>
                                                    <option value="9:30AM">9:30AM</option>
                                                    <option value="10:00AM">10:00AM</option>
                                                    <option value="10:30AM">10:30AM</option>
                                                    <option value="11:00AM">11:00AM</option>
                                                    <option value="11:30AM">11:30AM</option>
                                                    <option value="12:00PM">12:00PM</option>
                                                    <option value="12:30PM">12:30PM</option>
                                                    <option value="1:00PM">1:00PM</option>
                                                    <option value="1:30PM">1:30PM</option>
                                                    <option value="2:00PM">2:00PM</option>
                                                    <option value="2:30PM">2:30PM</option>
                                                    <option value="3:00PM">3:00PM</option>
                                                    <option value="3:30PM">3:30PM</option>
                                                    <option value="4:00PM">4:00PM</option>
                                                    <option value="4:30PM">4:30PM</option>
                                                    <option value="5:00PM">5:00PM</option>
                                                    <option value="5:30PM">5:30PM</option>
                                                    <option value="6:00PM">6:00PM</option>
                                                    <option value="6:30PM">6:30PM</option>
                                                    <option value="7:00PM">7:00PM</option>
                                                    <option value="7:30PM">7:30PM</option>
                                                    <option value="8:00PM">8:00PM</option>
                                                    <option value="8:30PM">8:30PM</option>
                                                    <option value="9:00PM">9:00PM</option>
                                                    <option value="9:30PM">9:30PM</option>
                                                    <option value="10:00PM">10:00PM</option>
                                                    <option value="10:30PM">10:30PM</option>
                                                    <option value="11:00PM">11:00PM</option>
                                                    <option value="11:30PM">11:30PM</option>
                                                    </select>                                                  </div>
                                                <div class="form-group">
                                                <label>revenue target</label>
                                                    <input type="text" name="revenue_target" id="revenue_target" class="form-control"  value="{{old('revenue_target',$data['user'][0]['revenue_target'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}} placeholder="Revenue Target">
                                                </div>
                                                <div class="form-group">
                                                <label>financial year</label>
                                                    <input type="text" name="financial_year" id="financial_year" class="form-control"  value="{{old('financial_year',$data['user'][0]['financial_year'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}} placeholder="2020-2021">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                 <div class="form-group">
                                                 <label>verification type</label>
                                                <select type="text" name="master_data_verification" id="master_data_verification" class="form-control" placeholder="Select verification type">
                                            
                                                    <option value="">Select verification type</option>
                                                   
                                                    <option value="orginal_verification">Orginal Verification</option>
                                                    <option value="re_verification">Re Verification</option>
                                                    
                                                    </select>                                                  </div>
                                                <div class="form-group">
                                                <label>nature</label>
                                                <select type="text" name="nature" id="nature" class="form-control" placeholder="Select nature">
                                            
                                                    <option value="">Select nature </option>
                                                   
                                                    <option value="camp">camp</option>
                                                    <option value="insitu">Insitu</option>
                                                    
                                                    </select>                                                  </div>
                                                <div class="form-group" id=camp_div>
                                                <label>camp</label>
                                                    <input type="text" name="place" id="place" class="form-control"  value="{{old('place',$data['user'][0]['place'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}} placeholder="camp">
                                                </div>

                                                <div class="form-group" id="veh_used_div">
                                                <label>vehicle used</label>
                                                <select type="text" name="vehicle_used" id="vehicle_used" class="form-control" placeholder="vehicle used">
                                            
                                                    <option value="">vehicle used </option>
                                                   
                                                    <option value="yes">Yes</option>
                                                    <option value="no">No</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id=veh_id_div>
                                                <label>Vehicle Number</label>
                                                <select type="text" name="vehicle_id" id="vehicle_id" class="form-control" >
                                                    <option value="">vehicle number </option>   
                                                   @foreach ($data['vehicles'] as $vehicle)
                                                        <option value="{{$vehicle['id']}}">{{$vehicle['register_number']}}
                                                     </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                 <div class="form-group">
                                                 <label>instruments verified</label>
                                                <select type="text" name="instruments_verified" id="instruments_verified" class="form-control" placeholder="instruments verified">
                                            
                                                    <option value="">Instruments Verified</option>
                                                   
                                                    <option value="iron_weights_parellelopiped">Iron Weights Parellelopiped</option>
                                                    <option value="iron_weights_hexagonal">Iron Weights Hexagonal</option>
                                                    <option value="bullion_weights">Bullion Weights</option>
                                                    <option value="sheet_metal_weights">Sheet Metal Weights</option>
                                                    <option value="cyllinderical_knob_type_weights">Cyllinderical Knob Type Weights</option>
                                                    <option value="carat_weights">Carat Weights</option>
                                                    <option value="fuel_dispensor">Fuel Dispensor</option>
                                                    
                                                    
                                                    </select>                                                  </div>
                                                <div class="form-group">
                                                <label>no. of instruments verified</label>
                                                    <input type="text" name="no_of_instruments_verified" id="no_of_instruments_verified" class="form-control"  value="{{old('no_of_instruments_verified',$data['user'][0]['no_of_instruments_verified'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}} placeholder="No of Instruments ">
                                                </div>
                                                <div class="form-group">
                                                <label>instruments rejected</label>
                                                <select type="text" name="instruments_rejected" id="instruments_rejected" class="form-control" placeholder="instruments rejected">
                                            
                                                    <option value="">Instruments Rejected</option>
                                                   
                                                    <option value="iron_weights_parellelopiped">Iron Weights Parellelopiped</option>
                                                    <option value="iron_weights_hexagonal">Iron Weights Hexagonal</option>
                                                    <option value="bullion_weights">Bullion Weights</option>
                                                    <option value="sheet_metal_weights">Sheet Metal Weights</option>
                                                    <option value="cyllinderical_knob_type_weights">Cyllinderical Knob Type Weights</option>
                                                    <option value="carat_weights">Carat Weights</option>
                                                    <option value="fuel_dispensor">Fuel Dispensor</option>
                                                    
                                                    
                                                    </select>                                                  </div>
                                                <div class="form-group">
                                                <label>no. of instruments rejected</label>
                                                    <input type="text" name="no_of_instruments_rejected" id="no_of_instruments_rejected" class="form-control"  value="{{old('no_of_instruments_rejected',$data['user'][0]['no_of_instruments_rejected'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}} placeholder="No of Instruments ">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                 <div class="form-group">
                                                 <label>no of users (no of verification certificates issued)</label>
                                                    <input type="text" name="no_of_users" id="no_of_users" class="form-control" value="{{old('no_of_users',$data['user'][0]['no_of_users'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}}  placeholder="Number of Users  ">
                                                    <!-- <p class="help-block">Example block-level help text here.</p> -->
                                                </div>
                                                <div class="form-group">
                                                 <label>verification fee(AUTO)</label>
                                                    <input type="text" name="verification_fee_auto" id="verification_fee_auto" class="form-control" value="{{old('verification_fee_auto',$data['user'][0]['verification_fee_auto'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}}  placeholder="Verification Fee  ">
                                                    <!-- <p class="help-block">Example block-level help text here.</p> -->
                                                </div>
                                                <div class="form-group">
                                                <label>verification fee(OTHERS)</label>
                                                    <input type="text" name="verification_fee_others" id="verification_fee_others" class="form-control" value="{{old('verification_fee_others',$data['user'][0]['verification_fee_others'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}}  placeholder="Verification Fee  ">
                                                    <!-- <p class="help-block">Example block-level help text here.</p> -->
                                                </div>
                                                <div class="form-group">
                                                <label>additional fee(AUTO)</label>
                                                    <input type="text" name="additional_fee_auto" id="additional_fee_auto" class="form-control" value="{{old('additional_fee_auto',$data['user'][0]['additional_fee_auto'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}}  placeholder="Additional Fee  ">
                                                    <!-- <p class="help-block">Example block-level help text here.</p> -->
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                 <div class="form-group">
                                                 <label>additional fee(OTHERS)</label>
                                                    <input type="text" name="additional_fee_others" id="additional_fee_others" class="form-control" value="{{old('additional_fee_others',$data['user'][0]['additional_fee_others'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}}  placeholder="Additional Fee Others  ">
                                                    <!-- <p class="help-block">Example block-level help text here.</p> -->
                                                </div>
                                                <div class="form-group">
                                                 <label>adjustment charge</label>
                                                    <input type="text" name="adjustment_charge" id="adjustment_charge" class="form-control" value="{{old('adjustment_charge',$data['user'][0]['adjustment_charge'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}}  placeholder=" Adjustment Charge">
                                                    <!-- <p class="help-block">Example block-level help text here.</p> -->
                                                </div>
                                                <div class="form-group">
                                                <label>user fee</label>
                                                    <input type="text" name="user_fee" id="user_fee" class="form-control" value="{{old('user_fee',$data['user'][0]['user_fee'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}}  placeholder="User Fee  ">
                                                    <!-- <p class="help-block">Example block-level help text here.</p> -->
                                                </div>
                                                <div class="form-group">
                                                <label>miscellaneous fee</label>

                                                    <input type="text" name="miscellaneous_fee" id="miscellaneous_fee" class="form-control" value="{{old('miscellaneous_fee',$data['user'][0]['miscellaneous_fee'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}}  placeholder="Miscellenceous Fee  ">
                                                    <!-- <p class="help-block">Example block-level help text here.</p> -->
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                 <div class="form-group">
                                                 <label> </label>
                                                    <input type="text" name="details" id="details" class="form-control" value="{{old('details',$data['user'][0]['details'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}}  placeholder="VerificationDetails  ">
                                                    <!-- <p class="help-block">Example block-level help text here.</p> -->
                                                </div>
                                                <div class="form-group">
                                                 <label> no of cases</label>
                                                    <input type="text" name="no_of_cases" id="no_of_cases" class="form-control" value="{{old('no_of_cases',$data['user'][0]['no_of_cases'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}}  placeholder=" No of Cases">
                                                    <!-- <p class="help-block">Example block-level help text here.</p> -->
                                                </div>
                                                <div class="form-group">
                                                <label>amount</label>
                                                    <input type="text" name="case_amount" id="case_amount" class="form-control" value="{{old('case_amount',$data['user'][0]['case_amount'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}}  placeholder="Case amount  ">
                                                    <!-- <p class="help-block">Example block-level help text here.</p> -->
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                 @if($data['formType']!='show')
                                                <button type="submit" class="btn btn-primary" {{$data['formType']=='show'?'disabled':''}}>Save</button>
                                                @endif
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

    $(document).on('change','#nature',function(){
        var nature=$(this).val(); 
        if(nature == 'camp'){
           $('#camp_div').css('display','block');
           $('#veh_used_div').css('display','none');
            $('#veh_id_div').css('display','none');
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