<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class RtiAppealModel extends Model
{
    protected $table = 'rti_appeal_applications'; 
    protected $fillable = ['added_by','added_by_region','added_by_district','added_by_office','file_number',
                            'appeal_from','address','appeal_aganist','brief_description',
                           'status','act','date_rejection','rejection_reason','brief_order'];
    public function getAllByStateLevel(){
    $result = DB::table('rti_appeal_applications')
                    ->select('*')
                    ->get();
        return $resultArray = json_decode(json_encode($result), true);
    }  
    public function getById($id){
            $data = DB::table('rti_appeal_applications')
            ->where('rti_appeal_applications.id', '=', $id)
           ->get();

        return $data = json_decode(json_encode($data), true);  
    }                     
}
