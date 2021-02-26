<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FuelManagementModel;

class FuelManagementController extends Controller
{
         /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(FuelManagementModel $FuelManagementModel)
    {
        $this->FuelManagementModel=$FuelManagementModel;
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $data = $this->FuelManagementModel->getAllFuelManagementData();  
      return view('fuel-management',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['vehicles']=$this->FuelManagementModel->getAllVehicles();
        $data['formType']="create";
        // dd( $data);
        return view('fuel-management-create',compact('data'));
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
            'fuel_efficiancy' => 'required',
        ]);
        $data = $request->all();

         $response = $this->FuelManagementModel->create($data);
        //commit();
        if($response){
            return redirect()->to('/fuel-management')->with('message', 'Fuel Management Data successfully added!');
        } else {
            return redirect()->to('/fuel-management')->with('message', 'Fuel Management Data adding failed. Please try after some time!');
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
        $data['vehicles']=$this->FuelManagementModel->getAllVehicles();
        $data['fuel_management']=$this->FuelManagementModel->getFuelManagementDataById($id);
        $data['formType']="edit";
      /*  dd( $data);*/
        return view('fuel-management-create',compact('data'));
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
                'fuel_efficiancy' => 'required',
            ]);
            $data['vehicle_id']=$request->vehicle_id;
            $data['fuel_efficiancy']=$request->fuel_efficiancy;

         $response = $this->FuelManagementModel->where('id',$id)->update($data);

        if($response){
            return redirect()->to('/fuel-management')->with('message', 'Fuel Management Data successfully updated!');
        } else {
            return redirect()->to('/fuel-management')->with('message', 'Fuel Management Data updating failed. Please try after some time!');
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
       $re=$this->FuelManagementModel->findOrFail($id)->delete();
        if($re){
            return 'Deleted Successfully';
        }
        else {
             return 'Deletion failed';
        }
    }
}
