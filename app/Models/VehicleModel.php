<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class VehicleModel extends Model{
    protected $table    = 'vehicles'; 
    protected $fillable = ['register_number','dealer_name','dealer_address'];

    public function getAllVehicles(){
        $result = DB::select('select id,register_number from vehicles');
        return $resultArray = json_decode(json_encode($result), true);
    }
    public function getVehicleById($id){
        $result = DB::select('SELECT * FROM vehicles  WHERE id='.$id);
        return $resultArray = json_decode(json_encode($result), true);
    }
}
