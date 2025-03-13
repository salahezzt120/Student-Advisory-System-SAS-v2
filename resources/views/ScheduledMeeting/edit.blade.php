@extends('layouts.app')

@section('title', 'Edit Meeting')

@section('contents')
<div class="card">
    <div class="card-body">
        <h2>Edit Meeting</h2>
        
        <form action="{{ route('ameeting.update', $advisingMeeting->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label for="student">Select Student</label>
                <select class="form-control" name="student" id="student" required>
                    <option value="">-- Select Student --</option>
                    @foreach($students as $student)
                        <option value="{{ $student->id }}" {{ $student->id == $advisingMeeting->user_id ? 'selected' : '' }}>
                            {{ $student->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="meeting_datetime">Meeting Date and Time</label>
                <input type="datetime-local" class="form-control" name="meeting_datetime" id="meeting_datetime" value="{{ \Carbon\Carbon::parse($advisingMeeting->meeting_datetime)->format('Y-m-d\TH:i') }}" required />
            </div>

            <div class="form-group">
                <label for="notes">Meeting Notes</label>
                <textarea class="form-control" name="notes" id="notes">{{ $advisingMeeting->notes }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection
