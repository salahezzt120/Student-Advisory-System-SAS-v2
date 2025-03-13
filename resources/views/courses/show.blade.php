@extends('layouts.app')

@section('title', 'Show Course')

@section('contents')
    <h1 class="mb-0">Detail Course</h1>
    <hr />
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Course Code</label>
            <input type="text" name="title" class="form-control" placeholder="Course Code" value="{{ $courses->code }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Course</label>
            <input type="text" name="price" class="form-control" placeholder="Course Name" value="{{ $courses->cname }}" readonly>
        </div>
    </div>
    <div class="row">

    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Created At</label>
            <input type="text" name="created_at" class="form-control" placeholder="Created At" value="{{ $courses->created_at }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Updated At</label>
            <input type="text" name="updated_at" class="form-control" placeholder="Updated At" value="{{ $courses->updated_at }}" readonly>
        </div>
    </div>
@endsection
