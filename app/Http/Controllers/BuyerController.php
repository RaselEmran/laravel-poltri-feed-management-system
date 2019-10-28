<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Buyer;

class BuyerController extends Controller
{
    public function index()
    {
    	return view('admin.customer.index');
    }

    public function store(Request $request)

    {

    	$request->validate([
	    'image' => 'required|mimes:jpeg,bmp,png|max:2000',

		]);
    	    $image=$request->file('image');
    	 if ($image) {

             $image_name = str_random(20);
             $ext = strtolower($image->getClientOriginalExtension());
             $image_full_name = $image_name.'.'.$ext;
             $upload_path = 'backend/customer/';
             $image_url = $upload_path.$image_full_name;
             $success = $image->move($upload_path,$image_full_name);

         }
    	$buyer =new Buyer();
    	$buyer->category ='calan';
    	$buyer->name =$request->name;
    	$buyer->phone =$request->phone;
    	$buyer->nid =$request->nid;
    	$buyer->address =$request->address;
    	$buyer->fb_link =$request->fb_link;
    	$buyer->pass =MD5($request->pass);
    	$buyer->image =$image_url;
    	$buyer->add_date =date('Y/m/d');
    	$buyer->save();

    	return redirect('/admin/customer')->with('msg','কাস্টমার সফলভাবে এড হয়েছে ');




    }

    public function edit(Request $request)
    {
    	$id =$request->cus_id;
    	$buyer =Buyer::find($id);
    	return response()->json($buyer);
    }

    public function update(Request $request)
    {
       	$request->validate([
	    'image' => 'mimes:jpeg,bmp,png|max:2000',

		]);
		$id =$request->id;
		$buyer =Buyer::find($id);
		      $image=$request->file('image');
       if ($image) {
             unlink($buyer->image);
             $image_name = str_random(20);
             $ext = strtolower($image->getClientOriginalExtension());
             $image_full_name = $image_name.'.'.$ext;
             $upload_path = 'backend/customer/';
             $image_url = $upload_path.$image_full_name;
             $success = $image->move($upload_path,$image_full_name);

         }
         else{
          $image_url = $buyer->image;
         }
        $buyer->category ='calan';
    	$buyer->name =$request->name;
    	$buyer->phone =$request->phone;
    	$buyer->nid =$request->nid;
    	$buyer->address =$request->address;
    	$buyer->fb_link =$request->fb_link;
    	$buyer->pass =MD5($request->pass);
    	$buyer->image =$image_url;
    	$buyer->add_date =date('Y/m/d');
    	$buyer->save();
    	return redirect('/admin/customer')->with('msg','কাস্টমার সফলভাবে এড হয়েছে ');
    }

    public function delete($id)
    {
    $buyer =Buyer::find($id);
      if ($buyer->image) {
      
       unlink($buyer->image);
    }
    $buyer->delete();
     return redirect()->back()->with('msg','Delete information successfully');

  }

  public function view($id)
  {
  	$cat =Buyer::find($id);
  	return view('admin.customer.view',compact('cat'));
  }

  public function urinvoice($id)
  {
    $invoice =DB::table('calans')->where('buyer_id',$id)->where('hidde_id','final')->get();
    return view('admin.customer.urinvoice',compact('invoice'));
  }
}
