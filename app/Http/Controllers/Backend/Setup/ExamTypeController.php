<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ExamType;

class ExamTypeController extends Controller
{
    public function ViewExamType()
    {
        $data['allData'] = ExamType::all();
        return view('backend.setup.exam_type.view_exam_type', $data);
    } // End Method

    public function ExamTypeAdd()
    {
        return view('backend.setup.exam_type.add_exam_type');
    } // End Method

    public function ExamTypeStore(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|unique:exam_types,name',

        ]);

        $data = new ExamType();
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Exam Type Added Successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('exam.type.view')->with($notification);

    } // End Method

    public function ExamTypeEdit($id)
    {
        $data['editData'] = ExamType::findorFail($id);
        return view('backend.setup.exam_type.edit_exam_type', $data);
    } // End Method

    public function ExamTypeUpdate(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|unique:fee_categories,name',
        ]);

        $data = ExamType::findorFail($request->id);
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Exam Type Updated Successfully',
            'alert-type' => 'info',
        );

        return redirect()->route('exam.type.view')->with($notification);
    } // End Method

    public function ExamTypeDelete($id)
    {
        $user = ExamType::findorFail($id);
        $user->delete();

        $notification = array(
            'message' => 'Exam Type Deleted Successfully',
            'alert-type' => 'info',
        );

        return redirect()->back()->with($notification);
    } // End Method

}
