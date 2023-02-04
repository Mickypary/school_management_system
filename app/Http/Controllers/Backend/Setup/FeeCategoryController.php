<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FeeCategory;

class FeeCategoryController extends Controller
{
    public function ViewFeeCat()
    {
        $data['allData'] = FeeCategory::all();
        return view('backend.setup.fee_category.view_fee_cat', $data);
    } // End Method

    public function FeeCatAdd()
    {
        return view('backend.setup.fee_category.add_fee_cat');
    } // End Method

    public function FeeCatStore(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|unique:fee_categories,name',

        ]);

        $data = new FeeCategory();
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Fee Category Added Successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('fee.category.view')->with($notification);

    } // End Method

    public function FeeCatEdit($id)
    {
        $data['editData'] = FeeCategory::findorFail($id);
        return view('backend.setup.fee_category.edit_fee_cat', $data);
    } // End Method

    public function FeeCatUpdate(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|unique:fee_categories,name',
        ]);

        $data = FeeCategory::findorFail($request->id);
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Fee Category Updated Successfully',
            'alert-type' => 'info',
        );

        return redirect()->route('fee.category.view')->with($notification);
    } // End Method

    public function FeeCatDelete($id)
    {
        $user = FeeCategory::findorFail($id);
        $user->delete();

        $notification = array(
            'message' => 'Fee Category Deleted Successfully',
            'alert-type' => 'info',
        );

        return redirect()->back()->with($notification);
    } // End Method
}
