<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MasterDataVerificationModel;


class MasterDataVerificationController extends Controller
{
        /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(MasterDataVerificationModel $MasterDataVerificationModel)
    {
        $this->MasterDataVerificationModel=$MasterDataVerificationModel;
        $this->middleware(['auth','admin']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data=  $this->MasterDataVerificationModel->getAllMasterVerificationData(); 
         return view('md-verification.index',compact('data'));
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
        $data['vehicles']= $this->MasterDataVerificationModel->getVehicles(); 
        return view('md-verification.create',compact('data'));
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
            'date' => 'required',
            'from_time' => 'required',
            'to_time' => 'required',
        ]);
        $data = $request->all();

         $response = $this->MasterDataVerificationModel->create($data);
        //commit();
        if($response){
            return redirect()->to('/md-verification')->with('message', 'Master Data Verification successfully added!');
        } else {
            return redirect()->to('/md-verification')->with('message', 'Master Data Verification  adding failed. Please try after some time!');
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
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['verification']=  $this->MasterDataVerificationModel->getById($id); 
        $data['vehicles']= $this->MasterDataVerificationModel->getVehicles(); 
        return view('md-verification.edit',compact('data'));
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
                'date' => 'required',
                'from_time' => 'required',
                'to_time' => 'required',
            ]);
    $data['date']=$request->date;
    $data['from_time']=$request->from_time;
    $data['to_time']=$request->to_time;
    $data['revenue_target']=$request->revenue_target;
    $data['financial_year']=$request->financial_year;
    $data['master_data_verification']=$request->master_data_verification;
    $data['nature']=$request->nature;
    $data['vehicle_used']=$request->vehicle_used;

    if($data['nature']=='camp'){
     
    $data['place']=$request->place;
    $data['vehicle_used']='';
    $data['vehicle_id']='';

    }
    else{
    $data['place']='';
        if($data['vehicle_used']=='yes'){
            $data['vehicle_id']=$request->vehicle_id;
        }
        else{
            $data['vehicle_id']=''; 
        }
    }

    $data['instruments_verified']=$request->instruments_verified;
    $data['no_of_instruments_verified']=$request->no_of_instruments_verified;
    $data['instruments_rejected']=$request->instruments_rejected;
    $data['no_of_instruments_rejected']=$request->no_of_instruments_rejected;
    $data['no_of_users']=$request->no_of_users;
    $data['verification_fee_auto']=$request->verification_fee_auto;
    $data['verification_fee_others']=$request->verification_fee_others;
    $data['additional_fee_auto']=$request->additional_fee_auto;
    $data['additional_fee_others']=$request->additional_fee_others;
    $data['adjustment_charge']=$request->adjustment_charge;
    $data['user_fee']=$request->user_fee;
    $data['miscellaneous_fee']=$request->miscellaneous_fee;
    $data['details']=$request->details;
    $data['no_of_cases']=$request->no_of_cases;
    $data['case_amount']=$request->case_amount;

         $response = $this->MasterDataVerificationModel->where('id',$id)->update($data);

        if($response){
            return redirect()->to('/md-verification')->with('message', 'Master Data Verification successfully updated!');
        } else {
            return redirect()->to('/md-verification')->with('message', 'Master Data Verification  updating failed. Please try after some time!');
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
       $re=$this->MasterDataVerificationModel->findOrFail($id)->delete();
        if($re){
            return 'Deleted Successfully';
        }
        else {
             return 'Deletion failed';
        }
    }
}
