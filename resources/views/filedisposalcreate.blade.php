<!-- @extends('layouts.app') -->
@section('content')
<div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
            
                     @if(isset($data['formType']) && $data['formType']=='create')
                      <h3 class="page-header">FILE DISPOSAL</h3>
                    @endif
                   @if(isset($data['formType']) && $data['formType']=='edit')
                      <h1 class="page-header">Edit File Disposal</h1>
                    @endif
                    @if(isset($data['formType']) && $data['formType']=='show')
                      <h1 class="page-header"> FILE DISPOSAL</h1>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                        <div class="panel-group">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                @if(isset($data['formType']) && $data['formType']=='create')
                                  <h5>Add new file disposal</h5p>
                                @endif
                                 @if(isset($data['formType']) && $data['formType']=='edit')
                                  <h5>Editfile disposal</h5p>
                                @endif
                                 @if(isset($data['formType']) && $data['formType']=='show')
                                  <h5>View file disposal</h5p>
                                @endif
                                </div>
                                <div id="addnewuser" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                    <?php 
                                    // echo "<pre>";
                                    // print_r($data['fileDisposal']);
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
                                         <form role="form" action="{{route('file-disposal.store')}}" id="fileDisposalForm" name="fileDisposalForm" method="POST" class="row">
                                          @csrf
                                         @endif
                                         @if(isset($data['formType']) && $data['formType']=='edit')
                                         <form role="form" action="{{route('file-disposal.update',$data['fileDisposal'][0]['id'])}}" id="fileDisposalForm" name="fileDisposalForm" method="POST" class="row">
                                        @method('PUT')
                                         @csrf
                                         @endif
                                         @if(isset($data['formType']) && $data['formType']=='show')
                                         <form role="form" action="#" id="fileDisposalForm" name="fileDisposalForm" method="POST" class="row">
                                         @csrf
                                         @endif
                                       
                                            <div class="col-lg-12">
                                                 <div class="form-group">
                                                 <label>Name of seat or auction </label>
                                                    <input type="text" name="name" id="name" class="form-control" value="{{old('name',$data['fileDisposal'][0]['name'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}}  placeholder="Name Of Seat or Auction">
                                                    <!-- <p class="help-block">Example block-level help text here.</p> -->
                                                </div>
                                            </div>    
                                            <div class="col-lg-12">
                                                
                                                <label>NUMBER OF FILES PENDING DURING THE LAST MONTH</label></p>
                                              <div class="col-lg-4">
                                                    <div class="form-group">
                                                    <p>English</p>
                                                        <input type="text" name="pendingEnglish" id="pendingEnglish" class="form-control"  value="{{old('pendingEnglish',$data['fileDisposal'][0]['pendingEnglish'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}} placeholder="">
                                                    </div>
                                                </div> 
                                              <div class="col-lg-4">   
                                                <div class="form-group">
                                                <p>Malayalam</p>
                                                    <input type="text" name="pendingMalayalam" id="pendingMalayalam" class="form-control"   value="{{old('pendingMalayalam',$data['fileDisposal'][0]['pendingMalayalam'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}} placeholder="">
                                                </div>
                                              </div> 
                                              <div class="col-lg-4">  
                                                <div class="form-group">
                                                <p>Others</p>
                                                    <input type="text" name="pendingOthers" id="pendingOthers" class="form-control"    value="{{old('pendingOthers',$data['fileDisposal'][0]['pendingOthers'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}} placeholder="">
                                                </div>
                                              </div>  
                                            </div>
                                        <div class="col-lg-12">  
                                            <p>  <label>NUMBER OF THAPALS RECEIVED DURING THE MONTH</label></p>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <p>English </p>
                                                        <input type="text" name="thapalEnglish" id="thapalEnglish" class="form-control"   value="{{old('thapalEnglish',$data['fileDisposal'][0]['thapalEnglish'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}}  placeholder="">
                                                        <!-- <p class="help-block">Example block-level help text here.</p> -->
                                                    </div>                                               
                                                </div>
                                                <div class="col-lg-4">    
                                                    <div class="form-group">
                                                    <p> Mmalayalam </p>
                                                        <input type="text" name="thapalMalayalam" id="thapalMalayalam" class="form-control"    value="{{old('thapalMalayalam',$data['fileDisposal'][0]['thapalMalayalam'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}} placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">    
                                                    <div class="form-group">
                                                    <p>Others</p>
                                                        <input type="text" name="thapalOthers" id="thapalOthers" class="form-control"     value="{{old('thapalOthers',$data['fileDisposal'][0]['thapalOthers'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}} placeholder="">
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="col-lg-12">
                                          <p> <label>ACTION TAKING DURING THE MONTH</label></p>
                                            <div class="col-lg-4">
                                                 <div class="form-group"></p>
                                                 <p>english </p>
                                                    <input type="text" name="actionEnglish" id="actionEnglish" class="form-control"    value="{{old('actionEnglish',$data['fileDisposal'][0]['actionEnglish'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}}  placeholder="">
                                                    <!-- <p class="help-block">Example block-level help text here.</p> -->
                                                </div>
                                            </div>   
                                            <div class="col-lg-4">    
                                                <div class="form-group">
                                                <p> malayalam </p>
                                                    <input type="text" name="actionMalayalam" id="actionMalayalam" class="form-control"    value="{{old('actionMalayalam',$data['fileDisposal'][0]['actionMalayalam'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}} placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">    
                                                <div class="form-group">
                                                <p>others</p>
                                                    <input type="text" name="actionOthers" id="actionOthers" class="form-control"    value="{{old('actionOthers',$data['fileDisposal'][0]['actionOthers'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}} placeholder="">
                                                </div>
                                            </div>
                                        </div> 
                                        <div class="col-lg-12">
                                            <p> <label>ACTION TAKEN %</label></p>
                                            <div class="col-lg-4">
                                                 <div class="form-group">
                                                 <p>English </p>
                                                    <input type="text" name="actionPercentageEnglish" id="actionPercentageEnglish"   class="form-control" value="{{old('actionPercentageEnglish',$data['fileDisposal'][0]['actionPercentageEnglish'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}}  placeholder="">
                                                    <!-- <p class="help-block">Example block-level help text here.</p> -->
                                                </div>
                                            </div>   
                                            <div class="col-lg-4">    
                                                <div class="form-group">
                                                <p>Malayalam </p>
                                                    <input type="text" name="actionPercentageMalayalam" id="actionPercentageMalayalam"   class="form-control"  value="{{old('actionPercentageMalayalam',$data['fileDisposal'][0]['actionPercentageMalayalam'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}} placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">    
                                                <div class="form-group">
                                                <p>Others</p>
                                                    <input type="text" name="actionPercentageOthers" id="actionPercentageOthers"   class="form-control"  value="{{old('actionPercentageOthers',$data['fileDisposal'][0]['actionPercentageOthers'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}} placeholder="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12"> 
                                          <p><label> % OF DISPOSAL</label></p>   
                                            <div class="col-lg-4">
                                                 <div class="form-group">
                                                 
                                                 <p>English </p>
                                                    <input type="text" name="disposalEnglish" id="disposalEnglish" class="form-control"   value="{{old('disposalEnglish',$data['fileDisposal'][0]['disposalEnglish'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}}  placeholder="">
                                                    <!-- <p class="help-block">Example block-level help text here.</p> -->
                                                </div>
                                            </div>   
                                            <div class="col-lg-4">    
                                                <div class="form-group">
                                                <p>Malayalam </p>
                                                    <input type="text" name="disposalMalayalam" id="disposalMalayalam" class="form-control"    value="{{old('disposalMalayalam',$data['fileDisposal'][0]['disposalMalayalam'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}} placeholder="">
                                                </div>
                                            </div>
                                             <div class="col-lg-4">    
                                                <div class="form-group">
                                                <p>Others</p>
                                                    <input type="text" name="disposalOthers" id="disposalOthers" class="form-control"    value="{{old('disposalOthers',$data['fileDisposal'][0]['disposalOthers'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}} placeholder="">
                                                </div>
                                            </div>    
                                        </div>
                                         <div class="col-lg-12">  
                                         <div class="col-lg-4">   
                                            <div class="form-group">
                                                 @if($data['formType']!='show')
                                                <button type="submit" class="btn btn-primary" {{$data['formType']=='show'?'disabled':''}}>Save</button>
                                                @endif
                                                <!-- <button type="reset" class="btn btn-default">Reset Form</button> -->
                                            <div>
                                        </div>
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