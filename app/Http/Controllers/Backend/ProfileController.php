<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function ProfileView()
    {
        $id = Auth::user()->id;
        $user = User::findorFail($id);
        return view('backend.user.view_profile', compact('user'));
    } // End Method

    public function ProfileEdit()
    {
        $id = Auth::user()->id;
        $editData = User::findorFail($id);
        return view('backend.user.edit_profile', compact('editData'));
    } // End Method

    public function ProfileUpdate(Request $request)
    {
        $validateData =  $request->validate([
            'email' => 'required',
            'name' => 'required|',
        ]);

        $id = Auth::user()->id;

        $data = User::findorFail($id);
        $data->usertype = $request->usertype;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->gender = $request->gender;
        $data->dob = $request->dob;
        $data->join_date = $request->join_date;
        $data->address = $request->address;
        $data->phone = $request->phone;
        $data->qualification = $request->qualification;
        $data->marital_status = $request->marital_status;

        if ($request->file('image')) {
            $file = $request->file('image');
            @unlink(public_path('upload/user_image/'.$data->image));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/user_image'), $filename);
            // move_uploaded_file($filename, public_path('upload/user_image/'));
            $data['image'] = $filename;
        }

        $data->save();

        $notification = array(
            'message' => 'Profile Updated Successfully',
            'alert-type' => 'info',
        );

        return redirect()->route('profile.view')->with($notification);
    } //  End Method

    public function PasswordView()
    {
        return view('backend.user.edit_password');
    } // End Method

    public function PasswordUpdate(Request $request)
    {

        $validateData =  $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed',
        ]);

        $hashedPassword = Auth::user()->password;

        if (Hash::check($request->oldpassword, $hashedPassword)) {
            $user = User::findorFail(Auth::user()->id);

            $user->password = Hash::make($request->password);
            $user->save();

            Auth::logout();
            return redirect()->route('login');
        }else {
            return redirect()->back();
        }
    }
}
