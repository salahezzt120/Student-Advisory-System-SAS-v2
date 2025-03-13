@extends('layouts.app')

@section('title', 'List Of Scheduled Meetings')

@section('contents')
<div class="d-flex align-items-center justify-content-between">
    <h1 class="mb-0">List Of Scheduled Meetings</h1>
    <a href="{{ route('ameeting.create') }}" class="btn btn-primary">Schedule Meeting</a>
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
                <th>Student Name</th>
                <th>Scheduled Meeting</th>
                <th>Notes</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @if($AdvisingMeeting->count() > 0)
            @foreach($AdvisingMeeting as $meeting)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $meeting->user->name }}</td>
                <td>{{ $meeting->meeting_datetime }}</td>
                <td>{{ $meeting->notes }}</td>
                <td>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        {{-- <a href="{{ route('ameeting.show', $meeting->id) }}" class="btn btn-secondary">Detail</a> --}}
                        <a href="{{ route('ameeting.edit', $meeting->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('ameeting.destroy', $meeting->id) }}" method="POST" class="btn btn-danger p-0" onsubmit="return confirm('Delete?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
            @else
            <tr>
                <td colspan="5" class="text-center">No meetings scheduled</td>
            </tr>
            @endif
        </tbody>
    </table>
</div>
@endsection
