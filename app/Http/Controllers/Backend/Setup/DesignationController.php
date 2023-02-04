<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Designation;

class DesignationController extends Controller
{
    public function ViewDesignation()
    {
        $data['allData'] = Designation::all();
        return view('backend.setup.designation.view_designation', $data);
    } // End Method

    public function DesignationAdd()
    {
        return view('backend.setup.designation.add_designation');
    } // End Method

    public function DesignationStore(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|unique:designations,name',

        ]);

        $data = new Designation();
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Designation Added Successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('designation.view')->with($notification);

    } // End Method

    public function DesignationEdit($id)
    {
        $data['editData'] = Designation::findorFail($id);
        return view('backend.setup.designation.edit_designation', $data);
    } // End Method

    public function DesignationUpdate(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|unique:designations,name',
        ]);

        $data = Designation::findorFail($request->id);
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Designation Updated Successfully',
            'alert-type' => 'info',
        );

        return redirect()->route('designation.view')->with($notification);
    } // End Method

    public function DesignationDelete($id)
    {
        $user = Designation::findorFail($id);
        $user->delete();

        $notification = array(
            'message' => 'Designation Deleted Successfully',
            'alert-type' => 'info',
        );

        return redirect()->back()->with($notification);
    } // End Method
}
