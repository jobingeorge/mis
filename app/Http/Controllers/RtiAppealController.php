<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\RtiAppealModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth;
class RtiAppealController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(RtiAppealModel $RtiAppealModel)
    {
        $this->RtiAppealModel=$RtiAppealModel;
        $this->middleware('auth');
    }
    public function index()
    {
        $officerLevel=auth()->user()->officerLevel;
        $RegionId=auth()->user()->added_by_region;
        $DistrictId=auth()->user()->added_by_district;
        $OfficeId=auth()->user()->added_by_office;
        $officerId=auth()->user()->id;

        if($officerLevel>=0 && ($officerLevel==0 || $officerLevel==1)){
             $data=  $this->RtiAppealModel->getAllByStateLevel();
        }elseif($officerLevel>=0 && $officerLevel==2){
             $data=  $this->RtiAppealModel->getAllByRegionLevel($RegionId);
        }elseif($officerLevel>=0 && $officerLevel==3){
             $data=  $this->RtiAppealModel->getAllByDistrictLevel($DistrictId,$officerId);
        }elseif($officerLevel>=0 && $officerLevel==4){
             $data=  $this->RtiAppealModel->getAllByOfficeRLevel($officerId,$officerId);
        }
        return view('rtiappealapplication',compact('data'));
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
        return view('rtiappealapplicationcreate',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // dd( $request->all());
          $validatedData=$request->validate([
            'file_number' => 'required|number'
        ]);
            $data= $request->all();
            $data['added_by']= auth()->user()->id;
            $data['added_by_region']= auth()->user()->region;
            $data['added_by_district']= auth()->user()->district;
             $data['added_by_office']= auth()->user()->office_name;
            $response = $this->RtiAppealModel->create($data);
        //commit();
        if($response){
            return redirect()->to('/rti-appeal-application')->with('message', 'User successfully added!');
        } else {
             return redirect()->to('/rti-appeal-application')->with('message', 'User Insertion failed try after some time!');
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
       // $re= json_decode(json_encode($data), true); 
        //$data['rti']=  $this->RtiAppealModel->find($id);
        $data['rti']=  $this->RtiAppealModel->getById($id);
        $data['formType']='edit'; 
        return view('rtiappealapplicationcreate',compact('data'));
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
            'file_number' => 'required'
        ]);

     $data = request()->except(['_token','_method']);
    if($data['status']=='rejected'){
      $data['date_reply']=''; 
       $data['act']='';  
    }
     if($data['status']=='replied'){
      $data['date_rejection']='';
       $data['rejection_reason']=''; 
    }
    if($data['status']=='disposed'){
      $data['date_reply']='';
       $data['date_rejection']='';
       $data['rejection_reason']=''; 
        $data['act']='';  
    }
     $this->RtiAppealModel->where('id', $id)->update($data);
      return redirect()->to('/rti-appeal-application')->with('message', 'Rti Appeal application successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $re=$this->RtiAppealModel->findOrFail($id)->delete();
        if($re){
            return 'Deleted Successfully';
        }
        else {
             return 'Deletion failed';
        }
    }
}
