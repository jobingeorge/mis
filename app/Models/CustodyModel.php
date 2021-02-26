<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CustodyModel extends Model{
    protected $table    = 'vehicle_custody'; 
    protected $fillable = ['register_number','region','district','office','designation','user_type'];

    public function getAllCostodians(){
        $result = DB::select('select id,register_number,region,office ,designation,user_type from vehicle_custody');
        
        $result = DB::table('vehicle_custody') 
            ->leftJoin('region', function ($join) {
                $join->on('vehicle_custody.region', '=', 'region.region_id'); 
            })
            ->leftJoin('district', function ($join) {
                $join->on('vehicle_custody.district', '=', 'district.district_id');
            })
            ->leftJoin('office', function ($join) {
                $join->on('vehicle_custody.office', '=', 'office.office_id');
            })
            ->leftJoin('designation', function ($join) {
                $join->on('vehicle_custody.designation', '=', 'designation.designation_id');
            })
            ->leftJoin('user_type', function ($join) {
                $join->on('vehicle_custody.user_type', '=', 'user_type.user_type_id');
            })
               
            ->select('vehicle_custody.id','vehicle_custody.register_number','region.region','district.district_name','office.office_name','designation.designation','user_type.user_type_name')
            ->get();
        return $resultArray = json_decode(json_encode($result), true);
    }

    public function getCustodyById($id){
        // $result = DB::select('SELECT * FROM vehicle_custody  WHERE id='.$id);
        $result = DB::table('vehicle_custody')  
            ->leftJoin('region', function ($join) {
                $join->on('vehicle_custody.region', '=', 'region.region_id'); 
            })
            ->leftJoin('district', function ($join) {
                $join->on('vehicle_custody.district', '=', 'district.district_id');
            })
            ->leftJoin('office', function ($join) {
                $join->on('vehicle_custody.office', '=', 'office.office_id');
            })
            
             ->leftJoin('designation', function ($join) {
                $join->on('vehicle_custody.designation', '=', 'designation.designation_id');
            })
            ->leftJoin('user_type', function ($join) {
                $join->on('vehicle_custody.user_type', '=', 'user_type.user_type_id');
            })

            ->select('vehicle_custody.id','vehicle_custody.register_number','vehicle_custody.region','district.district_id','district.district_name','office.office_id','office.office_name','designation.designation_id','designation.designation','user_type.user_type_id','user_type.user_type_name')
            ->where('vehicle_custody.id', '=', $id)
            ->get();
        return $resultArray = json_decode(json_encode($result), true);
    }

    public function GetRegion(){
        $result = DB::select('select * from region'); 
        return $resultArray = json_decode(json_encode($result), true);
    }

    public function GetDistrict($did){
        $result = DB::select('select * from district WHERE region_id='.$did); 
        return $resultArray = json_decode(json_encode($result), true); 
    }
    public function GetOffice($oid){
        $result = DB::select('select * from office WHERE district_id='.$oid); 
        return $resultArray = json_decode(json_encode($result), true); 
    }
    public function getVehicles(){
        $result = DB::select('select id,register_number from vehicles');
        return $resultArray = json_decode(json_encode($result), true);
    }
}
