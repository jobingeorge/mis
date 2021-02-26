<!-- @extends('layouts.app') -->
@section('content')
<div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
            
                     @if(isset($data['formType']) && $data['formType']=='create')
                      <h1 class="page-header">ADD RTI PENALTIES</h1>
                    @endif
                   @if(isset($data['formType']) && $data['formType']=='edit')
                      <h1 class="page-header">EDIT RTI PENALTIES</h1>
                    @endif
                    @if(isset($data['formType']) && $data['formType']=='show')
                      <h1 class="page-header"> VIEW RTI PENALTIES</h1>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                        <div class="panel-group">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                @if(isset($data['formType']) && $data['formType']=='create')
                                  <h5>ADD RTI PENALTIES</h5p>
                                @endif
                                 @if(isset($data['formType']) && $data['formType']=='edit')
                                  <h5>EDIT RTI PENALTIES</h5p>
                                @endif
                                 @if(isset($data['formType']) && $data['formType']=='show')
                                  <h5>VIEW RTI PENALTIES</h5p>
                                @endif
                                </div>
                                <div id="addnewrti" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                    <?php 
                                    // echo "<pre>";
                                    // print_r($data['rti']);
                                     // echo "</pre>";
                                    ?>
                                        @if ($errors->any())
                                        <script> $("#addnewrti").addClass('in');</script>
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
                                         <form role="form" action="{{route('rti-penalty.store')}}" id="rtiPenaltyCreateForm" name="rtiPenaltyCreateForm" method="POST" class="row">
                                          @csrf
                                         @endif
                                         @if(isset($data['formType']) && $data['formType']=='edit')
                                         <form role="form" action="{{route('rti-penalty.update',$data['rti'][0]['id'])}}" id="rtiPenaltyCreateForm" name="rtiPenaltyCreateForm" method="POST" class="row">
                                        @method('PUT')
                                         @csrf
                                         @endif
                                         @if(isset($data['formType']) && $data['formType']=='show')
                                         <form role="form" action="#" id="rtiPenaltyCreateForm" name="rtiPenaltyCreateForm" method="POST" class="row">
                                         @csrf
                                         @endif
                                       
                                            <div class="col-lg-4">
                                                 <div class="form-group">
                                                 
                                                <p>Region</p>
                                                  <select name="region" id="region" class="form-control">
                                                <option value="-1">Please Select Region</option>
                                                @foreach ($data['region'] as $region)
                                                <!-- {{(isset($data[0]['region']) && $data[0]['region']==$region['region_id'])?'selected':''}} -->
                                                <option value="{{$region['region_id']}}" {{(isset($data['rti'][0]['region']) && $data['rti'][0]['region']==$region['region_id'])?'selected':''}}>{{$region['region']}}</option>
                                                @endforeach
                                                 </select>               
                                                 </div>
                                            <div class="form-group">
                                                <p>District</p>
                                                <select type="text" name="district" id="district" class="form-control" placeholder="Select district">
                                                <option value="">Select District</option>
                                                @if(isset($data['rti'][0]['district_name']) && $data['rti'][0]['district_name']!=null)
                                                <option value="{{$data['rti'][0]['district_id']}}" selected>{{$data['rti'][0]['district_name']}}</option>
                                                @endif
                                                </select>                                                
                                            </div>
                                            <div class="form-group">
                                            <p>Office</p>
                                                <select type="text" name="office" id="office" class="form-control" placeholder="Select office">
                                                    <option value="">Select Office</option>
                                                    @if(isset($data['rti'][0]['office_name']) && $data['rti'][0]['office_name']!=null)
                                                     <option value="{{$data['rti'][0]['office_id']}}" selected>{{$data['rti'][0]['office_name']}} </option>
                                                    @endif
                                                </select>                                               
                                            </div> 
                                            <div class="form-group">
                                            <p>Officer name</p>
                                                <select type="text" name="officer_name" id="officer_name" class="form-control" placeholder="Select officer">
                                                    <option value="">Select Office</option>
                                                    @if(isset($data['rti'][0]['officer_name']) && $data['rti'][0]['officer_name']!=null)
                                                     <option value="{{$data['rti'][0]['officer_name']}}" selected>{{$data['rti'][0]['designation']}} {{$data['rti'][0]['user_type_name']}}</option>
                                                    @endif
                                                </select>                                               
                                            </div>
                                            
                                            </div>
                                            <div class="col-lg-4">
                                            <div class="form-group">
                                                <p>Penalty type</p>
                                                <select type="text" name="penalty_type" id="penalty_type" class="form-control" placeholder="Select region">
                                                    <option value="">Select penalty</option>
                                                   
                                                    <option value="penalty for alteration of weight and measure" >Penalty for alteration of weight and measure</option>
                                                    <option value="penalty for use of non-standard weight or measure" >Penalty for use of non-standard weight or measure</option>
                                                    <option value="penalty for failure to get model approved" >Penalty for failure to get model approved</option>
                                                    <option value="penalty for use of unverified weight or measure" >Penalty for use of unverified weight or measure</option>
                                                    <option value="penalty for counterfeiting of seals, et" >Penalty for counterfeiting of seals, et</option>
                                                    </select>                                                
                                                    </div>
                                                 <div class="form-group">
                                                 <p>Date of collection</p>
                                                    <input type="date" name="date_of_collection" id="date_of_collection" class="form-control" value="{{old('date_of_collection',$data['rti'][0]['date_of_collection'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}}  placeholder="Date">
                                                    <!-- <p class="help-block">Example block-level help text here.</p> -->
                                                </div>
                                                <div class="form-group">
                                                <p>Amount collected</p>
                                                    <input type="text" name="total_amount" id="total_amount" class="form-control" value="{{old('total_amount',$data['rti'][0]['total_amount'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}} placeholder="Amount">
                                                </div>
                                                <div class="form-group">
                                                <p>Detail of penalty imposed</p>
                                                    <textarea name="details_penalty_imposed" id="details_penalty_imposed" class="form-control"  value="" {{$data['formType']=='show'?'disabled':''}} placeholder="Detail of penalty imposed">{{old('details_penalty_imposed',$data['rti'][0]['details_penalty_imposed'] ?? '')}}</textarea>
                                                </div>
                                                
                                                
                                            </div>
                                            <div class="col-lg-4">
                                            <div class="form-group">
                                                <p>Penalties imposed in  previous year,pending for</p>
                                                    <input type="text" name="penalty_previous_pending" id="penalty_previous_pending" class="form-control" value="{{old('penalty_previous_pending',$data['rti'][0]['penalty_previous_pending'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}} placeholder="previous">
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
                                                    <input type="date" name="date_replay" id="date_replay" class="form-control" value="{{old('date_replay',$data['rti'][0]['date_replay'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}} placeholder="Date of replay">
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
                                                    <!-- <div class="form-group">
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
                                                    </div> -->
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
 $(document).on('change','#region',function(){
            var region_id   =   $(this).val(); 
            GetDistrict(region_id);
            GetOfficersByRegion(region_id);
        }); 
 $(document).on('change','#district',function(){
            var did=$(this).val(); 
            //alert(officerLevel);
            GetOffice(did);
            GetOfficersByDistrict(did);
        });
 $(document).on('change','#office',function(){
            var oid=$(this).val(); 
            GetOfficersByoffice(oid);
        });        
 function GetDistrict(did){
            var url="{{route('GetDistrict')}}";
            $.ajax({
                url:url,
                type:'GET',
                data : {did:did},
                success: function(res) {
                    $("#district").html(res);
                    $("#district").css('display','block');
                }
            });
        }
  function GetOffice(oid){
            var url="{{route('GetOffice')}}";
            $.ajax({
                url:url,
                type:'GET',
                data : {oid:oid},
                success: function(res) {
                    $("#office").html(res);
                    $("#office").css('display','block');
                }
            });
        } 
  function  GetOfficersByRegion(region_id){
     var url="{{route('GetOfficersByRegion')}}";
            $.ajax({
                url:url,
                type:'GET',
                data : {rid:region_id},
                success: function(res) {
                    $("#officer_name").html(res);
                    $("#officer_name").css('display','block');
                }
            }); 
  } 
  function  GetOfficersByDistrict(district_id){
     var url="{{route('GetOfficersByDistrict')}}";
            $.ajax({
                url:url,
                type:'GET',
                data : {did:district_id},
                success: function(res) {
                    $("#officer_name").html(res);
                    $("#officer_name").css('display','block');
                }
            }); 
  } 
  function  GetOfficersByoffice(office_id){
     var url="{{route('GetOfficersByOffice')}}";
            $.ajax({
                url:url,
                type:'GET',
                data : {oid:office_id},
                success: function(res) {
                    $("#officer_name").html(res);
                    $("#officer_name").css('display','block');
                }
            }); 
  }                 
</script>
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