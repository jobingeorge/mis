<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustodyModel;

class CustodyController extends Controller
{

    private $CustodyModel;
    public function __construct(CustodyModel $CustodyModel){
        $this->CustodyModel = $CustodyModel;
        $this->middleware(['auth','state','region','suboffice']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=  $this->CustodyModel->getAllCostodians();

        return view('vehicle-custody',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['region']    =   $this->CustodyModel->GetRegion(); 
         $data['vehicle'] =   $this->CustodyModel->GetVehicles();
        $data['formType']="create";

        return view('vehicle-custody-details',compact('data'));
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
            'register_number' => 'required',
            'region' => 'required',
            'district' => 'required',
           /* 'office' => 'required',*/
        ]);
        $data['register_number']=   $request->register_number;
        $data['region']    =   $request->region;
        $data['district'] =   $request->district;
        $data['office'] =   $request->office;
        $data['designation'] =   $request->designation_id;
        $data['user_type'] =   $request->userType_id;
      
        $response = $this->CustodyModel->create($data);
        //commit();
        if($response){
            return redirect()->to('/custody-management')->with('message', 'Custody successfully assigned!');
        } else {
            return redirect()->to('/custody-management')->with('message', 'Custody assigning failed. Please try after some time!');
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
        $data['region']    =   $this->CustodyModel->GetRegion(); 
        $data['custody']    =   $this->CustodyModel->getCustodyById($id); 
        $data['formType']   =   "show";
       // dd($data);
        return view('vehicle-custody-details',compact('data')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['custody']    =   $this->CustodyModel->getCustodyById($id); 
        $data['region']    =   $this->CustodyModel->GetRegion(); 
         $data['vehicle'] =   $this->CustodyModel->GetVehicles();
        $data['formType']   =   "edit";
        // dd($data);
        return view('vehicle-custody-details',compact('data'));
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
            'register_number' => 'required',
            'region' => 'required',
            'district' => 'required',
            /*'office' => 'required',*/
        ]);
        $data['register_number']=   $request->register_number;
        $data['region']    =   $request->region;
        $data['district'] =   $request->district;
        $data['office'] =   $request->office;
        $data['designation'] =   $request->designation_id;
        $data['user_type'] =   $request->userType_id;
        $this->CustodyModel->where('id', $id)->update($data);
        return redirect()->route('custody-management.index')->with(['message' => 'Successfully updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $re =   $this->CustodyModel->findOrFail($id)->delete();
        if($re){
            return 'Custody Successfully Deleted';
        }
        else {
             return 'Custody Deletion failed';
        }
    }
}
