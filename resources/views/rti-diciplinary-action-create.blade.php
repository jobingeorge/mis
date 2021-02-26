<!-- @extends('layouts.app') -->
@section('content')
<div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
            
                     @if(isset($data['formType']) && $data['formType']=='create')
                      <h3 class="page-header">Disciplinary action taken against officers</h3>
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
                                  <h5>ADD NEW ENTRY FOR DECIPLINARY ACTION PROPOSED</h5p>
                                @endif
                                 @if(isset($data['formType']) && $data['formType']=='edit')
                                  <h5>EDIT DECIPLINARY ACTION PROPOSED</h5p>
                                @endif
                                 @if(isset($data['formType']) && $data['formType']=='show')
                                  <h5>Officer details</h5p>
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
                                         <form role="form" action="{{route('rti-diciplinary-action.store')}}" id="diciplinaryActionForm" name="diciplinaryActionForm" method="POST" class="row">
                                          @csrf
                                         @endif
                                         @if(isset($data['formType']) && $data['formType']=='edit')
                                         <form role="form" action="{{route('rti-diciplinary-action.update',$data['rti'][0]['id'])}}" id="diciplinaryActionForm" name="diciplinaryActionForm" method="POST" class="row">
                                        @method('PUT')
                                         @csrf
                                         @endif
                                         @if(isset($data['formType']) && $data['formType']=='show')
                                         <form role="form" action="#" id="diciplinaryActionForm" name="diciplinaryActionForm" method="POST" class="row">
                                         @csrf
                                         @endif
                                       
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <p>Office</p>
                                                    <select type="text" name="office" id="office" class="form-control" placeholder="Select region">
                                                        <option value="">Office </option>
                                                        <option value="one" {{(isset($data['rti'][0]['office']) && $data['rti'][0]['office'] == "one")?'selected':''}}>One</option>
                                                        <option value="two" {{(isset($data['rti'][0]['office']) && $data['rti'][0]['office'] == "two")?'selected':''}}>Two</option>
                                                   </select>                    
                                                </div>
                                            </div>
                                             <div class="col-lg-4">
                                                <div class="form-group">
                                                <p>Details of discplinary action recommended by information commision under sec20(2)</p>
                                                    <input type="text" name="action_sec20_2" id="action_sec20_2" class="form-control" value="{{old('action_sec20_2',$data['rti'][0]['action_sec20_2'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}} placeholder="Details Of Discpinary Action Recommended By Information Commision Under Sec20(2)">
                                                </div>
                                            </div>
                                             <div class="col-lg-4">
                                                <div class="form-group">
                                                <p>Details of discplinary action taken based on recommended of information commision</p>
                                                    <input type="text" name="action_commision" id="action_commision" class="form-control"  value="{{old('action_commision',$data['rti'][0]['action_commision'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}} placeholder="">
                                                </div>
                                            </div>
                                             <div class="col-lg-4">
                                                <div class="form-group">
                                                <p>Other disciplinary action taken</p>
                                                    <input type="text" name="action_other" id="action_other" class="form-control"  value="{{old('action_other',$data['rti'][0]['action_other'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}} placeholder="">
                                                </div>
                                                <div class="form-group">
                                                    @if($data['formType']!='show')
                                                    <button type="submit" class="btn btn-primary" {{$data['formType']=='show'?'disabled':''}}>Save</button>
                                                    @endif
                                                    <!-- <button type="reset" class="btn btn-default">Reset Form</button> -->
                                                    <div>
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