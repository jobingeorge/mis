<!-- @extends('layouts.app') -->
@section('content')
<div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
            
                     @if(isset($data['formType']) && $data['formType']=='create')
                      <h3 class="page-header">Create New Transfer Application</h3>
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
                                  <h5>Create New Transfer Application</h5p>
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
                                         <form role="form" action="{{route('hr-transfer-application.store')}}" id="transferCreateForm" name="transferCreateForm" method="POST" class="row">
                                          @csrf
                                         @endif
                                         @if(isset($data['formType']) && $data['formType']=='edit')
                                         <form role="form" action="{{route('hr-transfer-application.update',$data['transfer'][0]['id'])}}" id="transferCreateForm" name="transferCreateForm" method="POST" class="row">
                                        @method('PUT')
                                         @csrf
                                         @endif
                                         @if(isset($data['formType']) && $data['formType']=='show')
                                         <form role="form" action="#" id="transferCreateForm" name="transferCreateForm" method="POST" class="row">
                                         @csrf
                                         @endif
                                       
                                            <div class="col-lg-4">
                                                 <div class="form-group">
                                                 <label>name</label>
                                                    <input type="text" name="transfer_name" id="transfer_name" class="form-control" value="{{old('transfer_name',$data['transfer'][0]['transfer_name'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}}  placeholder="Name">
                                                    <!-- <p class="help-block">Example block-level help text here.</p> -->
                                                </div>
                                                <div class="form-group">
                                                <label>designation</label>
                                                <select type="text" name="designation" id="designation" class="form-control" placeholder="Designation">
                                            
                                                @foreach ($data['designation'] as $designation)
                                                    <option value="{{$designation['designation_id']}}" {{(isset($data['transfer'][0]['designation']) && $data['transfer'][0]['designation']==$designation['designation_id'])?'selected':''}}>{{$designation['designation']}}</option>
                                                @endforeach
                                                </select>      
                                                </div>
                                                <div class="form-group">
                                                <label>name of present institution</label>
                                                    <input type="text" name="name_of_present_institution" id="name_of_present_institution" class="form-control"  value="{{old('name_of_present_institution',$data['transfer'][0]['name_of_present_institution'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}} placeholder="Name Of Present Institution">
                                                </div>
                                                <div class="form-group">
                                                <label>date of retirement</label>
                                                    <input type="date" name="date_of_retirement" id="date_of_retirement" class="form-control"  value="{{old('date_of_retirement',$data['transfer'][0]['date_of_retirement'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}} placeholder="mm-dd-yyyy">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                 <div class="form-group">
                                                 <label>date of appointment</label>
                                                    <input type="date" name="date_of_appoinment" id="date_of_appoinment" class="form-control" value="{{old('date_of_appoinment',$data['transfer'][0]['date_of_appoinment'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}}  placeholder="mm-dd-yyyy">
                                                    <!-- <p class="help-block">Example block-level help text here.</p> -->
                                                </div>
                                                <div class="form-group">
                                                <label>DATE FROM WHICH WORKING</label></p>


                                                <label>a. in the present district</label>
                                                    <input type="date" name="present_district_from_date" id="present_district_from_date" class="form-control"  value="{{old('present_district_from_date',$data['transfer'][0]['present_district_from_date'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}} placeholder="mm-dd-yyyy">
                                                </div>
                                                <div class="form-group">
                                                <label>b. in the present station</label>
                                                    <input type="date" name="present_station_from_date" id="present_station_from_date" class="form-control"  value="{{old('present_station_from_date',$data['transfer'][0]['present_station_from_date'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}} placeholder="mm-dd-yyyy">
                                                </div>
                                                <div class="form-group">
                                                    <label>district which orginally recruited</label>

                                                    <select type="text" name="district_orginaly_recruited" id="district_orginaly_recruited" class="form-control" placeholder="Designation">
                                                
                                                    @foreach ($data['district'] as $district)
                                                        <option value="{{$designation['designation_id']}}" {{(isset($data['transfer'][0]['district_orginaly_recruited']) && $data['transfer'][0]['district_orginaly_recruited']==$district['district_id'])?'selected':''}}>{{$district['district_name']}}</option>
                                                    @endforeach
                                                    </select>   
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                 <div class="form-group">
                                                 <label>permanant address</label>
                                                    <input type="text" name="permenent_res_address" id="permenent_res_address" class="form-control" value="{{old('permenent_res_address',$data['transfer'][0]['permenent_res_address'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}}  placeholder="Permanant Address">
                                                    <!-- <p class="help-block">Example block-level help text here.</p> -->
                                                </div>
                                                <div class="form-group">
                                                <label>NAME OF INSTITUTIONS DISTRICT</label></p>


                                                <label>one</label>
                                                    <input type="text" name="institutions_ditrict_one" id="institutions_ditrict_one" class="form-control"  value="{{old('institutions_ditrict_one',$data['transfer'][0]['institutions_ditrict_one'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}} placeholder="">
                                                </div>
                                                <div class="form-group">
                                                <label>two</label>
                                                    <input type="text" name="institutions_ditrict_two" id="institutions_ditrict_two" class="form-control"  value="{{old('institutions_ditrict_two',$data['transfer'][0]['institutions_ditrict_two'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}} placeholder="">
                                                </div>
                                                <div class="form-group">
                                                <label>three</label>


                                                    <input type="text" name="institutions_ditrict_three" id="institutions_ditrict_three" class="form-control"  value="{{old('institutions_ditrict_three',$data['transfer'][0]['institutions_ditrict_three'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}} placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-xs-12">
                                                <div class="form-group">
                                                    <label>SPECIFY NAMES IN ORDER OF PREFERENCE</label></p>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-4 col-xs-12">
                                                        <div class="form-group">
                                                            <label>one</label>
                                                            <input type="text" name="preference_one" id="preference_one" class="form-control"  value="{{old('preference_one',$data['transfer'][0]['preference_one'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}} placeholder="">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-xs-12">
                                                        <div class="form-group">
                                                            <label>two</label>
                                                            <input type="text" name="preference_two" id="preference_two" class="form-control"  value="{{old('preference_two',$data['transfer'][0]['preference_two'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}} placeholder="">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-xs-12">
                                                        <div class="form-group">
                                                            <label>three</label>
                                                            <input type="text" name="preference_three" id="preference_three" class="form-control"  value="{{old('preference_three',$data['transfer'][0]['preference_three'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}} placeholder="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-xs-12">
                                                <div class="form-group">
                                                    @if($data['formType']!='show')
                                                    <button type="submit" class="btn btn-primary" {{$data['formType']=='show'?'disabled':''}}>Save</button>
                                                    @endif
                                                    <!-- <button type="reset" class="btn btn-default">Reset Form</button> -->
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

@endsection