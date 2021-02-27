<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    private $UserModel;
    public function __construct(UserModel $UserModel
                                ){
        $this->UserModel = $UserModel;

        $this->middleware(['auth','state','region','suboffice']);

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      $data=  $this->UserModel->getAllUsers();  
     return view('users',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['userLevel']=  $this->UserModel->getAllUserLevel();
        $data['formType']="create";
        /*dd($data);*/
      return view('userscreate',compact('data'));
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
            'pen' => 'required|numeric|min:2',
            'cug' => 'required|digits:10',
            'email' => 'required',
            'password' => 'required|Min:5',
            'confirmPassword' => 'required_with:password|same:password|min:5',
            'officerLevel' => 'required',
        ]);
        $data = $request->all();
       // dd($data);
        $data['name'] = $request->name;
        $data['pen'] = $request->pen;
        $data['cug'] = $request->cug;
        $data['email'] = $request->email;
        $data['password'] =Hash::make($request['password']);
        if(isset($request->officerLevel) && ($request->officerLevel==0))
        {
         $data['role'] = 'sa'; 
         $data['full_role'] = 'sa';   
        }
        $data['officerLevel'] = $request->officerLevel;
        $data['designation_id'] = $request->designation_id;
        $data['region'] = $request->region;
         $data['district'] = $request->district;
         $data['office_name'] = $request->office_name;
         $data['userType'] = $request->userType;
        //dd($data); 
        //beginTransaction();
        //$response = create($this->UserModel, $data);
        $response = $this->UserModel->create($data);
        //commit();
        if($response){
            return redirect()->to('/users')->with('message', 'User successfully added!');
        } else {
             return redirect()->to('/users')->with('message', 'User Insertion failed try after some time!');
        }
        
       // dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $data['user']=  $this->UserModel->getUserById($id); 
     $data['formType'] ="show";
      $data['userLevel']=  $this->UserModel->getAllUserLevel();
    // dd($data);
     return view('userscreate',compact('data'));   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    $data['user']=  $this->UserModel->getUserById($id); 
    //dd( $data);
    $data['formType'] ="edit";
    $data['userLevel']=  $this->UserModel->getAllUserLevel();
    $data['StateLevelDesignation']=  $this->UserModel->getAllStateLevelDesignation();
    $data['RegionLevelDesignation']=  $this->UserModel->getAllRegionLevelDesignation();
    $data['DistrictLevelDesignation']=  $this->UserModel->getAllDistrictLevelDesignation();
    $data['OfficeLevelDesignation']=  $this->UserModel->getAllOfficeLevelDesignation();
    // dd($data);
     return view('userscreate',compact('data'));
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
       // echo $id;
      // dd($request->all());
       $validatedData=$request->validate([
            'name' => 'required',
            'pen' => 'required|numeric|min:2',
            'cug' => 'required|digits:10',
            'email' => 'required',
            'officerLevel' => 'required',
        ]);
       
        $data['name'] = $request->name;
        $data['pen'] = $request->pen;
        $data['cug'] = $request->cug;
        $data['email'] = $request->email;
        $data['userType'] = $request->userType;
        if(isset($request->officerLevel) && ($request->officerLevel==0))
        {
         $data['role'] = 'sa'; 
         $data['full_role'] = 'sa';   
        }
         $data['designation_id'] = $request->designation_id;
        //  $response = $this->UserModel->update($data,$id);
          $this->UserModel->where('id', $id)->update($data);
          return redirect()->route('users.index')->with(['message' => 'Successfully updated']);
        //   return redirect()->to('/users')->with('message', 'User successfully added!');
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
        $re=$this->UserModel->findOrFail($id)->delete();
        if($re){
            return 'User Deleted Successfully';
        }
        else {
             return 'User Deletion failed';
        }
    }
    public function GetDesignations(Request $request){
      // dd($request->id);
      $id = $request->id;
      $res=$this->UserModel->GetDesignations($id);
     // return $re;
      $options='';
      if($res){
        foreach ($res as $re){
        $options.="<option value=".$re['designation_id'].">".$re['designation']."</option>";
       }
      }
      return $options;
    }
    public function GetRegions(){
       $res=$this->UserModel->GetRegion(); 
        $options='';
      if($res){
        foreach ($res as $re){
        $options.="<option value=".$re['region_id'].">".$re['region']."</option>";
       }
      }
      return $options;
    }

    public function GetDistrict(Request $request){
      $id = $request->did;
      $res=$this->UserModel->GetDistrict($id); 
      $options='';
      $selected='';
      $options.="<option value=''>Select District</option>";
      if($res){
        foreach ($res as $key=>$re){
          $options.="<option value=".$re['district_id'].">".$re['district_name']."</option>";
        }
      }
      return $options;
    }

    public function GetOffice(Request $request){
      $id = $request->oid;
      $res=$this->UserModel->GetOffice($id); 
      $options='';
      $options.="<option value=''>Select Office</option>";
      if($res){
        foreach ($res as $re){
           $options.="<option value=".$re['office_id'].">".$re['office_name']."</option>";
        }
      }
      return $options;  
    }
    public function GetOfficersByRegion(Request $request){
     $rid = $request->rid;
      $res=$this->UserModel->GetOfficersByRegion($rid);
  //    dd($res);
      $options='';
      $options.="<option value=''>Select Officer</option>";
      if($res){
        foreach ($res as $re){
           $options.="<option value=".$re['id'].">".$re['designation'].' '.$re['user_type_name']."</option>";
        }
      }
      return $options;   
    }
    public function GetOfficersByDistrict(Request $request){
     $did = $request->did;
      $res=$this->UserModel->GetOfficersByDistrict($did);
     //    dd($res);
      $options='';
      $options.="<option value=''>Select Officer</option>";
      if($res){
        foreach ($res as $re){
           $options.="<option value=".$re['id'].">".$re['designation'].' '.$re['user_type_name']."</option>";
        }
      }
      return $options; 
    }
    public function GetOfficersByOffice(Request $request){
      $oid = $request->oid;
      $res=$this->UserModel->GetOfficersByOffice($oid);
     //    dd($res);
      $options='';
      $options.="<option value=''>Select Officer</option>";
      if($res){
        foreach ($res as $re){
           $options.="<option value=".$re['id'].">".$re['designation'].' '.$re['user_type_name']."</option>";
        }
      }
      return $options; 
    }
    public function GetUserType(Request $request){
      $officerLevel=  $request->officerLevel;
      $res=$this->UserModel->GetUserType($officerLevel);
       $options='';
      if($res){
        foreach ($res as $re){
           $options.="<option value=".$re['user_type_id'].">".$re['user_type_name']."</option>";
        }
      }
      return $options;  
    }
}
