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
                                        <label class="form-label">Student Name English</label>
                                        <input type="text" name="studentNameEn" class="form-control" value="{{$data->studentNameEn}}">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Student Name Bangla</label>
                                        <input type="text" name="studentNameBn" class="form-control" value="{{$data->studentNameBn}}">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Mother Mobile No</label>
                                        <input type="text" name="motherMobile" class="form-control" value="{{$data->motherMobile}}">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Email</label>
                                        <input type="text" name="email" class="form-control" value="{{$data->email}}">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Date Of Birth</label>
                                        <input type="text" name="dob" class="form-control" value="{{$data->dob}}" disabled>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Gender</label>
                                        <input type="text" name="gender" class="form-control" value="{{$data->gender}}" disabled>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Blood Group</label>
                                        <input type="text" name="bloodGroup" class="form-control" value="{{$data->bloodGroup}}" disabled>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Birth Certificate</label>
                                        <input type="text" name="birthCertificate" class="form-control" value="{{$data->birthCertificate}}" disabled>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Father Name English</label>
                                        <input type="text" name="fatherNameEn" class="form-control" value="{{$data->fatherNameEn}}" disabled>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Father Name Bangla</label>
                                        <input type="text" name="fatherNameBn" class="form-control" value="{{$data->fatherNameBn}}" disabled>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Mother Name English</label>
                                        <input type="text" name="motherNameEn" class="form-control" value="{{$data->motherNameEn}}" disabled>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Mother Name Bangla</label>
                                        <input type="text" name="motherNameBn" class="form-control" value="{{$data->motherNameBn}}" disabled>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Father's Mobile</label>
                                        <input type="text" name="fatherMobile" class="form-control" value="{{$data->fatherMobile}}" disabled>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">NID</label>
                                        <input type="text" name="nid" class="form-control" value="{{$data->nid}}" disabled>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Village Present</label>
                                        <input type="text" name="villagePreset" class="form-control" value="{{$data->villagePreset}}" disabled>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Post Present</label>
                                        <input type="text" name="postPreset" class="form-control" value="{{$data->postPreset}}" disabled>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Thana Present</label>
                                        <input type="text" name="thanaPreset" class="form-control" value="{{$data->thanaPreset}}" disabled>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">District Present</label>
                                        <input type="text" name="distPreset" class="form-control" value="{{$data->distPreset}}" disabled>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Village Permanent</label>
                                        <input type="text" name="villagePermanent" class="form-control" value="{{$data->villagePermanent}}" disabled>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Post Permanent</label>
                                        <input type="text" name="postPermanent" class="form-control" value="{{$data->postPermanent}}" disabled>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Thana Permanent</label>
                                        <input type="text" name="thanaPermanent" class="form-control" value="{{$data->thanaPermanent}}" disabled>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">District Permanent</label>
                                        <input type="text" name="distPermanent" class="form-control" value="{{$data->distPermanent}}" disabled>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Class Name</label>
                                        <input type="text" name="classname" class="form-control" value="{{$data->classname}}" disabled>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Session</label>
                                        <input type="text" name="session" class="form-control" value="{{$data->session}}" disabled>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Amount</label>
                                        <input type="text" name="amount" class="form-control" value="{{$data->amount}}" disabled>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Payment Method</label>
                                        <input type="text" name="paymentmethod" class="form-control" value="{{$data->paymentmethod}}" disabled>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Payment Number</label>
                                        <input type="text" name="pyamentnumber" class="form-control" value="{{$data->pyamentnumber}}" disabled>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Trxid</label>
                                        <input type="text" name="trxid" class="form-control" value="{{$data->trxid}}" disabled>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Admission Date</label>
                                        <input type="date" name="admissiondate" class="form-control" value="{{$data->admissiondate}}" disabled>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Invoice Number</label>
                                        <input type="text" name="mobile" class="form-control" value="{{$data->invoice}}" disabled>
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