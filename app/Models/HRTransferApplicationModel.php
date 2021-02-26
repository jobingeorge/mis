<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class HRTransferApplicationModel extends Model{
    protected $table    = 'transfer_applications'; 
    protected $fillable = ['id','transfer_name','designation','name_of_present_institution','date_of_retirement','date_of_appoinment','present_district_from_date','present_station_from_date','district_orginaly_recruited','permenent_res_address','institutions_ditrict_one','institutions_ditrict_two','institutions_ditrict_three','preference_one','preference_two','preference_three','added_by','created_by','updated_by'];

    public function getHRTransferApplications($id){
        //$result = DB::select('select employee_id,emp_name,emp_pen,designation from employee_details');
        
        $result = DB::table('transfer_applications as t')
        ->join('designation as d', function ($join) {
            $join->on('t.designation', '=', 'd.designation_id');
             // $join->on('users.designation_id', '=', 'designation.designation_id');
        })
        ->select('t.id', 't.transfer_name', 't.name_of_present_institution', 'd.designation') 
        ->where('t.added_by', '=', $id)
        ->get();
        
        return $resultArray = json_decode(json_encode($result), true);
    }
    public function getDesignations(){
        $result = DB::select('select designation_id,designation from designation');
        return $resultArray = json_decode(json_encode($result), true);
    }
    public function getHRTransferApplicationsbyID($id){
        $result = DB::select('SELECT * FROM transfer_applications WHERE id='.$id);
        return $resultArray = json_decode(json_encode($result), true);
    }

    public function getDistricts(){
        $result = DB::select('select district_id,district_name from district');
        return $resultArray = json_decode(json_encode($result), true);
    }
}
