@extends('layouts.app')

@section('title', 'Registration status')

@section('contents')
    <h1 class="mb-0">Status</h1>
    <hr />
    <form action="{{ route('cregistration.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            <div>
                <select name="pid" id="pid" onchange="programchange()"
                        class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        id="grid-state">
                    <option value="">--Select Program--</option>
                    @foreach ($programs as $program)
                        <option value="{{ $program->id }}">{{ $program->pname }}</option>
                    @endforeach
                </select>
                <br>
            </div>
          
            <div><br></div>

            <div id="courseList" class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-primary">
                        <tr>
                            <th>Course Code</th>
                            <th>Course Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Course list will be displayed here -->
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col">
                <textarea name="problem" class="form-control" placeholder="Enter your problem"></textarea>
            </div>
        </div>

        <div class="row">
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection

@section('pagespecifiscripts')
    <script type="text/javascript">
        function programchange() {
            var id = $('#pid').val();

            // Clear the course list HTML
            $("#courseList tbody").html("");

            // AJAX request
            $.ajax({
                url: "{{ url('cregistration/showcourses') }}/" + id,
                type: 'get',
                dataType: 'json',
                success: function(response) {
                    var coursesData = response['coursesData'];
                    var coursesDataLength = 0;
                    var courseListHTML = ""; // Initialize the table HTML

                    if (coursesData['data'] != null) {
                        coursesDataLength = coursesData['data'].length;
                        // Sort the courses by code
                        coursesData['data'].sort((a, b) => a.code.localeCompare(b.code));
                    }

                    if (coursesDataLength > 0) {
                        for (var i = 0; i < coursesDataLength; i++) {
                            var code = coursesData['data'][i].code;
                            var name = coursesData['data'][i].cname;
                            courseListHTML += "<tr><td>" + code + "</td><td>" + name + "</td></tr>"; // Add each course as a table row
                        }
                    } else {
                        courseListHTML += "<tr><td colspan='2'>No courses available</td></tr>"; // Display a message if no courses are available
                    }

                    $("#courseList tbody").html(courseListHTML); // Display the generated course list within the table body
                }
            });
        }
    </script>
@endsection
