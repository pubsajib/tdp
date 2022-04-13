<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function Logout(){
        Auth::logout();
        return Redirect()->route('login')->with('success', 'User Logout');
    }

    public function AccountSetting(){
        $id = Auth::user()->id;
        $editData = User::find($id);
        return view('backend.account.profile',compact('editData'));
        
    }

    public function EditProfileSetting(){
        $id = Auth::user()->id;
        $editData = User::find($id);
        return view('backend.account.edit_profile',compact('editData'));
    }

    public function UpdateProfileSetting(Request $request){
        $data = User::find(Auth::user()->id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->position = $request->position;
        $data->mobile = $request->mobile;
        $data->address = $request->address;
        $data->gender = $request->gender;
        
        if($request->file('photo')){
            $file = $request->file('photo');
            @unlink(public_path('upload/user_photo/'.$data->photo));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/user_photo/'),$filename);
            $data['photo'] = $filename;

        }
        $data->save();
        $notification = array(
            'message' => 'User Account Update Successfully',
            'alert_type'=> 'success'
        ); 
        return Redirect()->route('account.setting')->with($notification);
    }


    public function PasswordShow(){
        return view('backend.account.show_password');
    }

    public function PasswordChange(Request $request){
        $validatedData = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed',
            ]);
            $hashedPassword = Auth::user()->password;
            if(Hash::check($request->oldpassword,$hashedPassword)){
                $user = User::find(Auth::id());
                $user->password= Hash::make($request->password);
                $user->save();
                Auth::logout();

                $notification = array(
                    'message' => 'Password Update Successfully',
                    'alert_type'=> 'success'
                ); 
                return Redirect()->route('login')->with($notification);

            }else{
                return Redirect()->back();
            }//end else

    }//end method
}
