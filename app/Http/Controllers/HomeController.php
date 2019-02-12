<?php

namespace App\Http\Controllers;


use Session;
use App\GpfCategory;
use App\Designation;
use App\Reason;
use App\PendingCase;
use App\Http\Requests\StoreCase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('hquser');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $cases = PendingCase::join('reasons','reasons.id','=','pending_cases.casetype_id')
                            ->join('gpf_categories','gpf_categories.id', '=', 'pending_cases.category_id')
                            ->join('designations', 'designations.id', '=', 'pending_cases.designation_id')
                            
                            ->selectRaw('
                                  concat(gpf_categories.category,"-",pending_cases.gpf_number) as gpf,
                                  pending_cases.name,
                                  pending_cases.relates_to,
                                  pending_cases.retirement_dt,
                                  reasons.reason
                                  ')
                            // ->orderBy('relates_to', 'asc')
                            // ->orderBy('gpf_categories', 'asc')
                            ->orderBy('retirement_dt', 'asc')
                             ->where('status','!=','1')
                             ->where('relates_to',"=","S5" )
                            ->get();
        
        return view('home', compact('cases'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function importantcase()
    {
        $id = Input::get('id');
        $cases = PendingCase::join('reasons','reasons.id','=','pending_cases.casetype_id')
                            ->join('gpf_categories','gpf_categories.id', '=', 'pending_cases.category_id')
                            ->selectRaw('
                              concat(gpf_categories.category,"-",pending_cases.gpf_number) as gpf,
                              pending_cases.name,
                              pending_cases.relates_to,
                              pending_cases.retirement_dt,
                              reasons.reason
                              ')
                            // ->orderBy('relates_to', 'asc')
                            // ->orderBy('gpf_categories', 'asc')
                            ->orderBy('retirement_dt', 'asc')
                             ->where('status','!=','1')
                             ->where('relates_to',"=", $id )
                            ->get();
        
        return response()->json($cases);
    }
}
