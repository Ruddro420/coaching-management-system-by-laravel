<?php

namespace App\Http\Controllers;
use App\Models\admin\ExamModel;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

class ExamController extends Controller
{
    // add classInfo
    public function add()
    {
        return view('pages.admin.classInfo.addClass');
    }
    // view classInfo
    public function view()
    {
        $data = ClassModel::all();
        return view('pages.admin.classInfo.viewClass', compact('data'));
    }
}
