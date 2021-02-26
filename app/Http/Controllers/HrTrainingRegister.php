<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HRTrainingRegisterModel;
use App\Http\Controllers\Auth;

class HrTrainingRegister extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $HRTrainingRegisterModel;
    public function __construct(HRTrainingRegisterModel $HRTrainingRegisterModel)
    {
        $this->HRTrainingRegisterModel = $HRTrainingRegisterModel;
        $this->middleware('auth');
    }
    public function index()
    {
        $user_id   =   auth()->user()->id;
        $data      =   $this->HRTrainingRegisterModel->getHRTrainingRegisters($user_id);
        return view('hr-training-register',compact('data'));
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
        $user_id   =   auth()->user()->id;
        $data['designation']    =   $this->HRTrainingRegisterModel->getDesignations();
        return view('hr-training-register-create',compact('data'));
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
            'name' => 'required',
            'pen' => 'required',
            'designation' => 'required',
        ]);
        $data['name']                   =   $request->name;
        $data['pen']                    =   $request->pen;
        $data['designation']                =   $request->designation;
        $data['name_of_traing_attend']      =   $request->name_of_traing_attend;
        $data['training_mandatory']         =   $request->training_mandatory;
        $data['period_of_training_from']    =   $request->period_of_training_from;
        $data['period_of_training_to']      =   $request->period_of_training_to;
        $data['institution']                =   $request->institution;
        $data['subject']                    =   $request->subject;
        $data['paid']                       =   $request->paid;
        
        $data['added_by']   =   auth()->user()->id;
        
        $response = $this->HRTrainingRegisterModel->create($data);
        //commit();
        if($response){
            return redirect()->to('/hr-training-register')->with('message', 'Training successfully registered!');
        } else {
            return redirect()->to('/hr-training-register')->with('message', 'Training registration failed. Please try after some time!');
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
        $data['userLevel']='';
        $data['formType']="show";
        $data['designation']    =   $this->HRTrainingRegisterModel->getDesignations();
        $data['training']       =   $this->HRTrainingRegisterModel->getHRTrainingRegistersbyID($id);
        return view('hr-training-register-create',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['userLevel']='';
        $data['formType']="edit";
        $data['designation']    =   $this->HRTrainingRegisterModel->getDesignations();
        $data['training']       =   $this->HRTrainingRegisterModel->getHRTrainingRegistersbyID($id);
        return view('hr-training-register-create',compact('data'));
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
            'name' => 'required',
            'pen' => 'required',
            'designation' => 'required',
        ]);
        $data['name']                   =   $request->name;
        $data['pen']                    =   $request->pen;
        $data['designation']                =   $request->designation;
        $data['name_of_traing_attend']      =   $request->name_of_traing_attend;
        $data['training_mandatory']         =   $request->training_mandatory;
        $data['period_of_training_from']    =   $request->period_of_training_from;
        $data['period_of_training_to']      =   $request->period_of_training_to;
        $data['institution']                =   $request->institution;
        $data['subject']                    =   $request->subject;
        $data['paid']                       =   $request->paid;
        
        $data['added_by']   =   auth()->user()->id;
        
        $response = $this->HRTrainingRegisterModel->where('id', $id)->update($data);
        //commit();
        if($response){
            return redirect()->to('/hr-training-register')->with('message', 'Training successfully updated!');
        } else {
            return redirect()->to('/hr-training-register')->with('message', 'Training updation failed. Please try after some time!');
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
        $re =   $this->HRTrainingRegisterModel->where('id', $id)->delete();
        if($re){
            return 'Training Successfully Deleted';
        }
        else {
             return 'Training Deletion failed';
        }
    }
}
