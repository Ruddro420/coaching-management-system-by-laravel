<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\StudentModel;
use App\Models\admin\ClassModel;
use Illuminate\Support\Facades\Validator;

class StudentsController extends Controller
{
    // add students
    public function add()
    {
        $data = ClassModel::all();
        return view('pages.admin.students.addStudent',compact('data'));
    }
    // view students
    public function view()
    {
        $data = StudentModel::all();
        return view('pages.admin.students.viewStudent',compact('data'));
    }

    // store students
    public function store(Request $request)
    {
         // validate Data
         $validatedData = Validator::make($request->all(),[
            'email' => 'required|unique:student_models',
        ]);

        if($validatedData->fails()){
            notify()->success('Email Already Taken !');
            return redirect()->back()->withInput();
        }else{
            $code = rand(0000,9999);
            $data = new StudentModel;
            $data->roll = $code;
            $data->fName = $request->fName;
            $data->lName = $request->lName;
            $data->email = $request->email;
            $data->rDate = $request->rDate;
            $data->mobile = $request->mobile;
            $data->gender = $request->gender;
            $data->class = $request->class;
            $data->bDate = $request->bDate;
            $data->pName = $request->pName;
            $data->pMobile = $request->pMobile;
            $data->blood = $request->blood;
            $data->address = $request->address;
            //For Image
            if($request->file('pImg')){
                $file = $request->file('pImg');
                $filename = date('Ymdhi').$file->getClientOriginalName();
                $file->move(public_path('admin/students'),$filename);
                $data['pImg'] = $filename;
            }
            $data->save();
            notify()->success('Students Insert Successfully !');
            return redirect()->route('students.add');
        }
    }

    // Edit Student
    public function edit($id)
    {
        $data = StudentModel::find($id);
        return view('pages.admin.students.editStudent',compact('data'));
    }

    // update Student
    public function update(Request $request, $id)
    {
        $data = StudentModel::find($id);
        $data->fName = $request->fName;
        $data->lName = $request->lName;
        $data->rDate = $request->rDate;
        $data->mobile = $request->mobile;
        $data->bDate = $request->bDate;
        $data->pName = $request->pName;
        $data->pMobile = $request->pMobile;
        $data->blood = $request->blood;
        $data->address = $request->address;
        $data->save();
        notify()->success('Student Update Successfully !');
        return redirect()->route('students.view');
    }

    // delete Student
    public function destroy($id)
    {
        $data = StudentModel::find($id);
        $data->delete();
        notify()->success('Delete Successfully !');
        return redirect()->route('students.view');
    }


}