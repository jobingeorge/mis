<!-- @extends('layouts.app') -->
@section('content')
<div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
            
                     @if(isset($data['formType']) && $data['formType']=='create')
                      <h3 class="page-header">Fuel Management CREATE</h3>
                    @endif
                    @if(isset($data['formType']) && $data['formType']=='edit')
                      <h3 class="page-header">Fuel Management EDIT</h3>
                    @endif
                  
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                        <div class="panel-group">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                @if(isset($data['formType']) && $data['formType']=='create')
                                  <h5>Add new fuel management data</h5p>
                                @endif
                                @if(isset($data['formType']) && $data['formType']=='edit')
                                  <h5>Edit fuel management data</h5p>
                                @endif
                             
                                </div>
                                <div id="addnewuser" class="panel-collapse collapse in">
                                    <div class="panel-body">
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
                                         <form role="form" action="{{route('fuel-management.store')}}" id="userCreateForm" name="fuelManagementForm" method="POST" class="row">
                                          @csrf
                                         @endif
                                        @if(isset($data['formType']) && $data['formType']=='edit')
                                         <form role="form" action="{{route('fuel-management.update',$data['fuel_management'][0]['id'])}}" id="fuelManagementForm" name="fuelManagementForm" method="POST" class="row">
                                        @method('PUT')
                                         @csrf
                                         @endif
                                           <div class="col-lg-4">
                                                <div class="form-group">
                                                <label>Vehicle Register Number</label>
                                                <select type="text" name="vehicle_id" id="vehicle_id" class="form-control" placeholder="vehicle no">
                                                        <option value="" >Select Vehicle</option>
                                                        @foreach ($data['vehicles'] as $vehicle)
                                                        <option value="{{$vehicle['id']}}" {{(isset($data['fuel_management'][0]['vehicle_id']) && $data['fuel_management'][0]['vehicle_id']==$vehicle['id'])?'selected':''}}>{{$vehicle['register_number']}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                              </div>
                                              <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label> Certified Fuel Efficiancy</label>
                                                    <input type="text" name="fuel_efficiancy" id="fuel_efficiancy" class="form-control" value="{{old('fuel_efficiancy',$data['fuel_management'][0]['fuel_efficiancy'] ?? '')}}"  placeholder="Certified Fuel Efficiancy">
                                                </div>
                                              </div>
                                              <div class="form-group">
                                                <button type="submit" class="btn btn-primary" >Save</button>                                          
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

@endsection