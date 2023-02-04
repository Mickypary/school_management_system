<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentYear;

class StudentYearController extends Controller
{
    public function ViewYear()
    {
        $data['page_name'] = 'view_year';
        $data['allData'] = StudentYear::all();
        return view('backend.setup.year.view_year', $data);
    } // End Method

    public function StudentYearAdd()
    {
        return view('backend.setup.year.add_year');
    } // End Method

    public function StudentYearStore(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|unique:student_years,name',

        ]);

        $data = new StudentYear();
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Student Year Added Successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('student.year.view')->with($notification);

    } // End Method

    public function StudentYearEdit($id)
    {
        $data['editData'] = StudentYear::findorFail($id);
        return view('backend.setup.year.edit_year', $data);
    } // End Method

    public function StudentYearUpdate(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|unique:student_years,name',
        ]);

        $data = StudentYear::findorFail($request->id);
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Student Year Updated Successfully',
            'alert-type' => 'info',
        );

        return redirect()->route('student.year.view')->with($notification);
    } // End Method

    public function StudentYearDelete($id)
    {
        $user = StudentYear::findorFail($id);
        $user->delete();

        $notification = array(
            'message' => 'Student Year Deleted Successfully',
            'alert-type' => 'info',
        );

        return redirect()->back()->with($notification);
    } // End Method
}
