<!-- @extends('layouts.app') -->
@section('content')
<div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
            
                     @if(isset($data['formType']) && $data['formType']=='create')
                      <h3 class="page-header">Add Designation of Public information officer</h3>
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
                                  <h5>Designation of Public information officer</h5p>
                                @endif
                                 @if(isset($data['formType']) && $data['formType']=='edit')
                                  <h5>Edit Designation of Public information officer</h5p>
                                @endif
                                 @if(isset($data['formType']) && $data['formType']=='show')
                                  <h5>View Designation of Public information officer</h5p>
                                @endif
                                </div>
                                <div id="addnewuser" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                    <?php 
                                    // echo "<pre>";
                                    // print_r($data['rti']);
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
                                         <form role="form" action="{{route('rti-public-information-officer.store')}}" id="rtiPublicInformationForm" name="rtiPublicInformationForm" method="POST" class="row">
                                          @csrf
                                         @endif
                                         @if(isset($data['formType']) && $data['formType']=='edit')
                                         <form role="form" action="{{route('rti-public-information-officer.update',$data['rti'][0]['id'])}}" id="rtiPublicInformationForm" name="rtiPublicInformationForm" method="POST" class="row">
                                        @method('PUT')
                                         @csrf
                                         @endif
                                         @if(isset($data['formType']) && $data['formType']=='show')
                                         <form role="form" action="#" id="rtiPublicInformationForm" name="rtiPublicInformationForm" method="POST" class="row">
                                         @csrf
                                         @endif
                                       
                                            <div class="col-lg-4">
                                                 <div class="form-group">
                                                 <p>Name of public information officer</p>
                                                    <input type="text" name="officer_name" id="officer_name" class="form-control" value="{{old('officer_name',$data['rti'][0]['officer_name'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}}  placeholder="Name Of Public Information Officer">
                                                    <!-- <p class="help-block">Example block-level help text here.</p> -->
                                                </div>
                                                
                                            </div>
                                            <div class="col-lg-4">
                                                 <div class="form-group">
                                                 <p>Assistant public information officer</p>
                                                    <input type="text" name="assistant_officer" id="assistant_officer" class="form-control" value="{{old('assistant_officer',$data['rti'][0]['assistant_officer'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}}  placeholder="Assistant Public Information Officer">
                                                    <!-- <p class="help-block">Example block-level help text here.</p> -->
                                                </div>
                                              
                                            </div>
                                            
                                            <div class="col-lg-4">
                                                 <div class="form-group">
                                                 <p>Appellate authority name</p>
                                                    <input type="text" name="authority_name" id="authority_name" class="form-control" value="{{old('authority_name',$data['rti'][0]['authority_name'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}}  placeholder="Appellate Authority Name">
                                                    <!-- <p class="help-block">Example block-level help text here.</p> -->
                                                </div>
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