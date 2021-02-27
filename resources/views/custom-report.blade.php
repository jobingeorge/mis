<!-- @extends('layouts.app') -->
@section('content')
<div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
            
                      <h3 class="page-header">REPORTS</h3>
                  
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                        <div class="panel-group">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                  <h4>Custom Reports</h4>
                                
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
                                         <!-- <form role="form" action="" id="userCreateForm" name="repairMaintainenceForm" method="POST" class="row"> -->
                                              <div class="col-lg-4">
                                                <div class="form-group">
                                                <label>Start Year</label>
                                                <select type="text" name="year" id="year" class="form-control" >
                                                       <option value="2021">2021</option> 
                                                       <option value="2020">2020</option> 
                                                       <option value="2019">2019</option> 
                                                       <option value="2018">2018</option> 
                                                       <option value="2017">2017</option> 
                                                       <option value="2016">2016</option> 
                                                       <option value="2015">2015</option> 
                                                       <option value="2014">2014</option> 
                                                       <option value="2013">2013</option> 
                                                       <option value="2012">2012</option> 
                                                       <option value="2011">2011</option> 
                                                       <option value="2010">2010</option> 
                                                       <option value="2009">2009</option> 
                                                       <option value="2008">2008</option> 
                                                       <option value="2007">2007</option> 
                                                       <option value="2006">2006</option> 
                                                       <option value="2005">2005</option> 
                                                       <option value="2004">2004</option> 
                                                       <option value="2003">2003</option> 
                                                       <option value="2002">2002</option> 
                                                       <option value="2001">2001</option> 
                                                       <option value="2000">2000</option> 
                                                       <option value="1999">1999</option> 
                                                       <option value="1998">1998</option> 
                                                       <option value="1997">1997</option> 
                                                       <option value="1996">1996</option> 
                                                       <option value="1995">1995</option> 
                                                       <option value="1994">1994</option> 
                                                       <option value="1993">1993</option> 
                                                       <option value="1992">1992</option> 
                                                       <option value="1991">1991</option> 
                                                       <option value="1990">1990</option> 
                                                    </select>
                                                </div>
                                              </div>
                                              <div class="col-lg-4">
                                                <div class="form-group">
                                                <label>End Year</label>
                                                <select type="text" name="year" id="year" class="form-control" >
                                                       <option value="2021">2021</option> 
                                                       <option value="2020">2020</option> 
                                                       <option value="2019">2019</option> 
                                                       <option value="2018">2018</option> 
                                                       <option value="2017">2017</option> 
                                                       <option value="2016">2016</option> 
                                                       <option value="2015">2015</option> 
                                                       <option value="2014">2014</option> 
                                                       <option value="2013">2013</option> 
                                                       <option value="2012">2012</option> 
                                                       <option value="2011">2011</option> 
                                                       <option value="2010">2010</option> 
                                                       <option value="2009">2009</option> 
                                                       <option value="2008">2008</option> 
                                                       <option value="2007">2007</option> 
                                                       <option value="2006">2006</option> 
                                                       <option value="2005">2005</option> 
                                                       <option value="2004">2004</option> 
                                                       <option value="2003">2003</option> 
                                                       <option value="2002">2002</option> 
                                                       <option value="2001">2001</option> 
                                                       <option value="2000">2000</option> 
                                                       <option value="1999">1999</option> 
                                                       <option value="1998">1998</option> 
                                                       <option value="1997">1997</option> 
                                                       <option value="1996">1996</option> 
                                                       <option value="1995">1995</option> 
                                                       <option value="1994">1994</option> 
                                                       <option value="1993">1993</option> 
                                                       <option value="1992">1992</option> 
                                                       <option value="1991">1991</option> 
                                                       <option value="1990">1990</option> 
                                                    </select>
                                                </div>
                                              </div>
                                               <div class="col-lg-4">
                                                <div class="form-group">
                                                <label>Start Month</label>
                                                <select type="text" name="month" id="month" class="form-control" >
                                                       <option value="january">January</option> 
                                                       <option value="february">February</option> 
                                                       <option value="march">March</option> 
                                                       <option value="april">April</option> 
                                                       <option value="may">May</option> 
                                                       <option value="june">June</option> 
                                                       <option value="july">July</option> 
                                                       <option value="august">August</option> 
                                                       <option value="september">September</option> 
                                                       <option value="october">October</option> 
                                                       <option value="november">November</option> 
                                                       <option value="december">December</option> 
                                                    </select>
                                                </div>
                                              </div> 
                                               <div class="col-lg-4">
                                                <div class="form-group">
                                                <label>End Month</label>
                                                <select type="text" name="month" id="month" class="form-control" >
                                                       <option value="january">January</option> 
                                                       <option value="february">February</option> 
                                                       <option value="march">March</option> 
                                                       <option value="april">April</option> 
                                                       <option value="may">May</option> 
                                                       <option value="june">June</option> 
                                                       <option value="july">July</option> 
                                                       <option value="august">August</option> 
                                                       <option value="september">September</option> 
                                                       <option value="october">October</option> 
                                                       <option value="november">November</option> 
                                                       <option value="december">December</option> 
                                                    </select>
                                                </div>
                                              </div>
                                              <div class="col-lg-4">
                                                <div class="form-group">
                                                <label>Regions</label>
                                                <select type="text" name="region" id="region" class="form-control" >
                                                       <option value="">Select Region</option> 
                                                       <option value="0">South</option> 
                                                       <option value="1">Central</option> 
                                                       <option value="2">North</option> 
                                                    </select>
                                                </div>
                                              </div>
                                               <div class="col-lg-4">
                                                <div class="form-group">
                                                <label>Districts</label>
                                                <select type="text" name="district" id="district" class="form-control" >
                                                       <option>Select District</option> 
                                                    </select>
                                                </div>
                                              </div>
                                              <div class="col-lg-4">
                                                <div class="form-group">
                                                <label>Instruments</label>
                                               <select type="text" name="instruments_verified" id="instruments_verified" class="form-control" >
                                            
                                                    <option value="">Select Instruments</option>
                                                   
                                                    <option value="iron_weights_parellelopiped">Iron Weights Parellelopiped</option>
                                                    <option value="iron_weights_hexagonal">Iron Weights Hexagonal</option>
                                                    <option value="bullion_weights">Bullion Weights</option>
                                                    <option value="sheet_metal_weights">Sheet Metal Weights</option>
                                                    <option value="cyllinderical_knob_type_weights">Cyllinderical Knob Type Weights</option>
                                                    <option value="carat_weights">Carat Weights</option>
                                                    <option value="fuel_dispensor">Fuel Dispensor</option>
                                                </select>
                                                </div>
                                              </div>
                                              <div class="col-lg-4">
                                                <div class="form-group">
                                                <label>Trades</label>
                                                <select type="text" name="type_of_trade_inspected" id="type_of_trade_inspected" class="form-control">
                                                        <option value="">Type of trade </option>
                                                        <option  value="mineral_water">Mineral Water</option>
                                                        <option  value="canned_beverages">Canned Beverages</option>
                                                        <option  value="icecream">Icecream</option>
                                                        <option value="frozen_desert">Frozen Desert</option>
                                                        <option  value="bread">Bread</option>
                                                        <option  value="biscuit">Biscuit</option>
                                                        <option  value="cake">Cake</option>
                                                        <option  value="sweet_preparations">Sweet Preparations</option>
                                                        <option  value="noodles">Noodles</option>
                                                        <option value="ready_to_cook_foods">Ready to cook foods</option>
                                                        <option value="curry_powder">Curry Powder</option>
                                                        <option value="food_grains">Food Grains</option>
                                                        <option  value="powerded_food_grains">Powdered Food Grains</option>
                                                        <option  value="dry_fruits">Dry Fruits</option>
                                                        <option  value="nuts">Nuts</option>
                                                        <option value="fruits">Fruits</option>
                                                        <option  value="chocolates">Chocolates</option>
                                                        <option  value="electronic_goods">Electronic Goods</option>
                                                        <option value="home_appliances">Home Appliances</option>
                                                        <option value="electrical_goods">Electrical Goods</option>
                                                        <option value="textiles">Textiles</option>
                                                        <option value="ready_made_garments">Ready Made Garments</option>
                                                        <option value="lpg_cylinder">LPG Cylinder</option>
                                                        <option value="toys">Toys</option>
                                                        <option value="ornaments">Ornaments</option>
                                                        <option value="gold_silver_jewellery">Gold / silver Jewellery</option>
                                                        <option value="books">Books</option>
                                                        <option value="stationery">Stationery</option>
                                                        <option value="others">Others</option>
                                                    </select>  
                                                </div>
                                              </div>
                                              <div class="col-lg-4">
                                                <div class="form-group">
                                                <label>Based on</label>
                                                <select type="text" name="based_on" id="based_on" class="form-control" >
                                                       <option>Select </option>
                                                       <option value="inspection">Inspection</option>
                                                       <option value="trade">Trade</option>
                                                       <option value="offence">Offence</option>
                                                       <option value="fine">Fine</option>
                                                       <option value="cases">Cases</option>
                                                       <option value="rti">RTI</option>
                                                       <option value="fees">Fees</option>

                                                    </select>
                                                </div>
                                              </div>
                                              
                                             <div class="row">
                                            
                                            <div class="col-md-12 text-center">
                                                <a href="" class="btn btn-primary " >Generate Report</a>
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
<script>
                 
                 $(document).on('change','#region',function(){
                     var region_id=$(this).val(); 
                        GetDistrict(region_id);

                 });
                
                    function    GetDistrict(did){
                        var url="{{route('GetDistrict')}}";
                        $.ajax({
                            url:url,
                            type:'GET',
                            data : {did:did},
                            success: function(res) {
                                $("#district").html(res);
                            }
                        });
                    }

        </script>
@endsection