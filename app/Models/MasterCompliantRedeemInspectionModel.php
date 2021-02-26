<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MasterCompliantRedeemInspectionModel extends Model{
    protected $table    = 'md_redeem_inspection'; 
    protected $fillable = ['id','select_date','time_from','time_to','revenue_target','financial_year','redeem_type','docket_number','file_no','place_visited','vehicle_used','vehicle_id','total_km','type_of_trade_inspected','others_specify','number_of_inspections','number_of_case_inspected','added_by','created_by','updated_by'];

    public function geMasterRedeemInspections($id){
        //$result = DB::select('select employee_id,emp_name,emp_pen,designation from employee_details');
        
        $result = DB::table('md_redeem_inspection as md')
        ->leftjoin('vehicles as v', function ($join) {
            $join->on('v.id', '=', 'md.vehicle_id');
        })
        ->select('md.id', 'md.select_date','time_from','time_to','md.redeem_type', 'v.register_number') 
        ->where('md.added_by', '=', $id)
        ->get();
        
        return $resultArray = json_decode(json_encode($result), true);
    }
    public function getVehicles(){
        $result = DB::select('select id,register_number from vehicles');
        return $resultArray = json_decode(json_encode($result), true);
    }
    public function geMasterRedeemInspectionsbyID($id){
        $result = DB::select('SELECT * FROM md_redeem_inspection WHERE id='.$id);
        return $resultArray = json_decode(json_encode($result), true);
    }
}
