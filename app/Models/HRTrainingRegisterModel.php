<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class HRTrainingRegisterModel extends Model{
    protected $table    = 'hr_training_register'; 
    protected $fillable = ['id','name','pen','designation','name_of_traing_attend','training_mandatory','period_of_training_from','period_of_training_to','institution','subject','paid','added_by','created_by','updated_by'];

    public function getHRTrainingRegisters($id){
        //$result = DB::select('select employee_id,emp_name,emp_pen,designation from employee_details');
        
        $result = DB::table('hr_training_register as t')
        ->join('designation as d', function ($join) {
            $join->on('t.designation', '=', 'd.designation_id');
             // $join->on('users.designation_id', '=', 'designation.designation_id');
        })
        ->select('t.id', 't.name', 't.pen', 'd.designation','t.name_of_traing_attend') 
        ->where('t.added_by', '=', $id)
        ->get();
        
        return $resultArray = json_decode(json_encode($result), true);
    }
    public function getDesignations(){
        $result = DB::select('select designation_id,designation from designation');
        return $resultArray = json_decode(json_encode($result), true);
    }
    public function getHRTrainingRegistersbyID($id){
        $result = DB::select('SELECT * FROM hr_training_register WHERE id='.$id);
        return $resultArray = json_decode(json_encode($result), true);
    }
}
