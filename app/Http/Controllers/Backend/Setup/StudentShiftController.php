<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentShift;


class StudentShiftController extends Controller
{
    public function ViewShift()
    {
        $data['page_name'] = 'view_year';
        $data['allData'] = StudentShift::all();
        return view('backend.setup.shift.view_shift', $data);
    } // End Method

    public function StudentShiftAdd()
    {
        return view('backend.setup.shift.add_shift');
    } // End Method

    public function StudentShiftStore(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|unique:student_shifts,name',

        ]);

        $data = new StudentShift();
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Student Shift Added Successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('student.shift.view')->with($notification);

    } // End Method

    public function StudentShiftEdit($id)
    {
        $data['editData'] = StudentShift::findorFail($id);
        return view('backend.setup.shift.edit_shift', $data);
    } // End Method

    public function StudentShiftUpdate(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|unique:student_shifts,name',
        ]);

        $data = StudentShift::findorFail($request->id);
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Student Shift Updated Successfully',
            'alert-type' => 'info',
        );

        return redirect()->route('student.shift.view')->with($notification);
    } // End Method

    public function StudentShiftDelete($id)
    {
        $user = StudentShift::findorFail($id);
        $user->delete();

        $notification = array(
            'message' => 'Student Shift Deleted Successfully',
            'alert-type' => 'info',
        );

        return redirect()->back()->with($notification);
    } // End Method
}
