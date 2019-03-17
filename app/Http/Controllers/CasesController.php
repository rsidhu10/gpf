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
use App\Http\Requests\StoreCase;
use App\Http\Requests\EditCase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
class CasesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
                            // ->orderBy('relates_to', 'asc')
                            // ->orderBy('gpf_categories', 'asc')
                            ->orderBy('diary_dt', 'asc')
                             ->where('status','!=','1')
                             // ->where('relates_to',"=","S5" )
                            ->paginate(8);
        return view('cases.index',compact('cases'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$zones = Zone::all();
        return view('cases.create',compact('zones'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         dd($request);
        // $data = Input::all();
        // //dd($data);
        $data = PendingCase::where('letter_no',   $request->letter_no_txt)
                            ->where('letter_dt',  $request->letter_dt_txt) 
                            ->where('gpf_number', $request->gpf_no_txt)   
                            ->first();
        if($data){
            $zones = Zone::all();
        Session()->flash('success', 'Record Already Exist!!');
 
        return view('cases.create',compact('zones'));
            
        }else{
        $case = PendingCase::create([
            'zone_id'       => $request->input('zone_cbo'),
            'circle_id'     => $request->input('circle_cbo'),
            'division_id'   => $request->input('division_cbo'),
            'letter_no'     => $request->input('letter_no_txt'),
            'letter_dt'     => $request->input('letter_dt_txt'),
            'diary_no'      => $request->input('diary_no_txt'),
            'diary_dt'      => $request->input('diary_dt_txt'),
            'category_id'   => $request->input('category_cbo'),
            'gpf_number'    => $request->input('gpf_no_txt'),
            'empcode'       => $request->input('emp_code_txt'),
            'name'          => $request->input('emp_name_txt'),
            'designation_id'=> $request->input('designation_cbo'),
            'casetype_id'   => $request->input('reason_cbo'),
            'retirement_dt' => $request->input('retire_dt_txt'),
            'relates_to'    => $request->input('relatesto_cbo'),
            'financial_year'=> $request->input('sanction_year_cbo'),
        ]);
       
        Session()->flash('success', 'Record Saved Successfully!');
        
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
        // $data = PendingCase::join('reasons','reasons.id','=','pending_cases.casetype_id')
        //                     ->join('designations', 'designations.id', '=', 'pending_cases.designation_id')
        //                     ->join('case_statuses', 'case_statuses.id', '=', 'pending_cases.relates_to')
        $data = PendingCase::join('reasons','reasons.id','=','pending_cases.casetype_id')
        ->join('gpf_categories','gpf_categories.id', '=', 'pending_cases.category_id')
        ->join('designations', 'designations.id', '=', 'pending_cases.designation_id')
        ->join('case_statuses', 'case_statuses.id', '=', 'pending_cases.relates_to')
        ->selectRaw('concat(gpf_categories.category,"-", pending_cases.gpf_number) as newgpf,
                                reasons.reason,
                                gpf_categories.category,
                                pending_cases.id,
                                pending_cases.gpf_number,

                                pending_cases.name,
                                pending_cases.approved_by,
                                pending_cases.approval_no,
                                pending_cases.approval_dt,
                                pending_cases.approved_amt,
                                pending_cases.status,
                                pending_cases.certificate,
                                pending_cases.certificate_no,
                                pending_cases.certificate_dt,
                                designations.designation,
                                pending_cases.relates_to
                                ')->find($id);

                        return view('cases/show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        
        $data = PendingCase::join('reasons','reasons.id','=','pending_cases.casetype_id')
                            ->join('designations', 'designations.id', '=', 'pending_cases.designation_id')
                            ->selectRaw('reasons.reason,pending_cases.id,
                                pending_cases.id,
                                pending_cases.gpf_number,
                                pending_cases.name,
                                pending_cases.approved_by,
                                pending_cases.approval_no,
                                pending_cases.approval_dt,
                                pending_cases.approved_amt,
                                pending_cases.status,
                                pending_cases.certificate,
                                pending_cases.certificate_no,
                                pending_cases.certificate_dt,
                                designations.designation
                                ')->find($id);
      // dd($data);
        return view('cases.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditCase $request, $id)
    {
        //dd($request);
        // $this->validate($request,array(
        //         'status_cbo' => 'required',
        // ));

        $case = PendingCase::find($id);
        $case->status               = $request->input('status_cbo');
        $case->approved_by          = $request->input('approvedby_cbo');
        $case->certificate          = $request->input('certificate_cbo');
        $case->approval_no          = $request->input('approval_order_txt');
        $case->app_letter_number    = $request->input('approval_letter_no_txt');
        $case->approval_dt          = $request->input('approval_letter_dt_txt');
        $case->approved_amt         = $request->input('approved_amt_txt');
        $case->certificate_no       = $request->input('certificate_letter_no_txt');
        $case->certificate_dt       = $request->input('certificate_letter_dt_txt');
        
        $case->save();

        Session()->flash('success', 'Record updated Successfully!');
        $cases = PendingCase::join('reasons','reasons.id','=','pending_cases.casetype_id')
                            ->join('gpf_categories','gpf_categories.id', '=', 'pending_cases.category_id')
                            ->join('designations', 'designations.id', '=', 'pending_cases.designation_id')
                            ->join('case_statuses', 'case_statuses.id', '=', 'pending_cases.relates_to')
                            
                            ->selectRaw('
                                  concat(gpf_categories.category,"-",pending_cases.gpf_number) as gpf,
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
                            // ->orderBy('gpf_categories', 'asc')
                            ->orderBy('retirement_dt', 'asc')
                             ->where('status','!=','1')
                             // ->where('relates_to',"=","S5" )
                            ->paginate(8);

        return view('cases.index',compact('cases'));

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

    /**
     * Send the specified Circle Data from storage called by Json .
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function circles(){
      $id = Input::get('id');
      //dd($id);
      $circles = Circle::where('zone_id', '=', $id)->get();
       // $circles = Circle::all();
    return response()->json($circles);
    }

    /**
     * Send the specified Division Data from storage called by Json .
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function divisions(){
      $id = Input::get('id');
      $divisions = Division::where('circle_id', '=', $id)->get();
       // $divisions = Division::all();
      return response()->json($divisions);
      

    }

    /**
     * Send the ALL Categories Data from storage called by Json .
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function categories(){
        $categories = GPFCategory::all();
        return response()->json($categories);
    }

    /**
     * Send the specified Designations Data from storage called by Json .
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function designations(){
        $id = Input::get('id');
        $designations = Designation::where('category_id', '=', $id)->get();        

        //$designations = Designation::all();
        return response()->json($designations);
    }

    /**
     * Send the All the Reasons Data from storage called by Json .
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function reasons(){
            $reasons = Reason::all();
        return response()->json($reasons);
    }

    /**
     * Send the All the Reasons Data from storage called by Json .
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showcases()
    {

         $cases = PendingCase::join('reasons','reasons.id','=','pending_cases.casetype_id')
                            ->join('gpf_categories','gpf_categories.id', '=', 'pending_cases.category_id')
                            ->join('designations', 'designations.id', '=', 'pending_cases.designation_id')
                            
                            ->selectRaw('
                                  concat(gpf_categories.category,"-",pending_cases.gpf_number) as gpf,
                                  pending_cases.id,
                                  pending_cases.name,
                                  pending_cases.status,
                                  pending_cases.relates_to,
                                  pending_cases.retirement_dt,
                                  pending_cases.diary_dt,
                                  pending_cases.created_at,
                                  reasons.reason,
                                  designations.designation
                                  '

                                  )
                            // ->orderBy('relates_to', 'asc')
                            // ->orderBy('gpf_categories', 'asc')
                           // ->orderBy('retirement_dt', 'asc')
                             ->where('status','!=','1')
                             // ->where('relates_to',"=","S5" )
                            ->get();
 
                        return view('cases.caselist', compact('cases')); 
    }

        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function flagedcases()
    {
            $reasons = Reason::all();
        return response()->json($reasons);
    }


}

