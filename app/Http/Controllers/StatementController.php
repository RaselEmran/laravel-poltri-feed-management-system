<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class StatementController extends Controller
{
    public function statement($id)

    {
    	 $ma = DB::table('sell_products')->where('cust_name', $id)->get();
    	return view('admin.customer.statement',compact('ma'));
    }
}
