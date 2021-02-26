<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use App\Models\MonthlyProgramsModel;
class MonthlyProgramsController extends Controller
{
         /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(MonthlyProgramsModel $MonthlyProgramsModel)
    {
        $this->MonthlyProgramsModel=$MonthlyProgramsModel;
        $this->middleware(['auth','admin']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
           $data=  $this->MonthlyProgramsModel->getAllMonthlyProgram(); 
           foreach ($data as $key => $value){
           if( $value['nature_of_duty']=='reverification_camp'){
                $data[$key]['nature_of_duty']='Reverification camp';
            }
            if( $value['nature_of_duty']=='reverification_in_situ'){
                $data[$key]['nature_of_duty']='Reverification in situ';
            }
            if( $value['nature_of_duty']=='office_work'){
                $data[$key]['nature_of_duty']='Office work';
            }
            if( $value['nature_of_duty']=='surprise_inspection(individual)'){
                $data[$key]['nature_of_duty']='Surprise Inspection(Individual)';
            }
             if( $value['nature_of_duty']=='surprise_inspection(combined)'){
                $data[$key]['nature_of_duty']='Surprise Inspection(Combined)';
            }
             if( $value['nature_of_duty']=='surprise_inspection(special_drive)'){
                $data[$key]['nature_of_duty']='Surprise Inspection(Special Drive)';
            }
            if( $value['nature_of_duty']=='monthly_conf'){
                $data[$key]['nature_of_duty']='Monthly Conf';
            }
             if( $value['nature_of_duty']=='conference'){
                $data[$key]['nature_of_duty']='Conference';
            }
             if( $value['nature_of_duty']=='training'){
                $data[$key]['nature_of_duty']='Training';
            }
            if( $value['nature_of_duty']=='court_duty'){
                $data[$key]['nature_of_duty']='Court Duty';
            }
            if( $value['nature_of_duty']=='court_duty'){
                $data[$key]['nature_of_duty']='Court Duty';
            }
            if( $value['nature_of_duty']=='other'){
                $data[$key]['nature_of_duty']='Other';
            }
            if( $value['nature_of_duty']=='verification_institution'){
                $data[$key]['nature_of_duty']='Verification Institution';
            }
            if( $value['nature_of_duty']=='verification_camp'){
                $data[$key]['nature_of_duty']='Verification-Camp';
            }
            if( $value['nature_of_duty']=='inspection_camp_of_lmo'){
                $data[$key]['nature_of_duty']='Inspection-Camp of LMO';
            }
            if( $value['nature_of_duty']=='inspection_institu_work_of_lmo'){
                $data[$key]['nature_of_duty']='Inspection-institu work of LMO';
            }
            if( $value['nature_of_duty']=='casual_leave'){
                $data[$key]['nature_of_duty']='Casual Leave';
            }
            if( $value['nature_of_duty']=='journey'){
                $data[$key]['nature_of_duty']='Journey';
            }
            if( $value['nature_of_duty']=='return_journey'){
                $data[$key]['nature_of_duty']='Return Journey';
            }
            if( $value['nature_of_duty']=='holiday'){
                $data[$key]['nature_of_duty']='Holiday';
            }
           }

           //  dd($data);
       return view('monthly-program.index',compact('data'));
       // return view('monthly-programs');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['district']=$this->MonthlyProgramsModel->getAllDistricts();
        $data['formType']="create";
        // dd( $data);
        return view('monthly-program.create',compact('data'));
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
        'date' => 'required'
        ]);
        $data = $request->all();
        
        if($data['camp']==''){
          $data['camp']=$data['camp_edit']; 
          unset($data['camp_edit']);
        }
        $data['added_by']= auth()->user()->id;
        $data['added_by_region']= auth()->user()->region;
        $data['added_by_district']= auth()->user()->district;
        $data['added_by_office']= auth()->user()->office_name;


        $dates=explode(",",$data['date']);
        foreach($dates as $d){
          $data['date']=$d;  
          $this->MonthlyProgramsModel->create($data);
        }
         return redirect()->to('/monthly-programms')->with('message', 'Data successfully added!');
        // if($response){
           
        // } else {
        //      return redirect()->to('/file-disposal')->with('message', 'Insertion failed try after some time!');
        // }
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
        $data['monthlyProgram']=  $this->MonthlyProgramsModel->getById($id);
        $data['district']=$this->MonthlyProgramsModel->getAllDistricts();
/*        dd($data);*/
         return view('monthly-program.edit',compact('data'));
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
        'date' => 'required'
        ]);

            $duty=array('conference','other','training','court_duty');

    $data['date']=$request->date;
    $data['nature_of_duty']=$request->nature_of_duty;

    if(in_array($data['nature_of_duty'], $duty)){

    $data['camp']=$request->camp_edit;
    $data['district']='';
    $data['office']='';

    }
    else{
        $data['camp']=$request->camp;
        $data['district']=$request->district;

        if($data['camp']='others'){
            $data['office']=$request->office;
        }else{
            $data['office']='';

        }

    }
/* */
       
        /*if($data['camp']==''){
          $data['camp']=$data['camp_edit']; 
        }
        unset($data['camp_edit']);
*/

        $data['remarks']=$request->remarks;
        $data['added_by']= auth()->user()->id;
        $data['added_by_region']= auth()->user()->region;
        $data['added_by_district']= auth()->user()->district;
        $data['added_by_office']= auth()->user()->office_name;


        /*$dates=explode(",",$data['date']);
        foreach($dates as $d){
          $data['date']=$d;  
          $this->MonthlyProgramsModel->create($data);
        }*/

         $this->MonthlyProgramsModel->where('id', $id)->update($data);
         return redirect()->to('/monthly-programms')->with('message', 'Data successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $re=$this->MonthlyProgramsModel->findOrFail($id)->delete();
        if($re){
            return 'Deleted Successfully';
        }
        else {
             return 'Deletion failed';
        }
    }
}
