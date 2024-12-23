@extends('layouts.admin.adminLayout')
@section('content')
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">

        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Fees Collection</h4>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0);">Fees</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0);">Fees Collection</a></li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Exam Fees Collection</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example4" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>Student ID</th>
                                        <th>Name</th>
                                        <th>Class</th>
                                        <th>Method</th>
                                        <th>Number</th>
                                        <th>TrxId</th>
                                        <th>Date</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $value)
                                    <tr>
                                        <td>{{$value->studentId}}</td>
                                        <td>{{$value->name}}</td>
                                        <td>{{$value->class}}</td>
                                        <td>{{$value->pMethod}}</td>
                                        <td>{{$value->pNumber}}</td>
                                        <td>{{$value->txid}}</td>
                                        <td>{{$value->examDate}}</td>
                                        <td><strong>{{$value->amount}} ৳</strong></td>
                                        <td>
                                            <strong>
                                                @if($value->status == 0)
                                                Pending
                                                @elseif($value->status == 1)
                                                Paid
                                                @else
                                                Unknown
                                                @endif
                                            </strong>
                                        </td>
                                        <td>
                                            <a href="{{route('exam.fees.edit' ,$value->id)}}" class="btn btn-sm btn-primary"><i
                                                    class="la la-pencil"></i></a>
                                            <a href="{{route('fees.delete' ,$value->id)}}" id="delete" class="btn btn-sm btn-danger"><i
                                                    class="la la-trash-o"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection