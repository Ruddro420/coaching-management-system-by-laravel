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

    public function view()
    {
        $data = ExpenseModel::all();
        return view('pages.admin.expense.view',compact('data'));
    }

    public function store(Request $request)
     {
          
             $data = new ExpenseModel;
             $data->purpose = $request->purpose;
             $data->amount = $request->amount;
             $data->method = $request->method;
             $data->paidBy = $request->paidBy;
             $data->source = $request->source;
             $data->date = $request->date;
             $data->save();
             notify()->success('Insert Successfully !');
             return redirect()->route('expense.add');
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
    public function destroy($id)
    {
        $data = ExpenseModel::find($id);
        $data->delete();
        notify()->success('Delete Successfully !');
        return redirect()->route('result.view');
    }
}
