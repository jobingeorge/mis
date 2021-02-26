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
                                  <h4>State Reports</h4>
                                
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
                                                <label></label>
                                                <select type="text" name="language" id="language" class="form-control" >
                                                        <option value="english">English</option>
                                                        <option value="malayalam">Malayalam</option>
                                                    </select>
                                                </div>
                                              </div>
                                               <div class="col-lg-4">
                                                <div class="form-group">
                                                <label></label>
                                                <select type="text" name="period" id="period" class="form-control" >
                                                       <option value="monthly">Monthly </option> 
                                                       <option value="quarterly">Quarterly</option> 
                                                    </select>
                                                </div>
                                              </div>
                                             
                                          <div class="col-lg-4">
                                                <div class="form-group">
                                                <label></label>
                                                <select type="text" name="report_title" id="report_title" class="form-control" >
                                                        <option class="english">Select Report Title</option>
                                                         @foreach ($data['report_titles'] as $reportTitle)
                                                        <option value="{{$reportTitle['id']}}" class="english">{{$reportTitle['report_title']}}</option>
                                                        @endforeach
                                                        <option value="" class="malayalam">മോട്ടോർ ട്രാൻസ്‌പോർട് റിട്ടേൺ</option>
                                                        <option value="" class="malayalam">മുൻ‌കൂർ യാത്ര പരിപാടി</option>
                                                        <option value="" class="malayalam">സഞ്ചാര ഡയറി</option> 
                                                        <option value="" class="malayalam">റെവന്യൂ ശേഖരണ റിപ്പോർട്ട്</option>
                                                        <option value="" class="malayalam">ട്രേഡ് വൈസ് ഇൻസ്‌പെക്ഷൻ റിപ്പോർട്ട്</option>
                                                        <option value="" class="malayalam">കേസുകളും രാജിഫീസും</option>
                                                        <option value="" class="malayalam">പരാതികൾ</option>
                                                        <option value="" class="malayalam">സ്പെഷ്യൽ ഡ്രൈവ് റിപ്പോർട്ട്</option>
                                                        <option value="" class="malayalam">റേഷൻ കടകളുടെ പരിശോധന</option>
                                                        <option value="" class="malayalam">എൻഫോഴ്‌സ്‌മെന്റ് സ്ഥിതി വിവരം</option>
                                                        <option value="" class="malayalam">പ്രവർത്തന മികവ് അവലോകനം - Department OF LMO</option>
                                                        <option value="" class="malayalam">പുനഃ പരിശോധനയും മുദ്ര വയ്‌പും</option>
                                                        <option value="" class="malayalam">കോംപാരറ്റീവ് സ്റ്റെമെന്റ്റ്</option>
                                                        <option value="" class="malayalam">സേവനവകാശം</option>
                                                        <option value="" class="malayalam">വാഹനം ഉപയോഗിച്ചുള്ള പരിശോധന</option>
                                                        <option value="" class="malayalam">കേസ്സ് രേജിസ്റെർഡ് ബൈ ലീഗൽ മെട്രോളജി</option>
                                                        <option value="" class="malayalam">ഒഫൻസ് റിപ്പോർട്ട്</option>
                                                        <option value="" class="malayalam">കംപ്ലൈന്റ്സ് ബൈ ലിങ്കിംഗ് വിത്ത് സുതാര്യം</option>
                                                        <option value="" class="malayalam">ട്രേഡ് വൈസ് ഇൻസ്‌പെക്ഷൻ റിപ്പോർട്ട് (കണ്സോളിഡേറ്റഡ് )</option>
                                                        <option value="" class="malayalam">ചെല്ലാൻ റിപ്പോർട്ട്</option>
                                                        <option value="" class="malayalam">കംപ്ലൈന്റ്റ് രജിസ്റ്റർ</option>
                                                        <option value="" class="malayalam">ഡിസ്‌സിപ്ലിനറി ആക്ഷൻ ടേക്കൺ എഗൈൻസ്റ് ഓഫീസർസ്</option>
                                                        <option value="" class="malayalam">ഇൻസ്‌പെക്ഷൻ റെഗാർഡിങ് മോട്ടോർ വെഹിക്കിൾ</option>
                                                        <option value="" class="malayalam">റൈറ്റ് ടു ഇൻഫർമേഷൻ ആക്ട് കേസ് രജിസ്റ്റർ</option>
                                                        <option value="" class="malayalam">ആർ ടി ഐ ഇയർലി റിപ്പോർട്ട്</option>
                                                        <option value="" class="malayalam">ട്രെയിനിങ് രജിസ്റ്റർ</option>
                                                        <option value="" class="malayalam">ഇൻക്യൂബമെന്റ്</option>
                                                        <option value="" class="malayalam">ഫൈനൽ സീനിയോറിറ്റി ലിസ്റ്റ് - Officers in LMD</option>
                                                        <option value="" class="malayalam">സ്യുട് രജിസ്റ്റർ (FORM XIX)</option>
                                                        
                                                    </select>
                                                </div>
                                              </div>

                                               <div class="col-lg-4">
                                                <div class="form-group">
                                                <label></label>
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
                                                <label></label>
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
                                              
                                             <div class="row">                              
                                                <div class="col-md-12 text-center">
                                                    <a href="" class="btn btn-primary " >Generate Report</a>
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
  $(".malayalam").hide();
                 $(document).on('change','#language',function(){
                     var language=$(this).val(); 
                        if(language =="english"){
                           $(".english").show();
                           $(".malayalam").hide();
                        }
                        else{
                          $(".english").hide();
                           $(".malayalam").show();
                        }

                 });
</script>
@endsection