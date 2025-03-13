@extends('layouts.app')

@section('title', 'Schedule Meeting')

@section('contents')
<div class="card">
    <div class="card-body">
        <h2>Schedule a Meeting</h2>

        <!-- Display Validation Errors -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <form action="{{ route('ameeting.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="student">Select Student</label>
                <select class="form-control" name="student" id="student" required>
                    <option value="">-- Select Student --</option>
                    @foreach($students as $student)
                        <option value="{{ $student->id }}" {{ old('student') == $student->id ? 'selected' : '' }}>{{ $student->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="meeting_date">Meeting Date and Time</label>
                <input type="datetime-local" class="form-control" name="meeting_date" id="meeting_date" value="{{ old('meeting_date') }}" required />
            </div>

            <div class="form-group">
                <label for="notes">Meeting Notes</label>
                <textarea class="form-control" name="notes" id="notes">{{ old('notes') }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection
