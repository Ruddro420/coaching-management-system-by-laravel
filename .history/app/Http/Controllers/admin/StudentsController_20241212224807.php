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

    /* Admission Form  */
    public function admissionStore(Request $request)
    {
        // Validation rules
        $validator = Validator::make($request->all(), [
            'studentId' => 'nullable|string',
            'studentImage' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'studentNameEn' => 'nullable|string',
            'studentNameBn' => 'nullable|string',
            'motherMobile' => 'nullable|string',
            'email' => 'nullable|email',
            'dob' => 'nullable|date',
            'gender' => 'nullable|string',
            'bloodGroup' => 'nullable|string',
            'birthCertificate' => 'nullable|string',
            'birthCertificateFile' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'fatherNameEn' => 'nullable|string',
            'fatherNameBn' => 'nullable|string',
            'motherNameEn' => 'nullable|string',
            'motherNameBn' => 'nullable|string',
            'fatherMobile' => 'nullable|string',
            'nid' => 'nullable|string',
            'parentsNidFile' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'villagePreset' => 'nullable|string',
            'postPreset' => 'nullable|string',
            'thanaPreset' => 'nullable|string',
            'distPreset' => 'nullable|string',
            'villagePermanent' => 'nullable|string',
            'postPermanent' => 'nullable|string',
            'thanaPermanent' => 'nullable|string',
            'distPermanent' => 'nullable|string',
            'classname' => 'nullable|string',
            'session' => 'nullable|string',
            'amount' => 'nullable|numeric',
            'paymentmethod' => 'nullable|string',
            'pyamentnumber' => 'nullable|string',
            'trxid' => 'nullable|string',
            'admissiondate' => 'nullable|date',
            'invoice' => 'nullable|string',
            'status' => 'nullable|integer|in:0,1',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation errors',
                'errors' => $validator->errors(),
            ], 422);
        }

        // Handle file uploads
        $data = $request->all();
        //For Image
        if($request->file('studentImage')){
            $file = $request->file('studentImage');
            $filename = date('Ymdhi').$file->getClientOriginalName();
            $file->move(public_path('admin/students'),$filename);
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


}