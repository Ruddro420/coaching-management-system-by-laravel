@extends('layouts.admin.adminLayout')
@section('content')
<style>
    .card-profile .profile-photo {
    margin-top: 20px!important;
}
</style>
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">

        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>All Results</h4>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0);">Results</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0);">All Results</a></li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="row tab-content">
                    <div id="list-view" class="tab-pane fade active show col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">All Results </h4>
                                <a href="{{route('result.add')}}" class="btn btn-primary">+ Add new</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example3" class="display" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>File</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (is_countable($data) > 0)
                                            @foreach ($data as $key => $value)
                                            <tr>
                                                <td>{{$value->date}}</td>
                                                <td>

                                                    <a target="_blank" href="{{(!empty($value->rFile))?url('admin/result/'.$value->rFile): url('admin/images/profile/small/pic3.jpg')}}" class="btn btn-sm btn-success text-white"><i
                                                        class="la la-arrow-circle-down
                                                        "></i></a>
                                                    </td>
                                                <td>
                                                    <a href="{{route('result.edit' ,$value->id)}}" class="btn btn-sm btn-primary"><i
                                                            class="la la-pencil"></i></a>
                                                    <a href="{{route('result.delete' ,$value->id)}}" id="delete" class="btn btn-sm btn-danger"><i
                                                            class="la la-trash-o"></i></a>
                                                </td>
                                            </tr>
                                            @endforeach
                                            @endif
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