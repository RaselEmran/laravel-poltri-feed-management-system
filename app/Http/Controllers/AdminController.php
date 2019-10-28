<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;
use App\Admin;
use Illuminate\Support\Facades\Redirect;


class AdminController extends Controller
{
	 public function index()
    {
    $admin_id =Session::get('admin_id');
        if ($admin_id) {
            return view('admin.main');
        }
        else{
        return view('adminlogin');
    }
    }


    public function showdashbord()

    {
     return view('admin.main');

    }

    public function login(Request $request)
    {
     $this->validate($request, [
           'email' =>'required',
           'password'=>'required',

       ]);
    	$email=$request->email;
    	$password=md5($request->password);
    	$result=DB::table('admins')
    	    ->where('email',$email)
    	    ->where('password',$password)
    	    ->first();
    	    if ($result) {
    	        Session::put('admin_name',$result->name);
                Session::put('admin_id',$result->id);
                return redirect('/admin/dashboard')->with('succ','Login Successfully');
    	    }
    	    else
    	    {
    	        Session::put('msg','Email and Password doesnt Match');
                return redirect('/');
    	    }
    }

    //profile.............
    public function profile()
    {
     $id =Session::get('admin_id');
     $admin=Admin::find($id);
     return view('admin.setting.profile',compact('admin'));
     
    }

    public function profile_from(Request $request,$id)
    {
        $admin =Admin::find($id);
        $admin->name =$request->username;
        $admin->email =$request->email;
        $admin->company =$request->company;
        $admin->contact =$request->contact;
        $admin->save();
        return Redirect::to('admin/profile')->with('msg','Profile Update Successfully');

    }

    public function change()
    {
         $id =Session::get('admin_id');
        $admin=Admin::find($id);
        return view('admin.setting.change',compact('admin'));
    }

    public function pass(Request $request)
    {
       $old =$request->old;
       $oldpass =md5($old);
       $email =$request->email;
       $pass =DB::table('admins')->where('email',$email)->where('password',$oldpass)->first();
       if ($pass) {
     
       return '<span style="color:green">'.$old.' Password is Correct</spam>';
       }
       else
       {
         return '<span style="color:red">'.$old.' Password is incorrect</spam>';
       }
    }

    public function pass_change(Request $request,$id)
    {
        $email=$request->email;
        $old=$request->old;
        $oldpass =md5($old);
        $new=MD5($request->new);
        $pass =DB::table('admins')->where('email',$email)->where('password',$oldpass)->update(['password'=>$new]);
       if ($pass) {
            return redirect()->back()->with('msg','Password Update Succesfully');
       }
       else
       {
        return redirect()->back()->with('emsg','Something Error');
       }
    }
}
