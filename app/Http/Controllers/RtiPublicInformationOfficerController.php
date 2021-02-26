<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RtiPublicInformationModel;
use App\Http\Controllers\Auth;
class RtiPublicInformationOfficerController extends Controller
{
    public function __construct(RtiPublicInformationModel $RtiPublicInformationModel)
    {   
        $this->RtiPublicInformationModel=$RtiPublicInformationModel;
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=  $this->RtiPublicInformationModel->getAllPublicInformation(); 
        return view('rti-public-information-officer',compact('data'));
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
        return view('rti-public-information-officer-create',compact('data'));    
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
            'officer_name' => 'required',
            'assistant_officer' => 'required',
            'authority_name' => 'required'
        ]);
        $data = $request->all();
        $data['added_by']= auth()->user()->id;
        $data['added_by_region']= auth()->user()->region;
        $data['added_by_district']= auth()->user()->district;
        $data['added_by_office']= auth()->user()->office_name;
        $response = $this->RtiPublicInformationModel->create($data);
        if($response){
            return redirect()->to('/rti-public-information-officer')->with('message', 'Public information officer successfully added!');
        } else {
             return redirect()->to('/rti-public-information-officer')->with('message', 'Insertion failed try after some time!');
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
        $data['rti']=  $this->RtiPublicInformationModel->getById($id);
        $data['formType']='edit'; 
        return view('rti-public-information-officer-create',compact('data'));
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
            'officer_name' => 'required',
            'assistant_officer' => 'required',
            'authority_name' => 'required'
        ]);
    $data = request()->except(['_token','_method']);

     $this->RtiPublicInformationModel->where('id', $id)->update($data);
    //return redirect('/rti-public-authority');
    return redirect()->to('/rti-public-information-officer')->with('message', 'Data successfully updated!');
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
        $re=$this->RtiPublicInformationModel->findOrFail($id)->delete();
        if($re){
            return 'Deleted Successfully';
        }
        else {
             return 'Deletion failed';
        }
    }
}
