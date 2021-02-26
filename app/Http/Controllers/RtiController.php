<?php

namespace App\Http\Controllers;
use App\Models\RtiModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth;

class RtiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(RtiModel $RtiModel)
    {
        $this->RtiModel=$RtiModel;
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
             $data=  $this->RtiModel->getAllByStateLevel();
        }elseif($officerLevel>=0 && $officerLevel==2){
             $data=  $this->RtiModel->getAllByRegionLevel($RegionId);
        }elseif($officerLevel>=0 && $officerLevel==3){
             $data=  $this->RtiModel->getAllByDistrictLevel($DistrictId,$officerId);
        }elseif($officerLevel>=0 && $officerLevel==4){
             $data=  $this->RtiModel->getAllByOfficeRLevel($officerId,$officerId);
        }
        return view('rtinewapplication',compact('data'));
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
        return view('rtinewapplicationcreate',compact('data'));
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
            'name_of_aplicant' => 'required'
        ]);
            $data= $request->all();
            $data['added_by']= auth()->user()->id;
            $data['added_by_region']= auth()->user()->region;
            $data['added_by_district']= auth()->user()->district;
             $data['added_by_office']= auth()->user()->office_name;
            $response = $this->RtiModel->create($data);
        //commit();
        if($response){
            return redirect()->to('/rti-new-application')->with('message', 'User successfully added!');
        } else {
             return redirect()->to('/rti-new-application')->with('message', 'User Insertion failed try after some time!');
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
        $data['rti']=  $this->RtiModel->getById($id);
        $data['formType']='edit'; 
        return view('rtinewapplicationcreate',compact('data'));
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
     $data = request()->except(['_token','_method']);
    if($data['status']=='rejected'){
      $data['date_reply']=''; 
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
     $this->RtiModel->where('id', $id)->update($data);
   // return redirect('/rti-new-application');
     return redirect()->to('/rti-new-application')->with('message', 'Data successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
       public function destroy($id)
       {
        //dd($id);
        $re=$this->RtiModel->findOrFail($id)->delete();
        if($re){
            return 'Deleted Successfully';
        }
        else {
             return 'Deletion failed';
        }
    }
}
