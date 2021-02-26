<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\ReportTitleModel;
use Illuminate\Support\Facades\DB;

class RegionReportController extends Controller
{
    

    private $ReportTitleModel;

    public function __construct(ReportTitleModel $ReportTitleModel)
    {
        $this->ReportTitleModel=$ReportTitleModel;
        $this->middleware(['auth','district','suboffice']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */  
    
    public function regionReport(){
      
      $data['report_titles']= $this->ReportTitleModel->getReportTitles();
      return view('reports.region-report',compact('data'));
    }
    
   
}
?>

