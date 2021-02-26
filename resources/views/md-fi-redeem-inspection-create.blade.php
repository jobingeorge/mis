<!-- @extends('layouts.app') -->
@section('content')
<div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
            
                     @if(isset($data['formType']) && $data['formType']=='create')
                      <h3 class="page-header">MASTER DATA COMPLAINT REDEEM INSPECTION CREATE</h3>
                    @endif
                   @if(isset($data['formType']) && $data['formType']=='edit')
                      <h1 class="page-header">Edit Complaint Redeem Inspection</h1>
                    @endif
                    @if(isset($data['formType']) && $data['formType']=='show')
                      <h1 class="page-header"> Complaint Redeem Inspection Details</h1>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                        <div class="panel-group">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                @if(isset($data['formType']) && $data['formType']=='create')
                                  <h5>Add New Complaint Redeem Inspection</h5p>
                                @endif
                                 @if(isset($data['formType']) && $data['formType']=='edit')
                                  <h5>Edit Complaint Redeem Inspection</h5p>
                                @endif
                                 @if(isset($data['formType']) && $data['formType']=='show')
                                  <h5>Complaint Redeem Inspection Details</h5p>
                                @endif
                                </div>
                                <div id="addnewRedeemInspection" class="panel-collapse collapse in">
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
                                         <form role="form" action="{{route('md-fi-redeem-inspection.store')}}" id="redeemInspectionForm" name="redeemInspectionForm" method="POST" class="row">
                                          @csrf
                                         @endif
                                         @if(isset($data['formType']) && $data['formType']=='edit')
                                         <form role="form" action="{{route('md-fi-redeem-inspection.update',$data['inspection'][0]['id'])}}" id="redeemInspectionForm" name="redeemInspectionForm" method="POST" class="row">
                                        @method('PUT')
                                         @csrf
                                         @endif
                                         @if(isset($data['formType']) && $data['formType']=='show')
                                         <form role="form" action="#" id="redeemInspectionForm" name="redeemInspectionForm" method="POST" class="row">
                                         @csrf
                                         @endif

                                            <div class="col-lg-4 col-md-6 col-xs-12">
                                                <div class="form-group">
                                                    <label>Select Date</label>
                                                    <input type="date" name="select_date" id="select_date" class="form-control"  value="{{old('select_date',$data['inspection'][0]['select_date'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}} >
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-xs-12">
                                                <div class="form-group">
                                                    <label>Select Time: From</label>
                                                    <select type="text" name="time_from" id="time_from" class="form-control" placeholder="from">
                                                
                                                        <option value="">From </option>
                                                    
                                                        <option {{(isset($data['inspection'][0]['time_from']) && $data['inspection'][0]['time_from']=='12:00AM'?'selected':'')}} value="12:00AM">12:00AM</option>
                                                        <option {{(isset($data['inspection'][0]['time_from']) && $data['inspection'][0]['time_from']=='12:30AM'?'selected':'')}} value="12:30AM">12:30AM</option>
                                                        <option {{(isset($data['inspection'][0]['time_from']) && $data['inspection'][0]['time_from']=='1:00AM'?'selected':'')}} value="1:00AM">1:00AM</option>
                                                        <option {{(isset($data['inspection'][0]['time_from']) && $data['inspection'][0]['time_from']=='1:30AM'?'selected':'')}} value="1:30AM">1:30AM</option>
                                                        <option {{(isset($data['inspection'][0]['time_from']) && $data['inspection'][0]['time_from']=='2:00AM'?'selected':'')}} value="2:00AM">2:00AM</option>
                                                        <option {{(isset($data['inspection'][0]['time_from']) && $data['inspection'][0]['time_from']=='2:30AM'?'selected':'')}} value="2:30AM">2:30AM</option>
                                                        <option {{(isset($data['inspection'][0]['time_from']) && $data['inspection'][0]['time_from']=='3:00AM'?'selected':'')}} value="3:00AM">3:00AM</option>
                                                        <option {{(isset($data['inspection'][0]['time_from']) && $data['inspection'][0]['time_from']=='3:30AM'?'selected':'')}} value="3:30AM">3:30AM</option>
                                                        <option {{(isset($data['inspection'][0]['time_from']) && $data['inspection'][0]['time_from']=='4:00AM'?'selected':'')}} value="4:00AM">4:00AM</option>
                                                        <option {{(isset($data['inspection'][0]['time_from']) && $data['inspection'][0]['time_from']=='4:30AM'?'selected':'')}} value="4:30AM">4:30AM</option>
                                                        <option {{(isset($data['inspection'][0]['time_from']) && $data['inspection'][0]['time_from']=='5:00AM'?'selected':'')}} value="5:00AM">5:00AM</option>
                                                        <option {{(isset($data['inspection'][0]['time_from']) && $data['inspection'][0]['time_from']=='5:30AM'?'selected':'')}} value="5:30AM">5:30AM</option>
                                                        <option {{(isset($data['inspection'][0]['time_from']) && $data['inspection'][0]['time_from']=='6:00AM'?'selected':'')}} value="6:00AM">6:00AM</option>
                                                        <option {{(isset($data['inspection'][0]['time_from']) && $data['inspection'][0]['time_from']=='6:30AM'?'selected':'')}} value="6:30AM">6:30AM</option>
                                                        <option {{(isset($data['inspection'][0]['time_from']) && $data['inspection'][0]['time_from']=='7:00AM'?'selected':'')}} value="7:00AM">7:00AM</option>
                                                        <option {{(isset($data['inspection'][0]['time_from']) && $data['inspection'][0]['time_from']=='7:30AM'?'selected':'')}} value="7:30AM">7:30AM</option>
                                                        <option {{(isset($data['inspection'][0]['time_from']) && $data['inspection'][0]['time_from']=='8:00AM'?'selected':'')}} value="8:00AM">8:00AM</option>
                                                        <option {{(isset($data['inspection'][0]['time_from']) && $data['inspection'][0]['time_from']=='8:30AM'?'selected':'')}} value="8:30AM">8:30AM</option>
                                                        <option {{(isset($data['inspection'][0]['time_from']) && $data['inspection'][0]['time_from']=='9:00AM'?'selected':'')}} value="9:00AM">9:00AM</option>
                                                        <option {{(isset($data['inspection'][0]['time_from']) && $data['inspection'][0]['time_from']=='9:30AM'?'selected':'')}} value="9:30AM">9:30AM</option>
                                                        <option {{(isset($data['inspection'][0]['time_from']) && $data['inspection'][0]['time_from']=='10:00AM'?'selected':'')}} value="10:00AM">10:00AM</option>
                                                        <option {{(isset($data['inspection'][0]['time_from']) && $data['inspection'][0]['time_from']=='10:30AM'?'selected':'')}} value="10:30AM">10:30AM</option>
                                                        <option {{(isset($data['inspection'][0]['time_from']) && $data['inspection'][0]['time_from']=='11:00AM'?'selected':'')}} value="11:00AM">11:00AM</option>
                                                        <option {{(isset($data['inspection'][0]['time_from']) && $data['inspection'][0]['time_from']=='11:30AM'?'selected':'')}} value="11:30AM">11:30AM</option>
                                                        <option {{(isset($data['inspection'][0]['time_from']) && $data['inspection'][0]['time_from']=='12:00PM'?'selected':'')}} value="12:00PM">12:00PM</option>
                                                        <option {{(isset($data['inspection'][0]['time_from']) && $data['inspection'][0]['time_from']=='12:30PM'?'selected':'')}} value="12:30PM">12:30PM</option>
                                                        <option {{(isset($data['inspection'][0]['time_from']) && $data['inspection'][0]['time_from']=='1:00PM'?'selected':'')}} value="1:00PM">1:00PM</option>
                                                        <option {{(isset($data['inspection'][0]['time_from']) && $data['inspection'][0]['time_from']=='1:30PM'?'selected':'')}} value="1:30PM">1:30PM</option>
                                                        <option {{(isset($data['inspection'][0]['time_from']) && $data['inspection'][0]['time_from']=='2:00PM'?'selected':'')}} value="2:00PM">2:00PM</option>
                                                        <option {{(isset($data['inspection'][0]['time_from']) && $data['inspection'][0]['time_from']=='2:30PM'?'selected':'')}} value="2:30PM">2:30PM</option>
                                                        <option {{(isset($data['inspection'][0]['time_from']) && $data['inspection'][0]['time_from']=='3:00PM'?'selected':'')}} value="3:00PM">3:00PM</option>
                                                        <option {{(isset($data['inspection'][0]['time_from']) && $data['inspection'][0]['time_from']=='3:30PM'?'selected':'')}} value="3:30PM">3:30PM</option>
                                                        <option {{(isset($data['inspection'][0]['time_from']) && $data['inspection'][0]['time_from']=='4:00PM'?'selected':'')}} value="4:00PM">4:00PM</option>
                                                        <option {{(isset($data['inspection'][0]['time_from']) && $data['inspection'][0]['time_from']=='4:30PM'?'selected':'')}} value="4:30PM">4:30PM</option>
                                                        <option {{(isset($data['inspection'][0]['time_from']) && $data['inspection'][0]['time_from']=='5:00PM'?'selected':'')}} value="5:00PM">5:00PM</option>
                                                        <option {{(isset($data['inspection'][0]['time_from']) && $data['inspection'][0]['time_from']=='5:30PM'?'selected':'')}} value="5:30PM">5:30PM</option>
                                                        <option {{(isset($data['inspection'][0]['time_from']) && $data['inspection'][0]['time_from']=='6:00PM'?'selected':'')}} value="6:00PM">6:00PM</option>
                                                        <option {{(isset($data['inspection'][0]['time_from']) && $data['inspection'][0]['time_from']=='6:30PM'?'selected':'')}} value="6:30PM">6:30PM</option>
                                                        <option {{(isset($data['inspection'][0]['time_from']) && $data['inspection'][0]['time_from']=='7:00PM'?'selected':'')}} value="7:00PM">7:00PM</option>
                                                        <option {{(isset($data['inspection'][0]['time_from']) && $data['inspection'][0]['time_from']=='7:30PM'?'selected':'')}} value="7:30PM">7:30PM</option>
                                                        <option {{(isset($data['inspection'][0]['time_from']) && $data['inspection'][0]['time_from']=='8:00PM'?'selected':'')}} value="8:00PM">8:00PM</option>
                                                        <option {{(isset($data['inspection'][0]['time_from']) && $data['inspection'][0]['time_from']=='8:30PM'?'selected':'')}} value="8:30PM">8:30PM</option>
                                                        <option {{(isset($data['inspection'][0]['time_from']) && $data['inspection'][0]['time_from']=='9:00PM'?'selected':'')}} value="9:00PM">9:00PM</option>
                                                        <option {{(isset($data['inspection'][0]['time_from']) && $data['inspection'][0]['time_from']=='9:30PM'?'selected':'')}} value="9:30PM">9:30PM</option>
                                                        <option {{(isset($data['inspection'][0]['time_from']) && $data['inspection'][0]['time_from']=='10:00PM'?'selected':'')}} value="10:00PM">10:00PM</option>
                                                        <option {{(isset($data['inspection'][0]['time_from']) && $data['inspection'][0]['time_from']=='10:30PM'?'selected':'')}} value="10:30PM">10:30PM</option>
                                                        <option {{(isset($data['inspection'][0]['time_from']) && $data['inspection'][0]['time_from']=='11:00PM'?'selected':'')}} value="11:00PM">11:00PM</option>
                                                        <option {{(isset($data['inspection'][0]['time_from']) && $data['inspection'][0]['time_from']=='11:30PM'?'selected':'')}} value="11:30PM">11:30PM</option>
                                                    </select>                                                  
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-xs-12">
                                                <div class="form-group">
                                                    <label>To</label>
                                                    <select type="text" name="time_to" id="time_to" class="form-control" placeholder="to">
                                                
                                                        <option value="">To</option>
                                                    
                                                        <option {{(isset($data['inspection'][0]['time_to']) && $data['inspection'][0]['time_to']=='12:00AM'?'selected':'')}} value="12:00AM">12:00AM</option>
                                                        <option {{(isset($data['inspection'][0]['time_to']) && $data['inspection'][0]['time_to']=='12:30AM'?'selected':'')}} value="12:30AM">12:30AM</option>
                                                        <option {{(isset($data['inspection'][0]['time_to']) && $data['inspection'][0]['time_to']=='1:00AM'?'selected':'')}} value="1:00AM">1:00AM</option>
                                                        <option {{(isset($data['inspection'][0]['time_to']) && $data['inspection'][0]['time_to']=='1:30AM'?'selected':'')}} value="1:30AM">1:30AM</option>
                                                        <option {{(isset($data['inspection'][0]['time_to']) && $data['inspection'][0]['time_to']=='2:00AM'?'selected':'')}} value="2:00AM">2:00AM</option>
                                                        <option {{(isset($data['inspection'][0]['time_to']) && $data['inspection'][0]['time_to']=='2:30AM'?'selected':'')}} value="2:30AM">2:30AM</option>
                                                        <option {{(isset($data['inspection'][0]['time_to']) && $data['inspection'][0]['time_to']=='3:00AM'?'selected':'')}} value="3:00AM">3:00AM</option>
                                                        <option {{(isset($data['inspection'][0]['time_to']) && $data['inspection'][0]['time_to']=='3:30AM'?'selected':'')}} value="3:30AM">3:30AM</option>
                                                        <option {{(isset($data['inspection'][0]['time_to']) && $data['inspection'][0]['time_to']=='4:00AM'?'selected':'')}} value="4:00AM">4:00AM</option>
                                                        <option {{(isset($data['inspection'][0]['time_to']) && $data['inspection'][0]['time_to']=='4:30AM'?'selected':'')}} value="4:30AM">4:30AM</option>
                                                        <option {{(isset($data['inspection'][0]['time_to']) && $data['inspection'][0]['time_to']=='5:00AM'?'selected':'')}} value="5:00AM">5:00AM</option>
                                                        <option {{(isset($data['inspection'][0]['time_to']) && $data['inspection'][0]['time_to']=='5:30AM'?'selected':'')}} value="5:30AM">5:30AM</option>
                                                        <option {{(isset($data['inspection'][0]['time_to']) && $data['inspection'][0]['time_to']=='6:00AM'?'selected':'')}} value="6:00AM">6:00AM</option>
                                                        <option {{(isset($data['inspection'][0]['time_to']) && $data['inspection'][0]['time_to']=='6:30AM'?'selected':'')}} value="6:30AM">6:30AM</option>
                                                        <option {{(isset($data['inspection'][0]['time_to']) && $data['inspection'][0]['time_to']=='7:00AM'?'selected':'')}} value="7:00AM">7:00AM</option>
                                                        <option {{(isset($data['inspection'][0]['time_to']) && $data['inspection'][0]['time_to']=='7:30AM'?'selected':'')}} value="7:30AM">7:30AM</option>
                                                        <option {{(isset($data['inspection'][0]['time_to']) && $data['inspection'][0]['time_to']=='8:00AM'?'selected':'')}} value="8:00AM">8:00AM</option>
                                                        <option {{(isset($data['inspection'][0]['time_to']) && $data['inspection'][0]['time_to']=='8:30AM'?'selected':'')}} value="8:30AM">8:30AM</option>
                                                        <option {{(isset($data['inspection'][0]['time_to']) && $data['inspection'][0]['time_to']=='9:00AM'?'selected':'')}} value="9:00AM">9:00AM</option>
                                                        <option {{(isset($data['inspection'][0]['time_to']) && $data['inspection'][0]['time_to']=='9:30AM'?'selected':'')}} value="9:30AM">9:30AM</option>
                                                        <option {{(isset($data['inspection'][0]['time_to']) && $data['inspection'][0]['time_to']=='10:00AM'?'selected':'')}} value="10:00AM">10:00AM</option>
                                                        <option {{(isset($data['inspection'][0]['time_to']) && $data['inspection'][0]['time_to']=='10:30AM'?'selected':'')}} value="10:30AM">10:30AM</option>
                                                        <option {{(isset($data['inspection'][0]['time_to']) && $data['inspection'][0]['time_to']=='11:00AM'?'selected':'')}} value="11:00AM">11:00AM</option>
                                                        <option {{(isset($data['inspection'][0]['time_to']) && $data['inspection'][0]['time_to']=='11:30AM'?'selected':'')}} value="11:30AM">11:30AM</option>
                                                        <option {{(isset($data['inspection'][0]['time_to']) && $data['inspection'][0]['time_to']=='12:00PM'?'selected':'')}} value="12:00PM">12:00PM</option>
                                                        <option {{(isset($data['inspection'][0]['time_to']) && $data['inspection'][0]['time_to']=='12:30PM'?'selected':'')}} value="12:30PM">12:30PM</option>
                                                        <option {{(isset($data['inspection'][0]['time_to']) && $data['inspection'][0]['time_to']=='1:00PM'?'selected':'')}} value="1:00PM">1:00PM</option>
                                                        <option {{(isset($data['inspection'][0]['time_to']) && $data['inspection'][0]['time_to']=='1:30PM'?'selected':'')}} value="1:30PM">1:30PM</option>
                                                        <option {{(isset($data['inspection'][0]['time_to']) && $data['inspection'][0]['time_to']=='2:00PM'?'selected':'')}} value="2:00PM">2:00PM</option>
                                                        <option {{(isset($data['inspection'][0]['time_to']) && $data['inspection'][0]['time_to']=='2:30PM'?'selected':'')}} value="2:30PM">2:30PM</option>
                                                        <option {{(isset($data['inspection'][0]['time_to']) && $data['inspection'][0]['time_to']=='3:00PM'?'selected':'')}} value="3:00PM">3:00PM</option>
                                                        <option {{(isset($data['inspection'][0]['time_to']) && $data['inspection'][0]['time_to']=='3:30PM'?'selected':'')}} value="3:30PM">3:30PM</option>
                                                        <option {{(isset($data['inspection'][0]['time_to']) && $data['inspection'][0]['time_to']=='4:00PM'?'selected':'')}} value="4:00PM">4:00PM</option>
                                                        <option {{(isset($data['inspection'][0]['time_to']) && $data['inspection'][0]['time_to']=='4:30PM'?'selected':'')}} value="4:30PM">4:30PM</option>
                                                        <option {{(isset($data['inspection'][0]['time_to']) && $data['inspection'][0]['time_to']=='5:00PM'?'selected':'')}} value="5:00PM">5:00PM</option>
                                                        <option {{(isset($data['inspection'][0]['time_to']) && $data['inspection'][0]['time_to']=='5:30PM'?'selected':'')}} value="5:30PM">5:30PM</option>
                                                        <option {{(isset($data['inspection'][0]['time_to']) && $data['inspection'][0]['time_to']=='6:00PM'?'selected':'')}} value="6:00PM">6:00PM</option>
                                                        <option {{(isset($data['inspection'][0]['time_to']) && $data['inspection'][0]['time_to']=='6:30PM'?'selected':'')}} value="6:30PM">6:30PM</option>
                                                        <option {{(isset($data['inspection'][0]['time_to']) && $data['inspection'][0]['time_to']=='7:00PM'?'selected':'')}} value="7:00PM">7:00PM</option>
                                                        <option {{(isset($data['inspection'][0]['time_to']) && $data['inspection'][0]['time_to']=='7:30PM'?'selected':'')}} value="7:30PM">7:30PM</option>
                                                        <option {{(isset($data['inspection'][0]['time_to']) && $data['inspection'][0]['time_to']=='8:00PM'?'selected':'')}} value="8:00PM">8:00PM</option>
                                                        <option {{(isset($data['inspection'][0]['time_to']) && $data['inspection'][0]['time_to']=='8:30PM'?'selected':'')}} value="8:30PM">8:30PM</option>
                                                        <option {{(isset($data['inspection'][0]['time_to']) && $data['inspection'][0]['time_to']=='9:00PM'?'selected':'')}} value="9:00PM">9:00PM</option>
                                                        <option {{(isset($data['inspection'][0]['time_to']) && $data['inspection'][0]['time_to']=='9:30PM'?'selected':'')}} value="9:30PM">9:30PM</option>
                                                        <option {{(isset($data['inspection'][0]['time_to']) && $data['inspection'][0]['time_to']=='10:00PM'?'selected':'')}} value="10:00PM">10:00PM</option>
                                                        <option {{(isset($data['inspection'][0]['time_to']) && $data['inspection'][0]['time_to']=='10:30PM'?'selected':'')}} value="10:30PM">10:30PM</option>
                                                        <option {{(isset($data['inspection'][0]['time_to']) && $data['inspection'][0]['time_to']=='11:00PM'?'selected':'')}} value="11:00PM">11:00PM</option>
                                                        <option {{(isset($data['inspection'][0]['time_to']) && $data['inspection'][0]['time_to']=='11:30PM'?'selected':'')}} value="11:30PM">11:30PM</option>
                                                        
                                                    </select>                                                  
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-xs-12">
                                                <div class="form-group">
                                                <label>Revenue Target</label>
                                                    <input type="text" name="revenue_target" id="revenue_target" class="form-control"  value="{{old('revenue_target',$data['inspection'][0]['revenue_target'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}} placeholder="Revenue Target">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-xs-12">
                                                <div class="form-group">
                                                <label>Financial Year </label>
                                                    <input type="text" name="financial_year" id="financial_year" class="form-control"  value="{{old('financial_year',$data['inspection'][0]['financial_year'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}} placeholder="2020-2021">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-xs-12">
                                                 <div class="form-group">
                                                    <label>Complaint Redeem Type</label>
                                                    <select type="text" name="redeem_type" id="redeem_type" class="form-control" placeholder="Redeem type">
                                                        <option value="">Select Inspection Type </option>
                                                        <option {{(isset($data['inspection'][0]['redeem_type']) && $data['inspection'][0]['redeem_type']=='direct'?'selected':'')}} value="direct">Direct</option>
                                                        <option {{(isset($data['inspection'][0]['redeem_type']) && $data['inspection'][0]['redeem_type']=='forwarded'?'selected':'')}} value="forwarded">Forwarded</option>
                                                    </select>
                                                 </div>
                                            </div>
                                            
                                            <div class="col-lg-4 col-md-6 col-xs-12" >
                                                <div class="form-group">
                                                    <label>Docket Number</label>
                                                    <input type="text" name="docket_number" id="docket_number" class="form-control"  value="{{old('docket_number',$data['inspection'][0]['docket_number'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}} placeholder="Details">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-xs-12" >
                                                <div class="form-group">
                                                    <label>Complaint File Number</label>
                                                    <input type="text" name="file_no" id="file_no" class="form-control"  value="{{old('file_no',$data['inspection'][0]['file_no'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}} placeholder="Details">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-xs-12 " >
                                                <div class="form-group">
                                                    <label>Place Visited</label>
                                                    <input type="text" name="place_visited" id="place_visited" class="form-control"  value="{{old('place_visited',$data['inspection'][0]['place_visited'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}} placeholder="Details">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-xs-12">
                                                <div class="form-group">
                                                    <label>Vehicle Used</label>
                                                    <select type="text" name="vehicle_used" id="vehicle_used" class="form-control" placeholder="vehicle used">
                                                        <option value="">vehicle used </option>
                                                        <option {{(isset($data['inspection'][0]['vehicle_used']) && $data['inspection'][0]['vehicle_used']=='yes'?'selected':'')}} value="yes">Yes</option>
                                                        <option {{(isset($data['inspection'][0]['vehicle_used']) && $data['inspection'][0]['vehicle_used']=='no'?'selected':'')}} value="no">No</option>
                                                    </select>                                                  
                                                </div>
                                            </div>
                                            @php
                                                $style  =   '';
                                            @endphp
                                            @if(isset($data['inspection'][0]['vehicle_used']) && $data['inspection'][0]['vehicle_used']=='yes')
                                                @php
                                                    $style  =   'style=display:block;';
                                                @endphp
                                            @endif
                                            <div class="col-lg-4 col-md-6 col-xs-12 hide-box vehicle-detail-sec" {{$style}}>
                                                <div class="form-group">
                                                    <label>Vehicle Reg no. </label>
                                                    <select type="text" name="vehicle_id" id="vehicle_id" class="form-control" placeholder="vehicle no">
                                                        <option value="-1">---PLEASE SELECT---</option>
                                                        @foreach ($data['vehicles'] as $vehicle)
                                                        <option value="{{$vehicle['id']}}" {{(isset($data['inspection'][0]['vehicle_id']) && $data['inspection'][0]['vehicle_id']==$vehicle['id'])?'selected':''}}>{{$vehicle['register_number']}}</option>
                                                        @endforeach
                                                    </select>                                                  
                                                </div>
                                            </div>
                                            
                                            <div class="col-lg-4 col-md-6 col-xs-12 hide-box vehicle-detail-sec" {{$style}}>
                                                 <div class="form-group">
                                                 <label>Total KM</label>
                                                    <input type="text" name="total_km" id="total_km" class="form-control"  value="{{old('total_km',$data['inspection'][0]['total_km'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}} placeholder="Total KM">
                                                </div>
                                            </div>

                                            <div class="col-lg-4 col-md-6 col-xs-12" id="type_of_trade_inspected_sect">
                                                <div class="form-group">
                                                    <label>Type of Trade Inspected</label>
                                                    <select type="text" name="type_of_trade_inspected" id="type_of_trade_inspected" class="form-control" placeholder="type of trade">
                                                        <option value="">Type of trade </option>
                                                        <option {{(isset($data['inspection'][0]['type_of_trade_inspected']) && $data['inspection'][0]['type_of_trade_inspected']=='mineral_water'?'selected':'')}} value="mineral_water">Mineral Water</option>
                                                        <option {{(isset($data['inspection'][0]['type_of_trade_inspected']) && $data['inspection'][0]['type_of_trade_inspected']=='canned_beverages'?'selected':'')}} value="canned_beverages">Canned Beverages</option>
                                                        <option {{(isset($data['inspection'][0]['type_of_trade_inspected']) && $data['inspection'][0]['type_of_trade_inspected']=='icecream'?'selected':'')}} value="icecream">Icecream</option>
                                                        <option {{(isset($data['inspection'][0]['type_of_trade_inspected']) && $data['inspection'][0]['type_of_trade_inspected']=='frozen_desert'?'selected':'')}} value="frozen_desert">Frozen Desert</option>
                                                        <option {{(isset($data['inspection'][0]['type_of_trade_inspected']) && $data['inspection'][0]['type_of_trade_inspected']=='bread'?'selected':'')}} value="bread">Bread</option>
                                                        <option {{(isset($data['inspection'][0]['type_of_trade_inspected']) && $data['inspection'][0]['type_of_trade_inspected']=='biscuit'?'selected':'')}} value="biscuit">Biscuit</option>
                                                        <option {{(isset($data['inspection'][0]['type_of_trade_inspected']) && $data['inspection'][0]['type_of_trade_inspected']=='cake'?'selected':'')}} value="cake">Cake</option>
                                                        <option {{(isset($data['inspection'][0]['type_of_trade_inspected']) && $data['inspection'][0]['type_of_trade_inspected']=='sweet_preparations'?'selected':'')}} value="sweet_preparations">Sweet Preparations</option>
                                                        <option {{(isset($data['inspection'][0]['type_of_trade_inspected']) && $data['inspection'][0]['type_of_trade_inspected']=='noodles'?'selected':'')}} value="noodles">Noodles</option>
                                                        <option {{(isset($data['inspection'][0]['type_of_trade_inspected']) && $data['inspection'][0]['type_of_trade_inspected']=='ready_to_cook_foods'?'selected':'')}} value="ready_to_cook_foods">Ready to cook foods</option>
                                                        <option {{(isset($data['inspection'][0]['type_of_trade_inspected']) && $data['inspection'][0]['type_of_trade_inspected']=='curry_powder'?'selected':'')}} value="curry_powder">Curry Powder</option>
                                                        <option {{(isset($data['inspection'][0]['type_of_trade_inspected']) && $data['inspection'][0]['type_of_trade_inspected']=='food_grains'?'selected':'')}} value="food_grains">Food Grains</option>
                                                        <option {{(isset($data['inspection'][0]['type_of_trade_inspected']) && $data['inspection'][0]['type_of_trade_inspected']=='powerded_food_grains'?'selected':'')}} value="powerded_food_grains">Powdered Food Grains</option>
                                                        <option {{(isset($data['inspection'][0]['type_of_trade_inspected']) && $data['inspection'][0]['type_of_trade_inspected']=='dry_fruits'?'selected':'')}} value="dry_fruits">Dry Fruits</option>
                                                        <option {{(isset($data['inspection'][0]['type_of_trade_inspected']) && $data['inspection'][0]['type_of_trade_inspected']=='nuts'?'selected':'')}} value="nuts">Nuts</option>
                                                        <option {{(isset($data['inspection'][0]['type_of_trade_inspected']) && $data['inspection'][0]['type_of_trade_inspected']=='fruits'?'selected':'')}} value="fruits">Fruits</option>
                                                        <option {{(isset($data['inspection'][0]['type_of_trade_inspected']) && $data['inspection'][0]['type_of_trade_inspected']=='chocolates'?'selected':'')}} value="chocolates">Chocolates</option>
                                                        <option {{(isset($data['inspection'][0]['type_of_trade_inspected']) && $data['inspection'][0]['type_of_trade_inspected']=='electronic_goods'?'selected':'')}} value="electronic_goods">Electronic Goods</option>
                                                        <option {{(isset($data['inspection'][0]['type_of_trade_inspected']) && $data['inspection'][0]['type_of_trade_inspected']=='home_appliances'?'selected':'')}} value="home_appliances">Home Appliances</option>
                                                        <option {{(isset($data['inspection'][0]['type_of_trade_inspected']) && $data['inspection'][0]['type_of_trade_inspected']=='electrical_goods'?'selected':'')}} value="electrical_goods">Electrical Goods</option>
                                                        <option {{(isset($data['inspection'][0]['type_of_trade_inspected']) && $data['inspection'][0]['type_of_trade_inspected']=='textiles'?'selected':'')}} value="textiles">Textiles</option>
                                                        <option {{(isset($data['inspection'][0]['type_of_trade_inspected']) && $data['inspection'][0]['type_of_trade_inspected']=='ready_made_garments'?'selected':'')}} value="ready_made_garments">Ready Made Garments</option>
                                                        <option {{(isset($data['inspection'][0]['type_of_trade_inspected']) && $data['inspection'][0]['type_of_trade_inspected']=='lpg_cylinder'?'selected':'')}} value="lpg_cylinder">LPG Cylinder</option>
                                                        <option {{(isset($data['inspection'][0]['type_of_trade_inspected']) && $data['inspection'][0]['type_of_trade_inspected']=='toys'?'selected':'')}} value="toys">Toys</option>
                                                        <option {{(isset($data['inspection'][0]['type_of_trade_inspected']) && $data['inspection'][0]['type_of_trade_inspected']=='ornaments'?'selected':'')}} value="ornaments">Ornaments</option>
                                                        <option {{(isset($data['inspection'][0]['type_of_trade_inspected']) && $data['inspection'][0]['type_of_trade_inspected']=='gold_silver_jewellery'?'selected':'')}} value="gold_silver_jewellery">Gold / silver Jewellery</option>
                                                        <option {{(isset($data['inspection'][0]['type_of_trade_inspected']) && $data['inspection'][0]['type_of_trade_inspected']=='books'?'selected':'')}} value="books">Books</option>
                                                        <option {{(isset($data['inspection'][0]['type_of_trade_inspected']) && $data['inspection'][0]['type_of_trade_inspected']=='stationery'?'selected':'')}} value="stationery">Stationery</option>
                                                        <option {{(isset($data['inspection'][0]['type_of_trade_inspected']) && $data['inspection'][0]['type_of_trade_inspected']=='others'?'selected':'')}} value="others">Others</option>
                                                    </select>  
                                                </div>
                                            </div>
                                            @php
                                                $style  =   '';
                                            @endphp
                                            @if(isset($data['inspection'][0]['type_of_trade_inspected']) && $data['inspection'][0]['type_of_trade_inspected']=='others')
                                                @php
                                                    $style  =   'style=display:block;';
                                                @endphp
                                            @endif
                                            <div class="col-lg-4 col-md-6 col-xs-12 hide-box" {{$style}} id="others_spec_sec">
                                                <div class="form-group">
                                                    <label>Others Specify</label>
                                                    <input type="text" name="others_specify" id="others_specify" class="form-control"  value="{{old('others_specify',$data['inspection'][0]['others_specify'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}} placeholder="Details">
                                                </div>
                                            </div>
                                            
                                            <div class="col-lg-4 col-md-6 col-xs-12">
                                                <div class="form-group">
                                                    <label>Number of Inspections</label>
                                                    <input type="text" name="number_of_inspections" id="number_of_inspections" class="form-control"  value="{{old('number_of_inspections',$data['inspection'][0]['number_of_inspections'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}} placeholder="No of case Booked">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-xs-12">
                                                <div class="form-group">
                                                    <label>Number of Case Booked</label>
                                                    <input type="text" name="number_of_case_inspected" id="number_of_case_inspected" class="form-control"  value="{{old('number_of_case_inspected',$data['inspection'][0]['number_of_case_inspected'] ?? '')}}" {{$data['formType']=='show'?'disabled':''}} placeholder="No of case Booked">
                                                </div>
                                            </div>
                                            <div class="col-xs-12">
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
<style>
.hide-box{
    display: none;
}
</style>
<script>
    $('#inspection_type').change(function(e){
        if(this.value == 'combined' || this.value == 'special_drive'){
            $('.ins-detail-sec').show();
        }
        else{
            $('.ins-detail-sec').hide();
        }
    });
    $('#type_of_trade_inspected').change(function(e){
        if(this.value == 'others'){
            $('#others_spec_sec').show();
        }
        else{
            $('#others_spec_sec').hide();
        }
    });

    $('#vehicle_used').change(function(e){
        if(this.value == 'yes'){
            $('.vehicle-detail-sec').show();
        }
        else{
            $('.vehicle-detail-sec').hide();
        }
    });
</script>
@endsection