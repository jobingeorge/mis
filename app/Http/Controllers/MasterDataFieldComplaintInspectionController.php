<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MasterCompliantInspectionModel;
use App\Http\Controllers\Auth;

class MasterDataFieldComplaintInspectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $MasterCompliantInspectionModel;
    public function __construct(MasterCompliantInspectionModel $MasterCompliantInspectionModel)
    {
        $this->MasterCompliantInspectionModel = $MasterCompliantInspectionModel;
          $this->middleware(['auth','admin']);
    }

    public function index()
    {
        $user_id   =   auth()->user()->id;
        $data      =   $this->MasterCompliantInspectionModel->geMasterCompliantInspections($user_id);
        return view('md-fi-complaint-inspection', compact('data'));
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
        $data['vehicles'] =   $this->MasterCompliantInspectionModel->getVehicles();
        return view('md-fi-complaint-inspection-create',compact('data'));
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
            'select_date' => 'required',
            'time_from' => 'required',
            'time_to' => 'required',
        ]);
        $data['select_date']            =   $request->select_date;
        $data['time_from']              =   $request->time_from;
        $data['time_to']                =   $request->time_to;
        $data['revenue_target']         =   $request->revenue_target;
        $data['financial_year']         =   $request->financial_year;
        $data['compliance_type']        =   $request->compliance_type;
        if($data['compliance_type'] == 'registration_of_packer_importer'){
            $data['type_of_trade_inspected']    =   $request->type_of_trade_inspected;
            if($data['type_of_trade_inspected'] == 'others'){
                $data['others_specify']   =   $request->others_specify;
            }
            else{
                $data['others_specify']   =   ''; 
            }
        }
        else if($data['compliance_type'] == 'licence'){
            $data['licence_type']           =   $request->licence_type;
            $data['others_specify']   =   '';
        }
        $data['vehicle_used']           =   $request->vehicle_used;
        if($data['vehicle_used'] == 'yes'){
            $data['vehicle_id']             =   $request->vehicle_id;
            $data['place_visited']          =   $request->place_visited;
            $data['total_km']           =   $request->total_km;
        }
        else{
            $data['vehicle_id']             =   '';
            $data['place_visited']          =   '';
            $data['total_km']               =   '';
        }
        
        $data['licence_fee']              =   $request->licence_fee;
        $data['number_of_inspections']        =   $request->number_of_inspections;
        $data['number_of_case_inspected']     =   $request->number_of_case_inspected;
        
        $data['added_by']   =   auth()->user()->id;
        
        $response = $this->MasterCompliantInspectionModel->create($data);
        //commit();
        if($response){
            return redirect()->to('/md-fi-complaint-inspection')->with('message', 'Compliance Inspection successfully added!');
        } else {
            return redirect()->to('/md-fi-complaint-inspection')->with('message', 'Inspection adding failed. Please try after some time!');
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
        $data['vehicles']       =   $this->MasterCompliantInspectionModel->getVehicles();
        $data['inspection']     =   $this->MasterCompliantInspectionModel->geMasterCompliantInspectionsbyID($id);
        return view('md-fi-complaint-inspection-create',compact('data'));
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
        $data['vehicles']       =   $this->MasterCompliantInspectionModel->getVehicles();
        $data['inspection']     =   $this->MasterCompliantInspectionModel->geMasterCompliantInspectionsbyID($id);

   /*     dd($data);*/
        return view('md-fi-complaint-inspection-create',compact('data'));
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
            'select_date' => 'required',
            'time_from' => 'required',
            'time_to' => 'required',
        ]);
        $data['select_date']            =   $request->select_date;
        $data['time_from']              =   $request->time_from;
        $data['time_to']                =   $request->time_to;
        $data['revenue_target']         =   $request->revenue_target;
        $data['financial_year']         =   $request->financial_year;
        $data['compliance_type']        =   $request->compliance_type;
        if($data['compliance_type'] == 'registration_of_packer_importer'){
            $data['type_of_trade_inspected']    =   $request->type_of_trade_inspected;
            if($data['type_of_trade_inspected'] == 'others'){
                $data['others_specify']   =   $request->others_specify;
            }
            else{
                $data['others_specify']   =   ''; 
            }
        }
        else if($data['compliance_type'] == 'license'){
            $data['licence_type']           =   $request->licence_type;
            $data['others_specify']   =   '';
        }
        $data['vehicle_used']           =   $request->vehicle_used;
        if($data['vehicle_used'] == 'yes'){
            $data['vehicle_id']             =   $request->vehicle_id;
            $data['place_visited']          =   $request->place_visited;
            $data['total_km']           =   $request->total_km;
        }
        else{
            $data['vehicle_id']             =   '';
            $data['place_visited']          =   '';
            $data['total_km']               =   '';
        }
        
        $data['licence_fee']              =   $request->licence_fee;
        $data['number_of_inspections']        =   $request->number_of_inspections;
        $data['number_of_case_inspected']     =   $request->number_of_case_inspected;
        
        $data['added_by']   =   auth()->user()->id;

/*        dd($data);*/
        
        $response = $this->MasterCompliantInspectionModel->where('id', $id)->update($data);
        //commit();
        if($response){
            return redirect()->to('/md-fi-complaint-inspection')->with('message', 'Compliance Inspection successfully updated!');
        } else {
            return redirect()->to('/md-fi-complaint-inspection')->with('message', 'Inspection updation failed. Please try after some time!');
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
        $re =   $this->MasterCompliantInspectionModel->where('id', $id)->delete();
        if($re){
            return 'Complaint Inspection Successfully Deleted';
        }
        else {
             return 'Complaint Inspection Deletion failed';
        }
    }
}
