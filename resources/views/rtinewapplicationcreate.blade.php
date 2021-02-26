<!-- @extends('layouts.app') -->
@section('content')
<div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
            
                     @if(isset($data['formType']) && $data['formType']=='create')
                      <h1 class="page-header">REGISTER NEW RTI APPLICATION</h1>
                    @endif
                   @if(isset($data['formType']) && $data['formType']=='edit')
                      <h1 class="page-header">EDIT RTI APPLICATION</h1>
                    @endif
                    @if(isset($data['formType']) && $data['formType']=='show')
                      <h1 class="page-header"> APPLICATION DETAILS</h1>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                        <div class="panel-group">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                @if(isset($data['formType']) && $data['formType']=='create')
                                  <h5>REGISTER NEW RTI APPLICATION</h5p>
                                @endif
                                 @if(isset($data['formType']) && $data['formType']=='edit')
                                  <h5>EDIT RTI APPLICATION</h5p>
                                @endif
                                 @if(isset($data['formType']) && $data['formType']=='show')
                                  <h5>APPLICATION DETAILS</h5p>
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
                                         <form role="form" action="{{route('rti-new-application.store')}}" id="rtiNewApplication" name="rtiNewApplication" method="POST" class="row">
                                          @csrf
                                         @endif
                                         @if(isset($data['formType']) && $data['formType']=='edit')
                                         <form role="form" action="{{route('rti-new-application.update',$data['rti'][0]['id'])}}" id="rtiNewApplication" name="rtiNewApplication" method="POST" class="row">
                                         @method('PUT')
                                         @csrf
                                         @endif
                                         @if(isset($data['formType']) && $data['formType']=='show')
                                         <form role="form" action="#" id="rtiNewApplication" name="rtiNewApplication" method="POST" class="row">
                                         @csrf
                                         @endif
                                       
                                            <div class="col-lg-4">
                                                 <div class="form-group">
                                                 <p class="help-block">Name of applicant</p>
                                                    <input type="text" name="name_of_aplicant" id="name_of_aplicant" class="form-control" value="{{old('name_of_aplicant',$data['rti'][0]['name_of_aplicant'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}}  placeholder="Name of the applicant">
                                                    
                                                </div>
                                                <div class="form-group">
                                                 <p class="help-block">Address of applicant</p>
                                                    <input type="text" name="address_of_aplicant" id="address_of_aplicant" class="form-control" value="{{old('address_of_aplicant',$data['rti'][0]['address_of_aplicant'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}} placeholder="Enter address of applicant">
                                                </div>
                                                <div class="form-group">
                                                  <p class="help-block">File number</p>       
                                                    <input type="text" name="file_number" id="file_number" class="form-control"  value="{{old('file_number',$data['rti'][0]['file_number'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}} placeholder="Enter file number">
                                                </div>
                                                <div class="form-group">
                                                 <p class="help-block">Mode of reciept</p>  
                                                <select type="text" name="mode_of_receipt" id="mode_of_receipt"  {{$data['formType']=='show'?'disabled':''}} class="form-control" placeholder="Mode of reciept">
                                                    <option value="">Select mode</option>
                                                    <option value="direct" {{(isset($data['rti'][0]['mode_of_receipt']) && $data['rti'][0]['mode_of_receipt'] == "direct")?'selected':''}} >Direct</option>
                                                    <option value="online" {{(isset($data['rti'][0]['mode_of_receipt']) && $data['rti'][0]['mode_of_receipt'] == "online")?'selected':''}} >Online</option>
                                                    </select>
                                                     </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                <p class="help-block">Date of recieptt</p> 
                                                <input type="date" name="date_of_receipt" id="date_of_receipt" class="form-control" value="{{old('date_of_receipt',$data['rti'][0]['date_of_receipt'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}}  placeholder="Date">
                                                <!-- <p class="help-block">Example block-level help text here.</p> -->
                                                </div>
                                                <div class="form-group">
                                                <p class="help-block">Nature of information</p> 
                                                <input type="text" name="nature_of_information" id="nature_of_informationicant" class="form-control" value="{{old('nature_of_information',$data['rti'][0]['nature_of_information'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}} placeholder="nature">
                                                </div>
                                                <div class="form-group">
                                                <p class="help-block">Whether application or any part there of transferred to any other public authority and, if so to whom</p>
                                                <input type="text" name="nature_of_public" id="nature_of_public" class="form-control"  value="{{old('nature_of_public',$data['rti'][0]['nature_of_public'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}} placeholder="">
                                                </div>
                                                <div class="form-group">
                                                <p class="help-block">Status</p>
                                                <select type="text" name="status" onchange="opendiv(this)" id="status" class="form-control" >
                                                <option value="">Select status</option>

                                                <option value="replied" {{(isset($data['rti'][0]['status']) && $data['rti'][0]['status'] == "replied")?'selected':''}}>Replied</option>
                                                <option value="rejected" {{(isset($data['rti'][0]['status']) && $data['rti'][0]['status'] == "rejected")?'selected':''}}>Rejected</option>
                                                <option value="disposed" {{(isset($data['rti'][0]['status']) && $data['rti'][0]['status'] == "disposed")?'selected':''}}>Disposed</option>
                                                </select> 
                                                </div>
                                                 <div id='replied_div'>
                                                    <div class="form-group">
                                                    <p class="help-block">Date of replay</p> 
                                                    <input type="date" name="date_reply" id="date_reply" class="form-control" value="{{old('date_reply',$data['rti'][0]['date_reply'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}} placeholder="Date of replay">
                                                    </div>
                                                    <div class="form-group">
                                                    <p class="help-block">RELEVANT SECTION OF RTI ACT 2005</p>
                                                    <select type="text" name="act" id="act" class="form-control" >
                                                    <option value="">Select</option>
                                                    <option value="section 4" {{(isset($data['rti'][0]['act']) && $data['rti'][0]['act'] == "section 4")?'selected':''}}>section 4</option>
                                                    <option value="section 8" {{(isset($data['rti'][0]['act']) && $data['rti'][0]['act'] == "section 8")?'selected':''}}>section 8</option>
                                                    <option value="section 9" {{(isset($data['rti'][0]['act']) && $data['rti'][0]['act'] == "section 9")?'selected':''}}>section 9</option>
                                                    <option value="section 11" {{(isset($data['rti'][0]['act']) && $data['rti'][0]['act'] == "section 11")?'selected':''}}>section 11</option>
                                                    <option value="section 248" {{(isset($data['rti'][0]['act']) && $data['rti'][0]['act'] == "section 248")?'selected':''}}>section 248</option>
                                                    <option value="section 6(1)" {{(isset($data['rti'][0]['act']) && $data['rti'][0]['act'] == "section 6(1)")?'selected':''}}>section 6(1)</option>
                                                    <option value="section 7(1)" {{(isset($data['rti'][0]['act']) && $data['rti'][0]['act'] == "section 7(1)")?'selected':''}}>section 7(1)</option>
                                                    <option value="section 7(5)" {{(isset($data['rti'][0]['act']) && $data['rti'][0]['act'] == "section 7(5)")?'selected':''}}>section 7(5)</option>        
                                                    </select> 
                                                    </div>
                                                 </div>
                                                 <div id='rejected_div'>
                                                    <div class="form-group">
                                                    <p class="help-block">Date of rejected</p> 
                                                    <input type="date" name="date_rejection" id="date_rejection" class="form-control" value="{{old('date_rejection',$data['rti'][0]['date_rejection'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}} placeholder="Date of rejection">
                                                    </div>
                                                    <div class="form-group">
                                                    <p class="help-block">Reason for rejection</p> 
                                                    <input type="text" name="rejection_reason" id="rejection_reason" class="form-control" value="{{old('rejection_reason',$data['rti'][0]['rejection_reason'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}} placeholder="Rejection reason">
                                                    </div>
                                                    <div class="form-group">
                                                    <p class="help-block">RELEVANT SECTION OF RTI ACT 2005</p>
                                                    <select type="text" name="act" id="act" class="form-control" >
                                                    <option value="">Select</option>
                                                    <option value="section 4" {{(isset($data['rti'][0]['act']) && $data['rti'][0]['act'] == "section 4")?'selected':''}}>section 4</option>
                                                    <option value="section 8" {{(isset($data['rti'][0]['act']) && $data['rti'][0]['act'] == "section 8")?'selected':''}}>section 8</option>
                                                    <option value="section 9" {{(isset($data['rti'][0]['act']) && $data['rti'][0]['act'] == "section 9")?'selected':''}}>section 9</option>
                                                    <option value="section 11" {{(isset($data['rti'][0]['act']) && $data['rti'][0]['act'] == "section 11")?'selected':''}}>section 11</option>
                                                    <option value="section 248" {{(isset($data['rti'][0]['act']) && $data['rti'][0]['act'] == "section 248")?'selected':''}}>section 248</option>
                                                    <option value="section 6(1)" {{(isset($data['rti'][0]['act']) && $data['rti'][0]['act'] == "section 6(1)")?'selected':''}}>section 6(1)</option>
                                                    <option value="section 7(1)" {{(isset($data['rti'][0]['act']) && $data['rti'][0]['act'] == "section 7(1)")?'selected':''}}>section 7(1)</option>
                                                    <option value="section 7(5)" {{(isset($data['rti'][0]['act']) && $data['rti'][0]['act'] == "section 7(5)")?'selected':''}}>section 7(5)</option> 
                                                    </select> 
                                                    </div>
                                                 </div>
                                            </div>
                                            <div class="col-lg-4">
                                                 <div class="form-group">
                                                  <p class="help-block">Amount if any released</p>
                                                 <select type="text" name="amount_released" id="amount_released" class="form-control" >
                                                    <option value="">Select </option>
                                                   
                                                    <option value="cash" {{(isset($data['rti'][0]['amount_released']) && $data['rti'][0]['amount_released'] == "cash")?'selected':''}}>Cash</option>
                                                    <option value="court" {{(isset($data['rti'][0]['amount_released']) && $data['rti'][0]['amount_released'] == "court")?'selected':''}}>Court</option>
                                                    
                                                    </select>                    
                                                </div>
                                                <div class="form-group">
                                                 <p class="help-block">Remarks</p>
                                                    <input type="text" name="remarks" id="remarks" class="form-control" value="{{old('remarks',$data['rti'][0]['remarks'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}} placeholder="Remarks">
                                                </div>
                                                <div class="form-group">
                                                 @if($data['formType']!='show')
                                                <button type="submit" class="btn btn-primary" {{$data['formType']=='show'?'disabled':''}}>Save</button>
                                                @endif
                                                <!-- <button type="reset" class="btn btn-default">Reset Form</button> -->
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
<script>
$("#replied_div").css('display','none');
$("#rejected_div").css('display','none');
@if(isset($data['rti'][0]['status'])  && $data['rti'][0]['status']=='replied' )
$("#replied_div").css('display','block');
$("#rejected_div select").attr('disabled',true);
@endif

@if(isset($data['rti'][0]['status'])  && $data['rti'][0]['status']=='rejected' )
$("#rejected_div").css('display','block');
$("#replied_div select").attr('disabled',true);
@endif

function opendiv(a){
     var x = (a.value || a.options[a.selectedIndex].value);  //crossbrowser solution =)
     if(x && (x=='replied')){
        $("#replied_div").css('display','block');
        $("#replied_div select").attr('disabled',false);
     } else{
       $("#replied_div").css('display','none');
       $("#replied_div select").attr('disabled',true);  
     }

    if(x && (x=='rejected')){
        $("#rejected_div").css('display','block');
        $("#rejected_div select").attr('disabled',false);

     } else{
       $("#rejected_div").css('display','none');  
       $("#rejected_div select").attr('disabled',true);
     }

}
</script>

@endsection