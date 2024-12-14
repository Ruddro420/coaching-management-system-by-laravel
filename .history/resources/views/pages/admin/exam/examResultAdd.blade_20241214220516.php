@extends('layouts.admin.adminLayout')
@section('content')
<style>
    .card-profile .profile-photo {
        margin-top: 20px !important;
    }

    table.dataTable.no-footer {
        border-bottom: 0px;
    }
</style>
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">

        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>All Class</h4>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0);">Exam</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0);">All Exam</a></li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="row tab-content">
                    <div id="list-view" class="tab-pane fade active show col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">All Exam </h4>
                                <a href="{{route('exam.add')}}" class="btn btn-primary">+ Add new</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Class</th>
                                                <th>Subjects</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $class => $subjects)
                                            <tr>
                                                <td>{{ $class }}</td>
                                                <td>
                                                    @foreach ($subjects as $subject)
                                                    <span class="badge badge-info">{{ $subject['course'] }}</span>
                                                    @endforeach
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

        <script>
            function filterByClass(select) {
                const selectedClass = select.value;
                const rows = document.querySelectorAll("tbody tr");

                rows.forEach(row => {
                    const className = row.querySelector("td:first-child").textContent.trim();
                    if (selectedClass === "all" || className === selectedClass) {
                        row.style.display = "";
                    } else {
                        row.style.display = "none";
                    }
                });
            }
        </script>