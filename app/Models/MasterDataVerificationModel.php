<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;


class MasterDataVerificationModel extends Model
{

    protected $table = 'md_verifications'; 
    protected $primaryKey = ['id'];
    protected $fillable = ['date','from_time','to_time','revenue_target','finanacial_year',
                           'master_data_verification','nature','place','vehicle_used','vehicle_id',
                        'instruments_verified','no_of_instruments_verified','instruments_rejected','no_of_instruments_rejected','no_of_users',
                           'verification_fee_auto','verification_fee_others','additional_fee_auto','additional_fee_others','adjustment_charge','user_fee','miscellaneous_fee','details','no_of_cases','case_amount'];

  public function getAllMasterVerificationData(){
     $result = DB::table('md_verifications')
                    ->leftJoin('vehicles', function ($join) {
                    $join->on('md_verifications.vehicle_id', '=', 'vehicles.id');
                    })
                    ->orderBy('id', 'DESC')
                    ->select('md_verifications.*','vehicles.register_number')
                    ->get();
        return $resultArray = json_decode(json_encode($result), true);
  }
  public function getById($id){
        $data = DB::table('md_verifications')
                     ->leftJoin('vehicles', function ($join) {
                    $join->on('md_verifications.vehicle_id', '=', 'vehicles.id');
                    })
                    ->orderBy('id', 'DESC')
                    ->select('md_verifications.*','vehicles.register_number')
            ->where('md_verifications.id', '=', $id)
           ->get();

        return $data = json_decode(json_encode($data), true);  
    }
    public function getVehicles(){
        $result = DB::select('select id,register_number from vehicles');
        return $resultArray = json_decode(json_encode($result), true);
    }
    
   


}
