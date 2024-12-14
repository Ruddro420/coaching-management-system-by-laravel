<?php

namespace App\Http\Controllers;
use App\Models\ExamModel;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

class ExamController extends Controller
{
    // add classInfo
    public function add()
    {
        return view('pages.admin.exam.add');
    }
    // view classInfo
    public function view()
    {
        $data = ExamModel::all();
        return view('pages.admin.exam.view', compact('data'));
    }
    public function store(Request $request)
    {
        // validate Data
        $validatedData = Validator::make($request->all(), [
            'class' => 'required|unique:class_models',
        ]);

        if ($validatedData->fails()) {
            notify()->error('Class Already Taken !');
            return redirect()->back()->withInput();
        } else {
            $data = new ExamModel;
            $data->class = $request->class;
            $data->save();
            notify()->success('Class Insert Successfully !');
            return redirect()->route('class.view');
        }
    }
}
