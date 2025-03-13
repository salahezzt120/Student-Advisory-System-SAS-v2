@extends('layouts.app')

@section('title', 'Meeting Details')

@section('contents')
<div class="card">
    <div class="card-body">
        <h2>Meeting Details</h2>
        
        <p><strong>Student:</strong> {{ $advisingMeeting->user->name }}</p>
        <p><strong>Meeting Date and Time:</strong> {{ $advisingMeeting->meeting_datetime }}</p>
        <p><strong>Notes:</strong> {{ $advisingMeeting->notes }}</p>
        
        <a href="{{ route('ameeting.index') }}" class="btn btn-secondary">Back to Meetings</a>
    </div>
</div>
@endsection
