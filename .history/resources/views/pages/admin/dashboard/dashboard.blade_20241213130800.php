@extends('layouts.admin.adminLayout')
@section('content')
<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">

        <div class="row">
            <div class="col-xl-3 col-xxl-3 col-sm-6">
                <div class="widget-stat card bg-primary overflow-hidden">
                    <div class="card-header">
                        <h3 class="card-title text-white">Total Students</h3>
                        <h5 class="text-white mb-0"><i class="fa fa-caret-up"></i> {{$totalStudent -1}}</h5>
                    </div>
                    <div class="card-body text-center mt-3">
                        <div class="ico-sparkline">
                            <div id="sparkline12"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-xxl-3 col-sm-6">
                <div class="widget-stat card bg-success overflow-hidden">
                    <div class="card-header">
                        <h3 class="card-title text-white">Total Teachers</h3>
                        <h5 class="text-white mb-0"><i class="fa fa-caret-up"></i> {{$totalTeacher}}</h5>
                    </div>
                    <div class="card-body text-center mt-4 p-0">
                        <div class="ico-sparkline">
                            <div id="spark-bar-2"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-xxl-3 col-sm-6">
                <div class="widget-stat card bg-secondary overflow-hidden">
                    <div class="card-header pb-3">
                        <h3 class="card-title text-white">Total Pending Fees</h3>
                        <h5 class="text-white mb-0"><i class="fa fa-caret-up"></i> {{$pendingFees}}</h5>
                    </div>
                    <div class="card-body p-0 mt-2">
                        <div class="px-4"><span class="bar1"
                                data-peity='{ "fill": ["rgb(0, 0, 128)", "rgb(7, 135, 234)"]}'>6,2,8,4,-3,8,1,-3,6,-5,9,2,-8,1,4,8,9,8,2,1</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-xxl-3 col-sm-6">
                <div class="widget-stat card bg-danger overflow-hidden">
                    <div class="card-header pb-3">
                        <h3 class="card-title text-white">Fees Collection</h3>
                        <h5 class="text-white mb-0"><i class="fa fa-caret-up"></i> {{$totalFees}} ৳</h5>
                    </div>
                    <div class="card-body p-0 mt-1">
                        <span class="peity-line-2" data-width="100%">7,6,8,7,3,8,3,3,6,5,9,2,8</span>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-xxl-3 col-sm-6">
                <div class="widget-stat card bg-danger overflow-hidden">
                    <div class="card-header pb-3">
                        <h3 class="card-title text-white">Total Admission</h3>
                        <h5 class="text-white mb-0"><i class="fa fa-caret-up"></i> {{$totalAdmissionFees}} ৳</h5>
                    </div>
                    <div class="card-body p-0 mt-1">
                        <span class="peity-line-2" data-width="100%">7,6,8,7,3,8,3,3,6,5,9,2,8</span>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-xxl-6 col-lg-6 col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Our Classes</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table header-border table-hover verticle-middle">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Class Name</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($classList as $data => $item)
                                    <tr>
                                        <th>{{$data + 1}}</th>
                                        <td>{{$item->class}}</td>
                                    </tr>
                                    @endforeach
                                   
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-xxl-6 col-lg-6 col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Our Courses</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table header-border table-hover verticle-middle">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Course Name</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($couseList as $data => $item)
                                    <tr>
                                        <th>{{$data + 1}}</th>
                                        <td> {{$item->course}}</td>
                                    </tr>
                                    @endforeach
                                   
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Our Teachers List </h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-sm mb-0 table-striped">
                                <thead>
                                    <tr>
                                        <th class="px-5 py-3">Name</th>
                                        <th class="py-3">Department</th>
                                        <th class="py-3">Gender</th>
                                        <th class="py-3">Education</th>
                                        <th class="py-3">Joining Date</th>
                                    </tr>
                                </thead>
                                <tbody id="customers">
                                    @foreach ($teacherList as $value)
                                    <tr class="btn-reveal-trigger">
                                        <td class="p-3">
                                            <a href="javascript:void(0);">
                                                <div class="media d-flex align-items-center">
                                                    <div class="avatar avatar-xl mr-2">
                                                        <img class="" width="35"
                                                        src="{{(!empty($value->pImg))?url('admin/teachers/'.$value->pImg): url('admin/images/profile/small/pic3.jpg')}}" alt="">
                                                    </div>
                                                    <div class="media-body">
                                                        <h5 class="mb-0 fs--1">{{$value->fName}} {{$value->lName}}</h5>
                                                    </div>
                                                </div>
                                            </a>
                                        </td>
                                        <td class="py-2">{{$value->dept}}</td>
                                        <td class="py-2">{{$value->gender}}</td>
                                        <td class="py-2">{{$value->education}}</td>
                                        <td class="py-2">{{$value->jDate}}</td>
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
<!--**********************************
            Content body end
***********************************-->

@endsection