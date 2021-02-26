<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class RtiDiciplinaryModel extends Model
{
     protected $table = 'rti_diciplinary_action'; 
    protected $fillable = ['pen','added_by','added_by_region','added_by_district','added_by_office',
                           'office','action_sec20_2','action_commision','action_other'];
    public function getAllDiciplinaryAction(){
         $result = DB::table('rti_diciplinary_action')
                    ->select('*')
                    ->get();
        return $resultArray = json_decode(json_encode($result), true);
    } 
    public function getById($id){
        $data = DB::table('rti_diciplinary_action')
            ->where('rti_diciplinary_action.id', '=', $id)
           ->get();

        return $data = json_decode(json_encode($data), true);  
    }
}
