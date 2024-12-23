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
                    <h4>All Users</h4>
                </div>
            </div>
           <!--  <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0);">Stuffs</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0);">All Stuffs</a></li>
                </ol>
            </div> -->
        </div>

        <div class="row">
            <!-- <div class="col-lg-12">
                <ul class="nav nav-pills mb-3">
                    <li class="nav-item"><a href="#list-view" data-toggle="tab"
                            class="nav-link btn-primary mr-1 show active">List View</a></li>
                    <li class="nav-item"><a href="#grid-view" data-toggle="tab" class="nav-link btn-primary">Grid
                            View</a></li>
                </ul>
            </div> -->
            <div class="col-lg-12">
                <div class="row tab-content">
                    <div id="list-view" class="tab-pane fade active show col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">All Users </h4>
                               <!--  <a href="{{route('stuff.add')}}" class="btn btn-primary">+ Add new</a> -->
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example3" class="display" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Password</th>
                                                <th>User Role</th>
                                                <th>Email</th>
                                                <th>Joining Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (is_countable($data) > 0)
                                            @foreach ($data as $key => $value)
                                            <tr>
                                                <td><img class="" width="35"
                                                        src="{{(!empty($value->pImg))?url('admin/stuff/'.$value->pImg): url('admin/images/profile/small/pic3.jpg')}}" alt="">
                                                </td>
                                                <td>{{$value->fName}} {{$value->lName}}</td>
                                                <td>{{$value->gender}}</td>
                                                <td>{{$value->education}}</td>
                                                <td><a href="javascript:void(0);"><strong>{{$value->mobile}}</strong></a>
                                                </td>
                                                <td><a href="javascript:void(0);"><strong>{{$value->email}}</strong></a>
                                                </td>
                                                <td>{{$value->jDate}}</td>
                                                <td>
                                                    <a href="{{route('stuff.edit' ,$value->id)}}" class="btn btn-sm btn-primary"><i
                                                            class="la la-pencil"></i></a>
                                                    <a href="{{route('stuff.delete' ,$value->id)}}" id="delete" class="btn btn-sm btn-danger"><i
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
                    <div id="grid-view" class="tab-pane fade col-lg-12">
                        <div class="row">
                            @if (is_countable($data) > 0)
                            @foreach ($data as $key => $value)
                            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                <div class="card card-profile">
                                    <div class="card-header justify-content-end pb-0">
                                        <div class="dropdown">
                                            <button class="btn btn-link" type="button" data-toggle="dropdown">
                                                <span class="dropdown-dots fs--1"></span>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right border py-0">
                                                <div class="py-2">
                                                    <a class="dropdown-item" href="{{route('stuff.edit' ,$value->id)}}">Edit</a>
                                                    <a class="dropdown-item text-danger"
                                                        href="{{route('stuff.delete' ,$value->id)}}" id="delete">Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                 
                                    <div class="card-body pt-2">
                                        <div class="text-center">
                                            <div class="profile-photo">
                                                <img src="{{(!empty($value->pImg))?url('admin/stuff/'.$value->pImg): url('admin/images/profile/small/pic3.jpg')}}" width="100%"
                                                    class="img-fluid" alt="">
                                            </div>
                                            <h3 class="mt-4 mb-1">{{$value->fName}} {{$value->lName}}</h3>
                                            <p class="text-muted">{{$value->education}}</p>
                                            <ul class="list-group mb-3 list-group-flush">
                                                <li class="list-group-item px-0 d-flex justify-content-between">
                                                    <span class="mb-0">Date of birth :</span><strong>{{$value->bDate}}</strong>
                                                </li>
                                                <li class="list-group-item px-0 d-flex justify-content-between">
                                                    <span class="mb-0">Gender :</span><strong>{{$value->gender}}</strong>
                                                </li>
                                                <li class="list-group-item px-0 d-flex justify-content-between">
                                                    <span class="mb-0">Phone No. :</span><strong>{{$value->mobile}}</strong>
                                                </li>
                                                <li class="list-group-item px-0 d-flex justify-content-between">
                                                    <span class="mb-0">Email:</span><strong>{{$value->email}}</strong>
                                                </li>
                                                <li class="list-group-item px-0 d-flex justify-content-between">
                                                    <span class="mb-0">Address:</span><strong>{{$value->address}}</strong>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>     
                                </div>
                            </div>
                            @endforeach
                            @endif
                </div>
            </div>
        </div>

    </div>
</div>

@endsection