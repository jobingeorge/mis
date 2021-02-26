 <?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MasterCompliantRedeemInspectionModel;
use App\Http\Controllers\Auth;

class MasterDataFieldComplaintRedeemInspectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $MasterCompliantRedeemInspectionModel;
    public function __construct(MasterCompliantRedeemInspectionModel $MasterCompliantRedeemInspectionModel)
    {
        $this->MasterCompliantRedeemInspectionModel = $MasterCompliantRedeemInspectionModel;
         $this->middleware(['auth','admin']);
    }
    public function index()
    {
        $user_id   =   auth()->user()->id;
        $data      =   $this->MasterCompliantRedeemInspectionModel->geMasterRedeemInspections($user_id);
        return view('md-fi-redeem-inspection',compact('data'));
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
        $data['vehicles'] =   $this->MasterCompliantRedeemInspectionModel->getVehicles();
        return view('md-fi-redeem-inspection-create',compact('data'));
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
        $data['redeem_type']            =   $request->redeem_type;
        $data['docket_number']          =   $request->docket_number;
        $data['file_no']                =   $request->file_no;
        $data['place_visited']          =   $request->place_visited;

        $data['vehicle_used']           =   $request->vehicle_used;
        if($data['vehicle_used'] == 'yes'){
            $data['vehicle_id']             =   $request->vehicle_id;
            $data['total_km']           =   $request->total_km;
        }
        else{
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
        
        $response = $this->MasterCompliantRedeemInspectionModel->create($data);
        //commit();
        if($response){
            return redirect()->to('/md-fi-redeem-inspection')->with('message', 'Complaint Redeem Inspection successfully added!');
        } else {
            return redirect()->to('/md-fi-redeem-inspection')->with('message', 'Complaint Redeem Inspection adding failed. Please try after some time!');
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
        $data['vehicles']       =   $this->MasterCompliantRedeemInspectionModel->getVehicles();
        $data['inspection']     =   $this->MasterCompliantRedeemInspectionModel->geMasterRedeemInspectionsbyID($id);
        return view('md-fi-redeem-inspection-create',compact('data'));
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
        $data['vehicles']       =   $this->MasterCompliantRedeemInspectionModel->getVehicles();
        $data['inspection']     =   $this->MasterCompliantRedeemInspectionModel->geMasterRedeemInspectionsbyID($id);
        return view('md-fi-redeem-inspection-create',compact('data'));
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
        $data['redeem_type']            =   $request->redeem_type;
        $data['docket_number']          =   $request->docket_number;
        $data['file_no']                =   $request->file_no;
        $data['place_visited']          =   $request->place_visited;

        $data['vehicle_used']           =   $request->vehicle_used;
        if($data['vehicle_used'] == 'yes'){
            $data['vehicle_id']             =   $request->vehicle_id;
            $data['total_km']           =   $request->total_km;
        }
        else{
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
        
        $response = $this->MasterCompliantRedeemInspectionModel->where('id',$id)->update($data);
        //commit();
        if($response){
            return redirect()->to('/md-fi-redeem-inspection')->with('message', 'Complaint Redeem Inspection successfully updated!');
        } else {
            return redirect()->to('/md-fi-redeem-inspection')->with('message', 'Complaint Redeem Inspection updation failed. Please try after some time!');
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
        $re =   $this->MasterCompliantRedeemInspectionModel->where('id', $id)->delete();
        if($re){
            return 'Complaint Redeem Inspection Successfully Deleted';
        }
        else {
             return 'Complaint Redeem Inspection Deletion failed';
        }
    }
}
