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
                                <!-- {{ route('submitResult') }} -->
                                    <form method="POST" action="" class="space-y-6">
                                        @csrf
                                        {{-- examination type  --}}
                                        <div class="mb-4">
                                            <label for="examination" class="block text-sm font-semibold">Examination Type</label>
                                            <select id="examination" name="examination" class="border w-full p-2" required>
                                                <option value="Midterm">Midterm</option>
                                                <option value="Final">Final</option>
                                                <option value="Practical">Practical</option>
                                            </select>
                                        </div>
                                        <!-- Roll Number Input -->
                                        <div>
                                            <label for="roll" class="block text-sm font-medium text-gray-700 mb-1">Roll Number</label>
                                            <input type="text" id="roll" name="roll" value="{{ old('roll') }}"
                                                class="block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                                placeholder="Enter roll number" />
                                            @error('roll')
                                            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Class Dropdown -->
                                        <div>
                                            <label for="class" class="block text-sm font-medium text-gray-700 mb-1">Class</label>
                                            <select id="class" name="class"
                                                class="block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                                <option value="" disabled selected>Select Class</option>
                                                @foreach ($data as $class)
                                                <option value="{{ $class['class'] }}">{{ $class['class'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>


                                        <!-- Subject Input Fields -->
                                        <div id="subjects-container" class="space-y-4">
                                            <!-- Subject input fields will be appended dynamically here -->
                                        </div>

                                        <!-- Submit Button -->
                                        <div class="flex justify-end">
                                            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700 shadow">
                                                Submit
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        @endsection