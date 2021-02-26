<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class RtiPublicAuthorityModel extends Model
{
    protected $table = 'rti_public_authority'; 
    protected $fillable = ['pen','added_by','added_by_region','added_by_district','added_by_office','name_of_public_authority',
                           'manual_17_published','updated_17_manual','displayed_17_manual','fee_collected','act'];
    public function getAllByStateLevel(){
    $result = DB::table('rti_public_authority')
                    ->select('*')
                    ->get();
        return $resultArray = json_decode(json_encode($result), true);
    }
    public function getById($id){
            $data = DB::table('rti_public_authority')
            ->where('rti_public_authority.id', '=', $id)
           ->get();

        return $data = json_decode(json_encode($data), true);  
    }                       
}
