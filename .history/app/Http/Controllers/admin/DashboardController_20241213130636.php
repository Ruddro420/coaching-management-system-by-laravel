<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\StudentModel;
use App\Models\admin\TeacherModel;
use App\Models\admin\CourseModel;
use App\Models\admin\FeesModel;
use App\Models\admin\ClassModel;
use App\Models\AdmissionModel;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    // view dashboard
    public function dashboard()
    {
        $totalStudent = AdmissionModel::all()->count();
        $totalTeacher = TeacherModel::all()->count();
        $totalCourse = CourseModel::all()->count();
        $totalFees = FeesModel::where('status', 1)
            ->select(DB::raw('SUM(amount) as total_sum'))
            ->first()
            ->total_sum;
        $pendingFees = FeesModel::where('status', 0)
            ->select(DB::raw('SUM(amount) as total_sum'))
            ->first()
            ->total_sum;
        $totalAdmissionFees = AdmissionModel::where('status', 1)
            ->select(DB::raw('SUM(amount) as total_sum'))
            ->first()
            ->total_sum;
        $classList = ClassModel::all();
        $couseList = CourseModel::all();
        $teacherList = TeacherModel::all();


        return view('pages.admin.dashboard.dashboard', compact('totalStudent', 'totalTeacher', 'totalCourse', 'totalFees', 'classList', 'couseList', 'teacherList','pendingFees'));
    }
}
