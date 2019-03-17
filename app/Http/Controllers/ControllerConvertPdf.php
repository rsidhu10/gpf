<?php

namespace App\Http\Controllers;
use Session;
use App\Zone;
use App\Circle;
use App\Division;
use App\GpfCategory;
use App\Designation;
use App\Reason;
use App\PendingCase;
use App\Http\Requests\EditCase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use PDF;


class ControllerConvertPdf extends Controller
{
    public function getPDF()

    {
    	$cases = PendingCase::join('reasons','reasons.id','=','pending_cases.casetype_id')
        ->join('gpf_categories','gpf_categories.id', '=', 'pending_cases.category_id')
        ->join('designations', 'designations.id', '=', 'pending_cases.designation_id')
        ->join('case_statuses', 'case_statuses.id', '=', 'pending_cases.relates_to')
        ->selectRaw('concat(gpf_categories.category,"-",pending_cases.gpf_number) as gpf,
                                  pending_cases.id,
                                  pending_cases.name,
                                  pending_cases.status,
                                  pending_cases.relates_to,
                                  pending_cases.retirement_dt,
                                  pending_cases.diary_dt,
                                  pending_cases.created_at,
                                  reasons.reason,
                                  case_statuses.name as dname,
                                  designations.designation')
                            ->orderBy('relates_to', 'asc')
                            ->orderBy('retirement_dt', 'asc')
                            ->where('status','!=','1')
                            ->get();
        echo "Test Hello I am Here....";
    	$pdf = PDF::loadView('pdf.cases',['mcases'=>$cases])->setPaper('A4', 'landscape');
    	return $pdf->download('cases.pdf');
    }
}
