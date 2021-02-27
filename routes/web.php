<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/users', 'UserController@index');
Route::resource('/users', 'UserController');
Route::GET('/GetDesignations', 'UserController@GetDesignations')->name('GetDesignations');
Route::GET('/GetRegions', 'UserController@GetRegions')->name('GetRegions');
Route::GET('/GetDistrict', 'UserController@GetDistrict')->name('GetDistrict');
Route::GET('/GetOffice', 'UserController@GetOffice')->name('GetOffice');
Route::GET('/GetUserType', 'UserController@GetUserType')->name('GetUserType');

/* vehicle section */
Route::resource('/vehicle-management', 'VehicleController');
Route::resource('/custody-management', 'CustodyController');
Route::resource('/fuel-management', 'FuelManagementController');
Route::resource('/repair-maintainence-management', 'RepairMaintainenceManagementController');
//Route::get('ajax/request', 'AjaxController');

/* rti section */
Route::resource('/rti-new-application', 'RtiController');
Route::resource('/rti-appeal-application', 'RtiAppealController');
Route::resource('/rti-public-authority', 'RtiPublicAuthorityController');
Route::resource('/rti-penalty', 'RtiPenaltyController'); 
Route::GET('/GetOfficersByRegion', 'UserController@GetOfficersByRegion')->name('GetOfficersByRegion');   
Route::GET('/GetOfficersByDistrict', 'UserController@GetOfficersByDistrict')->name('GetOfficersByDistrict');
Route::GET('/GetOfficersByOffice', 'UserController@GetOfficersByOffice')->name('GetOfficersByOffice');
Route::resource('/rti-public-information-officer', 'RtiPublicInformationOfficerController');
Route::resource('/rti-diciplinary-action', 'RtiDiciplinaryActionController');
/* end rti section */
/*hr */
Route::resource('/hr-employee-details', 'HrEmployeeDetailsController'); 
Route::resource('/hr-transfer-application', 'HrTransferApplicationSubmissionController');
Route::resource('/hr-training-register', 'HrTrainingRegister');
Route::resource('/hr-reports', 'HrReportsController');
/*end hr */
/*file disposal */
Route::resource('/file-disposal', 'FileDisposalController');

/*end file disposal*/
/* custom report */
Route::resource('/custom-report', 'CustomReportController');
/* end custome report*/
/* monthly programs*/

Route::resource('/monthly-programms', 'MonthlyProgramsController');
/* end monthly programs*/
Route::resource('/md-verification', 'MasterDataVerificationController');
Route::resource('/md-fi-complaint-inspection', 'MasterDataFieldComplaintInspectionController');
Route::resource('/md-fi-surprise-inspection', 'MasterDataFieldSurpriseInspectionController');
Route::resource('/md-fi-redeem-inspection', 'MasterDataFieldComplaintRedeemInspectionController');

Route::get('/reports-state', 'StateReportController@stateReport');
Route::get('/reports-region', 'RegionReportController@regionReport');
Route::get('/reports-district', 'DistrictReportController@districtReport');
Route::get('/reports-suboffice', 'SubOfficeReportController@subofficeReport');





