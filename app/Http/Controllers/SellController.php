<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use App\Buyer;
use App\Sell_total;
use App\Calan;

class SellController extends Controller
{
   public function index()
   {
   	return view('admin.sell.regular');
   }

   public function regular()
   {
    return view('admin.sell.reg_cust');
   }

   public function reg_invoice(Request $request)
{
	$getNewOrderItem =$request->getNewOrderItem;
	$getNewcustomerItem =$request->getNewcustomerItem;
  $changeNewOrderItem =$request->changeNewOrderItem;
	if ($getNewOrderItem) {
		$calan =DB::table('calans')->get();
		?>
        <tr>
        	<?php 
        	$cust_name =$request->cust_name;
if ($cust_name) {
	$calan =DB::table('calans')->where('buyer_id',$cust_name)->get();
}
        	 ?>
        	<td id="sell">
             <select class="select2 form-control custom-select calan_name" name="calan_name[]" style="width: 100%; height:36px;">
              <option value="">Select One</option>
              <?php 
   if ($cust_name && $calan) {
   	foreach ($calan as $key => $value) {
   		?>
 <option value="<?php echo $value->calan_name ?>"><?php echo $value->calan_name?></option>
   		<?php
   	}
   }
               ?>
   
             </select>
        	</td>
        	<td>
             <select class="select2 form-control custom-select category_name" name="category_name[]" style="width: 100%; height:36px;">
              <option value="">Select One</option>
              <?php 
   $cate =DB::table('categories')->get();
   foreach ($cate as $key => $categories) {
   	?>
   <option value="<?php  echo $categories->category_name ?>"><?php  echo $categories->category_name ?></option>
   	<?php
   }
               ?>
            </select>
        	</td>
        	<td>
             <input type="text" class="form-control pid" name="pid[]" id="pid" placeholder="product name">
        	</td>
        	<td>
             <input type="number" class="form-control qtyyy" name="qty[]" id="qty" placeholder="Quantity">
        	</td>

        	  <td>
             <input type="number" class="form-control price" name="price[]" id="price" placeholder="Price">
        	</td>
        	<td><span class="amt">0</span></td>
			<td><button type="button" name="remove" id="del" class="btn btn-danger btn_remove">X</button></td>
        </tr>

		<?php
		exit();	
	}

	if ($getNewcustomerItem) {
		?>
        <tr>
        	<td>
             <select class="select2 form-control custom-select category_name" name="category_name[]" style="width: 100%; height:36px;">
              <option value="">Select One</option>
              <?php 
   $cate =DB::table('categories')->get();
   foreach ($cate as $key => $categories) {
   	?>
   <option value="<?php  echo $categories->category_name ?>"><?php  echo $categories->category_name ?></option>
   	<?php
   }
               ?>
            </select>
        	</td>
        	<td>
             <input type="text" class="form-control pid" name="pid[]" id="pid" placeholder="product name">
        	</td>
        	<td>
             <input type="number" class="form-control qtyyy" name="qty[]" id="qty" placeholder="Quantity">
        	</td>

        	  <td>
             <input type="number" class="form-control price" name="price[]" id="price" placeholder="Price">
        	</td>
        	<td><span class="amt">0</span></td>
			<td><button type="button" name="remove" id="del" class="btn btn-danger btn_remove">X</button></td>
        </tr>

		<?php
		exit();	
	}

  if ($changeNewOrderItem) {
    
    ?>
        <tr id="sell">
          <td>
             <select class="select2 form-control custom-select category_name" name="category_name[]" style="width: 100%; height:36px;">
              <option value="">Select One</option>
              <?php 
   $cate =DB::table('categories')->get();
   foreach ($cate as $key => $categories) {
    ?>
   <option value="<?php  echo $categories->category_name ?>"><?php  echo $categories->category_name ?></option>
    <?php
   }
               ?>
            </select>
          </td>
          <td>
             <input type="text" class="form-control pid" name="pid[]" id="pid" placeholder="product name">
          </td>
          <td>
             <input type="number" class="form-control qtyyy" name="qty[]" id="qty" placeholder="Quantity">
          </td>

            <td>
             <input type="number" class="form-control price" name="price[]" id="price" placeholder="Price">
          </td>
          <td><span class="amt">0</span></td>
      <td><button type="button" name="remove" id="del" class="btn btn-danger btn_remove">X</button></td>
        </tr>

    <?php
    exit(); 

  }
}

   public function cust_invoice(Request $request)
   {
   	$cust_name =$request->cust_name;
   	$calan =DB::table('calans')->where('buyer_id',$cust_name)->where('hidde_id','colman')->get();
   	$res=' <select class="select2 form-control custom-select calan_name" name="calan_name" style="width: 100%; height:36px;">';
   	$res.='<option value="">Select One</option>';
   	 foreach ($calan as $key => $allcalan) {
  $res.='<option value="'.$allcalan->id.'">'.$allcalan->calan_name.'</option>';
   	 }
   	 $res.='</select>';
   	 return $res;	

   }

   public function regcusstore(Request $request)
   {

       $this->validate($request, [
           'cust_name' =>'required',
           'date' =>'required',
           'calan_name' =>'required',
           'category_name' =>'required',
           'pid' =>'required',
           'qty' =>'required',
           'price' =>'required',

       ]);

  $calan_id =$request->calan_name;
  $category_name =$request->category_name;
  $pid =$request->pid;
  $qty =$request->qty;
  $price =$request->price;
  $cust_id =$request->cust_name;
  $name=Buyer::find($cust_id);
  $calan =Calan::find($calan_id);
  $clname =$calan->calan_name;
   $data=array();
   $data['cust_name'] =$request->cust_name;
   $data['customer'] =$name->name;
   $data['type'] ='regular';
   $data['calan_name'] =$clname;
   $data['calan_id'] =$calan_id;

   $data['sub_total'] =$request->sub_total;
   $data['input_dis'] =$request->input_dis;
   $data['output_dis'] =$request->output_dis;
   $data['less'] =$request->less;
   $data['grand_total'] =$request->grand_total;
   $data['paid'] =$request->paid;
   $data['due'] =$request->due;
   $data['date'] =$request->date;
   date_default_timezone_set('asia/dhaka');
     $data["month"]=date('M-y');
     $data["year"]=date('Y');
     $data['sell_time']= date('d-m-Y h:i:sa');
     DB::table('sell_totals')->insert($data);

     $sell_id = DB::getPdo()->lastInsertId();

     foreach ($qty as $key => $value) {
       if ($qty[$key] != null) {
        $p=$qty[$key]*$price[$key];
        $d =array();
        $d['sell_id'] =$sell_id;
        $d['cust_name']=$request->cust_name;
        $d['calan_name']=$clname;
        $d['calan_id']=$calan_id;

        $d['category_name']=$category_name[$key];
        $d['pid']=$pid[$key];
        $d['qty']=$qty[$key];
        $d['price']=$price[$key];
        $d['total']=$p;

        DB::table('sell_products')->insert($d);



       }  
     }
     return Redirect::to('admin/sell/product-print');
   }

public function reg_store(Request $request)
{

   $this->validate($request, [
           'cust_name' =>'required',
           'date' =>'required',
           'calan_name' =>'required',
           'category_name' =>'required',
           'pid' =>'required',
           'qty' =>'required',
           'price' =>'required',




       ]);
	$calan_name =$request->calan_name;
	$category_name =$request->category_name;
	$pid =$request->pid;
	$qty =$request->qty;
	$price =$request->price;
	$cust_id =$request->cust_name;
	$name=Buyer::find($cust_id);
	 $data=array();
	 $data['cust_name'] =$request->cust_name;
	 $data['customer'] =$name->name;
	 $data['type'] ='regular';
	 $data['sub_total'] =$request->sub_total;
	 $data['input_dis'] =$request->input_dis;
	 $data['output_dis'] =$request->output_dis;
	 $data['less'] =$request->less;
	 $data['grand_total'] =$request->grand_total;
	 $data['paid'] =$request->paid;
	 $data['due'] =$request->due;
	 $data['date'] =$request->date;
	 date_default_timezone_set('asia/dhaka');
     $data["month"]=date('M-y');
     $data["year"]=date('Y');
     $data['sell_time']= date('d-m-Y h:i:sa');
     DB::table('sell_totals')->insert($data);

     $sell_id = DB::getPdo()->lastInsertId();

     foreach ($qty as $key => $value) {
     	 if ($qty[$key] != null) {
     	 	
     	 	$d =array();
     	 	$d['sell_id'] =$sell_id;
     	 	$d['cust_name']=$request->cust_name;
     	 	$d['calan_name']=$calan_name[$key];
     	 	$d['category_name']=$category_name[$key];
     	 	$d['pid']=$pid[$key];
     	 	$d['qty']=$qty[$key];
     	 	$d['price']=$price[$key];
     	 	DB::table('sell_products')->insert($d);



     	 }	
     }
      return Redirect::to('admin/sell/product-print');




}

public function mobile()
{
	return view('admin.sell.mobile');
}

public function mobstore(Request $request)
{
	 $this->validate($request, [
           'cust_name' =>'required',
           'date' =>'required',
           'calan_name' =>'required',
           'category_name' =>'required',
           'pid' =>'required',
           'qty' =>'required',
           'price' =>'required',
           



       ]);
		$calan_name =$request->calan_name;
	$category_name =$request->category_name;
	$pid =$request->pid;
	$qty =$request->qty;
	$price =$request->price;
	 $data=array();
	 $data['customer'] =$request->cust_name;
	 $data['type'] ='mobile';

	 $data['sub_total'] =$request->sub_total;
	 $data['input_dis'] =$request->input_dis;
	 $data['output_dis'] =$request->output_dis;
	 $data['less'] =$request->less;
	 $data['grand_total'] =$request->grand_total;
	 $data['paid'] =$request->paid;
	 $data['due'] =$request->due;
	 $data['date'] =$request->date;
	 date_default_timezone_set('asia/dhaka');
     $data["month"]=date('M-y');
     $data["year"]=date('Y');
     $data['sell_time']= date('d-m-Y h:i:sa');
     DB::table('sell_totals')->insert($data);

     $sell_id = DB::getPdo()->lastInsertId();

     foreach ($qty as $key => $value) {
     	 if ($qty[$key] != null) {
     	 	$p=$qty[$key]*$price[$key];
     	 	$d =array();
     	 	$d['sell_id'] =$sell_id;
     	 	$d['cust_name']=$request->cust_name;
     	 	$d['calan_name']=$calan_name[$key];
     	 	$d['category_name']=$category_name[$key];
     	 	$d['pid']=$pid[$key];
     	 	$d['qty']=$qty[$key];
     	 	$d['price']=$price[$key];
        $d['total']=$p;
        
     	 	DB::table('sell_products')->insert($d);



     	 }	
     }
      return Redirect::to('admin/sell/mob-product-print');
}

//sell items......
public function sell_items()
{
	return view('admin.sell.sellitems');
}

public function allsellinfo()
{
	$sell =Sell_total::all();
	return view('admin.sell.allsellinfo',compact('sell'));
}

public function end_calan($id)
{
  $sell =Sell_total::find($id);
  $items =DB::Table('sell_products')->where('sell_id',$id)->get();
  return view('admin.customer.end_calan',compact('sell','items'));
}

public function end_store(Request $request)

{
  $id=$request->id;
  $cust_id =$request->cust_id;
  $data =array();
  $data['paid']=$request->payable;
  $data['due']=$request->due;
  $data['status']='confirm';


  $up =DB::table('sell_totals')->where('id',$id)->update($data);
  $d =array();
  $d['cust_id']=$request->cust_id;
  $d['sell_id']=$request->id;
  $d['amount']=$request->paid;
  date_default_timezone_set('asia/dhaka');
 $d['date']=date('m-d-Y');
  $insert =DB::table('sell_ends')->insert($d);
      $purchases =Sell_total::find($id);
     $b =$purchases->cust_name;

     $details =DB::table('sell_products')
                    ->where('sell_id',$id)
                    ->get();
      return view('admin.sell.print',compact('purchases','details')); 
  

}
}
