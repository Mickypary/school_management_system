<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SchoolSubject;

class SchoolSubjectController extends Controller
{
    public function ViewSubject()
    {
        $data['allData'] = SchoolSubject::all();
        return view('backend.setup.school_subject.view_school_subject', $data);
    } // End Method

    public function SubjectAdd()
    {
        return view('backend.setup.school_subject.add_school_subject');
    } // End Method

    public function SubjectStore(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|unique:school_subjects,name',

        ]);

        $data = new SchoolSubject();
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Subject Added Successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('school.subject.view')->with($notification);

    } // End Method

    public function SubjectEdit($id)
    {
        $data['editData'] = SchoolSubject::findorFail($id);
        return view('backend.setup.school_subject.edit_school_subject', $data);
    } // End Method

    public function SubjectUpdate(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|unique:school_subjects,name',
        ]);

        $data = SchoolSubject::findorFail($request->id);
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Subject Updated Successfully',
            'alert-type' => 'info',
        );

        return redirect()->route('school.subject.view')->with($notification);
    } // End Method

    public function SubjectDelete($id)
    {
        $user = SchoolSubject::findorFail($id);
        $user->delete();

        $notification = array(
            'message' => 'Subject Deleted Successfully',
            'alert-type' => 'info',
        );

        return redirect()->back()->with($notification);
    } // End Method
}
