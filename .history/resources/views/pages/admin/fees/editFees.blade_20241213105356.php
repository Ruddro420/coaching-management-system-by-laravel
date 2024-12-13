@extends('layouts.admin.adminLayout')
@section('content')
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
            
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Add Fees</h4>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Fees</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0);">Edit Fees</a></li>
                </ol>
            </div>
        </div>
        
        <div class="row">
            <div class="col-xl-12 col-xxl-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Edit Fees</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{route('fees.update',$data->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Roll No.</label>
                                        <input name="roll" type="text" class="form-control" value="{{$data->roll}}" disabled>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Student Name</label>
                                        <input name="stdName" type="text" class="form-control" value="{{$data->stdName}}" disabled>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Class</label>
                                        <input name="stdName" type="text" class="form-control" value="{{$data->course}}" disabled>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group mb-4">
                                        <label class="form-label">Fess Type</label>
                                        <select name="feeType" class="form-control" required>
                                            <option value="Fess Type">Fess Type</option>
                                            <option 
                                            value="Monthly" 
                                            {{$data->feeType == 'Monthly' ? 'selected' : ''}}>
                                            Monthly
                                           </option>
                                            <option 
                                            value="Annual" 
                                            {{$data->feeType == 'Annual' ? 'selected' : ''}}>
                                            Annual
                                           </option>
                                            <option 
                                            value="Exam" 
                                            {{$data->feeType == 'Exam' ? 'selected' : ''}}>
                                            Exam
                                           </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Amount</label>
                                        <input value="{{$data->amount}}" name="amount" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group mb-4">
                                        <label class="form-label">Collection Date</label>
                                        <input value="{{$data->cDate}}" name="cDate" name="datepicker" class="datepicker-default form-control" id="datepicker" disabled>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group mb-4">
                                        <label class="form-label">Payment Type</label>
                                        <input value="{{$data->pType}}" name="amount" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Payment Number</label>
                                        <input value="{{$data->pRef}}" placeholder="Phone Number" name="pRef" type="number" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group mb-4">
                                        <label class="form-label">Status</label>
                                        <input value="{{$data->pDetails}}" placeholder="Phone Number" name="pRef" type="number" class="form-control" required>
                                        <select name="status" class="form-control" required>
                                            <option value="">Status</option>
                                            <option 
                                            value="Paid" 
                                            {{$data->status == 'Paid' ? 'selected' : ''}}>
                                            Paid
                                           </option>
                                           <option 
                                           value="UnPaid" 
                                           {{$data->status == 'UnPaid' ? 'selected' : ''}}>
                                           UnPaid
                                          </option>
                                          <option 
                                          value="Pending" 
                                          {{$data->status == 'Pending' ? 'selected' : ''}}>
                                          Pending
                                         </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Payment Details</label>
                                        <textarea disabled name="pDetails" class="form-control" rows="5"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <button type="submit" class="btn btn-success">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>

@endsection