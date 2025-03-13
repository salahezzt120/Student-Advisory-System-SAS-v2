@extends('layouts.app')

@section('title', 'Advising Meeting Details')

@section('contents')
    <h1 class="mb-0">Advising Meeting Details</h1>
    <hr />
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Student Name</label>
            <input type="text" class="form-control" value="{{ optional($advisingMeeting->user)->name }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Meeting Date and Time</label>
            <input type="text" class="form-control" value="{{ $advisingMeeting->meeting_datetime }}" readonly>
        </div>
    </div>

    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Created At</label>
            <input type="text" class="form-control" value="{{ $advisingMeeting->created_at }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Updated At</label>
            <input type="text" class="form-control" value="{{ $advisingMeeting->updated_at }}" readonly>
        </div>
    </div>
@endsection
