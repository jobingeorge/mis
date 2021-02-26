<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class EmployeeModel extends Model{
    protected $table    = 'employee_details'; 
    protected $fillable = ['emp_name','emp_pen','designation','dob','doa','dor','education_qualification','cfa','dai','app_order_no','date_app_order','no_order_regular_app','date_regular_app','date_lmd_join','orderno_reg_sub_app','date_subseq_appoinment','subseq_category','subseq_orderno','subseq_order_date','subseq_join_date','subseq_d_prob_date','subseq_no_conf_order','subseq_date_conf_order','subseq_effectdate_conf_order','subseq_orderno_prob','subseq_date_of_order','subseq_effective_date_of_order','transfer_from','transfer_to','transfer_numof_order','transfer_dateof_relive','transfer_dateof_joining','transfer_contact_number','transfer_whether_ph','ph_category','mode_appointment','transf_order_no','transf_order_date','added_by'];

    public function getEmployees($id){
        //$result = DB::select('select employee_id,emp_name,emp_pen,designation from employee_details');
        
        $result = DB::table('employee_details as e')
        ->join('designation as d', function ($join) {
            $join->on('e.designation', '=', 'd.designation_id');
             // $join->on('users.designation_id', '=', 'designation.designation_id');
        })
        ->select('e.employee_id', 'e.emp_name', 'e.emp_pen', 'd.designation') 
         ->where('e.added_by', '=', $id)
        ->get();
        
        return $resultArray = json_decode(json_encode($result), true);
    }
    public function getDesignations(){
        $result = DB::select('select designation_id,designation from designation');
        return $resultArray = json_decode(json_encode($result), true);
    }
    public function getEmployeeById($id){
        $result = DB::select('SELECT * FROM employee_details  WHERE employee_id='.$id);
        return $resultArray = json_decode(json_encode($result), true);
    }
}
