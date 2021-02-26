<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EmployeeModel;
use App\Http\Controllers\Auth;

class HrEmployeeDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $EmployeeModel;
    public function __construct(EmployeeModel $EmployeeModel)
    {
        $this->EmployeeModel = $EmployeeModel;
        $this->middleware('auth');
    }
    public function index(){
        $user_id   =   auth()->user()->id;
        $data=  $this->EmployeeModel->getEmployees($user_id);
        return view('hr-employee-details',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['userLevel']='';
        $data['formType']="create";
        $data['designation'] =   $this->EmployeeModel->getDesignations();
        return view('hr-employee-details-create',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $validatedData=$request->validate([
            'emp_name' => 'required',
            'emp_pen' => 'required',
            'designation' => 'required',
            'dob' => 'required',
        ]);
        $data['emp_name']                   =   $request->emp_name;
        $data['emp_pen']                    =   $request->emp_pen;
        $data['designation']                =   $request->designation;
        $data['dob']                        =   $request->dob;
        $data['doa']                        =   $request->doa;
        $data['dor']                        =   $request->dor;
        $data['education_qualification']    =   $request->education_qualification;
        $data['cfa']                        =   $request->cfa;
        $data['dai']                        =   $request->dai;
        $data['app_order_no']               =   $request->app_order_no;
        $data['date_app_order']             =   $request->date_app_order;
        $data['no_order_regular_app']       =   $request->no_order_regular_app;
        $data['date_regular_app']           =   $request->date_regular_app;
        $data['date_lmd_join']              =   $request->date_lmd_join;
        $data['orderno_reg_sub_app']        =   $request->orderno_reg_sub_app;
        $data['date_subseq_appoinment']     =   $request->date_subseq_appoinment;
        $data['subseq_category']            =   $request->subseq_category;
        $data['subseq_orderno']             =   $request->subseq_orderno;
        $data['subseq_order_date']          =   $request->subseq_order_date;
        $data['subseq_join_date']           =   $request->subseq_join_date;
        $data['subseq_d_prob_date']         =   $request->subseq_d_prob_date;
        $data['subseq_no_conf_order']       =   $request->subseq_no_conf_order;
        $data['subseq_date_conf_order']     =   $request->subseq_date_conf_order;
        $data['subseq_effectdate_conf_order']   =   $request->subseq_effectdate_conf_order;
        $data['subseq_orderno_prob']        =   $request->subseq_orderno_prob;
        $data['subseq_date_of_order']       =   $request->subseq_date_of_order;
        $data['subseq_effective_date_of_order'] =   $request->subseq_effective_date_of_order;
        $data['transfer_from']              =   $request->transfer_from;
        $data['transfer_to']                =   $request->transfer_to;
        $data['transfer_numof_order']       =   $request->transfer_numof_order;
        $data['transfer_dateof_relive']     =   $request->transfer_dateof_relive;
        $data['transfer_dateof_joining']    =   $request->transfer_dateof_joining;
        $data['transfer_contact_number']    =   $request->transfer_contact_number;
        $data['transfer_whether_ph']        =   $request->transfer_whether_ph;
        if($data['transfer_whether_ph'] == 'yes'){
            $data['ph_category']            =   $request->ph_category;
            $data['mode_appointment']       =   $request->mode_appointment;
            $data['transf_order_no']        =   $request->transf_order_no;
            $data['transf_order_date']      =   $request->transf_order_date;
        }  
        $data['added_by']   =   auth()->user()->id;
        
        $response = $this->EmployeeModel->create($data);
        //commit();
        if($response){
            return redirect()->to('/hr-employee-details')->with('message', 'Employee successfully added!');
        } else {
            return redirect()->to('/hr-employee-details')->with('message', 'Employee adding failed. Please try after some time!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['employee']    =   $this->EmployeeModel->getEmployeeById($id);
        $data['formType']   =   "show";
        $data['designation'] =   $this->EmployeeModel->getDesignations();
        return view('hr-employee-details-create',compact('data')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $data['employee']    =   $this->EmployeeModel->getEmployeeById($id);
        $data['designation'] =   $this->EmployeeModel->getDesignations();
        $data['formType']="edit";
        return view('hr-employee-details-create',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $validatedData=$request->validate([
            'emp_name' => 'required',
            'emp_pen' => 'required',
            'designation' => 'required',
            'dob' => 'required',
        ]);
        $data['emp_name']                   =   $request->emp_name;
        $data['emp_pen']                    =   $request->emp_pen;
        $data['designation']                =   $request->designation;
        $data['dob']                        =   $request->dob;
        $data['doa']                        =   $request->doa;
        $data['dor']                        =   $request->dor;
        $data['education_qualification']    =   $request->education_qualification;
        $data['cfa']                        =   $request->cfa;
        $data['dai']                        =   $request->dai;
        $data['app_order_no']               =   $request->app_order_no;
        $data['date_app_order']             =   $request->date_app_order;
        $data['no_order_regular_app']       =   $request->no_order_regular_app;
        $data['date_regular_app']           =   $request->date_regular_app;
        $data['date_lmd_join']              =   $request->date_lmd_join;
        $data['orderno_reg_sub_app']        =   $request->orderno_reg_sub_app;
        $data['date_subseq_appoinment']     =   $request->date_subseq_appoinment;
        $data['subseq_category']            =   $request->subseq_category;
        $data['subseq_orderno']             =   $request->subseq_orderno;
        $data['subseq_order_date']          =   $request->subseq_order_date;
        $data['subseq_join_date']           =   $request->subseq_join_date;
        $data['subseq_d_prob_date']         =   $request->subseq_d_prob_date;
        $data['subseq_no_conf_order']       =   $request->subseq_no_conf_order;
        $data['subseq_date_conf_order']     =   $request->subseq_date_conf_order;
        $data['subseq_effectdate_conf_order']   =   $request->subseq_effectdate_conf_order;
        $data['subseq_orderno_prob']        =   $request->subseq_orderno_prob;
        $data['subseq_date_of_order']       =   $request->subseq_date_of_order;
        $data['subseq_effective_date_of_order'] =   $request->subseq_effective_date_of_order;
        $data['transfer_from']              =   $request->transfer_from;
        $data['transfer_to']                =   $request->transfer_to;
        $data['transfer_numof_order']       =   $request->transfer_numof_order;
        $data['transfer_dateof_relive']     =   $request->transfer_dateof_relive;
        $data['transfer_dateof_joining']    =   $request->transfer_dateof_joining;
        $data['transfer_contact_number']    =   $request->transfer_contact_number;
        $data['transfer_whether_ph']        =   $request->transfer_whether_ph;
        if($data['transfer_whether_ph'] == 'yes'){
            $data['ph_category']            =   $request->ph_category;
            $data['mode_appointment']       =   $request->mode_appointment;
            $data['transf_order_no']        =   $request->transf_order_no;
            $data['transf_order_date']      =   $request->transf_order_date;
        }  
        
        $response = $this->EmployeeModel->where('employee_id', $id)->update($data);
        //commit();
        if($response){
            return redirect()->to('/hr-employee-details')->with('message', 'Employee successfully updated!');
        } else {
            return redirect()->to('/hr-employee-details')->with('message', 'Employee updation failed. Please try after some time!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $re =   $this->EmployeeModel->where('employee_id', $id)->delete();
        if($re){
            return 'Employee Successfully Deleted';
        }
        else {
             return 'Employee Deletion failed';
        }
    }
}
