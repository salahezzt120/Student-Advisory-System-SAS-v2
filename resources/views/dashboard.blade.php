@extends('layouts.app')

@section('title', 'Dashboard')

@section('contents')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        {{-- <h1 class="h3 mb-0 text-gray-800">Dashboard</h1> --}}
    </div>

    <!-- Content Row -->
    <div class="row">
        @if(Auth::user()->role_as == 1) <!-- Admin -->
            <!-- Total Users Card -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Users</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalUsers }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Courses Card -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Courses</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalCourses }}</div>
                                
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-book fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Additional Information Card -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Additional Information</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">Welcome to the Dashboard</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-info-circle fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @elseif(Auth::user()->role_as == 0) <!-- Student -->
            <!-- Student Welcome Message -->
            <div class="col-md-12 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h4>Welcome, {{ Auth::user()->name }}!</h4>
                        <p>Here is your student dashboard. Below are some important announcements and information:</p>
                    </div>
                </div>
            </div>

            <!-- Important Student Information -->
            <div class="col-md-12 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5>Upcoming Deadlines:</h5>
                        <ul>
                            <li><strong>Assignments:</strong> Submit your assignments by the 15th of March.</li>
                            <li><strong>Exams:</strong> The next exams start on the 1st of April.</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- College Rules Section -->
            <div class="col-md-12 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5>College Rules:</h5>
                        <ul>
                            <li>Respect all staff and faculty members.</li>
                            <li>Be punctual for all classes and meetings.</li>
                            <li>Follow the college's dress code.</li>
                            <li>Maintain a positive and respectful attitude towards peers.</li>
                        </ul>
                    </div>
                </div>
            </div>
        @endif
    </div>
    <!-- /.row -->
@endsection
