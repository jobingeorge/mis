<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\ReportTitleModel;
use Illuminate\Support\Facades\DB;

class DistrictReportController extends Controller
{
    

    private $ReportTitleModel;

    public function __construct(ReportTitleModel $ReportTitleModel)
    {
        $this->ReportTitleModel=$ReportTitleModel;
        $this->middleware(['auth','suboffice']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */  
   
   
    public function districtReport(){
      
      $data['report_titles']= $this->ReportTitleModel->getReportTitles();
      return view('reports.district-report',compact('data'));
    }
    
  
}
?>



