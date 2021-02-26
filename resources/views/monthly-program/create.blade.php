<!-- @extends('layouts.app') -->
@section('content')
<div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
            
                     @if(isset($data['formType']) && $data['formType']=='create')
                      <h3 class="page-header">ADD NEW MONTHLY PROGRAM</h3>
                    @endif
                   @if(isset($data['formType']) && $data['formType']=='edit')
                      <h1 class="page-header">EDIT PROGRAM</h1>
                    @endif
                    @if(isset($data['formType']) && $data['formType']=='show')
                      <h1 class="page-header"> VIEW PROGRAM</h1>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                        <div class="panel-group">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                @if(isset($data['formType']) && $data['formType']=='create')
                                  <h5>Add new entry</h5p>
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
                                         @if(isset($data['formType']) && $data['formType']=='create')
                                         <form role="form" action="{{route('monthly-programms.store')}}" id="monthlyProgramForm" name="monthlyProgramForm" method="POST" class="row">
                                          @csrf
                                         @endif
                                         @if(isset($data['formType']) && $data['formType']=='edit')
                                         <form role="form" action="{{route('monthly-programms.update',$data['monthlyProgram'][0]['id'])}}" id="monthlyProgramForm" name="monthlyProgramForm" method="POST" class="row">
                                        @method('PUT')
                                         @csrf
                                         @endif
                                         @if(isset($data['formType']) && $data['formType']=='show')
                                         <form role="form" action="#" id="monthlyProgramForm" name="monthlyProgramForm" method="POST" class="row">
                                         @csrf
                                         @endif
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                <p>Select Multiple date</p>
                                                <input type="text" class="form-control date" name='date' id='date' placeholder="Pick the multiple dates">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                     <div class="form-group">
                                                    <p>Nature of duty</p>
                                                    <select type="text" name="nature_of_duty" id="nature_of_duty" class="form-control" placeholder="Select nature of Duty">
                                                
                                                        <option value="">Select nature of Duty </option>
                                                    
                                                        <option value="reverification_camp" {{(isset($data['monthlyProgram'][0]['office']) && $data['monthlyProgram'][0]['office'] == "reverification_camp")?'selected':''}}>Reverification camp</option>
                                                        <option value="reverification_in_situ" {{(isset($data['monthlyProgram'][0]['office']) && $data['monthlyProgram'][0]['office'] == "reverification_in_situ")?'selected':''}}>Reverification in situ</option>
                                                        <option value="office_work" {{(isset($data['monthlyProgram'][0]['office']) && $data['monthlyProgram'][0]['office'] == "office_work")?'selected':''}}>Office work</option>
                                                        <option value="surprise_inspection(individual)" {{(isset($data['monthlyProgram'][0]['office']) && $data['monthlyProgram'][0]['office'] == "surprise_inspection(individual)")?'selected':''}}>Surprise Inspection(Individual)</option>
                                                        <option value="surprise_inspection(combined)" {{(isset($data['monthlyProgram'][0]['office']) && $data['monthlyProgram'][0]['office'] == "surprise_inspection(combined)")?'selected':''}}>Surprise Inspection(Combined)</option>
                                                        <option value="surprise_inspection(special_drive)" {{(isset($data['monthlyProgram'][0]['office']) && $data['monthlyProgram'][0]['office'] == "surprise_inspection(special_drive)")?'selected':''}}>Surprise Inspection(Special Drive)</option>
                                                        <option value="monthly_conf" {{(isset($data['monthlyProgram'][0]['office']) && $data['monthlyProgram'][0]['office'] == "monthly_conf")?'selected':''}}>Monthly Conf</option>
                                                        <option value="conference" {{(isset($data['monthlyProgram'][0]['office']) && $data['monthlyProgram'][0]['office'] == "conference")?'selected':''}}>Conference</option>
                                                        <option value="training" {{(isset($data['monthlyProgram'][0]['office']) && $data['monthlyProgram'][0]['office'] == "training")?'selected':''}}>Traning</option>
                                                        <option value="court_duty" {{(isset($data['monthlyProgram'][0]['office']) && $data['monthlyProgram'][0]['office'] == "court_duty")?'selected':''}}>Court Duty</option>
                                                        <option value="other" {{(isset($data['monthlyProgram'][0]['office']) && $data['monthlyProgram'][0]['office'] == "other")?'selected':''}}>Other</option>
                                                        <option value="verification_institution" {{(isset($data['monthlyProgram'][0]['office']) && $data['monthlyProgram'][0]['office'] == "verification_institution")?'selected':''}}>Verification Institution</option>
                                                        <option value="verification_camp" {{(isset($data['monthlyProgram'][0]['office']) && $data['monthlyProgram'][0]['office'] == "verification_camp")?'selected':''}}>Verification-Camp</option>
                                                        <option value="inspection_camp_of_lmo" {{(isset($data['monthlyProgram'][0]['office']) && $data['monthlyProgram'][0]['office'] == "inspection_camp_of_lmo")?'selected':''}}>Inspection-Camp of LMO</option>
                                                        <option value="inspection_institu_work_of_lmo" {{(isset($data['monthlyProgram'][0]['office']) && $data['monthlyProgram'][0]['office'] == "inspection_institu_work_of_lmo")?'selected':''}}>Inspection-institu work of LMO</option>
                                                        <option value="casual_leave" {{(isset($data['monthlyProgram'][0]['office']) && $data['monthlyProgram'][0]['office'] == "casual_leave")?'selected':''}}>Casual Leave</option>
                                                        <option value="journey" {{(isset($data['monthlyProgram'][0]['office']) && $data['monthlyProgram'][0]['office'] == "journey")?'selected':''}}>Journey</option>
                                                        <option value="return_journey" {{(isset($data['monthlyProgram'][0]['office']) && $data['monthlyProgram'][0]['office'] == "return_journey")?'selected':''}}>Return Journey</option>
                                                        <option value="holiday" {{(isset($data['monthlyProgram'][0]['office']) && $data['monthlyProgram'][0]['office'] == "holiday")?'selected':''}}>Holiday </option>
                                                        
                                                        </select>                                                  
                                                    </div>
                                             
                                                <div class="form-group">
                                                <p>Remarks</p>
                                                    <input type="text" name="remarks" id="remarks" class="form-control"  value="{{old('remarks',$data['monthlyProgram'][0]['remarks'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}} placeholder="Remarks">
                                                </div>
                                                  <div class="form-group">
                                                 @if($data['formType']!='show')
                                                <button type="submit" class="btn btn-primary" {{$data['formType']=='show'?'disabled':''}}>Save</button>
                                                @endif
                                                <!-- <button type="reset" class="btn btn-default">Reset Form</button> -->
                                                </div>
                                            </div>
                                            <div class="col-lg-4" id='editable_place'>
                                             <p>Camp</p>
                                            <input type="text" name="camp_edit" id="camp_edit" class="form-control"  value="{{old('camp',$data['monthlyProgram'][0]['camp'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}} placeholder="Enter camp office">
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
                                                <option value='others'>Others</option>
                                                </select>
                                                </div> 
                                                <div class="form-group">
                                                <p>District</p>
                                                <select class="form-control" name="district" id="district">
                                                <option value=''>Select camp office</option>
                                                @foreach($data['district'] as $dt)
                                                <option value='{{$dt['district_id']}}'>{{$dt['district_name']}}</option>
                                                @endforeach
                                                </select>
                                                </div>
                                                 <div class="form-group" id='place_office'>
                                                <p>Office</p>
                                                <select class="form-control" name="office" id="office">
                                                <option value=''>Select  office</option>
                                                @foreach($data['district'] as $dt)
                                                <option value=''>{{$dt['district_name']}}</option>
                                                @endforeach
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
  multidate: true,
	format: 'dd-mm-yyyy'
});
$('#place').css('display','none');
$('#place_office').css('display','none');
$("#editable_place").css('display','none');
 $("#office").html('');
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