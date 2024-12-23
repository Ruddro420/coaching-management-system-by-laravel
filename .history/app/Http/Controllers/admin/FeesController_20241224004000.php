<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\CourseModel;
use App\Models\AdmissionFeeController;
use App\Models\admin\FeesModel;
use Illuminate\Support\Facades\Validator;

class FeesController extends Controller
{
    // add fees
    public function add()
    {
        $data = CourseModel::all();
        return view('pages.admin.fees.addFees', compact('data'));
    }
    // view fees
    public function view()
    {
        $data = FeesModel::all();
        return view('pages.admin.fees.viewFees', compact('data'));
    }


    // store fees
    public function addFees(Request $request)
    {
        // Handle file uploads
        $data = $request->all();
        // Create the record
        try {
            $student = FeesModel::create($data);

            return response()->json([
                'success' => true,
                'message' => 'Fee payemnt successfully',
                'data' => $student,
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to create student record',
                'error' => $e->getMessage(),
            ], 500);
        }


        // validate Data
        /*  $validatedData = Validator::make($request->all(),[
             'pRef' => 'required|unique:fees_models',
         ]);
 
         if($validatedData->fails()){
             notify()->success('Reference Already Taken !');
             return redirect()->back()->withInput();
         }else{
             $data = new FeesModel;
             $data->roll = $request->roll;
             $data->stdName = $request->stdName;
             $data->course = $request->course;
             $data->feeType = $request->feeType;
             $data->amount = $request->amount;
             $data->cDate = $request->cDate;
             $data->pType = $request->pType;
             $data->pRef = $request->pRef;
             $data->status = $request->status;
             $data->pDetails = $request->pDetails;
             $data->save();
             notify()->success('Fees Insert Successfully !');
             return redirect()->route('fees.add');
         } */
    }

    // Edit fees
    public function edit($id)
    {
        $data = FeesModel::find($id);
        $courseData = CourseModel::all();
        return view('pages.admin.fees.editFees', compact('data', 'courseData'));
    }

    // update fees
    public function update(Request $request, $id)
    {
        $data = FeesModel::find($id);
        /*    $data->roll = $request->roll;
        $data->stdName = $request->stdName;
        $data->course = $request->course;
        $data->feeType = $request->feeType; */
        $data->amount = $request->amount;
        /*  $data->cDate = $request->cDate;
        $data->pType = $request->pType;
        $data->pRef = $request->pRef; */
        $data->status = $request->status;
        $data->save();
        notify()->success('Fees Update Successfully !');
        return redirect()->route('fees.view');
    }

    // delete fees
    public function destroy($id)
    {
        $data = FeesModel::find($id);
        $data->delete();
        notify()->success('Delete Successfully !');
        return redirect()->route('fees.view');
    }
    // exam fee destroy
    public function examFeedestroy($id)
    {
        $data = FeesModel::find($id);
        $data->delete();
        notify()->success('Delete Successfully !');
        return redirect()->route('fees.view');
    }

    // Invoice Search fees
    public function invoiceSearch(Request $request)
    {
        $getData = $request->roll;
        $data = FeesModel::where('roll', '=', $getData)->get();
        return view('pages.admin.fees.feesInvoice', compact('data'));
    }

    // get all fees
    public function getFees($roll, $month)
    {
        $data = FeesModel::where('roll', $roll)
            ->where('cDate', $month) // Assuming there’s a 'month' column in your table
            ->get();
    
        if ($data->isEmpty()) {
            return response()->json([
                'message' => 'No fee records found for this month',
            ], 404);
        }
    
        return response()->json([
            'fees' => $data,
        ]);
    }
    // get exam fees data
    public function examFeeView()
    {
        $data = AdmissionFeeController::all();
        return view('pages.admin.fees.examFee', compact('data'));
    }
    // Edit exam fees
    public function examFeeEdit($id)
    {
        $data = AdmissionFeeController::find($id);
        return view('pages.admin.fees.editExamFees', compact('data'));
    }
    public function examFeeUpdate(Request $request, $id)
    {
        $data = AdmissionFeeController::find($id);
        $data->status = $request->status;
        $data->save();
        notify()->success('Exam Fees Update Successfully !');
        return redirect()->route('exam.fees.view');
    }
}