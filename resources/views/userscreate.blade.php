<!-- @extends('layouts.app') -->
@section('content')
<div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                     @if($data['formType']=='create')
                      <h1 class="page-header">Add new Officer</h1>
                    @endif
                   @if($data['formType']=='edit')
                      <h1 class="page-header">Edit Officer Details</h1>
                    @endif
                    @if($data['formType']=='show')
                      <h1 class="page-header"> Officer Details</h1>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                        <div class="panel-group">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                @if($data['formType']=='create')
                                  <h5>Add new officer</h5p>
                                @endif
                                 @if($data['formType']=='edit')
                                  <h5>Edit Officer Details</h5p>
                                @endif
                                 @if($data['formType']=='show')
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
                                         @if($data['formType']=='create')
                                         <form role="form" action="{{route('users.store')}}" id="userCreateForm" name="userCreateForm" method="POST" class="row">
                                          @csrf
                                         @endif
                                         @if($data['formType']=='edit')
                                         <form role="form" action="{{route('users.update',$data['user'][0]['id'])}}" id="userCreateForm" name="userCreateForm" method="POST" class="row">
                                        @method('PUT')
                                         @csrf
                                         @endif
                                         @if($data['formType']=='show')
                                         <form role="form" action="#" id="userCreateForm" name="userCreateForm" method="POST" class="row">
                                         @csrf
                                         @endif
                                       
                                            <div class="col-lg-4">
                                                 <div class="form-group">
                                                    <input type="text" name="name" id="name" class="form-control" value="{{old('name',$data['user'][0]['name'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}}  placeholder="Enter name">
                                                    <!-- <p class="help-block">Example block-level help text here.</p> -->
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" name="pen" id="pen" class="form-control" value="{{old('pen',$data['user'][0]['pen'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}} placeholder="Enter PEN">
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" name="cug" id="cug" class="form-control"  value="{{old('cug',$data['user'][0]['cug'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}} placeholder="Enter cug">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                            <div class="form-group">
                                                    <input type="text" name="email" id="email" class="form-control" value="{{old('email',$data['user'][0]['email'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}} placeholder="Enter email">
                                                </div>
                                                @if($data['formType']=='create')
                                                <div class="form-group">
                                                    <input type="text" name="password" id="password" class="form-control" value="{{old('password')}}" placeholder="Enter password">
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" name="confirmPassword" id="confirmPassword" class="form-control" value="{{old('confirmPassword')}}" placeholder="Confirm password">
                                                </div>
                                                @endif

                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <select type="text" name="officerLevel" id="officerLevel" {{$data['formType']=='show'?'disabled':''}} class="form-control" value="{{old('userLevel')}}" placeholder="Select User level">
                                                    <option value="">Select user level</option>
                                                    @foreach($data['userLevel'] as $d)
                                                    <option value="{{$d['office_level_id']}}" {{(isset($data['user'][0]['officerLevel']) && ($data['user'][0]['officerLevel']) == $d['office_level_id']) ? 'selected':''}}>{{$d['office_level_name']}}</option>
                                                    @endforeach
                                                    </select>
                                                <!-- <p class="help-block">Example block-level help text here.</p> -->
                                                </div>
                                                <?php
                                               // print_r($data['user'][0]);
                                                ?>
                                                <div class="form-group">
                                                    <select type="text" name="designation_id" id="designation_id" class="form-control" placeholder="Select User level">
                                                    <option value="">Select designation</option>
                                                    @if(isset($data['user'][0]['designation_id']) && $data['user'][0]['designation_id']!=null)
                                                    <option value="{{$data['user'][0]['designation_id']}}" selected>{{$data['user'][0]['designation']}}</option>
                                                    @endif
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <select type="text" name="userType" id="userType" class="form-control" placeholder="Select User Type">
                                                    <option value="">Select user type</option>
                                                    @if(isset($data['user'][0]['userType']) && $data['user'][0]['userType']!=null)
                                                    <option value="{{$data['user'][0]['userType']}}" selected>{{$data['user'][0]['user_type_name']}}</option>
                                                    @endif
                                                    </select>
                                                </div>
                                                <!-- if from type is create -->
                                                @if($data['formType']=='create')
                                                 
                                                <div class="form-group">
                                                    <select type="text" name="region" id="region" class="form-control" placeholder="Select region">
                                                    <option value="">Select region</option>
                                                    </select>
                                                </div>

                                                <div class="form-group">             
                                                    <select type="text" name="district" id="district" class="form-control" placeholder="Select district">
                                                    <option value="">Select District</option>
                                                    </select>
                                              
                                                </div>
                                                <div class="form-group">
                                               
                                                    <select type="text" name="office_name" id="office_name" class="form-control" placeholder="Select office">
                                                    <option value="">Select office </option>
                                                    </select>
                        
                                                </div>
                                                @endif
                                                <!-- if from type is create end-->
                                             
                                                <!-- form type edit or view -->
                                                 @if($data['formType']=='show' || $data['formType']=='edit')
                                                <div class="form-group">
                                                    <select type="text" name="region" id="region" class="form-control" placeholder="Select region">
                                                    <option value="">Select region</option>
                                                    @if(isset($data['user'][0]['region']) && $data['user'][0]['region']!=null)
                                                    <option value="{{$data['user'][0]['region']}}" selected>{{$data['user'][0]['region']}}</option>
                                                    @endif
                                                    </select>
                                                </div>

                                                <div class="form-group">
                
                                                    <select type="text" name="district" id="district" class="form-control" placeholder="Select district">
                                                    <option value="">Select District</option>
                                                    <option value="">Select region</option>
                                                    @if(isset($data['user'][0]['district']) && $data['user'][0]['district']!=null)
                                                    <option value="{{$data['user'][0]['district']}}" selected>{{$data['user'][0]['district']}}</option>
                                                    @endif
                                                    </select>
                                              
                                                </div>
                                                <div class="form-group">
                                               
                                                    <select type="text" name="office_name" id="office_name" class="form-control" placeholder="Select office">
                                                    <option value="">Select office </option>
                                                    @if(isset($data['user'][0]['office_name']) && $data['user'][0]['office_name']!=null)
                                                    <option value="{{$data['user'][0]['office_name']}}" selected>{{$data['user'][0]['office_name']}}</option>
                                                    @endif
                                                    </select>
                        
                                                </div>
                                                @endif
                                                <!-- form type edit or view end -->
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
        <script>
            $(document).ready(function() {
                $('#dataTables-example').DataTable({
                        responsive: true
                });
                @if($data['formType']=='create')
                $("#designation_id").css('display','none');
                $("#region").css('display','none');
                $("#district").css('display','none');
                $("#office_name").css('display','none');
                $("#userType").css('display','none');
                @endif
                 var officerLevel='';
                 
                $("#officerLevel").on('change',function(){
                   officerLevel=$(this).val();
                   //alert('officer level- '+officerLevel);
                   if(officerLevel && officerLevel!=0)
                   {
                        var url="{{route('GetDesignations')}}";
                            $.ajax({
                                url:url,
                                type:'GET',
                                data : {id:officerLevel},
                                success: function(res) {
                                $("#designation_id").html(res);
                                }
                            });
                            $("#designation_id").css('display','block');   
                    }
                    else {
                          $("#designation_id").css('display','none');  
                    }
                    /* if region level*/
                    if(officerLevel && officerLevel==2){
                        GetRegion();
                        
                    } else { 
                          $("#region").html('');
                          $("#region").css('display','none');                   
                    }
                    /* end if region level*/

                     /* if district level*/
                    if(officerLevel && officerLevel==3){
                        alert(officerLevel);
                        GetRegion();
                        GetDistrict(0);
                        GetUserType(officerLevel);
                    } else { 
                         $("#district").html('');
                         $("#region").html('');
                         $("#region").css('display','none');
                        $("#district").css('display','none');                   
                    }
                    /* end if district level*/

                    /* if office level*/
                    if(officerLevel && officerLevel==4){
                        GetRegion();
                        GetDistrict(0);
                        GetOffice(1);
                        GetUserType(officerLevel);                
                        
                    } else { 
                            $("#district").html('');
                            $("#region").html('');
                            $("#office_name").html('');
                            $("#region").css('display','none');
                            $("#district").css('display','none');
                            $("#office_name").css('display','none');                   
                    }
                    /* end if office level*/


                });
                 $(document).on('change','#region',function(){
                     var region_id=$(this).val(); 
                    
                     if((officerLevel==4 || officerLevel==3)  && region_id){
                        GetDistrict(region_id);
                        ///alert($('#district').val());
                        if(officerLevel==4){
                            GetOffice($('#district').val());
                        }
                     }
                 });
                
                  $(document).on('change','#district',function(){
                     var did=$(this).val(); 
                     //alert(officerLevel);
                     if((officerLevel==4)  && did){
                         GetOffice(did);
                        var designation_id=$("#designation_id :selected").val();
                        alert(designation_id);
                        if(designation_id){
                        GetUserType(designation_id);
                        }else {
                        GetUserType(9); 
                        }
                     }
                    
                 });

                function GetRegion(){
                            var url="{{route('GetRegions')}}";
                            $.ajax({
                                url:url,
                                type:'GET',
                                // data : {id:officerLevel},
                                // data: {id:officerLevel},
                                success: function(res) {
                                $("#region").html(res);
                                 $("#region").css('display','block');
                                }
                            });
                       }
                    function    GetDistrict(did){
                        var url="{{route('GetDistrict')}}";
                        $.ajax({
                            url:url,
                            type:'GET',
                            data : {did:did},
                            success: function(res) {
                                $("#district").html(res);
                                $("#district").css('display','block');
                            }
                        });
                    }
                    function   GetOffice(oid){
                        var url="{{route('GetOffice')}}";
                        $.ajax({
                            url:url,
                            type:'GET',
                            data : {oid:oid},
                            success: function(res) {
                                $("#office_name").html(res);
                                $("#office_name").css('display','block');
                            }
                        });
                    }
                    function GetUserType(officerLevel){
                        var url="{{route('GetUserType')}}";
                        $.ajax({
                            url:url,
                            type:'GET',
                            data : {officerLevel:officerLevel},
                            success: function(res) {
                                if(res){
                                    $("#userType").html(res);
                                $("#userType").css('display','block');
                                }
                                
                            }
                        });
                    }    
            });
        </script>
@endsection