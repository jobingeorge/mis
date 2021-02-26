<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FileDisposalModel;
class FileDisposalController extends Controller
{
       /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(FileDisposalModel $FileDisposalModel)
    {
        $this->FileDisposalModel=$FileDisposalModel;
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $data=  $this->FileDisposalModel->getAllFileDisposal(); 
       return view('filedisposal',compact('data'));
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
        return view('filedisposalcreate',compact('data'));
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
        'name' => 'required'
        ]);
        $data = $request->all();
        $data['files_pending_count']= $data['pendingEnglish']+$data['pendingMalayalam']+$data['pendingOthers'];
        $data['action_count']= $data['actionEnglish']+$data['actionMalayalam']+$data['actionOthers'];
        $data['thapals_count']= $data['thapalEnglish']+$data['thapalMalayalam']+$data['thapalOthers'];
        $data['action_taken_count']= $data['actionPercentageEnglish']+$data['actionPercentageMalayalam']+$data['actionPercentageOthers'];
        $data['file_disposal_count']= $data['disposalEnglish']+$data['disposalMalayalam']+$data['disposalOthers'];  
        $data['added_by']= auth()->user()->id;
        $data['added_by_region']= auth()->user()->region;
        $data['added_by_district']= auth()->user()->district;
        $data['added_by_office']= auth()->user()->office_name;
        $response = $this->FileDisposalModel->create($data);
        if($response){
            return redirect()->to('/file-disposal')->with('message', 'Data successfully added!');
        } else {
             return redirect()->to('/file-disposal')->with('message', 'Insertion failed try after some time!');
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
        $data['fileDisposal']=  $this->FileDisposalModel->getById($id);
        $data['formType']='edit'; 
        //dd($data);
        return view('filedisposalcreate',compact('data'));
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
        'name' => 'required'
        ]);
        $data = request()->except(['_token','_method']);
        $data['files_pending_count']= $data['pendingEnglish']+$data['pendingMalayalam']+$data['pendingOthers'];
        $data['action_count']= $data['actionEnglish']+$data['actionMalayalam']+$data['actionOthers'];
        $data['thapals_count']= $data['thapalEnglish']+$data['thapalMalayalam']+$data['thapalOthers'];
        $data['action_taken_count']= $data['actionPercentageEnglish']+$data['actionPercentageMalayalam']+$data['actionPercentageOthers'];
        $data['file_disposal_count']= $data['disposalEnglish']+$data['disposalMalayalam']+$data['disposalOthers'];  
        $data['added_by']= auth()->user()->id;
        $data['added_by_region']= auth()->user()->region;
        $data['added_by_district']= auth()->user()->district;
        $data['added_by_office']= auth()->user()->office_name;
        $response=$this->FileDisposalModel->where('id', $id)->update($data);
        if( $response){
            return redirect()->to('/file-disposal')->with('message', 'Data successfully updated!');
        } else {
             return redirect()->to('/file-disposal')->with('message', 'Data updation failed!');
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
     $re=$this->FileDisposalModel->findOrFail($id)->delete();
        if($re){
            return 'Deleted Successfully';
        }
        else {
             return 'Deletion failed';
        }
    }
}
