<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HRTransferApplicationModel;
use App\Http\Controllers\Auth;

class HrTransferApplicationSubmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $HRTransferModel;
    public function __construct(HRTransferApplicationModel $HRTransferModel)
    {
        $this->HRTransferModel = $HRTransferModel;
        $this->middleware('auth');
    } 
    public function index()
    {
        $user_id   =   auth()->user()->id;
        $data      =   $this->HRTransferModel->getHRTransferApplications($user_id);
        return view('hr-transfer-application',compact('data'));
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
        $user_id   =   auth()->user()->id;
        $data['designation']    =   $this->HRTransferModel->getDesignations();
        $data['district']       =   $this->HRTransferModel->getDistricts();
        return view('hr-transfer-application-create',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData=$request->validate([
            'transfer_name' => 'required',
            'designation' => 'required',
            'name_of_present_institution' => 'required'
        ]);
        $data['transfer_name']                  =   $request->transfer_name;
        $data['designation']                    =   $request->designation;
        $data['name_of_present_institution']    =   $request->name_of_present_institution;
        $data['date_of_retirement']             =   $request->date_of_retirement;
        $data['date_of_appoinment']             =   $request->date_of_appoinment;
        $data['present_district_from_date']     =   $request->present_district_from_date;
        $data['present_station_from_date']      =   $request->present_station_from_date;
        $data['district_orginaly_recruited']    =   $request->district_orginaly_recruited;
        $data['permenent_res_address']          =   $request->permenent_res_address;
        $data['institutions_ditrict_one']       =   $request->institutions_ditrict_one;
        $data['institutions_ditrict_two']       =   $request->institutions_ditrict_two;
        $data['institutions_ditrict_three']     =   $request->institutions_ditrict_three;
        $data['preference_one']                 =   $request->preference_one;
        $data['preference_two']                 =   $request->preference_two;
        $data['preference_three']               =   $request->preference_three;
        $data['added_by']                       =   auth()->user()->id;
        $response = $this->HRTransferModel->create($data);
        //commit();
        if($response){
            return redirect()->to('/hr-transfer-application')->with('message', 'Transfer application successfully added!');
        } else {
            return redirect()->to('/hr-transfer-application')->with('message', 'Transfer application adding failed. Please try after some time!');
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
        $data['userLevel']='';
        $data['formType']="show";
        $data['designation']    =   $this->HRTransferModel->getDesignations();
        $data['district']       =   $this->HRTransferModel->getDistricts();
        $data['transfer']       =   $this->HRTransferModel->getHRTransferApplicationsbyID($id);
        return view('hr-transfer-application-create',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['userLevel']='';
        $data['formType']="edit";
        $data['designation']    =   $this->HRTransferModel->getDesignations();
        $data['district']       =   $this->HRTransferModel->getDistricts();
        $data['transfer']       =   $this->HRTransferModel->getHRTransferApplicationsbyID($id);
        return view('hr-transfer-application-create',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData=$request->validate([
            'transfer_name' => 'required',
            'designation' => 'required',
            'name_of_present_institution' => 'required'
        ]);
        $data['transfer_name']                  =   $request->transfer_name;
        $data['designation']                    =   $request->designation;
        $data['name_of_present_institution']    =   $request->name_of_present_institution;
        $data['date_of_retirement']             =   $request->date_of_retirement;
        $data['date_of_appoinment']             =   $request->date_of_appoinment;
        $data['present_district_from_date']     =   $request->present_district_from_date;
        $data['present_station_from_date']      =   $request->present_station_from_date;
        $data['district_orginaly_recruited']    =   $request->district_orginaly_recruited;
        $data['permenent_res_address']          =   $request->permenent_res_address;
        $data['institutions_ditrict_one']       =   $request->institutions_ditrict_one;
        $data['institutions_ditrict_two']       =   $request->institutions_ditrict_two;
        $data['institutions_ditrict_three']     =   $request->institutions_ditrict_three;
        $data['preference_one']                 =   $request->preference_one;
        $data['preference_two']                 =   $request->preference_two;
        $data['preference_three']               =   $request->preference_three;
        $data['added_by']                       =   auth()->user()->id;
        $response = $this->HRTransferModel->where('id', $id)->update($data);
        //commit();
        if($response){
            return redirect()->to('/hr-transfer-application')->with('message', 'Transfer application successfully updated!');
        } else {
            return redirect()->to('/hr-transfer-application')->with('message', 'Transfer application updation failed. Please try after some time!');
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
        $re =   $this->HRTransferModel->where('id', $id)->delete();
        if($re){
            return 'Employee Successfully Deleted';
        }
        else {
             return 'Employee Deletion failed';
        }
    }
}
