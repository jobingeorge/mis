<!-- @extends('layouts.app') -->
@section('content')
<div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
            
                     @if(isset($data['formType']) && $data['formType']=='create')
                      <h3 class="page-header">FUEL MAINTAINENCE MANAGEMENT CREATE</h3>
                    @endif 
                    @if(isset($data['formType']) && $data['formType']=='edit')
                      <h3 class="page-header">FUEL MAINTAINENCE MANAGEMENT EDIT</h3>
                    @endif
                   
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                        <div class="panel-group">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                @if(isset($data['formType']) && $data['formType']=='create')
                                  <h5>Add new fuel maintainence management data</h5p>
                                @endif
                                 @if(isset($data['formType']) && $data['formType']=='edit')
                                  <h5>Edit Officer Details</h5p>
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
                                         <form role="form" action="{{route('repair-maintainence-management.store')}}" id="userCreateForm" name="repairMaintainenceForm" method="POST" class="row">
                                          @csrf
                                         @endif

                                         @if(isset($data['formType']) && $data['formType']=='edit')
                                         <form role="form" action="{{route('repair-maintainence-management.update',$data['repair_maintainence'][0]['id'])}}" id="userCreateForm" name="repairMaintainenceForm" method="POST" class="row">
                                        @method('PUT')
                                         @csrf
                                         @endif
                                       
                                          <div class="col-lg-4">
                                                <div class="form-group">
                                                <label>Vehicle Register Number</label>
                                                <select type="text" name="vehicle_id" id="vehicle_id" class="form-control" placeholder="vehicle no">
                                                        <option value="" >Select Vehicle</option>
                                                        @foreach ($data['vehicles'] as $vehicle)
                                                        <option value="{{$vehicle['id']}}" {{(isset($data['repair_maintainence'][0]['vehicle_id']) && $data['repair_maintainence'][0]['vehicle_id']==$vehicle['id'])?'selected':''}}>{{$vehicle['register_number']}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                              </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                <label>Approved Workshop</label>
                                                <select type="text" name="approved_workshop" id="approved_workshop" class="form-control" >
                                                        <option value="" >Select</option>
                                                        <option value="yes" {{(isset($data['repair_maintainence'][0]['approved_workshop']) && $data['repair_maintainence'][0]['approved_workshop']=='yes')?'selected':''}}>Yes</option>
                                                        <option value="no" {{(isset($data['repair_maintainence'][0]['approved_workshop']) && $data['repair_maintainence'][0]['approved_workshop']==$vehicle['id'])?'selected':''}}>No</option>
                                                    </select>
                                                </div>
                                              </div>
                                              <div class="col-lg-4">
                                                <div class="form-group">
                                                <label>Name of the Workshop</label>
                                                <input type="text" class="form-control" name='name_of_workshop' id='name_of_workshop' 
                                                value="{{old('name_of_workshop',$data['repair_maintainence'][0]['name_of_workshop'] ?? '')}}" placeholder="Name of the Workshop">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                <label>Location</label>
                                                <input type="text" class="form-control " name='location' id='location' value="{{old('location',$data['repair_maintainence'][0]['location'] ?? '')}}" placeholder="Location">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                <label>Description</label>
                                                <input type="text" class="form-control" name='description' id='description' value="{{old('description',$data['repair_maintainence'][0]['description'] ?? '')}}" placeholder="Description">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                  <label>Replaced Parts</label>
                                                <input type="text" class="form-control" name='replaced_parts' id='replaced_parts' value="{{old('replaced_parts',$data['repair_maintainence'][0]['replaced_parts'] ?? '')}}" placeholder="Replaced Parts">
                                                </div>
                                            </div>
                                             <div class="col-lg-4">
                                                <div class="form-group">
                                                  <label>Repairing Cost</label>
                                                <input type="text" class="form-control" name='repairing_cost' id='repairing_cost' value="{{old('repairing_cost',$data['repair_maintainence'][0]['repairing_cost'] ?? '')}}" placeholder="Repairing Cost">
                                                </div>
                                            </div> 
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                  <label>Cost of Newly Purchased Parts</label>
                                                <input type="text" class="form-control" name='cost_of_new_parts' id='cost_of_new_parts' value="{{old('cost_new_parts',$data['repair_maintainence'][0]['cost_of_new_parts'] ?? '')}}" placeholder="Cost of Newly Purchased Parts">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                  <label>Total Amount</label>
                                                <input type="text" class="form-control" name='total_amount' id='total_amount' value="{{old('repairing_cost',$data['repair_maintainence'][0]['total_amount'] ?? '')}}" placeholder="Total Amount">
                                                </div>
                                            </div>
                                    
                                            
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary" >Save</button>
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