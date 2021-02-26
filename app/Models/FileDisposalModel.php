<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class FileDisposalModel extends Model
{
     protected $table = 'file_disposal'; 
    protected $fillable = ['added_by','added_by_region','added_by_district','added_by_office',
                           'name','pendingEnglish','pendingMalayalam','pendingOthers','files_pending_count',
                          'actionEnglish','actionMalayalam','actionOthers','action_count','thapalEnglish','thapalMalayalam',
                          'thapalOthers','thapals_count','actionPercentageEnglish','actionPercentageMalayalam','actionPercentageOthers',
                          'action_taken_count','disposalEnglish','disposalMalayalam','disposalOthers','file_disposal_count'];
    public function getAllFileDisposal(){
         $result = DB::table('file_disposal')
                    ->select('*')
                    ->get();
        return $resultArray = json_decode(json_encode($result), true);
    } 
    public function getById($id){
        $data = DB::table('file_disposal')
            ->where('file_disposal.id', '=', $id)
           ->get();

        return $data = json_decode(json_encode($data), true);  
    }
}
