<!-- @extends('layouts.app') -->
@section('content')
<div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
            
                     @if(isset($data['formType']) && $data['formType']=='create')
                      <h1 class="page-header">RTI PUBLIC AUTHORITY</h1>
                    @endif
                   @if(isset($data['formType']) && $data['formType']=='edit')
                      <h1 class="page-header">RTI PUBLIC AUTHORITY EDIT</h1>
                    @endif
                    @if(isset($data['formType']) && $data['formType']=='show')
                      <h1 class="page-header"> RTI PUBLIC AUTHORITY DETAILS</h1>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                        <div class="panel-group">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                @if(isset($data['formType']) && $data['formType']=='create')
                                  <h5>RTI PUBLIC AUTHORITY</h5p>
                                @endif
                                 @if(isset($data['formType']) && $data['formType']=='edit')
                                  <h5>EDIT RTI PUBLIC AUTHORITY</h5p>
                                @endif
                                 @if(isset($data['formType']) && $data['formType']=='show')
                                  <h5>VIEW RTI PUBLIC AUTHORITY</h5p>
                                @endif
                                </div>
                                <div id="addnewuser" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                    <?php 
                                    // echo "<pre>";
                                    // print_r($data['user']);
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
                                         <form role="form" action="{{route('rti-public-authority.store')}}" id="rtiPublicAuthorityCreateForm" name="rtiPublicAuthorityCreateForm" method="POST" class="row">
                                          @csrf
                                         @endif
                                         @if(isset($data['formType']) && $data['formType']=='edit')
                                         <form role="form" action="{{route('rti-public-authority.update',$data['rti'][0]['id'])}}" id="rtiPublicAuthorityCreateForm" name="rtiPublicAuthorityCreateForm" method="POST" class="row">
                                         @method('PUT')
                                         @csrf
                                         @endif
                                         @if(isset($data['formType']) && $data['formType']=='show')
                                         <form role="form" action="#" id="rtiPublicAuthorityCreateForm" name="rtiPublicAuthorityCreateForm" method="POST" class="row">
                                         @csrf
                                         @endif
                                       
                                        <div class="col-lg-4">
                                                 <div class="form-group">
                                                 <label>Name of the public authority</label>
                                                    <input type="text" name="name_of_public_authority" id="name_of_public_authority" class="form-control" value="{{old('name_of_public_authority',$data['rti'][0]['name_of_public_authority'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}}  placeholder="Name Of The Public Authority">
                                                    <!-- <p class="help-block">Example block-level help text here.</p> -->
                                                </div>
                                                <div class="form-group">
                                                <label>Published the 17 manuals</label>
                                                <select type="text" name="manual_17_published" id="manual_17_published" class="form-control" placeholder="Published the 17 manuals">
                                            
                                                    <option value="">Yes/No </option>
                                                   
                                                    <option value="yes" {{(isset($data['rti'][0]['manual_17_published']) && $data['rti'][0]['manual_17_published'] == "yes")?'selected':''}}>Yes</option>
                                                    <option value="no" {{(isset($data['rti'][0]['manual_17_published']) && $data['rti'][0]['manual_17_published'] == "no")?'selected':''}}>No</option>
                                                    
                                                    </select>                                                  
                                                    </div>
                                            
                                        </div>    
                                                     
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label>Updated the 17 manuals</label>
                                                <select type="text" name="updated_17_manual" id="updated_17_manual" class="form-control" placeholder="Updated the 17 manuals">
                                                    <option value="">Yes/No</option>
                                                    <option value="yes" {{(isset($data['rti'][0]['updated_17_manual']) && $data['rti'][0]['updated_17_manual'] == "yes")?'selected':''}}>Yes</option>
                                                    <option value="no" {{(isset($data['rti'][0]['updated_17_manual']) && $data['rti'][0]['updated_17_manual'] == "no")?'selected':''}}>No</option>
                                                </select>                                                  
                                            </div>
                                            <div class="form-group">
                                                <label>Displayed 17 manuals</label>
                                                    <select type="text" name="displayed_17_manual" id="displayed_17_manual" class="form-control" placeholder="Displayed 17 manuals">

                                                    <option value="">Yes/No</option>
                                                    <option value="yes" {{(isset($data['rti'][0]['displayed_17_manual']) && $data['rti'][0]['displayed_17_manual'] == "yes")?'selected':''}}>Yes</option>
                                                    <option value="no" {{(isset($data['rti'][0]['displayed_17_manual']) && $data['rti'][0]['displayed_17_manual'] == "no")?'selected':''}}>No</option>

                                                    </select>                                                  
                                            </div> 
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label>Fee collected</label>
                                                    <input type="text" name="fee_collected" id="fee_collected" class="form-control" value="{{old('fee_collected',$data['rti'][0]['fee_collected'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}} placeholder="Fee collected">
                                            </div>
                                            <div class="form-group">
                                                 <label>Relevant section of rti act 2005</label>
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

@endsection