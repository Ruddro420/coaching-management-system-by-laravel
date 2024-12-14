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
    <div class="container-fluid">
        <!-- Page Header -->
        <div class="row page-titles mx-0">
            <div class="col-sm-6">
                <h4 class="mb-0">All Class</h4>
            </div>
            <div class="col-sm-6 d-flex justify-content-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Exam</a></li>
                    <li class="breadcrumb-item active">All Exam</li>
                </ol>
            </div>
        </div>

        <!-- Card -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="card-title">All Exam</h4>
                        <a href="{{ route('exam.add') }}" class="btn btn-primary">+ Add New</a>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="" class="needs-validation" novalidate>
                            @csrf

                            <!-- Examination Type -->
                            <div class="mb-3">
                                <label for="examination" class="form-label">Examination Type</label>
                                <select id="examination" name="examination" class="form-select" required>
                                    <option value="Midterm">Midterm</option>
                                    <option value="Final">Final</option>
                                    <option value="Practical">Practical</option>
                                </select>
                                <div class="invalid-feedback">Please select an examination type.</div>
                            </div>

                            <!-- Roll Number Input -->
                            <div class="mb-3">
                                <label for="roll" class="form-label">Roll Number</label>
                                <input type="text" id="roll" name="roll" value="{{ old('roll') }}"
                                    class="form-control" placeholder="Enter roll number" required>
                                @error('roll')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                                <div class="invalid-feedback">Please provide a roll number.</div>
                            </div>

                            <!-- Class Dropdown -->
                            <div class="mb-3">
                                <label for="class" class="form-label">Class</label>
                                <select id="class" name="class" class="form-select" required>
                                    <option value="" disabled selected>Select Class</option>
                                    @foreach ($data as $class)
                                        <option value="{{ $class['class'] }}">{{ $class['class'] }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">Please select a class.</div>
                            </div>

                            <!-- Subject Input Fields -->
                            <div id="subjects-container" class="mb-4">
                                <!-- Subject fields will be appended here dynamically -->
                            </div>

                            <!-- Submit Button -->
                            <div class="text-end">
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script>
            // Bootstrap validation
            (() => {
                'use strict';
                const forms = document.querySelectorAll('.needs-validation');
                Array.from(forms).forEach(form => {
                    form.addEventListener('submit', event => {
                        if (!form.checkValidity()) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            })();

            // Pass PHP class data to JavaScript
            const classData = @json($data);

            // Handle dynamic subjects based on class selection
            document.getElementById('class').addEventListener('change', function () {
                const selectedClass = this.value;
                const subjectsContainer = document.getElementById('subjects-container');

                // Clear previous subject fields
                subjectsContainer.innerHTML = '';

                // Find the selected class's subjects
                const selectedClassData = classData.find(cls => cls.class === selectedClass);

                if (selectedClassData) {
                    selectedClassData.subjects.forEach(subject => {
                        // Create input group for each subject
                        const fieldWrapper = document.createElement('div');
                        fieldWrapper.className = 'mb-3';

                        // Subject Label
                        const label = document.createElement('label');
                        label.className = 'form-label';
                        label.textContent = `${course} Marks`;

                        // Subject Input
                        const input = document.createElement('input');
                        input.type = 'number';
                        input.name = `marks[${course}]`;
                        input.placeholder = `Enter marks for ${course}`;
                        input.className = 'form-control';
                        input.min = 1;
                        input.max = 100;
                        input.required = true;

                        // Append elements
                        fieldWrapper.appendChild(label);
                        fieldWrapper.appendChild(input);
                        subjectsContainer.appendChild(fieldWrapper);
                    });
                }
            });
        </script>
    </div>
</div>
@endsection
