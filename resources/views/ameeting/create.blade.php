@extends('layouts.app')

@section('title', 'Schedule Meeting')

@section('contents')
    <h1 class="mb-0">Schedule Meeting</h1>
    <hr />
    <form action="{{ route('ameeting.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            <div class="col">
                <select name="student" class="form-control">
                    <option value="">-- Select Student --</option>
                    @foreach($students as $student)
                    <option value="{{ $student->id }}">{{ $student->name }}</option>
                @endforeach
                </select>
            </div>
            <div class="col">
                <input type="datetime-local" name="meeting_datetime" class="form-control" placeholder="Date and Time">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <textarea name="notes" class="form-control" placeholder="Meeting Notes"></textarea>
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection
