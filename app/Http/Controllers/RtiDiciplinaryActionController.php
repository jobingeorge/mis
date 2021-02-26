<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RtiDiciplinaryModel;
class RtiDiciplinaryActionController extends Controller
{


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(RtiDiciplinaryModel $RtiDiciplinaryModel)
    {
        $this->RtiDiciplinaryModel=$RtiDiciplinaryModel;
        $this->middleware('auth');
    }
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $data=  $this->RtiDiciplinaryModel->getAllDiciplinaryAction(); 
       return view('rti-diciplinary-action',compact('data'));
    }
    public function create()
    {
           $data['userLevel']='';
           $data['formType']="create";
           return view('rti-diciplinary-action-create',compact('data'));
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
        'office' => 'required',
        'action_sec20_2' => 'required',
        'action_commision' => 'required',
        'action_other'=>'required'
        ]);
        $data = $request->all();
        $data['added_by']= auth()->user()->id;
        $data['added_by_region']= auth()->user()->region;
        $data['added_by_district']= auth()->user()->district;
        $data['added_by_office']= auth()->user()->office_name;
        $response = $this->RtiDiciplinaryModel->create($data);
        if($response){
            return redirect()->to('/rti-diciplinary-action')->with('message', 'Public information officer successfully added!');
        } else {
             return redirect()->to('/rti-diciplinary-action')->with('message', 'Insertion failed try after some time!');
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
         $data['rti']=  $this->RtiDiciplinaryModel->getById($id);
        $data['formType']='edit'; 
        return view('rti-diciplinary-action-create',compact('data'));
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
        'office' => 'required',
        'action_sec20_2' => 'required',
        'action_commision' => 'required',
        'action_other'=>'required'
        ]);
       $data = request()->except(['_token','_method']);

     $this->RtiDiciplinaryModel->where('id', $id)->update($data);
       return redirect()->to('/rti-diciplinary-action')->with('message', 'Data successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $re=$this->RtiDiciplinaryModel->findOrFail($id)->delete();
        if($re){
            return 'Deleted Successfully';
        }
        else {
             return 'Deletion failed';
        }
    }
}
