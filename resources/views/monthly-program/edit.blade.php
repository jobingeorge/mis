<!-- @extends('layouts.app') -->
@section('content')
<div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
            
                     <!-- @if(isset($data['formType']) && $data['formType']=='create')
                      <h3 class="page-header">ADD NEW MONTHLY PROGRAM</h3>
                    @endif
                   @if(isset($data['formType']) && $data['formType']=='edit')
                      <h1 class="page-header">EDIT PROGRAM</h1>
                    @endif
                    @if(isset($data['formType']) && $data['formType']=='show')
                      <h1 class="page-header"> VIEW PROGRAM</h1>
                    @endif -->
                          <h1 class="page-header"> VIEW PROGRAM</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                        <div class="panel-group">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                               <!--  @if(isset($data['formType']) && $data['formType']=='create')
                                  <h5>Add new entry</h5p>
                                @endif
                                 @if(isset($data['formType']) && $data['formType']=='edit')
                                  <h5>Edit Officer Details</h5p>
                                @endif
                                 @if(isset($data['formType']) && $data['formType']=='show')
                                  <h5>Officer details</h5p>
                                @endif -->
                                  <h5>Edit Officer Details</h5p>

                                </div>
                                <div id="addnewuser" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                    <?php 
                                    // echo "<pre>";
                                    // print_r($data['monthlyProgram']);
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
                                         <form role="form" action="{{route('monthly-programms.update',$data['monthlyProgram'][0]['id'])}}" id="monthlyProgramForm" name="monthlyProgramForm" method="POST" class="row">
                                        @method('PUT')
                                         @csrf
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                <p>Select  date</p>
                                                <input type="text" class="form-control date" name='date' id='date' placeholder="Pick the multiple dates" value="{{old('camp',$data['monthlyProgram'][0]['date'] ?? '')}}"  ">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                     <div class="form-group">
                                                    <p>Nature of duty</p>
                                                    <select type="text" name="nature_of_duty" id="nature_of_duty" class="form-control" placeholder="Select nature of Duty">
                                                
                                                        <option value="">Select nature of Duty </option>
                                                    
                                                       

                                                        <option value="reverification_camp" {{(isset($data['monthlyProgram'][0]['nature_of_duty']) && $data['monthlyProgram'][0]['nature_of_duty'] == "reverification_camp")?'selected':''}}>Reverification Camp</option>

                                                        <option value="reverification_in_situ" {{(isset($data['monthlyProgram'][0]['nature_of_duty']) && $data['monthlyProgram'][0]['nature_of_duty'] == "reverification_in_situ")?'selected':''}}>Reverification in situ</option>

                                                        <option value="office_work" {{(isset($data['monthlyProgram'][0]['nature_of_duty']) && $data['monthlyProgram'][0]['nature_of_duty'] == "office_work")?'selected':''}}>Office work</option>

                                                        <option value="surprise_inspection(individual)" {{(isset($data['monthlyProgram'][0]['nature_of_duty']) && $data['monthlyProgram'][0]['nature_of_duty'] == "surprise_inspection(individual)")?'selected':''}}>Surprise Inspection(Individual)</option>

                                                        <option value="surprise_inspection(combined)" {{(isset($data['monthlyProgram'][0]['nature_of_duty']) && $data['monthlyProgram'][0]['nature_of_duty'] == "surprise_inspection(combined)")?'selected':''}}>Surprise Inspection(Combined)</option>

                                                        <option value="surprise_inspection(special_drive)" {{(isset($data['monthlyProgram'][0]['nature_of_duty']) && $data['monthlyProgram'][0]['nature_of_duty'] == "surprise_inspection(special_drive)")?'selected':''}}>Surprise Inspection(Special Drive)</option>


                                                        <option value="monthly_conf" {{(isset($data['monthlyProgram'][0]['nature_of_duty']) && $data['monthlyProgram'][0]['nature_of_duty'] == "monthly_conf")?'selected':''}}>Monthly Conf</option>

                                                        <option value="conference" {{(isset($data['monthlyProgram'][0]['nature_of_duty']) && $data['monthlyProgram'][0]['nature_of_duty'] == "conference")?'selected':''}}>Conference</option>

                                                        <option value="training" {{(isset($data['monthlyProgram'][0]['nature_of_duty']) && $data['monthlyProgram'][0]['nature_of_duty'] == "training")?'selected':''}}>Training</option>

                                                        <option value="court_duty" {{(isset($data['monthlyProgram'][0]['nature_of_duty']) && $data['monthlyProgram'][0]['nature_of_duty'] == "court_duty")?'selected':''}}>Court Duty</option>

                                                        <option value="other" {{(isset($data['monthlyProgram'][0]['nature_of_duty']) && $data['monthlyProgram'][0]['nature_of_duty'] == "other")?'selected':''}}>Other</option>

                                                        <option value="verification_institution" {{(isset($data['monthlyProgram'][0]['nature_of_duty']) && $data['monthlyProgram'][0]['nature_of_duty'] == "verification_institution")?'selected':''}}>Verification Institution</option>

                                                        <option value="verification_camp" {{(isset($data['monthlyProgram'][0]['nature_of_duty']) && $data['monthlyProgram'][0]['nature_of_duty'] == "verification_camp")?'selected':''}}>Verification-Camp</option>

                                                        <option value="inspection_camp_of_lmo" {{(isset($data['monthlyProgram'][0]['nature_of_duty']) && $data['monthlyProgram'][0]['nature_of_duty'] == "inspection_camp_of_lmo")?'selected':''}}>Inspection-Camp of LMO</option>

                                                        <option value="inspection_institu_work_of_lmo" {{(isset($data['monthlyProgram'][0]['nature_of_duty']) && $data['monthlyProgram'][0]['nature_of_duty'] == "inspection_institu_work_of_lmo")?'selected':''}}>Inspection-institu work of LMO</option>

                                                        <option value="casual_leave" {{(isset($data['monthlyProgram'][0]['nature_of_duty']) && $data['monthlyProgram'][0]['nature_of_duty'] == "casual_leave")?'selected':''}}>Casual Leave</option>

                                                        <option value="journey" {{(isset($data['monthlyProgram'][0]['nature_of_duty']) && $data['monthlyProgram'][0]['nature_of_duty'] == "journey")?'selected':''}}>Journey</option>

                                                        <option value="return_journey" {{(isset($data['monthlyProgram'][0]['nature_of_duty']) && $data['monthlyProgram'][0]['nature_of_duty'] == "return_journey")?'selected':''}}>Return Journey</option>

                                                        <option value="holiday" {{(isset($data['monthlyProgram'][0]['nature_of_duty']) && $data['monthlyProgram'][0]['nature_of_duty'] == "holiday")?'selected':''}}>Holiday </option>
                                                        
                                                        </select>                                                  
                                                    </div>
                                             
                                                <div class="form-group">
                                                <p>Remarks</p>
                                                    <input type="text" name="remarks" id="remarks" class="form-control"  value="{{old('remarks',$data['monthlyProgram'][0]['remarks'] ?? '')}}" placeholder="Remarks">
                                                </div>
                                                  <div class="form-group">
                                                <button type="submit" class="btn btn-primary" >Save</button>
                                                <!-- <button type="reset" class="btn btn-default">Reset Form</button> -->
                                                </div>
                                            </div>

                                            <div class="col-lg-4" id='editable_place'>
                                             <p>Camp</p>
                                            <input type="text" name="camp_edit" id="camp_edit" class="form-control"  value="{{old('camp',$data['monthlyProgram'][0]['camp'] ?? '')}}"  placeholder="Enter camp office">
                                            </div>

                                             <div class="col-lg-4" id='place'>    
                                              <div class="form-group">
                                                <p>Camp</p>
                                                <select class="form-control " name="camp" id="camp" >
                                                <option value=''>Select camp office</option>
                                                <option value='controller_office' {{(isset($data['monthlyProgram'][0]['camp']) && $data['monthlyProgram'][0]['camp'] == "controller_office")?'selected':''}}> Controller Office</option>
                                                <option value='deputy_controller_office' {{(isset($data['monthlyProgram'][0]['camp']) && $data['monthlyProgram'][0]['camp'] == "deputy_controller_office")?'selected':''}}>Deputy Controller Office</option>
                                                <option value='assistant_controller_office' {{(isset($data['monthlyProgram'][0]['camp']) && $data['monthlyProgram'][0]['camp'] == "assistant_controller_office")?'selected':''}} >Assistant Controller Office</option>
                                                <option value='inspector_office' {{(isset($data['monthlyProgram'][0]['camp']) && $data['monthlyProgram'][0]['camp'] == "inspector_office")?'selected':''}}>Inspector Office</option>
                                                <option value='others' {{(isset($data['monthlyProgram'][0]['camp']) && $data['monthlyProgram'][0]['camp'] == "others")?'selected':''}}>Others</option>
                                                </select>
                                                </div> 

                                                <div class="form-group">
                                                <p>District</p>
                                                <select class="form-control" name="district" id="district">
                                                <option value=''>Select District</option>
                                                @foreach($data['district'] as $dt)
                                                <option value='{{$dt['district_id']}}' 
                                                @if ($data['monthlyProgram'][0]['district']== $dt['district_id']) selected="selected" @endif
                                                 >{{$dt['district_name']}}</option>
                                                @endforeach
                                                </select>
                                                </div>
                                                 <div class="form-group" id='place_office'>
                                                <p>Office</p>
                                                <select class="form-control" name="office" id="office">
                                                
                                              @if(isset($data['monthlyProgram'][0]['office_name'])&&
        $data['monthlyProgram'][0]['office_name'] !=null)
<option>{{$data['monthlyProgram'][0]['office_name']}}</option>
        @endif
                                                </select>
                                                </div>
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
$('.date').datepicker({
  multidate: false,
	format: 'dd-mm-yyyy'
});


    @if($data['monthlyProgram'][0]['nature_of_duty'] !='conference' &&
        $data['monthlyProgram'][0]['nature_of_duty']!='other'&&
        $data['monthlyProgram'][0]['nature_of_duty']!='training' &&
        $data['monthlyProgram'][0]['nature_of_duty']!='court_duty')

            $("#place").css('display','block');
            $("#editable_place").css('display','none');
    @else
            
            $('#place').css('display','none'); 
            $("#editable_place").css('display','block');
    @endif

                 
    $('#place_office').css('display','none');
    $("#editable_place").css('display','none');

    @if(isset($data['monthlyProgram'][0]['office_name'])&&
        $data['monthlyProgram'][0]['office_name'] !=null)
            $("#place_office").show();
    @endif
    
    $(document).on('change','#nature_of_duty',function(){
        var nature_of_duty=$(this).val(); 
        if(nature_of_duty.toString() != 'conference' && nature_of_duty!='other' && nature_of_duty!='training' && nature_of_duty!='court_duty'){
           $('#place').css('display','block');
           $("#editable_place").css('display','none'); 
        } else 
        {  
            $('#place').css('display','none'); 
            $("#editable_place").css('display','block');
            
        }
    });

    $(document).on('change','#camp',function(){
      
        var camp=$(this).val(); 
        if(camp=='others'){
          $('#place_office').css('display','block');
        } else {  $('#place_office').css('display','none'); }
    });

    $(document).on('change','#district',function(){
      
        var oid=$(this).val(); 
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
    });
</script>
@endsection