<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExpenseModel;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function add()
    {
        $data = ExpenseModel::all();
        return view('pages.admin.expense.add', compact('data'));
    }

    public function store(Request $request)
     {
          
             $data = new ExpenseModel;
             $data->purpose = $request->purpose;
             $data->lName = $request->lName;
             $data->email = $request->email;
             $data->jDate = $request->jDate;
             $data->mobile = $request->mobile;
             $data->gender = $request->gender;
             $data->bDate = $request->bDate;
             $data->education = $request->education;
             $data->address = $request->address;
             $data->save();
             notify()->success('Stuff Insert Successfully !');
             return redirect()->route('stuff.add');
     }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
