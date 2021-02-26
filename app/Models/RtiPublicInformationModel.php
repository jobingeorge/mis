<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class RtiPublicInformationModel extends Model
{
    protected $table = 'rti_public_information_officer_designation'; 
    protected $fillable = ['pen','added_by','added_by_region','added_by_district','added_by_office',
                           'officer_name','assistant_officer','authority_name'];
    public function getAllPublicInformation(){
         $result = DB::table('rti_public_information_officer_designation')
                    ->select('*')
                    ->get();
        return $resultArray = json_decode(json_encode($result), true);
    } 
    public function getById($id){
        $data = DB::table('rti_public_information_officer_designation')
            ->where('rti_public_information_officer_designation.id', '=', $id)
           ->get();

        return $data = json_decode(json_encode($data), true);  
    }                      
}
