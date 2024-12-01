@extends('layouts.master')
@section('content')
    <?php  
        $hour   = date ("G");
        $minute = date ("i");
        $second = date ("s");
        $msg = " Today is " . date ("l, M. d, Y.");

        if ($hour == 00 && $hour <= 9 && $minute <= 59 && $second <= 59) {
            $greet = "Good Morning,";
        } else if ($hour >= 10 && $hour <= 11 && $minute <= 59 && $second <= 59) {
            $greet = "Good Day,";
        } else if ($hour >= 12 && $hour <= 15 && $minute <= 59 && $second <= 59) {
            $greet = "Good Afternoon,";
        } else if ($hour >= 16 && $hour <= 23 && $minute <= 59 && $second <= 59) {
            $greet = "Good Evening,";
        } else {
            $greet = "Welcome,";
        }
    ?>
    <div class="page-wrapper">
        <!-- Page Content -->
        <div class="content container-fluid">
            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">{{ $greet }} Welcome, {{ Session::get('name') }}!</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->
            <div class="row">
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                    <div class="card dash-widget">
                        <div class="card-body"> <span class="dash-widget-icon"><i class="fa fa-cubes"></i></span>
                            <div class="dash-widget-info">
                                <h3>{{$applicationCount}}</h3> <span>Applications</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                    <div class="card dash-widget">
                        <div class="card-body"> <span class="dash-widget-icon"><i class="fa fa-usd"></i></span>
                            <div class="dash-widget-info">
                                <h3>{{$fee}}</h3> <span>Fee</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                    <div class="card dash-widget">
                        <div class="card-body"> <span class="dash-widget-icon"><i class="fa fa-user"></i></span>
                            <div class="dash-widget-info">
                                <h3>{{$uniqueEmailsCount}}</h3> <span>Applicants</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                    <div class="card dash-widget">
                        <div class="card-body"> <span class="dash-widget-icon"><i class="fa fa-user"></i></span>
                            <div class="dash-widget-info">
                                <h3>{{$userCount}}</h3> <span>Users</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6 text-center">
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="card-title">Total Applications</h3>
                                    <div id="bar-charts"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 text-center">
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="card-title">Applications Trend</h3>
                                    <div id="line-charts"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Page Content -->
    </div>
@endsection