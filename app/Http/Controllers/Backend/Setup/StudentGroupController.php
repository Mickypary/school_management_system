<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentGroup;

class StudentGroupController extends Controller
{
    public function ViewGroup()
    {
        $data['page_name'] = 'view_year';
        $data['allData'] = StudentGroup::all();
        return view('backend.setup.group.view_group', $data);
    } // End Method

    public function StudentGroupAdd()
    {
        return view('backend.setup.group.add_group');
    } // End Method

    public function StudentGroupStore(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|unique:student_groups,name',

        ]);

        $data = new StudentGroup();
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Student Group Added Successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('student.group.view')->with($notification);

    } // End Method

    public function StudentGroupEdit($id)
    {
        $data['editData'] = StudentGroup::findorFail($id);
        return view('backend.setup.group.edit_group', $data);
    } // End Method

    public function StudentGroupUpdate(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|unique:student_groups,name',
        ]);

        $data = StudentGroup::findorFail($request->id);
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Student Group Updated Successfully',
            'alert-type' => 'info',
        );

        return redirect()->route('student.group.view')->with($notification);
    } // End Method

    public function StudentGroupDelete($id)
    {
        $user = StudentGroup::findorFail($id);
        $user->delete();

        $notification = array(
            'message' => 'Student Group Deleted Successfully',
            'alert-type' => 'info',
        );

        return redirect()->back()->with($notification);
    } // End Method
}
