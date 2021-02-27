<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RepairMaintainenceManagementModel;

class RepairMaintainenceManagementController extends Controller
{
          /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(RepairMaintainenceManagementModel $RepairMaintainenceManagementModel)
    {
        $this->RepairMaintainenceManagementModel=$RepairMaintainenceManagementModel;
        $this->middleware(['auth','admin','state','region']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        $data=  $this->RepairMaintainenceManagementModel->getAllRepairMaintainenceData(); 
        return view('repair-maintainence-management',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
  public function create()
    {
        $data['vehicles']=$this->RepairMaintainenceManagementModel->getAllVehicles();
        $data['formType']="create";
        // dd( $data);
        return view('repair-maintainence-management-create',compact('data'));
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
            'vehicle_id' => 'required',
        ]);
        $data = $request->all();
     /*   dd($data);
*/
         $response = $this->RepairMaintainenceManagementModel->create($data);
        //commit();
        if($response){
            return redirect()->to('/repair-maintainence-management')->with('message', 'Repair and Maintainence Management Data successfully added!');
        } else {
            return redirect()->to('/repair-maintainence-management')->with('message', 'Repair and Maintainence Management Data adding failed. Please try after some time!');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['vehicles']=$this->RepairMaintainenceManagementModel->getAllVehicles();
        $data['repair_maintainence']=$this->RepairMaintainenceManagementModel->getRepairMaintainenceDataById($id);
        $data['formType']="edit";
      /*  dd( $data);*/
        return view('repair-maintainence-management-create',compact('data'));
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
                'vehicle_id' => 'required',
                'approved_workshop' => 'required',
            ]);
            $data['vehicle_id']=$request->vehicle_id;
            $data['approved_workshop']=$request->approved_workshop;
            $data['name_of_workshop']=$request->name_of_workshop;
            $data['location']=$request->location;
            $data['description']=$request->description;
            $data['replaced_parts']=$request->replaced_parts;
            $data['repairing_cost']=$request->repairing_cost;
            $data['cost_of_new_parts']=$request->cost_of_new_parts;
            $data['total_amount']=$request->total_amount;

         $response = $this->RepairMaintainenceManagementModel->where('id',$id)->update($data);

        if($response){
            return redirect()->to('/repair-maintainence-management')->with('message', 'Fuel Management Data successfully updated!');
        } else {
            return redirect()->to('/repair-maintainence-management')->with('message', 'Fuel Management Data updating failed. Please try after some time!');
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
       $re=$this->RepairMaintainenceManagementModel->findOrFail($id)->delete();
        if($re){
            return 'Deleted Successfully';
        }
        else {
             return 'Deletion failed';
        }
    }
}
