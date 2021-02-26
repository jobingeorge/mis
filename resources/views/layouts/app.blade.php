<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'LMD') }}</title>

    <!-- Scripts -->
    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->

    <!-- added by jj -->
        <link rel="stylesheet"  href="{{asset('/css/bootstrap.min.css')}}">
        <link rel="stylesheet"  href="{{asset('/css/metisMenu.min.css')}}">
        <link rel="stylesheet"  href="{{asset('/css/startmin.css')}}"> 
        <link rel="stylesheet"  href="{{asset('/css/font-awesome.min.css')}}"> 

        <link rel="stylesheet"  href="{{asset('/css/jquery.dataTables.min.css')}}"> 
        <link rel="stylesheet"  href="{{asset('/css/buttons.dataTables.min.css')}}"> 
        <link rel="stylesheet"  href="{{asset('/css/bootstrap-datepicker.min.css')}}">
        <link rel="stylesheet"  href="{{asset('/css/dataTables.checkboxes.css')}}"> 
         <script src="{{asset('/js/jquery.min.js')}}"></script>
         <script src="{{asset('/js/bootstrap-datepicker.min.js')}}"></script>
       

</head>
<body>
    <div id="app" >
      <?php  $uri_segment = request()->segment(1);  ?>
     @guest
      @else
        <!-- <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm" > 
            <div class="container" style="border:1px solid red">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'MIS') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" 
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  
                    <ul class="navbar-nav mr-auto">
                    </ul>

                   
                    <ul class="navbar-nav ml-auto">
                        
                       
                             <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li> -->
                            <!-- @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif 
                        
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        
                    </ul>
                </div>
            </div>
        </nav> -->
        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.html">METRIS</a>
                </div>

                <!-- <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <ul class="nav navbar-nav navbar-left navbar-top-links">
                    <li><a href="#"><i class="fa fa-home fa-fw"></i> Website</a></li>
                </ul> -->

                <ul class="nav navbar-right navbar-top-links">
                    <!-- <li class="dropdown navbar-inverse">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-bell fa-fw"></i> <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu dropdown-alerts">
                            <li>
                                <a href="#">
                                    <div>
                                        <i class="fa fa-comment fa-fw"></i> New Comment
                                        <span class="pull-right text-muted small">4 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div>
                                        <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                        <span class="pull-right text-muted small">12 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div>
                                        <i class="fa fa-envelope fa-fw"></i> Message Sent
                                        <span class="pull-right text-muted small">4 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div>
                                        <i class="fa fa-tasks fa-fw"></i> New Task
                                        <span class="pull-right text-muted small">4 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div>
                                        <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                        <span class="pull-right text-muted small">4 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a class="text-center" href="#">
                                    <strong>See All Alerts</strong>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </li>
                        </ul>
                    </li> -->
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i>  {{ Auth::user()->name }}<b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <!-- <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                            </li>
                            <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                            </li> -->
                            <!-- <li class="divider"></li> -->
                            <li>
                            <!-- <a href="{{ route('logout') }}"><i class="fa fa-sign-out fa-fw" 
                            onclick="event.preventDefault();document.getElementById('logout-form').submit();"></i> Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none"> @csrf
                            </form> -->
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="fa fa-sign-out fa-fw" ></i> {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- /.navbar-top-links -->

                <div class="navbar-default sidebar" role="navigation" style="height:100VH">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            <li>
                               <img src="{{asset('/img/lmd-logo-new.png')}}" class='img-responsive'>
                                <!-- /input-group -->
                            </li>
                            <li>
                              
                                <a href="/home" class="<?php if($uri_segment=='' || $uri_segment=='home'){ echo "active"; } else { echo " ";} ?>">
                                <i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                            </li>
                            @if( Auth::user()->officerLevel !='1' )

                             @if( Auth::user()->officerLevel !='3' )
                            <li>
                                <a href="/users" class="<?php if($uri_segment=='users'){ echo "active"; } ?>">
                                <i class=" fa fa-plus fa-fw"></i>Users</a>
                            </li>
                            @endif

                            <li>
                                <a href="#"><i class="fa fa-car"></i>
                                Vehicle Management<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="/vehicle-management" class="<?php if($uri_segment=='vehicle-management'){ echo "active"; } ?>"><i class=" fa fa-plus fa-fw"></i>Basic Data of Vehicle</a>
                                    </li>
                                    <li>
                                        <a href="/custody-management" class="<?php if($uri_segment=='vehicle-management'){ echo "active"; } ?>"><i class=" fa fa-plus fa-fw"></i>Custody Management</a>
                                    </li>
                                    <li>
                                        <a href="/fuel-management" class="<?php if($uri_segment=='fuel-management'){ echo "active"; } ?>"><i class=" fa fa-plus fa-fw"></i>Fuel Management</a>
                                    </li>
                                    <li>
                                        <a href="/repair-maintainence-management" class="<?php if($uri_segment=='repair-maintainence-management'){ echo "active"; } ?>"><i class=" fa fa-plus fa-fw"></i>Repair and Maintainence Management</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> RTI<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="/rti-new-application" class="<?php if($uri_segment=='rti-new-application'){ echo "active"; } ?>">New Application</a>
                                    </li>
                                    <li>
                                    <a href="/rti-appeal-application" class="<?php if($uri_segment=='rti-appeal-application'){ echo "active"; } ?>">Appeal Application</a>
                                    </li>
                                    <li>
                                    <a href="/rti-public-authority" class="<?php if($uri_segment=='rti-public-authority'){ echo "active"; } ?>">Public Authority</a>
                                    </li>
                                    <li>
                                    <a href="/rti-penalty" class="<?php if($uri_segment=='rti-penalty'){ echo "active"; } ?>">Penalties</a>
                                    </li> 
                                    <li>
                                    <a href="/rti-public-information-officer" class="<?php if($uri_segment=='rti-public-information-officer'){ echo "active"; } ?>">Designation of Public information officer</a>
                                    </li>
                                    <li>
                                    <a href="/rti-diciplinary-action" class="<?php if($uri_segment=='rti-diciplinary-action'){ echo "active"; } ?>">Disciplinary action taken against officers</a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> HR<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="/hr-employee-details" class="<?php if($uri_segment=='rti-new-application'){ echo "active"; } ?>">Employee Details</a>
                                    </li>
                                    <li>
                                    <a href="/hr-transfer-application" class="<?php if($uri_segment=='rti-appeal-application'){ echo "active"; } ?>">Transfer Application Submission
                                    </a>
                                    </li>
                                    <li>
                                    <a href="/hr-training-register" class="<?php if($uri_segment=='rti-public-authority'){ echo "active"; } ?>">Training Register</a>
                                    </li>
                                    <li>
                                    <a href="/hr-reports" class="<?php if($uri_segment=='rti-penalty'){ echo "active"; } ?>">Report</a>
                                    </li> 
                                   
                                 
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            @endif

                            <li>
                                <a href="#" class="<?php if($uri_segment=='reports'){ echo "active"; } ?>"><i class=" fa fa-file fa-fw"></i>Reports<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>

                                        @if( Auth::user()->officerLevel <='1' )
                                        <a href="/reports-state" class="<?php if($uri_segment=='reports-state'){ echo "active"; } ?>"><i class=" fa fa-file fa-fw"></i>State</a>
                                     </li>
                                     <li>
                                        <a href="/reports-region" class="<?php if($uri_segment=='reports-region'){ echo "active"; } ?>"><i class=" fa fa-file fa-fw"></i>Region</a>
                                    </li>
                                    <li>
                                        <a href="/reports-district" class="<?php if($uri_segment=='reports-district'){ echo "active"; } ?>"><i class=" fa fa-file fa-fw"></i>District</a>
                                    </li>
                                    <li>
                                        <a href="/reports-suboffice" class="<?php if($uri_segment=='reports-suboffice'){ echo "active"; } ?>"><i class=" fa fa-file fa-fw"></i>Suboffice</a>
                                    </li>

                                      @elseif( Auth::user()->officerLevel =='2 ' )
                                    <li>
                                        <a href="/reports-region" class="<?php if($uri_segment=='reports-region'){ echo "active"; } ?>"><i class=" fa fa-file fa-fw"></i>Region</a>
                                    </li>
                                    <li>
                                        <a href="/reports-district" class="<?php if($uri_segment=='reports-district'){ echo "active"; } ?>"><i class=" fa fa-file fa-fw"></i>District</a>
                                    </li>
                                    <li>
                                        <a href="/reports-suboffice" class="<?php if($uri_segment=='reports-suboffice'){ echo "active"; } ?>"><i class=" fa fa-file fa-fw"></i>Suboffice</a>
                                    </li>
                                    @elseif(Auth::user()->officerLevel =='3' )
                                     <li>
                                        <a href="/reports-district" class="<?php if($uri_segment=='reports-district'){ echo "active"; } ?>"><i class=" fa fa-file fa-fw"></i>District</a>
                                    </li>
                                    <li>
                                        <a href="/reports-suboffice" class="<?php if($uri_segment=='reports-suboffice'){ echo "active"; } ?>"><i class=" fa fa-file fa-fw"></i>Suboffice</a>
                                    </li>
                                    @elseif(Auth::user()->officerLevel =='4')
                                    <li>
                                        <a href="/reports-suboffice" class="<?php if($uri_segment=='reports-suboffice'){ echo "active"; } ?>"><i class=" fa fa-file fa-fw"></i>Suboffice</a>
                                    </li>
                                    @endif
                                </ul>
                            </li>


                             @if( Auth::user()->officerLevel !='1' )

                             <li>
                                <a href="/file-disposal" class="<?php if($uri_segment=='file-disposal'){ echo "active"; } ?>">
                                <i class=" fa fa-file fa-fw"></i>File Disposal</a>
                            </li>
                             <li>
                                <a href="/custom-report" class="<?php if($uri_segment=='custom-report'){ echo "active"; } ?>">
                                <i class=" fa fa-file fa-fw"></i>Customer Report</a>  
                            </li>
                            @endif
                            @if( Auth::user()->officerLevel >='2' )

                            <li>
                                <a href="/monthly-programms" class="<?php if($uri_segment=='monthly-programms'){ echo "active"; } ?>"><i class="fa fa-table fa-fw"></i> Monthly Programs</a>
                            </li>
                         

                            
                            <li>
                                <a href="#"><i class="fa fa-sitemap fa-fw"></i>Master Data<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="/md-verification" class="<?php if($uri_segment=='md-verification'){ echo "active"; } ?>"><i class=" fa fa-diamond fa-fw"></i>Verification</a>
                                    </li>
                                    <li>
                                        <a href="#">Field Inspection <span class="fa arrow"></span></a>
                                        <ul class="nav nav-third-level">
                                            <li>
                                                <a href="/md-fi-complaint-inspection" class="<?php if($uri_segment=='md-fi-complaint-inspection'){ echo "active"; } ?>">Compliance Inspection</a>
                                            </li>
                                            <li>
                                                <a href="/md-fi-surprise-inspection" class="<?php if($uri_segment=='md-fi-surprise-inspection'){ echo "active"; } ?>">Surprise Inspection</a>
                                            </li>
                                            <li>
                                                <a href="/md-fi-redeem-inspection" class="<?php if($uri_segment=='md-fi-complaint-redem-inspection'){ echo "active"; } ?>">Complaint Redeem Inspection</a>
                                            </li>
                                          </ul>
                                        <!-- /.nav-third-level -->
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            
                            @endif

                        </ul>
                    </div>
                    <!-- /.sidebar-collapse -->
                </div>
                <!-- /.navbar-static-side -->
            </nav>
        @endguest
        <main class="py-4"  >
            @yield('content')
        </main>
    </div>
    </div>
       
        <script src="{{asset('js/bootstrap.min.js')}}"></script>
        <script src="{{asset('/js/metisMenu.min.js')}}"></script>
        <script src="{{asset('/js/startmin.js')}}"></script>
        <script src="{{asset('/js/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('/js/dataTables.bootstrap.min.js')}}"></script>
        <script src="{{asset('/js/bootbox.min.js')}}"></script> 

        <script src="{{asset('/js/dataTables.buttons.min.js')}}"></script>
        <script src="{{asset('/js/buttons.flash.min.js')}}"></script> 
        <script src="{{asset('/js/jszip.min.js')}}"></script> 
        <script src="{{asset('/js/pdfmake.min.js')}}"></script>
        <script src="{{asset('/js/vfs_fonts.js')}}"></script>
         <script src="{{asset('/js/buttons.html5.min.js')}}"></script> 
          <script src="{{asset('/js/buttons.print.min.js')}}"></script>
          <script src="{{asset('/js/buttons.colVis.min.js')}}"></script>
           <script src="{{asset('/js/dataTables.checkboxes.min.js')}}"></script>

           


</body>
</html>
<style>
.dataTables_filter label{float:right}
<?php
if($uri_segment=="login" || $uri_segment=="" ){
    ?>
    main{
        height: 100VH;display: flex;align-items: center;
    }
   <?php 
}
?>
</style>
