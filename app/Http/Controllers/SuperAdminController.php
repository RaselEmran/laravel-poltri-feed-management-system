<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
session_start();
use Illuminate\Support\Facades\Redirect;

class SuperAdminController extends Controller
{
        public function logout()
    {
    	Session::flush();
    	return Redirect::to('/')->with('log','Logout Successfully');
    }
}
