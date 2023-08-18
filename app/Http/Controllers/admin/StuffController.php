<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\StuffModel;
use Illuminate\Support\Facades\Validator;

class StuffController extends Controller
{
     // add stuff
     public function add()
     {
         return view('pages.admin.stuff.addStuff');
     }
     // view stuff
     public function view()
     {
         $data = StuffModel::all();
         return view('pages.admin.stuff.viewStuff',compact('data'));
     }
 
     // store stuff
     public function store(Request $request)
     {
          // validate Data
          $validatedData = Validator::make($request->all(),[
             'email' => 'required|unique:stuff_models',
         ]);
 
         if($validatedData->fails()){
             notify()->success('Email Already Taken !');
             return redirect()->back()->withInput();
         }else{
             $data = new StuffModel;
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
                 $file->move(public_path('admin/stuff'),$filename);
                 $data['pImg'] = $filename;
             }
             $data->save();
             notify()->success('Stuff Insert Successfully !');
             return redirect()->route('stuff.add');
         }
     }
 
     // Edit Stuff
     public function edit($id)
     {
         $data = StuffModel::find($id);
         return view('pages.admin.stuff.editStuff',compact('data'));
     }
 
     // update Stuff
     public function update(Request $request, $id)
     {
         $data = StuffModel::find($id);
         $data->fName = $request->fName;
         $data->lName = $request->lName;
         $data->jDate = $request->jDate;
         $data->mobile = $request->mobile;
         $data->bDate = $request->bDate;
         $data->education = $request->education;
         $data->address = $request->address;
         $data->save();
         notify()->success('Stuff Update Successfully !');
         return redirect()->route('stuff.view');
     }
 
     // delete Teacher
     public function destroy($id)
     {
         $data = StuffModel::find($id);
         $data->delete();
         notify()->success('Delete Successfully !');
         return redirect()->route('stuff.view');
     }
}