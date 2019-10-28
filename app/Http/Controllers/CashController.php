<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class CashController extends Controller
{
    public function view_cash(Request $request,$id)
    {
    	$buyer= DB::table('buyers')->where('id', $request->id)->first();
      $vatt = DB::table('calan_ends')
      ->where('buyer_id', $request->id)->get();
      $vat = DB::table('calan_ends')
      ->where('buyer_id', $request->id)->first();
        $cat = DB::table('profile_deposits')
      ->where('buyer_id', $request->id)->get();
     $mat = DB::table('profile_withdraws')
      ->where('buyer_id', $request->id)->get();
      $jer = DB::table('jer_profiles')
      ->where('buyer_id', $request->id)->get();
      $lav =DB::table('calan_ends')->where('buyer_id',$id)->where('status','lav')->sum('jer');
      $loss= DB::table('calan_ends')->where('buyer_id',$id)->where('status','loos')->sum('jer');
      $end =DB::table('calan_ends')->where('buyer_id',$id)->get();

      
      return view('admin.customer.viewcash')->with('vatt', $vatt)->with('vat', $vat)->with('cat', $cat)->with('mat', $mat)->with('buyer', $buyer)->with('jer',$jer)->with('lav',$lav)->with('loss',$loss)->with('end',$end);
    }


    public function save_cash(Request $request){

    $data=array();
  $data['amount']=$request->amount;
  $data['buyer_id']=$request->buyer_id;
  $data['calan_id']=$request->calan_id;
  date_default_timezone_set('asia/dhaka');
    $data['date']= date('d-m-Y');

  DB::table('customer_cashes')->insert($data);
  return redirect()->back()->with('msg','টাকা সফলভাবে জমা হয়েছে');

    }
}
