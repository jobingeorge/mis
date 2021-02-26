<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MasterCompliantInspectionModel extends Model{
    protected $table    = 'md_compliance_inspection'; 
    protected $fillable = ['id','select_date','time_from','time_to','revenue_target','financial_year','compliance_type','type_of_trade_inspected','others_specify','licence_type','vehicle_used','vehicle_id','place_visited','total_km','licence_fee','number_of_inspections','number_of_case_inspected','added_by','created_by','updated_by'];

    public function geMasterCompliantInspections($id){
        //$result = DB::select('select employee_id,emp_name,emp_pen,designation from employee_details');
        
        $result = DB::table('md_compliance_inspection as md')
        // ->join('designation as d', function ($join) {
        //     $join->on('t.designation', '=', 'd.designation_id');
        // })
        ->select('md.id', 'md.select_date','time_from','time_to','md.compliance_type', 'md.vehicle_used') 
        ->where('md.added_by', '=', $id)
        ->get();
        
        return $resultArray = json_decode(json_encode($result), true);
    }
    public function getVehicles(){
        $result = DB::select('select id,register_number from vehicles');
        return $resultArray = json_decode(json_encode($result), true);
    }
    public function geMasterCompliantInspectionsbyID($id){
        $result = DB::select('SELECT * FROM md_compliance_inspection WHERE id='.$id);
        return $resultArray = json_decode(json_encode($result), true);
    }
}
