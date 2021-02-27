<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VehicleModel;
use Illuminate\Support\Facades\Hash;
class VehicleController extends Controller
{
    private $VehicleModel;
    public function __construct(VehicleModel $VehicleModel){
        $this->VehicleModel = $VehicleModel;
        $this->middleware(['auth','state','region']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $data=  $this->VehicleModel->getAllVehicles();  
        return view('vehicle',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $data['formType']="create";
        return view('vehicle-details',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $validatedData=$request->validate([
            'reg_no' => 'required',
            'dealer_name' => 'required',
            'dealer_address' => 'required',
        ]);
        $data['register_number']=   $request->reg_no;
        $data['dealer_name']    =   $request->dealer_name;
        $data['dealer_address'] =   $request->dealer_address;
        $data['dealer_address'] =   $request->dealer_address;
        $data['vehicle_class']  =   $request->vehicle_class;
        $data['chasis_no']      =   $request->chasis_no;
        $data['engine_no']      =   $request->engine_no;
        $data['fuel_type']      =   $request->fuel_type;
        $data['color']          =   $request->color;
        $data['manufacture_month']  =   $request->manufacture_month;
        $data['manufacture_year']   =   $request->manufacture_year;
        $data['makers_name']    =   $request->makers_name;
        $data['year_of_purchase']   =   $request->year_of_purchase;
        $data['tank_capacity']      =   $request->tank_capacity;
        $data['policy_number']      =   $request->policy_number;
        $data['policy_from']        =   $request->policy_from;
        $data['policy_to']          =   $request->policy_to;
        $data['assured_amount']     =   $request->assured_amount;
        $data['warranty_to']        =   $request->warranty_to;
        $data['renewal_policy_no']  =   $request->renewal_policy_no;

        $response = $this->VehicleModel->create($data);
        //commit();
        if($response){
            return redirect()->to('/vehicle-management')->with('message', 'Vehicle successfully added!');
        } else {
            return redirect()->to('/vehicle-management')->with('message', 'Vehicle Insertion failed. Please try after some time!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $data['vehicle']    =   $this->VehicleModel->getVehicleById($id); 
        $data['formType']   =   "show";
       // dd($data);
        return view('vehicle-details',compact('data'));  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $data['vehicle']    =   $this->VehicleModel->getVehicleById($id); 
        $data['formType']   =   "edit";
        // dd($data);
        return view('vehicle-details',compact('data'));  
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
            'reg_no' => 'required',
            'dealer_name' => 'required',
            'dealer_address' => 'required',
        ]);
        $data['register_number']=   $request->reg_no;
        $data['dealer_name']    =   $request->dealer_name;
        $data['dealer_address'] =   $request->dealer_address;
        $data['vehicle_class']  =   $request->vehicle_class;
        $data['chasis_no']      =   $request->chasis_no;
        $data['engine_no']      =   $request->engine_no;
        $data['fuel_type']      =   $request->fuel_type;
        $data['color']          =   $request->color;
        $data['manufacture_month']  =   $request->manufacture_month;
        $data['manufacture_year']   =   $request->manufacture_year;
        $data['makers_name']    =   $request->makers_name;
        $data['year_of_purchase']   =   $request->year_of_purchase;
        $data['tank_capacity']      =   $request->tank_capacity;
        $data['policy_number']      =   $request->policy_number;
        $data['policy_from']        =   $request->policy_from;
        $data['policy_to']          =   $request->policy_to;
        $data['assured_amount']     =   $request->assured_amount;
        $data['warranty_to']        =   $request->warranty_to;
        $data['renewal_policy_no']  =   $request->renewal_policy_no;
        //  $response = $this->UserModel->update($data,$id);
        $this->VehicleModel->where('id', $id)->update($data);
        return redirect()->route('vehicle-management.index')->with(['message' => 'Successfully updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $re =   $this->VehicleModel->findOrFail($id)->delete();
        if($re){
            return 'Vehicle Successfully Deleted';
        }
        else {
             return 'Vehicle Deletion failed';
        }
    }
}
