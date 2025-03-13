<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Include your head content here -->
</head>
<body id="page-top">
    <div id="wrapper">
        <!-- Sidebar -->
        @if (Auth::check())
            @if (Auth::user()->isAdmin())
                @include('layouts.sidebar_admin')
            @else
                @include('layouts.sidebar_user')
            @endif
        @endif

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <!-- Include your content here -->
            </div>
        </div>
    </div>
</body>
</html>