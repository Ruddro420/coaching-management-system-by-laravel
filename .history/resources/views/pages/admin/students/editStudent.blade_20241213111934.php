@extends('layouts.admin.adminLayout')
@section('content')
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">

        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Edit Students</h4>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active"><a href="edit-Teacher.html">Students</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Edit Students</a></li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12 col-xxl-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Basic Info</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('students.update',$data->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Student ID</label>
                                        <input type="text" name="fName" class="form-control" value="{{$data->studentId}}" disabled>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Class Name</label>
                                        <input type="text" name="fName" class="form-control" value="{{$data->classname}}" disabled>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Student Name</label>
                                        <input type="text" name="lName" class="form-control" value="{{$data->studentNameEn}}" disabled>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Father's Name</label>
                                        <input name="rDate" class="datepicker-default form-control"
                                            type="text" value="{{$data->fatherNameEn}}" disabled>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Father Mobile Number</label>
                                        <input type="text" name="mobile" class="form-control" value="{{$data->fatherMobile}}" disabled>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Payment Method</label>
                                        <input type="text" name="mobile" class="form-control" value="{{$data->fatherMobile}}" disabled>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Profile Image</label>
                                        <img class="" width="135"
                                            src="{{(!empty($data->studentImage))?url('admin/students/'.$data->studentImage): url('admin/images/profile/small/pic3.jpg')}}" alt="">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group mb-4">
                                        <label class="form-label">Status</label>
                                        <select name="status" class="form-control" required>
                                            <option value="Fess Type">Status Type</option>
                                            <option
                                                value="0"
                                                {{$data->status == '0' ? 'selected' : ''}}>
                                                Pending
                                            </option>
                                            <option
                                                value="1"
                                                {{$data->status == '1' ? 'selected' : ''}}>
                                                Paid
                                            </option>
                                        </select>
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