<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Calan;
use App\Calan_end;

use DB;

class CalanController extends Controller
{
   public function add_calan(Request $request)

   {
   	  $this->validate($request, [
           'calan_name' =>'required',

       ]);
     $calan =new Calan();
     $calan->calan_name=$request->calan_name;
     $calan->buyer_id=$request->buyer_id;
     $calan->hidde_id='colman';

     date_default_timezone_set('asia/dhaka');
     $calan->date=date('Y/m/d');
     $calan->save();
     return redirect()->back()->with('msg','নতুন চালান  সফলভাবে যুক্ত হয়েছে ');

   }

   public function view_calan($bid,$id)
   {
   
     $colman =DB::table('sell_products')
                     ->where('cust_name',$bid)
                     ->where('calan_id',$id)
                     ->get();
     $invo =DB::table('sell_totals') 
                 ->where('cust_name',$bid)
                 ->where('calan_id',$id)
                 ->get(); 
      $cus_cash =DB::table('customer_cashes') 
                 ->where('buyer_id',$bid)
                 ->where('calan_id',$id)
                 ->get();           
     return view('admin.customer.viewcalan',compact('colman','invo','bid','id','cus_cash'));                        


      //    $catt = DB::table('sell_products')
      //                           ->where('cust_name', $bid)
      //                           ->where('calan_id', $id)
      //                           ->sum('total');
      //   $next = DB::table('customer_cashes')
      //   ->where('calan_id', $id)
      //   ->get();
      //    $uttolon = DB::table('withdraw_calans')
      //   ->where('calan_id', $id)
      //   ->get();
      //   $dis = DB::table('sell_totals')
      //                           ->where('calan_id', $id)
      //                           ->sum('output_dis');
      //                           $sell = DB::table('sell_totals')
      //                           ->where('paid', '>', '0')
      //                           ->where('calan_id', $id)
      //                           ->get();
      //   $cat = DB::table('sell_products')
      //   ->where('calan_id', $id)->get();
      //      $ma = DB::table('ferots')
      //   ->where('calan_id', $id)->get();
      //     $total = DB::table('ferots')
      //   ->where('calan_id', $id)
      //   ->sum('total');
        
      //   $mat = DB::table('buyers')
      //   ->where('id', $bid)->first();
      // $vat = DB::table('calans')->where('id', $id)->first();
      // return view('admin.customer.viewcalan')->with('cat',  $cat)->with('catt',  $catt)->with('mat',  $mat)->with('vat',  $vat)->with('dis',  $dis)->with('ma',  $ma)->with('total',  $total)->with('next',  $next)->with('sell',  $sell)->with('uttolon',  $uttolon);

   //  $cl =DB::table('calans')->where('id',$cid)->where('buyer_id',$bid)->first();
   // if ($cl) {

   //  $calan_name=$cl->calan_name;
   //  $sell_item =DB::table('sell_products')->where('cust_name',$bid)->where('calan_name',$calan_name)->get();
   //  return view('admin.customer.viewcalan',compact('sell_item'));
   // }
   // else
   // {
   // return redirect()->back()->with('emsg','Calan Not Found');
   // }
   }

   public function save_profile_deposit(Request $request)
   {
     $this->validate($request, [
           'd_amount' =>'required',

       ]);
       $data=array();
         $data['buyer_id']=$request->buyer_id;
         $data['d_amount']=$request->d_amount;
         date_default_timezone_set('asia/dhaka');
         $data['date']= date('d-m-Y');
          $data['month']= date('M-y');
         $data['year']= date('Y');

       DB::table('profile_deposits')->insert($data);
       return redirect()->back()->with('msg','টাকা সফলভাবে জমা করা  হয়েছে');
   }

   public function save_jer_profile(Request $request)
   {
     $this->validate($request, [
           'amount' =>'required',

       ]);
     $data=array();
         $data['buyer_id']=$request->buyer_id;
         $data['amount']=$request->amount;
         date_default_timezone_set('asia/dhaka');
         $data['date']= date('d-m-Y');

       DB::table('jer_profiles')->insert($data);
        return redirect()->back()->with('msg','জের  সফলভাবে জমা করা  হয়েছে');
   }

   public function save_profile_withdraw(Request $request)
   {
     $this->validate($request, [
           'w_amount' =>'required',

       ]);
       $data=array();
         $data['buyer_id']=$request->buyer_id;
         $data['w_amount']=$request->w_amount;
         date_default_timezone_set('asia/dhaka');
         $data['date']= date('d-m-Y');
          $data['month']= date('M-y');
         $data['year']= date('Y');

    DB::table('profile_withdraws')->insert($data);
    return redirect()->back()->with('msg','টাকা  সফলভাবে উত্তোলন করা  হয়েছে');
   }

   public function end_sellcalan(Request $request)
   {
    $end =new Calan_end();
    $kr =$request->khoroc;
    $pr=$request->porishod;
    $end->buyer_id =$request->buyer_id;
    $end->calan_id =$request->calan_id;
    $end->khoroc =$request->khoroc;
    $end->porishod =$request->porishod;
    $end->jer =$request->jer;
    if ($kr>$pr) {
    $end->status ='loos';
    }
    else
    {
       $end->status ='lav';
    }
    date_default_timezone_set('asia/dhaka');
    $end->date =date('d-m-Y');
    $end->save();
    $hide=array();
    $hide['hidde_id']='final';

    DB::table('calans')->where('id', $request->calan_id)->update($hide);
    return redirect('/admin/customer')->with('msg','চালান সমাপ্ত  হয়েছে');

   }
}
