@extends('layouts.app')

@section('title', 'Home')

@section('contents')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">List Of Courses</h1>
        <a href="{{ route('courses.create') }}" class="btn btn-primary">Add Course</a>
    </div>
    <hr />
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif
    <div class="table-responsive">
        <table class="table table-hover">
            <thead class="table-primary">
                <tr>
                    <th>#</th>
                    <th>Code</th>
                    <th>Course Name</th>
                    <th>Programs</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if($courses->count() > 0)
                    @php $count = 0; @endphp
                    @foreach($courses as $course)
                        <tr>
                            <td class="align-middle">{{ ++$count }}</td>
                            <td class="align-middle">{{ $course->code }}</td>
                            <td class="align-middle">{{ $course->cname }}</td>
                            <td class="align-middle">
                                @if ($course->cprogram->count() > 1)
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#programModal{{ $course->id }}">Show Programs</button>
                                    <div class="modal fade" id="programModal{{ $course->id }}" tabindex="-1" role="dialog" aria-labelledby="programModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="programModalLabel">Programs for Course: {{ $course->cname }}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <ul>
                                                        @foreach ($course->cprogram as $program)
                                                            <li>{{ $program->pname }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <ul class="list-unstyled">
                                        @foreach ($course->cprogram as $program)
                                            <li>{{ $program->pname }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                            </td>
                            <td class="align-middle">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="{{ route('courses.show', $course->id) }}" type="button" class="btn btn-secondary">Detail</a>
                                    <a href="{{ route('courses.edit', $course->id)}}" type="button" class="btn btn-warning">Edit</a>
                                    <form action="{{ route('courses.destroy', $course->id) }}" method="POST" class="p-0" onsubmit="return confirm('Delete?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td class="text-center" colspan="5">No courses Added</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
@endsection
