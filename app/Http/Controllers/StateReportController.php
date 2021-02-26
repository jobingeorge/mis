<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\ReportTitleModel;
use Illuminate\Support\Facades\DB;

class StateReportController extends Controller
{
    

    private $ReportTitleModel;

    public function __construct(ReportTitleModel $ReportTitleModel)
    {
        $this->ReportTitleModel=$ReportTitleModel;
        $this->middleware(['auth','region','district','suboffice']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */  
    public function stateReport(){
    	
      $data['report_titles']= $this->ReportTitleModel->getReportTitles(); 

    	return view('reports.state-report',compact('data'));
    } 
  
    public function excel(){
    	
    	
    }
}
?>

