<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UserModel extends Model
{
    protected $table = 'users'; 
    protected $fillable = ['name','pen','email','password','officerLevel','designation_id','cug','userType','role','region','district','office_name','full_role'];
    public function getAllUserLevel(){
             
         $result = DB::table('officer_level')
                    ->select('*')
                    ->where('officer_level.office_level_id', '!=',0)
                    ->get();
        return $resultArray = json_decode(json_encode($result), true);
    }
    public function getAllUsers(){
         $user = DB::table('users') 
                 ->leftJoin('designation', function ($join) {
                  $join->on('users.designation_id', '=', 'designation.designation_id'); 
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
               ->leftJoin('user_type', function ($join) {
               $join->on('users.userType', '=', 'user_type.user_type_id');
               })
              ->select('users.id','users.name','users.pen','users.email','region.region',
                       'district.district_name','users.cug','user_type.user_type_name',
                       'designation.designation','office.office_name')
              ->get();
            
         //$result = DB::select('select id,name,pen,email,region,district,office_name,cug,userType from users');
        return $resultArray = json_decode(json_encode($user), true);
    }
    public function GetOfficersByRegion($rid){
              $user = DB::table('users') 
                 ->leftJoin('designation', function ($join) {
                  $join->on('users.designation_id', '=', 'designation.designation_id'); 
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
               ->leftJoin('user_type', function ($join) {
               $join->on('users.userType', '=', 'user_type.user_type_id');
               })
              ->select('users.id','users.name','region.region',
                       'district.district_name','user_type.user_type_name',
                       'designation.designation','office.office_name')
              ->where('users.region', '=',$rid) 
              ->get();
            //  dd($user);
        return $resultArray = json_decode(json_encode($user), true); 
    }
    public function GetOfficersByDistrict($did){
              $user = DB::table('users') 
                 ->leftJoin('designation', function ($join) {
                  $join->on('users.designation_id', '=', 'designation.designation_id'); 
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
               ->leftJoin('user_type', function ($join) {
               $join->on('users.userType', '=', 'user_type.user_type_id');
               })
              ->select('users.id','users.name','region.region',
                       'district.district_name','user_type.user_type_name',
                       'designation.designation','office.office_name')
              ->where('users.district', '=',$did) 
              ->get();
             // dd($user);
        return $resultArray = json_decode(json_encode($user), true);
    }
    public function GetOfficersByOffice($oid){
               $user = DB::table('users') 
                 ->leftJoin('designation', function ($join) {
                  $join->on('users.designation_id', '=', 'designation.designation_id'); 
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
               ->leftJoin('user_type', function ($join) {
               $join->on('users.userType', '=', 'user_type.user_type_id');
               })
              ->select('users.id','users.name','region.region',
                       'district.district_name','user_type.user_type_name',
                       'designation.designation','office.office_name')
              ->where('users.office_name', '=',$oid) 
              ->get();
             // dd($user);
        return $resultArray = json_decode(json_encode($user), true);
    }
    public function getUserById($id){
     // dd($id);
         $user = DB::table('users')
        ->join('designation', function ($join) {
            $join->on('users.designation_id', '=', 'designation.designation_id');
             // $join->on('users.designation_id', '=', 'designation.designation_id');
        })
        ->select('users.id','users.name','users.pen','users.email','users.officerLevel','users.designation_id','users.region',
                 'users.district','users.office_name','users.cug','designation.designation') 
         ->where('users.id', '=', $id)
        ->get();

        return $user = json_decode(json_encode($user), true);  
            // ->join("jobs",function($join){
        //     $join->on("jobs.user_id","=","users.id")
        //         ->on("jobs.item_id","=","items.id");
        // })
    }
    public function GetDesignations($level){
        $result = DB::select('select designation_id,designation,shortname from designation WHERE officer_level_id='.$level); 
        return $resultArray = json_decode(json_encode($result), true);
    }
    public function getAllStateLevelDesignation(){
      $result = DB::select('select designation_id,designation,shortname from designation WHERE officer_level_id=1'); 
      return $resultArray = json_decode(json_encode($result), true);   
    }
    public function getAllRegionLevelDesignation(){
      $result = DB::select('select designation_id,designation,shortname from designation WHERE officer_level_id=2'); 
      return $resultArray = json_decode(json_encode($result), true);   
    }
    public function getAllDistrictLevelDesignation(){
      $result = DB::select('select designation_id,designation,shortname from designation WHERE officer_level_id=3'); 
      return $resultArray = json_decode(json_encode($result), true);   
    }
    public function getAllOfficeLevelDesignation(){
      $result = DB::select('select designation_id,designation,shortname from designation WHERE officer_level_id=4'); 
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
    public function GetUserType($officerLevel){
       $result = DB::select('select designation_id from designation WHERE officer_level_id='.$officerLevel); 
       if( $result){
        $result1 = DB::select('select * from user_type WHERE designation_id='.$result[0]->designation_id); 
        return $result1= json_decode(json_encode($result1), true); 
       }else {
         return false;
       }
       
    }

   
}

