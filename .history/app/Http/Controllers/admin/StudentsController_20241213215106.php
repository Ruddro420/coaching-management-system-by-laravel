<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\StudentModel;
use App\Models\AdmissionModel;
use App\Models\admin\ClassModel;
use Illuminate\Support\Facades\Validator;

class StudentsController extends Controller
{
    // add students
    public function add()
    {
        $data = ClassModel::all();
        return view('pages.admin.students.addStudent', compact('data'));
    }
    // view students
    public function view(Request $request)
{
    // Get the 'class' filter value from the request
    $classFilter = $request->get('class');

    // Fetch students with optional filtering and skip the first record
    if (!empty($classFilter)) {
        $data = AdmissionModel::where('classname', $classFilter)
            ->skip(1)
            ->take(PHP_INT_MAX)
            ->get();
    } else {
        $data = AdmissionModel::skip(1)
            ->take(PHP_INT_MAX)
            ->get();
    }

    // Pass the data and filter value to the view
    return view('pages.admin.students.viewStudent', compact('data', 'classFilter'));
}


    // store students
    public function store(Request $request)
    {
        // validate Data
        $validatedData = Validator::make($request->all(), [
            'email' => 'required|unique:student_models',
        ]);

        if ($validatedData->fails()) {
            notify()->success('Email Already Taken !');
            return redirect()->back()->withInput();
        } else {
            $code = rand(0000, 9999);
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
            if ($request->file('pImg')) {
                $file = $request->file('pImg');
                $filename = date('Ymdhi') . $file->getClientOriginalName();
                $file->move(public_path('admin/students'), $filename);
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
        $data = AdmissionModel::find($id);
        return view('pages.admin.students.editStudent', compact('data'));
    }

    // update Student
    public function update(Request $request, $id)
    {
        $data = AdmissionModel::find($id);
      /*   $data->fName = $request->fName;
        $data->lName = $request->lName;
        $data->rDate = $request->rDate;
        $data->mobile = $request->mobile;
        $data->bDate = $request->bDate;
        $data->pName = $request->pName;
        $data->pMobile = $request->pMobile;
        $data->blood = $request->blood; */
        $data->status = $request->status;
        $data->save();
        notify()->success('Student Update Successfully !');
        return redirect()->route('students.view');
    }

    // delete Student
    public function destroy($id)
    {
        $data = AdmissionModel::find($id);
        $data->delete();
        notify()->success('Delete Successfully !');
        return redirect()->route('students.view');
    }

    /* Admission Form  */
    public function admissionStore(Request $request)
    {


        // Handle file uploads
        $data = $request->all();
        //For Image
        if ($request->file('studentImage')) {
            $file = $request->file('studentImage');
            $filename = date('Ymdhi') . $file->getClientOriginalName();
            $file->move(public_path('admin/students'), $filename);
            $data['studentImage'] = $filename;
        }

        /*  if ($request->hasFile('studentImage')) {
            $data['studentImage'] = $request->file('studentImage')->store('student_images', 'public');
        } */

        if ($request->hasFile('birthCertificateFile')) {
            $data['birthCertificateFile'] = $request->file('birthCertificateFile')->store('birth_certificates', 'public');
        }

        if ($request->hasFile('parentsNidFile')) {
            $data['parentsNidFile'] = $request->file('parentsNidFile')->store('nid_files', 'public');
        }

        // Create the record
        try {
            $student = AdmissionModel::create($data);

            return response()->json([
                'success' => true,
                'message' => 'Student record created successfully',
                'data' => $student,
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to create student record',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    // Function to handle the GET request and retrieve admission data
    public function getAdmissionData($studentId)
    {
        // Find the student by studentId using a where clause
        $student = AdmissionModel::where('studentId', $studentId)->first();

        // Check if student exists
        if (!$student) {
            return response()->json([
                'message' => 'Student not found'
            ], 404);
        }

        // Return the admission data as a JSON response
        return response()->json([
            'student' => $student
        ]);
    }
}
