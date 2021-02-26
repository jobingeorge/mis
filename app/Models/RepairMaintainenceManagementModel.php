<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class RepairMaintainenceManagementModel extends Model{
    protected $table    = 'repair_maintainence_management'; 
     protected $primaryKey = 'id';
    protected $fillable = ['vehicle_id','approved_workshop','name_of_workshop','location','description','replaced_parts','repairing_cost','cost_of_new_parts','total_amount'];

     public function getAllVehicles(){
        $result = DB::select('select id,register_number from vehicles');
        return $resultArray = json_decode(json_encode($result), true);
    }
    public function getAllRepairMaintainenceData(){
     $result = DB::table('repair_maintainence_management')
                    ->leftJoin('vehicles', function ($join) {
                    $join->on('repair_maintainence_management.vehicle_id', '=', 'vehicles.id');
                    })
                    ->select('repair_maintainence_management.id','repair_maintainence_management.approved_workshop','repair_maintainence_management.location','repair_maintainence_management.total_amount','vehicles.register_number')
                    ->orderBy('repair_maintainence_management.id', 'DESC')
                    ->get();
        return $resultArray = json_decode(json_encode($result), true);
  }
  public function getRepairMaintainenceDataById($id){
        $data = DB::table('repair_maintainence_management')
                     ->leftJoin('vehicles', function ($join) {
                    $join->on('repair_maintainence_management.vehicle_id', '=', 'vehicles.id');
                    })
                    ->select('repair_maintainence_management.*','vehicles.register_number')
            ->where('repair_maintainence_management.id', '=', $id)
           ->get();

        return $data = json_decode(json_encode($data), true);  
    }

}
