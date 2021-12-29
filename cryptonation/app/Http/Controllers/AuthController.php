<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Exception;

class AuthController extends Controller
{
    function login(){
        return view('adminauth/login');
    }

        function register(){
        return view('adminauth/register');
    }
    function save(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:admins',
            'password'=>'required|min:5|max:12'
        ]);
        $admin=new Admin;
        $admin->name=$request->name;
        $admin->email=$request->email;
        $admin->password=Hash::make($request->password);
        $save=$admin->save();
        if($save){
            return back()->with('success','user added successfully');

        }else{
            return back()->with('fail','something went wrong');
        }
    }
    function check(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:5|max:12'
        ]);
        $userInfo=Admin::where('email','=',$request->email)->first();

        if(!$userInfo){
            return back()->with('fail','we do not recognize your email address');
        }else{
            if(Hash::check($request->password,$userInfo->password)){
                    $request->session()->put('LoggedAdmin',$userInfo->id);
                    return redirect('/panel');
            }else{
            return back()->with('fail','wrong password');

            }
        }
    }

    function logout(){
        if(session()->has('LoggedAdmin')){
            session()->pull('LoggedAdmin');
            return redirect('/adminlogin');
        }
    }

        function update_password(Request $request){
        $request->validate([
            'oldpassword'=>'required',
            'newpassword'=>'required|min:5|max:12',
            'newpassword2'=>'required|min:5|max:12'
        ]);
        $data = Admin::where('id','=', session('LoggedAdmin'))->first();
        if(Hash::check($request->oldpassword,$data->password)){
            if($request->newpassword==$request->newpassword2){
            $result=Admin::where('id', $data->id)
            ->update(['password'=> Hash::make($request->password)]);
            }else{
            return back()->with('fail','passwords dont match');
            }
        }else{
            return back()->with('fail','old password is incorrect');
        }
         if($result){
            return back()->with('success','password updated successfully');
        }else{
            return back()->with('fail','something went wrong');
        }
    }
    function update_admin(Request $request){
        $request->validate([
            'name'=>'required',
        ]);
        $data = Admin::where('id','=', session('LoggedAdmin'))->first();
         $result=Admin::where('id', $data->id)
        ->update([
            'name'=>$request->name,
        ]);
        try{
    if($result==1){
    session(['res' => 'success']);
    session(['result' => "Success"]);
    }
        }catch(Exception $ex){
    session(['res' => 'danger']);
    session(['result' => "error"]);
        }
        return redirect('/panel');
    }
}
