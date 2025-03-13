@extends('layouts.app')

@section('title', 'Your Scheduled Meetings')

@section('contents')
<div class="card">
    <div class="card-body">
        <h2>Your Scheduled Meetings</h2>

        @if($scheduledMeetings->isEmpty())
            <p>You have no scheduled meetings at the moment.</p>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Meeting Date and Time</th>
                        <th>Notes</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($scheduledMeetings as $meeting)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ \Carbon\Carbon::parse($meeting->meeting_datetime)->format('Y-m-d H:i') }}</td>
                            <td>{{ $meeting->notes ?? 'No notes provided' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>
@endsection
