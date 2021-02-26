<!-- @extends('layouts.app') -->
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                @if($data['formType']=='create')
                <h1 class="page-header">Assign Custody</h1>
                @csrf
                @endif
                @if($data['formType']=='edit')
                <h1 class="page-header">Edit Custody</h1>
                @csrf
                @endif
                @if($data['formType']=='show')
                <h1 class="page-header">View Custody</h1>
                @csrf
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel-group">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse">Custody Details</a>
                            </h4>
                        </div>
                        <div id="addnewvehicle" class="panel-collapse collapse in">
                            <div class="panel-body">
                                <!-- for display form validation errors -->
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
                                <form role="form" action="{{route('custody-management.store')}}" id="custodyAddForm" name="custodyAddForm" method="POST" class="row">
                                @csrf
                                @endif
                                @if($data['formType']=='edit')
                                <form role="form" action="{{route('custody-management.update',$data['custody'][0]['id'])}}" id="custodyAddForm" name="custodyAddForm" method="POST" class="row">
                                @method('PUT')
                                @csrf
                                @endif
                                @if($data['formType']=='show')
                                <form role="form" id="custodyAddForm" name="custodyAddForm" class="row">
                                @csrf
                                @endif
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <input type="text" name="register_number" id="register_number" class="form-control" value="{{old('register_number',$data['custody'][0]['register_number'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}}  placeholder="VEHICLE REGISTER NUMBER">
                                           <!--  <select name="register_number" id="register_number" 
                                                   class="form-control">
                                                <option value="">Select Vehicle</option>
                                                @foreach ($data['vehicle'] as $vehicle)

                                                <option value="{{$vehicle['id']}}" {{(isset($data['custody'][0]['vehicle']) && $data['custody'][0]['vehicle']==$vehicle['id'])?'selected':''}}>{{$vehicle['register_number']}}</option>
                                                @endforeach
                                            </select> -->
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <select name="region" id="region" class="form-control">
                                                <option value="-1">Please Select Region</option>
                                                @foreach ($data['region'] as $region)

                                                <option value="{{$region['region_id']}}" {{(isset($data['custody'][0]['region']) && $data['custody'][0]['region']==$region['region_id'])?'selected':''}}>{{$region['region']}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                        <select type="text" name="district" id="district" class="form-control" placeholder="Select district">
                                            <option value="">Select District</option>
                                            @if(isset($data['custody'][0]['district_name']) && $data['custody'][0]['district_name']!=null)
                                            <option value="{{$data['custody'][0]['district_id']}}" selected>{{$data['custody'][0]['district_name']}}</option>
                                            @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                        <select type="text" name="office" id="office" class="form-control" placeholder="Select office">
                                        <option value="">Select Office</option>
                                            @if(isset($data['custody'][0]['office_name']) && $data['custody'][0]['office_name']!=null)
                                            <option value="{{$data['custody'][0]['office_id']}}" selected>{{$data['custody'][0]['office_name']}} </option>
                                            @endif
                                        </select>
                                        </div>
                                    </div>
                                     <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>Select Designation</label>
                                        <select type="text" name="designation_id" id="designation_id" class="form-control" placeholder="Select Designation">
                              
                                         @if(isset($data['custody'][0]['designation']) && $data['custody'][0]['designation']!=null)
                                            <option value="{{$data['custody'][0]['designation_id']}}" selected>{{$data['custody'][0]['designation']}} </option>
                                            @endif
                                        </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                          <label>Select User Type</label>
                                        <select type="text" name="userType_id" id="userType_id" class="form-control" placeholder="Select User Type">
                                         @if(isset($data['custody'][0]['user_type_name']) && $data['custody'][0]['user_type_name']!=null)
                                            <option value="{{$data['custody'][0]['user_type_id']}}" selected>{{$data['custody'][0]['user_type_name']}} </option>
                                            @endif
                                        </select>
                                        </div>
                                    </div>
                                    

                                    <div class="col-xs-12">
                                        <div class="form-group">
                                            @if($data['formType']!='show')
                                            <button type="submit" class="btn btn-default">Save</button>
                                            @endif
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
</div>
    <script>
        $(document).ready(function() {
            $('#dataTables-example').DataTable({
                    responsive: true
            });
            
        });

        $(document).on('change','#region',function(){
            var region_id   =   $(this).val(); 
            GetDistrict(region_id);
            ///alert($('#district').val());
            // if(officerLevel==4){
            // GetOffice($('#district').val());
            // }
        });

        var officerLevel='';

        $(document).on('change','#district',function(){
            var did=$(this).val(); 
            GetOffice(did);
        /*    alert(officerLevel);*/


            if( did!=null){

            officerLevel=3;
           

            GetDesignation(officerLevel);
            GetUserType(officerLevel);
        }

        });
        $(document).on('change','#office',function(){
            var did=$(this).val(); 
            /*GetOffice(did);
*/

            if( did!=null){

            officerLevel=4;
           

            GetDesignation(officerLevel);
            GetUserType(officerLevel);
        }

        });

        function GetDistrict(did){
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

        function GetOffice(oid){
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
        }



        function GetDesignation(officerLevel){
                    var option="<option value="+" >Select Designation</option>";
                     var url="{{route('GetDesignations')}}";
                            $.ajax({
                                url:url,
                                type:'GET',
                                data : {id:officerLevel},
                                success: function(res) {
                                $("#designation_id").html(option+res);
                                }
                            });
                }
                 function GetUserType(officerLevel){
                        var url="{{route('GetUserType')}}";
                     var option="<option value="+">Select User Type</option>";
                        $.ajax({
                            url:url,
                            type:'GET',
                            data : {officerLevel:officerLevel},
                            success: function(res) {
                                if(res){
                                    $("#userType_id").html(option+res);
                                }
                                
                            }
                        });
                    }  

    </script>
@endsection