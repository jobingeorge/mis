<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ReportTitleModel extends Model{
    protected $table    = 'report_titles'; 
    protected $fillable = ['id','report_title'];

    public function getReportTitles(){
        $result = DB::select('select id, report_title from report_titles');
        return $resultArray = json_decode(json_encode($result), true);
    }
    
}
