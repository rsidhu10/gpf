<?php

namespace App\Http\Controllers;


use Session;
use App\Zone;
use App\Http\Requests\StoreCase;
use App\PendingCase;
use App\CaseStatus;
use Illuminate\Http\Request;
use App\GpfCategory;
use App\Designation;
use App\Reason;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
       $cases = CaseStatus::all();
       //dd($cases); 
        return view('reports.index',compact('cases'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = PendingCase::join('reasons','reasons.id','=','pending_cases.casetype_id')
        ->join('designations' , 'designations.id' , '=', 'pending_cases.designation_id')
        ->join('case_statuses', 'case_statuses.id', '=', 'pending_cases.relates_to')
                            ->selectRaw('reasons.reason,pending_cases.id,
                                pending_cases.id,
                                pending_cases.gpf_number,
                                pending_cases.name as cname,
                                pending_cases.status,
                                pending_cases.relates_to,
                                pending_cases.retirement_dt,
                                case_statuses.name,
                                designations.designation,
                                pending_cases.diary_dt
                                ')
                            ->where('status','!=', '1')
                            ->where('relates_to', '=',$id)
                            ->get();
                           ;

                        return view('reports/show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
