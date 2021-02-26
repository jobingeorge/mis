<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class RtiPenaltyModel extends Model
{
     protected $table = 'rti_penalties'; 
    protected $fillable = ['added_by','added_by_region','added_by_district','added_by_office','region','district','office',
                          'officer_name','penalty_type','date_of_collection',
                           'total_amount','details_penalty_imposed','penalty_previous_pending','status','date_replay',
                           'act','date_rejection','rejection_reason','remarks'];
    public function getAllPenalty(){
            $result = DB::table('rti_penalties')
                   
                      ->leftJoin('users', function ($join) {
                     $join->on('users.id', '=', 'rti_penalties.officer_name'); 
                     })
                       ->leftJoin('designation', function ($join) {
                     $join->on('designation.designation_id', '=', 'users.designation_id'); 
                     })
                        ->leftJoin('user_type', function ($join) {
                     $join->on('user_type.user_type_id', '=', 'users.userType'); 
                     })
                      ->leftJoin('region', function ($join) {
                     $join->on('users.region', '=', 'region.region_id'); 
                     })
                     ->leftJoin('district', function ($join) {
                     $join->on('users.district', '=', 'district.district_id'); 
                     })
                      ->leftJoin('office', function ($join) {
                     $join->on('users.office_name', '=', 'office.office_id'); 
                     })
                    ->select('rti_penalties.*','designation.designation','designation.designation_id',
                             'user_type.user_type_name','user_type.user_type_id','region.region_id','region.region',
                             'district.district_id','district.district_name','office.office_id','office.office_name')
                    ->get();
                    //dd($result);
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
    public function getRtiById($id){
         $data = DB::table('rti_penalties')

            
                    ->leftJoin('users', function ($join) {
                     $join->on('users.id', '=', 'rti_penalties.officer_name'); 
                     })
                       ->leftJoin('designation', function ($join) {
                     $join->on('designation.designation_id', '=', 'users.designation_id'); 
                     })
                        ->leftJoin('user_type', function ($join) {
                     $join->on('user_type.user_type_id', '=', 'users.userType'); 
                     })
                      ->leftJoin('region', function ($join) {
                     $join->on('users.region', '=', 'region.region_id'); 
                     })
                     ->leftJoin('district', function ($join) {
                     $join->on('users.district', '=', 'district.district_id'); 
                     })
                      ->leftJoin('office', function ($join) {
                     $join->on('users.office_name', '=', 'office.office_id'); 
                     })
                    ->select('rti_penalties.*','designation.designation','designation.designation_id',
                             'user_type.user_type_name','user_type.user_type_id','region.region_id','region.region',
                             'district.district_id','district.district_name','office.office_id','office.office_name')


            ->where('rti_penalties.id', '=', $id)
           ->get();
           //dd($data);
         return $data = json_decode(json_encode($data), true);
    }
}
