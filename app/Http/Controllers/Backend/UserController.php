<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function UserView()
    {
        // $allData = User::all();
        $data['allData'] = User::all();
        return view('backend.user.view_user', $data);
    } // End Method

    public function UserAdd()
    {
        return view('backend.user.add_user');
    } // End Method

    public function UserStore(Request $request)
    {
        $validateData =  $request->validate([
            'email' => 'required|unique:users',
            'name' => 'required|',
        ]);

        $data = new User();
        $data->usertype = $request->usertype;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->gender = $request->gender;
        $data->dob = $request->dob;
        $data->join_date = $request->join_date;
        $data->address = $request->address;
        $data->phone = $request->phone;
        $data->state_of_origin = $request->state_of_origin;
        $data->password = bcrypt($request->password);

        if ($request->file('image')) {
            $file = $request->file('image');
            @unlink(public_path('upload/user_image/'.$data->image));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/user_image'), $filename);
            $data['image'] = $filename;
        }

        $data->save();

        $notification = array(
            'message' => 'User Added Successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('user.view')->with($notification);

        // User::insert([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'phone' => $request->phone,
        //     'address' => $request->address,
        //     'dob' => $request->dob,
        //     'join_date' => $request->join_date,
        //     'usertype' => $request->usertype,
        //     'gender' => $request->gender,
        //     'password' => Hash::make($request->name),

        // ]);
    } // End Method

    public function UserEdit($id)
    {
        $editData = User::findorFail($id);
        return view('backend.user.edit_user', compact('editData'));
    }

    public function UserUpdate(Request $request)
    {
        $validateData =  $request->validate([
            'email' => 'required',
            'name' => 'required|',
        ]);

        $data = User::findorFail($request->id);
        $data->usertype = $request->usertype;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->gender = $request->gender;
        $data->dob = $request->dob;
        $data->join_date = $request->join_date;
        $data->address = $request->address;
        $data->phone = $request->phone;
        $data->state_of_origin = $request->state_of_origin;
        $data->qualification = $request->qualification;
        $data->marital_status = $request->marital_status;

        // $uploaddir = '/var/www/uploads/';
        $uploaddir = public_path('upload/user_image/');
        
        // $filename = date('YmdHi').$file->getClientOriginalName();
        $fileName = $_FILES['image']['name'];
        $fileExt = explode('.',$fileName);
        $fileActualExt = strtolower(end($fileExt));
        // $fileNemeNew = uniqid('',true).".".$fileActualExt;
        $fileNemeNew = date('YmdHi').".".$fileActualExt;
        $fileDestination = $uploaddir.$fileNemeNew;

         if (move_uploaded_file($_FILES['image']['tmp_name'], $fileDestination)) {
            // echo "File is valid, and was successfully uploaded.\n";
             @unlink(public_path('upload/user_image/'.$data->image));
             $data['image'] = $fileNemeNew;
            } 

        $data->save();

        $notification = array(
            'message' => 'User Updated Successfully',
            'alert-type' => 'info',
        );

        return redirect()->route('user.view')->with($notification);
    } // End Method

    public function UserDelete($id)
    {
        $user = User::findorFail($id);
        $user->delete();

        $notification = array(
            'message' => 'User Deleted Successfully',
            'alert-type' => 'info',
        );
        return redirect()->route('user.view')->with($notification);
    } // End Method
}
