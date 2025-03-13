@extends('layouts.app')

@section('title', 'Edit Program')

@section('contents')
    <h1 class="mb-0">Edit Program</h1>
    <hr />
    <form action="{{ route('programs.update', $programs->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Program Name</label>
                <input type="text" name="pname" class="form-control" placeholder="Program Name" value="{{ $programs->pname }}" >
            </div>

        </div>
        <div class="row">

        </div>
        <div class="row">
            <div class="d-grid">
                <button class="btn btn-warning">Update</button>
            </div>
        </div>
    </form>
@endsection
