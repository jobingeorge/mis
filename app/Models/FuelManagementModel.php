<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class FuelManagementModel extends Model{
    protected $table    = 'fuel_management'; 
    protected $fillable = ['id','vehicle_id','fuel_efficiancy'];

    public function getAllVehicles(){
        $result = DB::select('select id,register_number from vehicles');
        return $resultArray = json_decode(json_encode($result), true);
    }
    public function getAllFuelManagementData(){
     $result = DB::table('fuel_management')
                    ->leftJoin('vehicles', function ($join) {
                    $join->on('fuel_management.vehicle_id', '=', 'vehicles.id');
                    })
                    ->select('fuel_management.*','vehicles.register_number')
                    ->orderBy('fuel_management.id', 'DESC')
                    ->get();
        return $resultArray = json_decode(json_encode($result), true);
  }
  public function getFuelManagementDataById($id){
        $data = DB::table('fuel_management')
                     ->leftJoin('vehicles', function ($join) {
                    $join->on('fuel_management.vehicle_id', '=', 'vehicles.id');
                    })
                    ->select('fuel_management.*','vehicles.register_number')
            ->where('fuel_management.id', '=', $id)
           ->get();

        return $data = json_decode(json_encode($data), true);  
    }

}
