<?php

namespace App\Http\Controllers;

use App\Zone;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCase;


class GeneralController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('general.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $zones = Zone::all();
        return view('general.create',compact('zones'));
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
        // $this->validate($request, array(
        //     'zone'      => 'required',
        //     'circle'    => 'required'

        // ));
        Session()->flash('success', 'Record Saved Successfully !!');
         return view('general.create');
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
    /**
     * Send the specified Circle Data from storage called by Json .
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function circles()
    {
        $id = Input::get('id');
        print_r($id);
        $circles = Circle::where('zone_id', '=', $id)->get();
        return response()->json($circles);
    }
}
