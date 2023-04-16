<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function UserDashboard(){

        $id=Auth::user()->id;
        $userData =User::find($id);
        return view('index',compact('userData'));
    }
    public function UserProfileStore(Request $request){
        $id=Auth::user()->id;
        $data=User::find($id);
        $data->name=$request->name;
        $data->username=$request->username;
        $data->email=$request->email;
        $data->phone=$request->phone;
        $data->address=$request->address;


        if($request->file('photo')){
            $file=$request->file('photo');
            @unlink(public_path('upload/user_images/'.$data->photo));
            $filename=date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/user_images'),$filename);
            $data['photo']=$filename;
        }
        $data->save();
        $notification=array(
            'message'=>'User Profile Updated Successfully',
            'alert-type'=>'success'
        );

        return redirect()->back()->with($notification);
    }
    public function UserLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $notification=array(
            'message'=>'User Logout Successfully',
            'alert-type'=>'success'
        );

        return redirect('/login')->with($notification);;
    }

    public function UserUpdatePassword(Request $request){
        //validation
        $request->validate([
            'current_password'=>'required',
            'new_password'=>'required|confirmed',
        ]);
        //macth with existing password
        if(!Hash::check($request->current_password,auth::user()->password))
        {
            return back()->with("error", "Old Password Doesn't Match!");            
        }
        User::whereId(auth()->user()->id)->update([
            'password'=>Hash::make($request->new_password)

        ]);
        return back()->with("status","Password Changed Successfully");

    }
}
