<?php

namespace App\Http\Controllers;

use App\Models\ExamModel;
use App\Models\admin\CourseModel;
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
            'name' => 'required|unique:exam_models',
        ]);

        if ($validatedData->fails()) {
            notify()->error('Exam Already Taken !');
            return redirect()->back()->withInput();
        } else {
            $data = new ExamModel;
            $data->name = $request->name;
            $data->date = $request->date;
            $data->save();
            notify()->success('Exam Insert Successfully !');
            return redirect()->route('exam.view');
        }
    }
    // delete Student
    public function destroy($id)
    {
        $data = ExamModel::find($id);
        $data->delete();
        notify()->success('Delete Successfully !');
        return redirect()->route('exam.view');
    }

    // exam result view
    public function examResultView()
    {
        // Fetch all courses from the database
        $courses = CourseModel::all();
        $exam = ExamModel::all();

        // Group courses by class and format into the desired structure
        $data = $courses->groupBy('class')->map(function ($group, $class) {
            return [
                'class' => $class, // Class name
                'subjects' => $group->pluck('course')->toArray(), // Extract subject names
            ];
        })->values()->toArray(); // Convert the collection to a simple array

        // Debug the output structure (optional)
        // dd($data);

        // Pass the transformed data to the Blade view
        return view('pages.admin.exam.examResultAdd', [
            'data' => $data,
            'exam' => $exam
        ]);
    }
}
