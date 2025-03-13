@extends('layouts.app')

@section('title', 'Home')

@section('contents')
    <div class="d-flex align-items-center justify-content-between">
        <h2 class="mb-0">List Of Students</h2>
        <a class="btn btn-success" href="{{ route('cassessments.export') }}">Export data</a>
    </div>
    <hr />
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif

    <!-- Add the new form for filtering -->
    <form action="{{ route('cassessments') }}" method="GET" class="mb-3">
        <div class="row">
            <div class="col-md-4">
                <label for="AIU_ID" class="form-label">Enter AIU ID:</label>
                <input type="text" name="AIU_ID" id="AIU_ID" class="form-control" placeholder="Enter AIU ID">
            </div>
        </div>
        <div class="mt-3">
            <button type="submit" class="btn btn-primary">Apply Filters</button>
            <a href="{{ route('cassessments') }}" class="btn btn-secondary">Clear Filters</a>
        </div>
    </form>

    <div class="table-responsive">
        <table class="table table-hover">
            <thead class="table-primary">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>ID</th>
                    <th>CGPA</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if($usersData->count() > 0)
                    @foreach($usersData as $user)
                        <tr>
                            <td class="align-middle">{{ $loop->iteration }}</td>
                            <td class="align-middle">{{ $user->name }}</td>
                            <td class="align-middle">{{ $user->AIU_ID }}</td>
                            <td class="align-middle">{{ $user->gpa }}</td>
                            <td class="align-middle">{{ $user->stutes }}</td>
                            <td class="align-middle">
                                <div class="btn-group" role="group" aria-label="User Actions">
                                    {{-- <a href="{{ route('cassessments.show', $user->id) }}" class="btn btn-info">Details</a> --}}
                                    <a href="{{ route('cassessments.edit', $user->id) }}" class="btn btn-warning">Show registration status</a>
                                    
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td class="text-center" colspan="6">No Students Found</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
@endsection
