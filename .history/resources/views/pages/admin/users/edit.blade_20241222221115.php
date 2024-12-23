@extends('layouts.admin.adminLayout')
@section('content')
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">

        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Edit Users</h4>
                </div>
            </div>
            <!--   <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active"><a href="edit-Teacher.html">Stuffs</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Edit Stuffs</a></li>
                    </ol>
                </div> -->
        </div>

        <div class="row">
            <div class="col-xl-12 col-xxl-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Basic Info</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('user.update',$data->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group mb-4">
                                        <label class="form-label">Status</label>
                                        <select name="status" class="form-control" required>
                                            <option value="Fess Type">Status Type</option>
                                            <option
                                                value="0"
                                                {{$data->verified == '0' ? 'selected' : ''}}>
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