<?php

namespace App\Http\Controllers;
use App\Models\RtiPenaltyModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth;

class RtiPenaltyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct(RtiPenaltyModel $RtiPenaltyModel)
    {
        $this->RtiPenaltyModel=$RtiPenaltyModel;
        $this->middleware('auth');
    }
    public function index()
    {
          $data=  $this->RtiPenaltyModel->getAllPenalty(); 
        return view('rtipenalty',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['region']    =   $this->RtiPenaltyModel->GetRegion(); 
        $data['formType']="create";
        return view('rtipenaltycreate',compact('data'));
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
            'officer_name' => 'required'
        ]);
        $data = $request->all();
         $data['added_by']= auth()->user()->id;
            $data['added_by_region']= auth()->user()->region;
            $data['added_by_district']= auth()->user()->district;
             $data['added_by_office']= auth()->user()->office_name;
           $response = $this->RtiPenaltyModel->create($data);
        if($response){
            return redirect()->to('/rti-penalty')->with('message', 'RTI Penalty successfully added!');
        } else {
             return redirect()->to('/rti-penalty')->with('message', 'RTI Penalty Insertion failed try after some time!');
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
       $data['rti']=  $this->RtiPenaltyModel->getRtiById($id);
       $data['region']    =   $this->RtiPenaltyModel->GetRegion(); 
       $data['formType'] = 'edit';
       return view('rtipenaltycreate',compact('data'));
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
        'officer_name' => 'required'
        ]);
        $data = request()->except(['_token','_method']);
       // dd($data);
            if($data['status']=='rejected'){
            $data['date_replay']=''; 
            $data['act']='';  
            }
        if($data['status']=='replied'){
            $data['date_rejection']='';
            $data['rejection_reason']=''; 
        }
        if($data['status']=='disposed'){
            $data['date_replay']='';
            $data['date_rejection']='';
            $data['rejection_reason']=''; 
            $data['act']='';  
        }
        $response=$this->RtiPenaltyModel->where('id', $id)->update($data);
        if($response){
        return redirect()->to('/rti-penalty')->with('message', 'RTI Penalty updated successfully ');
        } else {
        return redirect()->to('/rti-penalty')->with('message', 'RTI Penalty update failed');
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
       $re=$this->RtiPenaltyModel->findOrFail($id)->delete();
        if($re){
            return 'User Deleted Successfully';
        }
        else {
             return 'User Deletion failed';
        }
    }
}
