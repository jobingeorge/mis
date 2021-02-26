<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class RtiModel extends Model
{
    protected $table = 'rti_new_applications'; 
    protected $fillable = ['added_by','added_by_region','added_by_district','added_by_office','name_of_aplicant','address_of_aplicant','file_number',
                          'mode_of_receipt','date_of_receipt',
                           'nature_of_information','nature_of_public','status','date_reply','act','date_rejection','rejection_reason','amount_released','remarks'];
    public function getAllByStateLevel(){
    $result = DB::table('rti_new_applications')
                    ->select('*')
                    ->get();
        return $resultArray = json_decode(json_encode($result), true);
    }
    public function getById($id){
            $data = DB::table('rti_new_applications')
            ->where('rti_new_applications.id', '=', $id)
           ->get();

        return $data = json_decode(json_encode($data), true);  
    }
}
