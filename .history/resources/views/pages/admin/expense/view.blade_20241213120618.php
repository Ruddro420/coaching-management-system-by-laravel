@extends('layouts.admin.adminLayout')
@section('content')
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">

        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Expense/Salary Collection</h4>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0);">Expense/Salary</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0);">Expense/Salary</a></li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Expense/Salary Collection</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example4" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Purpose</th>
                                        <th>Amount</th>
                                        <th>Date</th>
                                        <th>Payment Type</th>
                                        <th>Paid To</th>
                                        <th>Paid By</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $value)
                                    <tr>
                                        <td>{{$value->roll}}</td>
                                        <td>{{$value->stdName}}</td>
                                        <td>{{$value->course}}</td>
                                        <td>{{$value->pType}}</td>
                                        <td>{{$value->pRef}}</td>
                                        <td>{{$value->pDetails}}</td>
                                        <td>{{$value->cDate}}</td>
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
                                            <a href="{{route('fees.edit' ,$value->id)}}" class="btn btn-sm btn-primary"><i
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