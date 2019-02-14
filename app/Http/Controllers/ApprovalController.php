<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Zone;
use App\Http\Requests\StoreCase;
use App\PendingCase;
class ApprovalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $zones = Zone::all();
        
        return view('approvals.add',compact('zones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('approvals.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCase $request)
    {
      
      //dd($request);
      $data = PendingCase::where('letter_no',   $request->letter_no_txt)
                            ->where('letter_dt',  $request->letter_dt_txt) 
                            ->where('gpf_number', $request->gpf_no_txt)   
                            ->first();
        if($data)
        {
            $zones = Zone::all();
            Session()->flash('success', 'Record Already Exist!!');
            return view('cases.create',compact('zones'));
            
        }else
        {
            $case = new PendingCase;

            
            $case->zone_id      =  $request->zone_cbo;
            $case->circle_id    =  $request->circle_cbo;
            $case->division_id  =  $request->division_cbo;
            $case->letter_no    =  $request->letter_no_txt;
            $case->letter_dt    =  $request->letter_dt_txt;
            $case->diary_no     =  $request->diary_no_txt;
            $case->diary_dt     =  $request->diary_dt_txt;
            $case->category_id  =  $request->category_cbo;
            $case->gpf_number   =  $request->gpf_no_txt;
            $case->empcode      =  $request->emp_code_txt;
            $case->name         =  $request->emp_name_txt;
            $case->designation_id= $request->designation_cbo;
            $case->casetype_id  =  $request->reason_cbo;
            $case->retirement_dt=  $request->retire_dt_txt;
            $case->relates_to   =  $request->relatesto_cbo;
            $case->financial_year= $request->sanction_year_cbo;


            $case->save();
            Session::flash('success', 'Record Saved Successfully!!');
            
            $zones = Zone::all();
            
            return view('cases.create',compact('zones'));
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
