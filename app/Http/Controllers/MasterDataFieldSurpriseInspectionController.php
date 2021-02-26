<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MasterSurpriseInspectionModel;
use App\Http\Controllers\Auth;

class MasterDataFieldSurpriseInspectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $MasterSurpriseInspectionModel;
    public function __construct(MasterSurpriseInspectionModel $MasterSurpriseInspectionModel)
    {
        $this->MasterSurpriseInspectionModel = $MasterSurpriseInspectionModel;
         $this->middleware(['auth','admin']);
    }

    public function index()
    {
        $user_id   =   auth()->user()->id;
        $data      =   $this->MasterSurpriseInspectionModel->geMasterSurpriseInspections($user_id);
        return view('md-fi-surprise-inspection.index', compact('data'));
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
        $data['vehicles'] =   $this->MasterSurpriseInspectionModel->getVehicles();
        return view('md-fi-surprise-inspection.create',compact('data'));
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
        $data['inspection_type']        =   $request->inspection_type;
        if($data['inspection_type'] == 'combined' || $data['inspection_type'] == 'special_drive'){
            $data['members']         =   $request->members;
            $data['place_visited']   =   $request->place_visited;
            $data['vehicle_used']           =   $request->vehicle_used;
            if($data['vehicle_used'] == 'yes'){
                $data['vehicle_id']             =   $request->vehicle_id;
                $data['total_km']           =   $request->total_km;
            }
            else{
                $data['vehicle_id']             =   '';
                $data['total_km']               =   '';
            }
        }
        $data['type_of_trade_inspected']    =   $request->type_of_trade_inspected;
        if($data['type_of_trade_inspected'] == 'others'){
            $data['others_specify']   =   $request->others_specify;
        }
        else{
            $data['others_specify']   =   ''; 
        }
        
        
        $data['number_of_inspections']        =   $request->number_of_inspections;
        $data['number_of_case_inspected']     =   $request->number_of_case_inspected;
        
        $data['added_by']   =   auth()->user()->id;
        
        $response = $this->MasterSurpriseInspectionModel->create($data);
        //commit();
        if($response){
            return redirect()->to('/md-fi-surprise-inspection')->with('message', 'Surprise Inspection successfully added!');
        } else {
            return redirect()->to('/md-fi-surprise-inspection')->with('message', 'Surprise Inspection adding failed. Please try after some time!');
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
        $data['vehicles']       =   $this->MasterSurpriseInspectionModel->getVehicles();
        $data['inspection']     =   $this->MasterSurpriseInspectionModel->geMasterSurpriseInspectionsbyID($id);
        return view('md-fi-surprise-inspection.create',compact('data'));
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
        $data['vehicles']       =   $this->MasterSurpriseInspectionModel->getVehicles();
        $data['inspection']     =   $this->MasterSurpriseInspectionModel->geMasterSurpriseInspectionsbyID($id);

  /*      dd($data);*/
        return view('md-fi-surprise-inspection.edit',compact('data'));
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
        $data['inspection_type']        =   $request->inspection_type;
        if($data['inspection_type'] == 'combined' || $data['inspection_type'] == 'special_drive'){
            $data['members']         =   $request->members;
            $data['place_visited']   =   $request->place_visited;
            $data['vehicle_used']           =   $request->vehicle_used;

            if($data['vehicle_used'] == 'yes'){
                $data['vehicle_id']             =   $request->vehicle_id;
                $data['total_km']           =   $request->total_km;
            }
            else{
                $data['vehicle_id']             =   '';
                $data['total_km']               =   '';
            }
          }
        else{
             $data['members']         =   '';
            $data['place_visited']   =   '';
            $data['vehicle_used']           =   '';
            $data['vehicle_id']             =   '';
            $data['total_km']               =   '';
        }

        $data['type_of_trade_inspected']    =   $request->type_of_trade_inspected;
        if($data['type_of_trade_inspected'] == 'others'){
            $data['others_specify']   =   $request->others_specify;
        }
        else{
            $data['others_specify']   =   ''; 
        }
        
        
        $data['number_of_inspections']        =   $request->number_of_inspections;
        $data['number_of_case_inspected']     =   $request->number_of_case_inspected;
        
        $data['added_by']   =   auth()->user()->id;

        /*dd($data);*/
        
        $response = $this->MasterSurpriseInspectionModel->where('id',$id)->update($data);
        //commit();
        if($response){
            return redirect()->to('/md-fi-surprise-inspection')->with('message', 'Surprise Inspection successfully updated!');
        } else {
            return redirect()->to('/md-fi-surprise-inspection')->with('message', 'Surprise Inspection updation failed. Please try after some time!');
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
        $re =   $this->MasterSurpriseInspectionModel->where('id', $id)->delete();
        if($re){
            return 'Surprise Inspection Successfully Deleted';
        }
        else {
             return 'Surprise Inspection Deletion failed';
        }
    }
}
