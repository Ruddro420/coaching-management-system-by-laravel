<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\ResultModel;
use App\Models\admin\ClassModel;
use Illuminate\Support\Facades\Validator;

class ResultController extends Controller
{
    // add result
    public function add()
    {
        $data = ClassModel::all();
        return view('pages.admin.result.addResult', compact('data'));
    }
    // view result
    public function view()
    {
        $data = ResultModel::all();
        return view('pages.admin.result.viewResult', compact('data'));
    }

    // store result
    public function store(Request $request)
    {
        $data = new ResultModel;
        $data->date = $request->date;
        $data->name = $request->name;
        $data->class = $request->class;
        //For Result
        if ($request->file('rFile')) {
            $file = $request->file('rFile');
            $filename = date('Ymdhi') . $file->getClientOriginalName();
            $file->move(public_path('admin/result'), $filename);
            $data['rFile'] = $filename;
        }
        $data->save();
        notify()->success('Result Insert Successfully !');
        return redirect()->route('result.add');
    }

    // Edit result
    public function edit($id)
    {
        $data = ResultModel::find($id);
        $rClass = ClassModel::all();
        return view('pages.admin.result.editResult', compact('data', 'rClass'));
    }

    // update result
    public function update(Request $request, $id)
    {
        $data = ResultModel::find($id);
        $data->date = $request->date;
        $data->name = $request->name;
        $data->class = $request->class;
        //For Result
        if ($request->file('rFile')) {
            $file = $request->file('rFile');
            $filename = date('Ymdhi') . $file->getClientOriginalName();
            $file->move(public_path('admin/result'), $filename);
            $data['rFile'] = $filename;
        }
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
    // result api
    public function getExamResultsApi($studentId,$classname,$terms)
    {
        // Retrieve all data from the ResultModel
        $data = ResultModel::where('roll', $studentId)->first();

        // Return the data as a JSON response
        return response()->json([
            'success' => true,
            'message' => 'Results retrieved successfully',
            'data' => $data
        ]);
    }
}
