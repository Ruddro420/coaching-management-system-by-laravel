@php
$prefix = Request::route()->getPrefix();
$route = Route::current()->getName();
@endphp
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>School Management System </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('admin/images/favicon.png')}}">
    <link rel="stylesheet" href="{{asset('admin/vendor/jqvmap/css/jqvmap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('admin/vendor/chartist/css/chartist.min.css')}} ">
    <link rel="stylesheet" href="{{ asset('admin/vendor/bootstrap-select/dist/css/bootstrap-select.min.css')}} ">
    <link rel="stylesheet" href="{{ asset('admin/css/style.css')}} ">
    <link rel="stylesheet" href="{{ asset('admin/css/skin-2.css')}} ">
    <link href="{{asset('admin/vendor/datatables/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <!-- Pick date -->
    <link rel="stylesheet" href="{{asset('admin/vendor/pickadate/themes/default.css')}}">
    <link rel="stylesheet" href="{{asset('admin/vendor/pickadate/themes/default.date.css')}}">
    {{-- Sweet Alert --}}
    <link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
    @notifyCss
    @include('notify::components.notify')
    <style>
        .notify {
            z-index: 10000 !important;
        }

        #icon-logout {
            display: none;
        }
    </style>
</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="{{route('dashboard')}}" class="brand-logo">
                MBSN Software
                <!--  <img class="logo-abbr" src="images/logo-white.png" alt="">
                <img class="logo-compact" src="images/logo-text-white.png" alt="">
                <img class="brand-title" src="images/logo-text-white.png" alt=""> -->
            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left"></div>
                        <ul class="navbar-nav header-right">
                            <li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                    <img src="https://cdn-icons-png.flaticon.com/512/4086/4086679.png" width="20"
                                        alt="">
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                            viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-log-out">
                                            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                            <polyline points="16 17 21 12 16 7"></polyline>
                                            <line x1="21" y1="12" x2="9" y2="12"></line>
                                        </svg>
                                        <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                                            {{ __('Log Out') }}
                                        </x-dropdown-link>
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="dlabnav">
            <div class="dlabnav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label first">Main Menu</li>
                    <li><a href="{{route('dashboard')}}" aria-expanded="false">
                            <i class="la la-home"></i>
                            <span class="nav-text">Dashboard</span>
                        </a>
                    </li>
                    <li><a class="ai-icon" href="{{route('class.view')}}" aria-expanded="false">
                            <i class="la la-calendar"></i>
                            <span class="nav-text">Add Class</span>
                        </a>
                    </li>
                    <li><a class="ai-icon" href="{{route('course.view')}}" aria-expanded="false">
                            <i class="la la-graduation-cap"></i>
                            <span class="nav-text">Add Subject</span>
                        </a>
                    </li>
                    <li class="nav-label">Teachers</li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="la la-user"></i>
                            <span class="nav-text">Teachers</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{route('teachers.view')}}">All Teachers</a></li>
                            <li><a href="{{route('teachers.add')}}">Add Teachers</a></li>
                        </ul>
                    </li>
                    <li class="nav-label"></li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="la la-users"></i>
                            <span class="nav-text">Students</span>
                        </a>
                        <ul aria-expanded="false">
                            <!--  <li><a href="{{route('students.view')}}">All Students</a></li>
                            <li><a href="{{route('students.add')}}">Add Students</a></li> -->
                            <li><a href="{{route('students.view')}}">All Students</a></li>
                            <li><a target="_blank" href="https://mbsnk.vercel.app/">Addmission</a></li>
                        </ul>
                    </li>
                    <li class="nav-label">Others</li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="la la-users"></i>
                            <span class="nav-text">Staff</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{route('stuff.view')}}">All Staff</a></li>
                            <li><a href="{{route('stuff.add')}}">Add Staff</a></li>
                        </ul>
                    </li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="la la-dollar"></i>
                            <span class="nav-text">Fees</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{route('fees.view')}}">Fees Collection</a></li>
                            <!-- <li><a href="{{route('fees.add')}}">Add Fees</a></li> -->
                            <li><a target="_blank" href="https://mbsnk.vercel.app/payment">Add Fees</a></li>
                            <li><a href="{{route('invoice.search')}}">Fees Receipt</a></li>
                        </ul>
                    </li>
                    <li class="nav-label">Notice</li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="la la-bell-o"></i>
                            <span class="nav-text">Results / Notice</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{route('result.view')}}">View Result / Notice</a></li>
                            <li><a href="{{route('result.add')}}">Add Result / Notice</a></li>
                        </ul>
                    </li>
                    <li class="nav-label">Expense/Salary</li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="la la-bell-o"></i>
                            <span class="nav-text">Expense/Salary</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{route('result.view')}}">View Expense</a></li>
                            <li><a href="{{route('expense.add')}}">Add Expense</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->

        @yield('content')


        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright © Designed &amp; Developed by <a href="../index.htm" target="_blank">Ali Fiad Ruddro</a>
                    2023
                </p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->

        <!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->

    {{-- Sweet Alert CDN --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
        integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>

    <!-- Required vendors -->
    <script src="{{ asset('admin/vendor/global/global.min.js')}} "></script>
    <script src="{{ asset('admin/vendor/bootstrap-select/dist/js/bootstrap-select.min.js')}} "></script>
    <script src="{{ asset('admin/js/custom.min.js')}} "></script>
    <script src="{{ asset('admin/js/dlabnav-init.js')}} "></script>

    <!-- Chart ChartJS plugin files -->
    <script src="{{ asset('admin/vendor/chart.js/Chart.bundle.min.js')}} "></script>

    <!-- Chart piety plugin files -->
    <script src="{{ asset('admin/vendor/peity/jquery.peity.min.js')}} "></script>

    <!-- Chart sparkline plugin files -->
    <script src="{{ asset('admin/vendor/jquery-sparkline/jquery.sparkline.min.js')}} "></script>

    <!-- Demo scripts -->
    <script src="{{ asset('admin/js/dashboard/dashboard-3.js')}} "></script>

    <!-- Datatable -->
    <script src="{{asset('admin/vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/js/plugins-init/datatables.init.js')}}"></script>

    <!-- Svganimation scripts -->
    <script src="{{ asset('admin/vendor/svganimation/vivus.min.js')}} "></script>
    <script src="{{ asset('admin/vendor/svganimation/svg.animation.js')}} "></script>
    <script src="{{ asset('admin/js/styleSwitcher.js')}} "></script>
    <!-- pickdate -->
    <script src="{{asset('admin/vendor/pickadate/picker.js')}}"></script>
    <script src="{{asset('admin/vendor/pickadate/picker.time.js')}}"></script>
    <script src="{{asset('admin/vendor/pickadate/picker.date.js')}}"></script>

    <!-- Pickdate -->
    <script src="{{asset('admin/js/plugins-init/pickadate-init.js')}}"></script>
    {{-- Sweet Alert for before download --}}
    <script>
        $(function() {
            $(document).on('click', '#delete', function(e) {
                e.preventDefault();
                var link = $(this).attr("href");
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = link;
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                    }
                })
            });
        });
    </script>
    @notifyJs

</body>

</html>