<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DivuserController extends Controller
{

	public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('divuser');
    }
	
    public function index()
    {
    	return view('divuser');
    }
}
