@extends('layouts.app')

@section('title', 'Edit Meeting')

@section('contents')
    <h1 class="mb-0">Edit Meeting</h1>
    <hr />
    <form action="{{ route('ameeting.update', $advisingMeeting->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row mb-3">
           <div class="col">
    <input type="text" class="form-control" value="{{ $advisingMeeting->user->name }}" readonly>
    <input type="hidden" name="student" value="{{ $advisingMeeting->user_id }}">
</div>

            <div class="col">
                <input type="datetime-local" name="meeting_datetime" class="form-control" value="{{ date('Y-m-d\TH:i', strtotime($advisingMeeting->meeting_datetime)) }}">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <textarea name="notes" class="form-control" placeholder="Meeting Notes">{{ $advisingMeeting->notes }}</textarea>
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
    </form>
@endsection
