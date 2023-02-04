<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\Setup\StudentClassController;
use App\Http\Controllers\Backend\Setup\StudentYearController;
use App\Http\Controllers\Backend\Setup\StudentGroupController;
use App\Http\Controllers\Backend\Setup\StudentShiftController;
use App\Http\Controllers\Backend\Setup\FeeCategoryController;
use App\Http\Controllers\Backend\Setup\FeeAmountController;
use App\Http\Controllers\Backend\Setup\ExamTypeController;
use App\Http\Controllers\Backend\Setup\SchoolSubjectController;
use App\Http\Controllers\Backend\Setup\AssignSubjectController;
use App\Http\Controllers\Backend\Setup\DesignationController;
use App\Http\Controllers\Backend\Student\StudentRegController;
use App\Http\Controllers\Backend\Student\StudentRollController;
use App\Http\Controllers\Backend\Student\RegistrationFeeController;
use App\Http\Controllers\Backend\Student\MonthlyFeeController;
use App\Http\Controllers\Backend\Student\ExamFeeController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});


Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.index');
    })->name('dashboard');
});

Route::get('/admin/logout', [AdminController::class, 'Logout'])->name('admin.logout');


// User Management ALl Route
Route::prefix('user')->group(function() {
    Route::get('/view', [UserController::class, 'UserView'])->name('user.view');
    Route::get('/add', [UserController::class, 'UserAdd'])->name('user.add');
    Route::post('/store', [UserController::class, 'UserStore'])->name('user.store');
    Route::get('/edit/{id}', [UserController::class, 'UserEdit'])->name('user.edit');
    Route::post('/update/{id}', [UserController::class, 'UserUpdate'])->name('user.update');
    Route::get('/delete/{id}', [UserController::class, 'UserDelete'])->name('user.delete');
});


// User Profile and Change Password Route
Route::prefix('profile')->group(function() {
    Route::get('/view', [ProfileController::class, 'ProfileView'])->name('profile.view');
    Route::get('/edit', [ProfileController::class, 'ProfileEdit'])->name('profile.edit');
    Route::post('/update', [ProfileController::class, 'ProfileUpdate'])->name('profile.update');
    Route::get('/password/view', [ProfileController::class, 'PasswordView'])->name('password.view');
    Route::post('/password/update', [ProfileController::class, 'PasswordUpdate'])->name('password.update');
});



// Student Class Route
Route::prefix('setup')->group(function() {
    Route::get('student/class/view', [StudentClassController::class, 'ViewStudent'])->name('student.class.view');
    Route::get('student/class/add', [StudentClassController::class, 'StudentClassAdd'])->name('student.class.add');
    Route::post('store/student/class', [StudentClassController::class, 'StudentClassStore'])->name('store.student.class');
    Route::get('student/class/edit/{id}', [StudentClassController::class, 'StudentClassEdit'])->name('student.class.edit');
    Route::post('student/class/update/{id}', [StudentClassController::class, 'StudentClassUpdate'])->name('student.class.update');
    Route::get('student/class/delete/{id}', [StudentClassController::class, 'StudentClassDelete'])->name('student.class.delete');


    // Student Year Route
    Route::get('student/year/view', [StudentYearController::class, 'ViewYear'])->name('student.year.view');
    Route::get('student/year/add', [StudentYearController::class, 'StudentYearAdd'])->name('student.year.add');
    Route::post('store/student/year', [StudentYearController::class, 'StudentYearStore'])->name('store.student.year');
    Route::get('student/year/edit/{id}', [StudentYearController::class, 'StudentYearEdit'])->name('student.year.edit');
    Route::post('student/year/update/{id}', [StudentYearController::class, 'StudentYearUpdate'])->name('student.year.update');
    Route::get('student/year/delete/{id}', [StudentYearController::class, 'StudentYearDelete'])->name('student.year.delete');



    // Student Group Route
    Route::get('student/group/view', [StudentGroupController::class, 'ViewGroup'])->name('student.group.view');
    Route::get('student/group/add', [StudentGroupController::class, 'StudentGroupAdd'])->name('student.group.add');
    Route::post('store/student/group', [StudentGroupController::class, 'StudentGroupStore'])->name('store.student.group');
    Route::get('student/group/edit/{id}', [StudentGroupController::class, 'StudentGroupEdit'])->name('student.group.edit');
    Route::post('student/group/update/{id}', [StudentGroupController::class, 'StudentGroupUpdate'])->name('student.group.update');
    Route::get('student/group/delete/{id}', [StudentGroupController::class, 'StudentGroupDelete'])->name('student.group.delete');


    // Student Shift Route
    Route::get('student/shift/view', [StudentShiftController::class, 'ViewShift'])->name('student.shift.view');
    Route::get('student/shift/add', [StudentShiftController::class, 'StudentShiftAdd'])->name('student.shift.add');
    Route::post('store/student/shift', [StudentShiftController::class, 'StudentShiftStore'])->name('store.student.shift');
    Route::get('student/shift/edit/{id}', [StudentShiftController::class, 'StudentShiftEdit'])->name('student.shift.edit');
    Route::post('student/shift/update/{id}', [StudentShiftController::class, 'StudentShiftUpdate'])->name('student.shift.update');
    Route::get('student/shift/delete/{id}', [StudentShiftController::class, 'StudentShiftDelete'])->name('student.shift.delete');




    // Fee Category Route
    Route::get('fee/category/view', [FeeCategoryController::class, 'ViewFeeCat'])->name('fee.category.view');
    Route::get('fee/category/add', [FeeCategoryController::class, 'FeeCatAdd'])->name('fee.category.add');
    Route::post('store/fee/category', [FeeCategoryController::class, 'FeeCatStore'])->name('store.fee.category');
    Route::get('fee/category/edit/{id}', [FeeCategoryController::class, 'FeeCatEdit'])->name('fee.category.edit');
    Route::post('fee/category/update/{id}', [FeeCategoryController::class, 'FeeCatUpdate'])->name('fee.category.update');
    Route::get('fee/category/delete/{id}', [FeeCategoryController::class, 'FeeCatDelete'])->name('fee.category.delete');




    // Fee Category Amount Route
    Route::get('fee/amount/view', [FeeAmountController::class, 'ViewFeeAmount'])->name('fee.amount.view');
    Route::get('fee/amount/add', [FeeAmountController::class, 'AddFeeAmount'])->name('fee.amount.add');
    Route::post('store/fee/amount', [FeeAmountController::class, 'StoreFeeAmount'])->name('store.fee.amount');
    Route::get('fee/amount/edit/{fee_category_id}', [FeeAmountController::class, 'EditFeeAmount'])->name('fee.amount.edit');
    Route::post('fee/amount/update/{fee_category_id}', [FeeAmountController::class, 'UpdateFeeAmount'])->name('update.fee.amount');
    Route::get('fee/amount/delete/{fee_category_id}', [FeeAmountController::class, 'FeeAmountDelete'])->name('fee.amount.delete');
    Route::get('fee/amount/details/{fee_category_id}', [FeeAmountController::class, 'FeeAmountDetails'])->name('fee.amount.details');



    // Exam Type Route
    Route::get('exam/type/view', [ExamTypeController::class, 'ViewExamType'])->name('exam.type.view');
    Route::get('exam/type/add', [ExamTypeController::class, 'ExamTypeAdd'])->name('exam.type.add');
    Route::post('store/exam/type', [ExamTypeController::class, 'ExamTypeStore'])->name('store.exam.type');
    Route::get('exam/type/edit/{id}', [ExamTypeController::class, 'ExamTypeEdit'])->name('exam.type.edit');
    Route::post('exam/type/update/{id}', [ExamTypeController::class, 'ExamTypeUpdate'])->name('exam.type.update');
    Route::get('exam/type/delete/{id}', [ExamTypeController::class, 'ExamTypeDelete'])->name('exam.type.delete');



    // School Subject Route
    Route::get('school/subject/view', [SchoolSubjectController::class, 'ViewSubject'])->name('school.subject.view');
    Route::get('school/subject/add', [SchoolSubjectController::class, 'SubjectAdd'])->name('school.subject.add');
    Route::post('school/subject/store', [SchoolSubjectController::class, 'SubjectStore'])->name('store.school.subject');
    Route::get('school/subject/edit/{id}', [SchoolSubjectController::class, 'SubjectEdit'])->name('school.subject.edit');
    Route::post('school/subject/update/{id}', [SchoolSubjectController::class, 'SubjectUpdate'])->name('school.subject.update');
    Route::get('school/subject/delete/{id}', [SchoolSubjectController::class, 'SubjectDelete'])->name('school.subject.delete');



    // Assign Subject Route
    Route::get('assign/subject/view', [AssignSubjectController::class, 'ViewAssignSubject'])->name('assign.subject.view');
    Route::get('assign/subject/add', [AssignSubjectController::class, 'AddAssignSubject'])->name('assign.subject.add');
    Route::post('assign/subject/store', [AssignSubjectController::class, 'StoreAssignSubject'])->name('store.assign.subject');
    Route::get('assign/subject/edit/{class_id}', [AssignSubjectController::class, 'EditAssignSubject'])->name('assign.subject.edit');
    Route::post('assign/subject/update/{class_id}', [AssignSubjectController::class, 'UpdateAssignSubject'])->name('update.assign.subject');
    Route::get('assign/subject/delete/{class_id}', [AssignSubjectController::class, 'AssignSubjectDelete'])->name('assign.subject.delete');
    Route::get('assign/subject/details/{class_id}', [AssignSubjectController::class, 'AssignSubjectDetails'])->name('assign.subject.details');




    // Designation Route
    Route::get('designation/view', [DesignationController::class, 'ViewDesignation'])->name('designation.view');
    Route::get('designation/add', [DesignationController::class, 'DesignationAdd'])->name('designation.add');
    Route::post('designation/store', [DesignationController::class, 'DesignationStore'])->name('store.designation');
    Route::get('designation/edit/{id}', [DesignationController::class, 'DesignationEdit'])->name('designation.edit');
    Route::post('designation/update/{id}', [DesignationController::class, 'DesignationUpdate'])->name('designation.update');
    Route::get('designation/delete/{id}', [DesignationController::class, 'DesignationDelete'])->name('designation.delete');
});




// Student Registration Route
Route::prefix('student')->group(function() {
    Route::get('/reg/view', [StudentRegController::class, 'StudentRegView'])->name('student.registration.view');
    Route::get('/reg/add', [StudentRegController::class, 'StudentRegAdd'])->name('student.registration.add');
    Route::post('/reg/store', [StudentRegController::class, 'StudentRegStore'])->name('store.student.reg');
    Route::get('/year/class/wise', [StudentRegController::class, 'StudentClassYearWise'])->name('student.year.class.wise');
    Route::get('/reg/edit/{student_id}', [StudentRegController::class, 'StudentRegEdit'])->name('student.registration.edit');
    Route::post('/reg/update/{student_id}', [StudentRegController::class, 'StudentRegUpdate'])->name('update.student.reg');
    Route::get('/reg/promotion/{student_id}', [StudentRegController::class, 'StudentRegPromotion'])->name('student.registration.promotion');
    Route::post('/reg/update/promotion/{student_id}', [StudentRegController::class, 'StudentUpdatePromotion'])->name('promotion.student.reg');
    Route::get('/reg/details/{student_id}', [StudentRegController::class, 'StudentRegDetails'])->name('student.registration.details');

    // Student Roll Generate Route
    Route::get('/roll/generate/view', [StudentRollController::class, 'StudentRollView'])->name('roll.generate.view');

    Route::get('/reg/getstudents', [StudentRollController::class, 'GetStudents'])->name('student.registration.getstudents');

    Route::post('/roll/generate/store', [StudentRollController::class, 'StudentRollStore'])->name('roll.generate.store');



    /// Registration Fee Route
    Route::get('/reg/fee/view', [RegistrationFeeController::class, 'RegFeeView'])->name('registration.fee.view');
    Route::get('/reg/fee/classwisedata', [RegistrationFeeController::class, 'RegFeeClassData'])->name('student.registration.fee.classwise.get');
    Route::get('/reg/fee/payslip', [RegistrationFeeController::class, 'RegFeePayslip'])->name('student.registration.fee.payslip');




    /// Monthly Fee Route
    Route::get('/monthly/fee/view', [MonthlyFeeController::class, 'MonthlyFeeView'])->name('monthly.fee.view');
    Route::get('/monthly/fee/classwisedata', [MonthlyFeeController::class, 'MonthlyFeeClassData'])->name('student.monthly.fee.classwise.get');
    Route::get('/monthly/fee/payslip', [MonthlyFeeController::class, 'MonthlyFeePayslip'])->name('student.monthly.fee.payslip');




     /// Exam Fee Route
    Route::get('/exam/fee/view', [ExamFeeController::class, 'ExamFeeView'])->name('exam.fee.view');
    Route::get('/exam/fee/classwisedata', [ExamFeeController::class, 'ExamFeeClassData'])->name('student.exam.fee.classwise.get');
    Route::get('/exam/fee/payslip', [ExamFeeController::class, 'ExamFeePayslip'])->name('student.exam.fee.payslip');
});