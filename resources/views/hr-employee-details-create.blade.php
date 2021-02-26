<!-- @extends('layouts.app') -->
@section('content')
<div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
            
                     @if(isset($data['formType']) && $data['formType']=='create')
                      <h3 class="page-header">Create HR employee details</h3>
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
                                         <form role="form" action="{{route('hr-employee-details.store')}}" id="EmployeeCreateForm" name="EmployeeCreateForm" method="POST" class="row">
                                          @csrf
                                         @endif
                                         @if(isset($data['formType']) && $data['formType']=='edit')
                                         <form role="form" action="{{route('hr-employee-details.update',$data['employee'][0]['employee_id'])}}" id="userCreateForm" name="userCreateForm" method="POST" class="row">
                                        @method('PUT')
                                         @csrf
                                         @endif
                                         @if(isset($data['formType']) && $data['formType']=='show')
                                         <form role="form" action="#" id="userCreateForm" name="userCreateForm" method="POST" class="row">
                                         @csrf
                                         @endif
                                       
                                            <div class="col-lg-4">
                                                 <div class="form-group">
                                                 <label>Name</label>
                                                    <input type="text" name="emp_name" id="emp_name" class="form-control" value="{{old('emp_name',$data['employee'][0]['emp_name'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}}  placeholder="Name Of Employee">
                                                    <!-- <p class="help-block">Example block-level help text here.</p> -->
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>PEN </label>
                                                    <input type="text" name="emp_pen" id="emp_pen" class="form-control" value="{{old('emp_pen',$data['employee'][0]['emp_pen'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}} placeholder="Pen">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Designation</label>
                                                    <select type="text" name="designation" id="designation" class="form-control" placeholder="Designation">
                                            
                                                    @foreach ($data['designation'] as $designation)
                                                        <option value="{{$designation['designation_id']}}" {{(isset($data['employee'][0]['designation']) && $data['employee'][0]['designation']==$designation['designation_id'])?'selected':''}}>{{$designation['designation']}}</option>
                                                    @endforeach
                                                    </select>                                                  
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Date of Birth</label>
                                                    <input type="date" name="dob" id="dob" class="form-control"  value="{{old('dob',$data['employee'][0]['dob'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}} placeholder="mm-dd-yyyy">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                 <div class="form-group">
                                                 <label>Date of Super Annuation</label>
                                                    <input type="date" name="doa" id="doa" class="form-control" value="{{old('doa',$data['employee'][0]['doa'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}}  placeholder="Date Of Super Annuation">
                                                    <!-- <p class="help-block">Example block-level help text here.</p> -->
                                                </div>
                                            </div>
                                            <div class="col-lg-4">    
                                                <div class="form-group">
                                                <label>Date of Retirement</label>
                                                    <input type="date" name="dor" id="dor" class="form-control"  value="{{old('dor',$data['employee'][0]['dor'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}} placeholder="Date of retirement">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                 <label>Educational Qualification</label>
                                                    <input type="text" name="education_qualification" id="education_qualification" class="form-control"  value="{{old('education_qualification',$data['employee'][0]['education_qualification'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}} placeholder="Equational Qualification">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                   <label>Category of First Appointment</label>
                                                    <input type="text" name="cfa" id="cfa" class="form-control"  value="{{old('cfa',$data['employee'][0]['cfa'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}} placeholder="Category Of First Appointment">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                 <div class="form-group">
                                                 <label>Department to which appointed initially</label>
                                                    <input type="text" name="dai" id="dai" class="form-control" value="{{old('dai',$data['employee'][0]['dai'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}}  placeholder="Department to which appointed initially">
                                                    <!-- <p class="help-block">Example block-level help text here.</p> -->
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                <label>Appointment Oreder No.</label>
                                                    <input type="text" name="app_order_no" id="app_order_no" class="form-control"  value="{{old('app_order_no',$data['employee'][0]['app_order_no'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}} placeholder="Appointment order No ">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                <label>Appointment Oreder Date</label>
                                                    <input type="date" name="date_app_order" id="date_app_order" class="form-control"  value="{{old('date_app_order',$data['employee'][0]['date_app_order'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}} placeholder="Appointment order Date">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                <label>No. of the order of regularisation of the first appointment</label>
                                                    <input type="text" name="no_order_regular_app" id="no_order_regular_app" class="form-control"  value="{{old('no_order_regular_app',$data['employee'][0]['no_order_regular_app'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}} placeholder="Order#">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                 <div class="form-group">
                                                 <label>Date of the order of regularisation of the first appointment</label>
                                                    <input type="date" name="date_regular_app" id="date_regular_app" class="form-control" value="{{old('date_regular_app',$data['employee'][0]['date_regular_app'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}}  placeholder="mm-dd-yyyy">
                                                    <!-- <p class="help-block">Example block-level help text here.</p> -->
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                <label>Date of joining in legal metrology department</label>
                                                    <input type="date" name="date_lmd_join" id="date_lmd_join" class="form-control"  value="{{old('date_lmd_join',$data['employee'][0]['date_lmd_join'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}} placeholder="mm-dd-yyyy">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                 <label>Order no. of regularisation of subsequent appointment</label>
                                                    <input type="text" name="orderno_reg_sub_app" id="orderno_reg_sub_app" class="form-control"  value="{{old('orderno_reg_sub_app',$data['employee'][0]['orderno_reg_sub_app'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}} placeholder="Order#">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                   <label>Date of regularisation of subsequent appointment</label>
                                                    <input type="date" name="date_subseq_appoinment" id="date_subseq_appoinment" class="form-control"  value="{{old('date_subseq_appoinment',$data['employee'][0]['date_subseq_appoinment'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}} placeholder="mm-dd-yyyy">
                                                </div>
                                            </div>
                                            <div class="col-xs-12">
                                                <div class="panel-group">
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading">
                                                            <h5> DETAILS OF FIRST AND SUBSEQUENT APPOINTMENT/ PROMOTION</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                 <div class="form-group">
                                                 <label>Category</label>
                                                    <input type="text" name="subseq_category" id="subseq_category" class="form-control" value="{{old('subseq_category',$data['employee'][0]['subseq_category'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}}  placeholder="Category">
                                                    <!-- <p class="help-block">Example block-level help text here.</p> -->
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                <label>No. of order</label>
                                                    <input type="text" name="subseq_orderno" id="subseq_orderno" class="form-control"  value="{{old('subseq_orderno',$data['employee'][0]['subseq_orderno'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}} placeholder="No. of order">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                 <label>Date of order </label>
                                                    <input type="date" name="subseq_order_date" id="subseq_order_date" class="form-control"  value="{{old('subseq_order_date',$data['employee'][0]['subseq_order_date'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}} placeholder="mm-dd-yyyy">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Date of joining duty</label>
                                                    <input type="date" name="subseq_join_date" id="subseq_join_date" class="form-control"  value="{{old('subseq_join_date',$data['employee'][0]['subseq_join_date'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}} placeholder="mm-dd-yyyy">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                 <div class="form-group">
                                                 <label>Date of declaration of probation</label>
                                                    <input type="date" name="subseq_d_prob_date" id="subseq_d_prob_date" class="form-control" value="{{old('subseq_d_prob_date',$data['employee'][0]['subseq_d_prob_date'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}}  placeholder="mm-dd-yyyy">
                                                    <!-- <p class="help-block">Example block-level help text here.</p> -->
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                <label>No. of confirmation order</label>
                                                    <input type="text" name="subseq_no_conf_order" id="subseq_no_conf_order" class="form-control"  value="{{old('subseq_no_conf_order',$data['employee'][0]['subseq_no_conf_order'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}} placeholder="No. of confirmation order">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                 <label>Date of confirmation order</label>
                                                    <input type="date" name="subseq_date_conf_order" id="subseq_date_conf_order" class="form-control"  value="{{old('subseq_date_conf_order',$data['employee'][0]['subseq_date_conf_order'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}} placeholder="mm-dd-yyyy">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                   <label>Effective date of confirmation</label>
                                                    <input type="date" name="subseq_effectdate_conf_order" id="subseq_effectdate_conf_order" class="form-control"  value="{{old('subseq_effectdate_conf_order',$data['employee'][0]['subseq_effectdate_conf_order'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}} placeholder="mm-dd-yyyy">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                 <div class="form-group">
                                                 <label>Order number of probation</label>
                                                    <input type="text" name="subseq_orderno_prob" id="subseq_orderno_prob" class="form-control" value="{{old('subseq_orderno_prob',$data['employee'][0]['subseq_orderno_prob'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}}  placeholder="Order Number Of Probation">
                                                    <!-- <p class="help-block">Example block-level help text here.</p> -->
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                <label>Date of order</label>
                                                    <input type="date" name="subseq_date_of_order" id="subseq_date_of_order" class="form-control"  value="{{old('subseq_date_of_order',$data['employee'][0]['subseq_date_of_order'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}} placeholder="Date of order">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                 <label>Effective date of probation </label>
                                                    <input type="date" name="subseq_effective_date_of_order" id="subseq_effective_date_of_order" class="form-control"  value="{{old('subseq_effective_date_of_order',$data['employee'][0]['subseq_effective_date_of_order'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}} placeholder="mm-dd-yyyy">
                                                </div>
                                            </div>
                                            <div class="col-xs-12">
                                                <div class="panel-group">
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading">
                                                            <h5>DETAILS OF TRANSFER (NAME OF INCUMBENT TO BE FETCHED FROM S1. NO. 1)</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                   <label>From</label>
                                                    <input type="date" name="transfer_from" id="transfer_from" class="form-control"  value="{{old('transfer_from',$data['employee'][0]['transfer_from'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}} placeholder="From">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                 <div class="form-group">
                                                 <label>To</label>
                                                    <input type="date" name="transfer_to" id="transfer_to" class="form-control" value="{{old('transfer_to',$data['employee'][0]['transfer_to'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}}  placeholder="To">
                                                    <!-- <p class="help-block">Example block-level help text here.</p> -->
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                <label>No. of order</label>
                                                    <input type="text" name="transfer_numof_order" id="transfer_numof_order" class="form-control"  value="{{old('transfer_numof_order',$data['employee'][0]['transfer_numof_order'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}} placeholder="No. of order">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                 <label>Date of relieve</label>
                                                    <input type="date" name="transfer_dateof_relive" id="transfer_dateof_relive" class="form-control"  value="{{old('transfer_dateof_relive',$data['employee'][0]['transfer_dateof_relive'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}} placeholder="mm-dd-yyyy">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                   <label>Date of joining</label>
                                                    <input type="date" name="transfer_dateof_joining" id="transfer_dateof_joining" class="form-control"  value="{{old('transfer_dateof_joining',$data['employee'][0]['transfer_dateof_joining'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}} placeholder="mm-dd-yyyy">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                 <div class="form-group">
                                                 <label>Contact number</label>
                                                    <input type="text" name="transfer_contact_number" id="transfer_contact_number" class="form-control" value="{{old('transfer_contact_number',$data['employee'][0]['transfer_contact_number'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}}  placeholder="Contact Number">
                                                    <!-- <p class="help-block">Example block-level help text here.</p> -->
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-lg-4 col-md-6">
                                                <div class="form-group">
                                                 <label>Whether ph</label>
                                                 <select type="text" name="transfer_whether_ph" id="transfer_whether_ph" class="form-control" >
                                                    <option {{(isset($data['employee'][0]['transfer_whether_ph']) && $data['employee'][0]['transfer_whether_ph']=='no')?'selected':''}} value="no">NO</option>
                                                    <option {{(isset($data['employee'][0]['transfer_whether_ph']) && $data['employee'][0]['transfer_whether_ph']=='yes')?'selected':''}} value="yes">YES</option>
                                                    </select>                    
                                                </div>
                                            </div>
                                            @php
                                                $style  =   '';
                                            @endphp
                                            @if(isset($data['employee'][0]['transfer_whether_ph']) && $data['employee'][0]['transfer_whether_ph']=='yes')
                                                @php
                                                    $style  =   'style=display:block;';
                                                @endphp
                                            @endif
                                            
                                            <div class="col-xs-12" id="active_hp_box" {{$style}}>
                                                <div class="row">
                                                    <div class="col-xs-12 col-lg-4 col-md-6">
                                                        <div class="form-group">
                                                            <label>PH CATEGORY</label>
                                                            <select type="text" name="ph_category" id="ph_category" class="form-control" >
                                                                <option value="-1">--PLEASE SELECT---</option>
                                                                <option value="1">Blind/Low Vision</option>
                                                                <option value="2">Hearing Impaired</option>
                                                                <option value="3">Locomotor Disability/Cerebral Palsy</option>
                                                            </select>                    
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-xs-12 col-md-6">
                                                        <div class="form-group">
                                                        <label>MODE OF APPOINTMENT</label>
                                                            <input type="text" name="mode_appointment" id="mode_appointment" class="form-control" value="{{old('mode_appointment',$data['employee'][0]['mode_appointment'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}}  placeholder="Contact Number">
                                                            <!-- <p class="help-block">Example block-level help text here.</p> -->
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-xs-12 col-md-6">
                                                        <div class="form-group">
                                                        <label>ORDER NO</label>
                                                            <input type="text" name="transf_order_no" id="transf_order_no" class="form-control" value="{{old('transf_order_no',$data['employee'][0]['transf_order_no'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}}  placeholder="Contact Number">
                                                            <!-- <p class="help-block">Example block-level help text here.</p> -->
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-xs-12 col-md-6">
                                                        <div class="form-group">
                                                        <label>ORDER DATE</label>
                                                            <input type="date" name="transf_order_date" id="transf_order_date" class="form-control" value="{{old('transf_order_date',$data['employee'][0]['transf_order_date'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}}  placeholder="Contact Number">
                                                            <!-- <p class="help-block">Example block-level help text here.</p> -->
                                                        </div>
                                                    </div>
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
<style>
    #active_hp_box{
        display: none;
    }
</style>
<script>
    $('#transfer_whether_ph').change(function(e){
        if(this.value == 'yes'){
            $('#active_hp_box').show();
        }
        else{
            $('#active_hp_box').hide();
        }
    });
</script>
@endsection