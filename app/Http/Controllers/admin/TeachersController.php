<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\TeacherModel;
use App\Models\admin\CourseModel;
use Illuminate\Support\Facades\Validator;

class TeachersController extends Controller
{
    // add teachers
    public function add()
    {
        $data = CourseModel::all();
        return view('pages.admin.teachers.addTeacher',compact('data'));
    }
    // view teachers
    public function view()
    {
        $data = TeacherModel::all();
        return view('pages.admin.teachers.viewTeacher',compact('data'));
    }

    // store teachers
    public function store(Request $request)
    {
         // validate Data
         $validatedData = Validator::make($request->all(),[
            'email' => 'required|unique:teacher_models',
        ]);

        if($validatedData->fails()){
            notify()->success('Email Already Taken !');
            return redirect()->back()->withInput();
        }else{
            $data = new TeacherModel;
            $data->fName = $request->fName;
            $data->lName = $request->lName;
            $data->email = $request->email;
            $data->jDate = $request->jDate;
            $data->mobile = $request->mobile;
            $data->gender = $request->gender;
            $data->designation = $request->designation;
            $data->dept = $request->dept;
            $data->bDate = $request->bDate;
            $data->education = $request->education;
            $data->address = $request->address;
            //For Image
            if($request->file('pImg')){
                $file = $request->file('pImg');
                $filename = date('Ymdhi').$file->getClientOriginalName();
                $file->move(public_path('admin/teachers'),$filename);
                $data['pImg'] = $filename;
            }
            $data->save();
            notify()->success('Teachers Insert Successfully !');
            return redirect()->route('teachers.add');
        }
    }

    // Edit Teacher
    public function edit($id)
    {
        $data = TeacherModel::find($id);
        return view('pages.admin.teachers.editTeacher',compact('data'));
    }

    // update Teacher
    public function update(Request $request, $id)
    {
        $data = TeacherModel::find($id);
        $data->fName = $request->fName;
        $data->lName = $request->lName;
        $data->jDate = $request->jDate;
        $data->mobile = $request->mobile;
        $data->designation = $request->designation;
        $data->bDate = $request->bDate;
        $data->education = $request->education;
        $data->address = $request->address;
        $data->save();
        notify()->success('Teacher Update Successfully !');
        return redirect()->route('teachers.view');
    }

    // delete Teacher
    public function destroy($id)
    {
        $data = TeacherModel::find($id);
        $data->delete();
        notify()->success('Delete Successfully !');
        return redirect()->route('teachers.view');
    }


}