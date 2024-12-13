<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\ClassModel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ClassController extends Controller
{
     // add classInfo
     public function add()
     {
         return view('pages.admin.classInfo.addClass');
     }
     // view classInfo
     public function view()
     {
        $data = ClassModel::orderBy('id', 'asc')->get();
         return view('pages.admin.classInfo.viewClass',compact('data'));
     }
 
     // store classInfo
     public function store(Request $request)
     {
          // validate Data
          $validatedData = Validator::make($request->all(),[
             'class' => 'required|unique:class_models',
         ]);
 
         if($validatedData->fails()){
             notify()->error('Class Already Taken !');
             return redirect()->back()->withInput();
         }else{
             $data = new ClassModel;
             $data->class = $request->class;
             $data->save();
             notify()->success('Class Insert Successfully !');
             return redirect()->route('class.view');
         }
     }
 
     // Edit Student
     public function edit($id)
     {
         $data = ClassModel::find($id);
         return view('pages.admin.classInfo.editClass',compact('data'));
     }
 
     // update Student
     public function update(Request $request, $id)
     {
         $data = ClassModel::find($id);
         $validatedData = Validator::make($request->all(),[
            'class' => [
                'required',
                Rule::unique('class_models')->ignore($id),
            ]
        ]);

        if($validatedData->fails()){
            notify()->error('Class Already Taken !');
            return redirect()->back()->withInput();
        }else{
         $data->class = $request->class;
         $data->save();
         notify()->success('Class Update Successfully !');
         return redirect()->route('class.view');
        } 
     }
 
     // delete Student
     public function destroy($id)
     {
         $data = ClassModel::find($id);
         $data->delete();
         notify()->success('Delete Successfully !');
         return redirect()->route('class.view');
     }
}