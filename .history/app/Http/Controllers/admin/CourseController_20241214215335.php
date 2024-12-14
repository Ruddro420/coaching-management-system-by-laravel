<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\CourseModel;
use App\Models\admin\ClassModel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class CourseController extends Controller
{
    // add course
    public function add()
    {
        $data = ClassModel::all();
        return view('pages.admin.course.addCourse', compact('data'));
    }
    // view course
    public function view()
    {
        $data = CourseModel::all();
        return view('pages.admin.course.viewCourse', compact('data'));
    }

    // store course
    public function store(Request $request)
    {
        // validate Data
        $validatedData = Validator::make($request->all(), [
            'course' => 'required|unique:course_models',
        ]);

        if ($validatedData->fails()) {
            notify()->error('Course Already Taken !');
            return redirect()->back()->withInput();
        } else {
            $data = new CourseModel;
            $data->class = $request->class;
            $data->course = $request->course;
            $data->save();
            notify()->success('Course Insert Successfully !');
            return redirect()->route('course.view');
        }
    }

    // Edit Student
    public function edit($id)
    {
        $data = CourseModel::find($id);
        return view('pages.admin.course.editCourse', compact('data'));
    }

    // update Student
    public function update(Request $request, $id)
    {
        $data = CourseModel::find($id);
        $data->course = $request->course;
        $data->save();
        notify()->success('Course Update Successfully !');
        return redirect()->route('course.view');
    }

    // delete Student
    public function destroy($id)
    {
        $data = CourseModel::find($id);
        $data->delete();
        notify()->success('Delete Successfully !');
        return redirect()->route('course.view');
    }
}
