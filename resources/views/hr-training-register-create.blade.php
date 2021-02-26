<!-- @extends('layouts.app') -->
@section('content')
<div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
            
                     @if(isset($data['formType']) && $data['formType']=='create')
                      <h3 class="page-header">Create New Training</h3>
                    @endif
                   @if(isset($data['formType']) && $data['formType']=='edit')
                      <h1 class="page-header">Edit Training</h1>
                    @endif
                    @if(isset($data['formType']) && $data['formType']=='show')
                      <h1 class="page-header"> Training Details</h1>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                        <div class="panel-group">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                @if(isset($data['formType']) && $data['formType']=='create')
                                  <h5>Create New Training</h5p>
                                @endif
                                 @if(isset($data['formType']) && $data['formType']=='edit')
                                  <h5>Edit Training Details</h5p>
                                @endif
                                 @if(isset($data['formType']) && $data['formType']=='show')
                                  <h5>Training details</h5p>
                                @endif
                                </div>
                                <div id="add_training" class="panel-collapse collapse in">
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
                                         <form role="form" action="{{route('hr-training-register.store')}}" id="HRTrainingRegisterForm" name="HRTrainingRegisterForm" method="POST" class="row">
                                          @csrf
                                         @endif
                                         @if(isset($data['formType']) && $data['formType']=='edit')
                                         <form role="form" action="{{route('hr-training-register.update',$data['training'][0]['id'])}}" id="HRTrainingRegisterForm" name="HRTrainingRegisterForm" method="POST" class="row">
                                        @method('PUT')
                                         @csrf
                                         @endif
                                         @if(isset($data['formType']) && $data['formType']=='show')
                                         <form role="form" action="#" id="HRTrainingRegisterForm" name="HRTrainingRegisterForm" method="POST" class="row">
                                         @csrf
                                         @endif
                                       
                                            <div class="col-lg-4 col-md-6 col-xs-12">
                                                <div class="form-group">
                                                    <label> Name</label>
                                                    <input type="text" name="name" id="name" class="form-control" value="{{old('name',$data['training'][0]['name'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}}  placeholder="Name">
                                                    <!-- <p class="help-block">Example block-level help text here.</p> -->
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-xs-12">
                                                <div class="form-group">
                                                <label>Pen</label>
                                                    <input type="text" name="pen" id="pen" class="form-control" value="{{old('pen',$data['training'][0]['pen'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}} placeholder="PEN">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-xs-12">
                                                <div class="form-group">
                                                    <label>Designation</label>
                                                    <select type="text" name="designation" id="designation" class="form-control" placeholder="Designation">
                                                    @foreach ($data['designation'] as $designation)
                                                        @if($designation['designation_id'] != 1)
                                                        <option value="{{$designation['designation_id']}}" {{(isset($data['employee'][0]['designation']) && $data['employee'][0]['designation']==$designation['designation_id'])?'selected':''}}>{{$designation['designation']}}</option>
                                                        @endif
                                                    @endforeach    
                                                    </select>                                                  
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-xs-12">
                                                <div class="form-group">
                                                <label>name of the training</label>
                                                    <input type="text" name="name_of_traing_attend" id="name_of_traing_attend" class="form-control"  value="{{old('name_of_traing_attend',$data['training'][0]['name_of_traing_attend'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}} placeholder="Name of Training">
                                                </div>
                                            </div>

                                            <div class="col-lg-4 col-md-6 col-xs-12">
                                                <div class="form-group">
                                                    <label>mandatory</label>
                                                    <select type="text" name="training_mandatory" id="training_mandatory" class="form-control" placeholder="Select region">                            
                                                        <option value="-1">---Please Select--- </option>
                                                        <option value="yes" {{(isset($data['training'][0]['training_mandatory']) && $data['training'][0]['training_mandatory']=='yes')?'selected':''}}>Yes</option>
                                                        <option value="no" {{(isset($data['training'][0]['training_mandatory']) && $data['training'][0]['training_mandatory']=='no')?'selected':''}}>No</option>
                                                    </select>                                                  
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-xs-12">
                                                <div class="form-group">
                                                    <label>from</label>
                                                    <input type="date" name="period_of_training_from" id="period_of_training_from" class="form-control"  value="{{old('period_of_training_from',$data['training'][0]['period_of_training_from'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}} placeholder="PeriodFrom">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-xs-12">
                                                <div class="form-group">
                                                    <label>to</label>
                                                    <input type="date" name="period_of_training_to" id="period_of_training_to" class="form-control"  value="{{old('period_of_training_to',$data['training'][0]['period_of_training_to'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}} placeholder="PeriodTo">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-xs-12">
                                                <div class="form-group">
                                                    <label>institution</label>
                                                    <input type="text" name="institution" id="institution" class="form-control"  value="{{old('institution',$data['training'][0]['institution'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}} placeholder="Institution">
                                                </div>
                                            </div>
                                            
                                            <div class="col-lg-4 col-md-6 col-xs-12">
                                                <div class="form-group">
                                                    <label>subject</label>
                                                        <input type="text" name="subject" id="subject" class="form-control"  value="{{old('subject',$data['training'][0]['subject'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}} placeholder="Subject">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-xs-12">
                                                <div class="form-group">
                                                    <label>paid</label>
                                                    <select type="text" name="paid" id="paid" class="form-control" placeholder="Select region">
                                                
                                                        <option value="-1">---Please Select--- </option>
                                                    
                                                        <option value="yes" {{(isset($data['training'][0]['paid']) && $data['training'][0]['paid']=='yes')?'selected':''}}>Yes</option>
                                                        <option value="no" {{(isset($data['training'][0]['paid']) && $data['training'][0]['paid']=='no')?'selected':''}}>No</option>
                                                    
                                                    </select>                                                 
                                                </div>
                                            </div>
                                            <div class="col-xs-12"> 
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