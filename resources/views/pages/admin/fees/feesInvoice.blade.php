@extends('layouts.admin.adminLayout')
@section('content')
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
            
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Fees Receipt</h4>
                </div>
                <div class="mt-3">
                    <form action="{{route('invoice.search')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label class="form-label">Roll No.</label>
                                    <input placeholder="Enter roll number" name="roll" type="number" class="form-control" required>
                                    <button class="btn btn-info mt-3">Generate Invoice</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Fees</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0);">Fees Receipt</a></li>
                </ol>
            </div>
        </div>


        @if(count($data) > 0)
        <div class="row">
            <div class="col-lg-12">
                
                <div class="card mt-3">
                    <div class="card-header"> <h2>Invoice</h2> </div>
                        <div class="table-responsive-sm">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th class="center">Roll No</th>
                                        <th>Fees Type</th>
                                        <th>Payment Type</th>
                                        <th class="right">Date</th>
                                        <th class="right">Status</th>
                                        <th class="right">Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                    <tr>
                                        <td class="center">{{$item->roll}}</td>
                                        <td class="left strong">{{$item->feeType}}</td>
                                        <td class="left">{{$item->pType}}</td>
                                        <td class="right">{{$item->cDate}}</td>
                                        <td class="right">{{$item->status}}</td>
                                        <td class="right">{{$item->amount}} ৳</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                     {{--    <div class="row">
                            <div class="col-lg-4 col-sm-5"> </div>
                            <div class="col-lg-4 col-sm-5 ml-auto">
                                <table class="table table-clear">
                                    <tbody>
                                        <tr>
                                            <td class="left"><strong>Total</strong></td>
                                            <td class="right text-center"><strong>{{$sum}}</strong></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div> --}}
                        <div class="row">
                            <div class="col-lg-12 text-right">
                                <button onclick="javascript:window.print();" class="btn btn-info bg-info" type="button"> <i class="fa fa-print"></i> Print </button>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
@else

@endif

    
</div>
</div>

@endsection