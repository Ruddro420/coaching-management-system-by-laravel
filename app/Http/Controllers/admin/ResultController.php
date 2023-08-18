<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\ResultModel;
use Illuminate\Support\Facades\Validator;

class ResultController extends Controller
{
    // add result
    public function add()
    {
        return view('pages.admin.result.addResult');
    }
    // view result
    public function view()
    {
        $data = ResultModel::all();
        return view('pages.admin.result.viewResult',compact('data'));
    }

    // store result
    public function store(Request $request)
    {
         // validate Data
         $validatedData = Validator::make($request->all(),[
            'email' => 'required|unique:result_models',
        ]);

        if($validatedData->fails()){
            notify()->success('Email Already Taken !');
            return redirect()->back()->withInput();
        }else{
            $data = new ResultModel;
            $data->fName = $request->fName;
            $data->lName = $request->lName;
            $data->email = $request->email;
            $data->jDate = $request->jDate;
            $data->mobile = $request->mobile;
            $data->gender = $request->gender;
            $data->bDate = $request->bDate;
            $data->education = $request->education;
            $data->address = $request->address;
            //For Image
            if($request->file('pImg')){
                $file = $request->file('pImg');
                $filename = date('Ymdhi').$file->getClientOriginalName();
                $file->move(public_path('admin/result'),$filename);
                $data['pImg'] = $filename;
            }
            $data->save();
            notify()->success('Result Insert Successfully !');
            return redirect()->route('result.add');
        }
    }

    // Edit result
    public function edit($id)
    {
        $data = ResultModel::find($id);
        return view('pages.admin.result.editResult',compact('data'));
    }

    // update result
    public function update(Request $request, $id)
    {
        $data = ResultModel::find($id);
        $data->fName = $request->fName;
        $data->lName = $request->lName;
        $data->jDate = $request->jDate;
        $data->mobile = $request->mobile;
        $data->bDate = $request->bDate;
        $data->education = $request->education;
        $data->address = $request->address;
        $data->save();
        notify()->success('Result Update Successfully !');
        return redirect()->route('result.view');
    }

    // delete Teacher
    public function destroy($id)
    {
        $data = ResultModel::find($id);
        $data->delete();
        notify()->success('Delete Successfully !');
        return redirect()->route('result.view');
    }
}