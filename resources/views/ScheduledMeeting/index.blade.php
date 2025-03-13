@extends('layouts.app')

@section('title', 'Scheduled Meetings')

@section('contents')
<div class="card">
    <div class="card-body">
        <h2>Scheduled Meetings</h2>

        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Student</th>
                    <th>Meeting Date and Time</th>
                    <th>Notes</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($scheduledMeetings as $meeting)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $meeting->user->name }}</td>
                        <td>{{ \Carbon\Carbon::parse($meeting->meeting_date)->format('Y-m-d H:i') }}</td>
                        <td>{{ $meeting->notes ?? 'No notes provided' }}</td>
                        <td>
                            <!-- Edit Button -->
                            <a href="{{ route('ScheduledMeeting.edit', $meeting->id) }}" class="btn btn-warning btn-sm">Edit</a>

                            <!-- Cancel (Delete) Button -->
                            <form action="{{ route('ScheduledMeeting.destroy', $meeting->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Cancel</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
