<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Buyer;
use App\Sell_total;


class PrintController extends Controller
{
    public function reg_print()
    {
     $purchases =DB::table('sell_totals')
              ->orderby('id' , 'desc')
              ->first();
       $a =$purchases->id;
       $b =$purchases->cust_name;
       $buyers =DB::table('buyers')
               ->where('id', $b)->first();
       $details =DB::table('sell_products')
                    ->where('sell_id',$a)
                    ->get();
       return view('admin.sell.invoice',compact('purchases','buyers','details'));             
    }

    public function mobile_print()
    {
    	  $purchases =DB::table('sell_totals')
              ->orderby('id' , 'desc')
              ->first();
       $a =$purchases->id;
         $details =DB::table('sell_products')
                    ->where('sell_id',$a)
                    ->get();
       return view('admin.sell.mobinvoice',compact('purchases','details'));  
    }

    public function mobile_view($id)
    {
    
        $purchases =Sell_total::find($id);
        $details =DB::table('sell_products')
                    ->where('sell_id',$id)
                    ->get();
          return view('admin.sell.mobinvoice',compact('purchases','details'));            
    }

    public function regular_view($id)

{
	 $purchases =Sell_total::find($id);
	 $b =$purchases->cust_name;
	 $buyers =Buyer::find($b);

     $details =DB::table('sell_products')
                    ->where('sell_id',$id)
                    ->get();
      return view('admin.sell.invoice',compact('purchases','buyers','details'));             

}

public function print($id)
{
  $purchases =Sell_total::find($id);
     $b =$purchases->cust_name;

     $details =DB::table('sell_products')
                    ->where('sell_id',$id)
                    ->get();
  return view('admin.sell.print',compact('purchases','details'));  
}

public function calan_print($id)
{
    $colman =DB::table('sell_products')
                     ->where('calan_id',$id)
                     ->get();
     $invo =DB::table('sell_totals') 
                 ->where('calan_id',$id)
                 ->get(); 
      $cus_cash =DB::table('customer_cashes') 
                 ->where('calan_id',$id)
                 ->get(); 
  return view('admin.customer.calan_print',compact('colman','invo','cus_cash','id'));
}

  }
