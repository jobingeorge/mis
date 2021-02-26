<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\RtiPublicAuthorityModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth;
class RtiPublicAuthorityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(RtiPublicAuthorityModel $RtiPublicAuthorityModel)
    {
        $this->RtiPublicAuthorityModel=$RtiPublicAuthorityModel;
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
             $data=  $this->RtiPublicAuthorityModel->getAllByStateLevel();
        }elseif($officerLevel>=0 && $officerLevel==2){
             $data=  $this->RtiPublicAuthorityModel->getAllByRegionLevel($RegionId);
        }elseif($officerLevel>=0 && $officerLevel==3){
             $data=  $this->RtiPublicAuthorityModel->getAllByDistrictLevel($DistrictId,$officerId);
        }elseif($officerLevel>=0 && $officerLevel==4){
             $data=  $this->RtiPublicAuthorityModel->getAllByOfficeRLevel($officerId,$officerId);
        }
        //dd(             $data);
        return view('rtipublicauthority',compact('data'));
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
        return view('rtipublicauthoritycreate',compact('data'));
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
            'name_of_public_authority' => 'required'
        ]);
        $data= $request->all();
        $data['added_by']= auth()->user()->id;
        $data['added_by_region']= auth()->user()->region;
        $data['added_by_district']= auth()->user()->district;
        $data['added_by_office']= auth()->user()->office_name;
        $response = $this->RtiPublicAuthorityModel->create($data);
        if($response){
            return redirect()->to('/rti-public-authority')->with('message', 'RTI Public authority successfully added!');
        } else {
             return redirect()->to('/rti-public-authority')->with('message', 'Insertion failed try after some time!');
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
         $data['rti']=  $this->RtiPublicAuthorityModel->getById($id);
        $data['formType']='edit'; 
        return view('rtipublicauthoritycreate',compact('data'));
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

     $this->RtiPublicAuthorityModel->where('id', $id)->update($data);
    //return redirect('/rti-public-authority');
    return redirect()->to('/rti-public-authority')->with('message', 'Data successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $re=$this->RtiPublicAuthorityModel->findOrFail($id)->delete();
        if($re){
            return 'Deleted Successfully';
        }
        else {
             return 'Deletion failed';
        }
    }
}
