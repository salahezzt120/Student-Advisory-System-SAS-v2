@extends('layouts.app')

@section('title', 'Registration status')

@section('contents')
    <h1 class="mb-0">Show registration status</h1>
    <hr />
    <form action="{{ route('cassessments.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Problem</label>
                <div class="card">
                    <div class="card-body">
                        {{ $user->problem }}
                    </div>
                </div>
            </div>
            <div class="col mb-3">
                <label class="form-label">Status</label>
                <select name="stutes" class="form-select">
                    <option value="In Progress" {{ $user->stutes == 'In Progress' ? 'selected' : '' }}>In Progress</option>
                    <option value="Done" {{ $user->stutes == 'Done' ? 'selected' : '' }}>Done</option>
                    <option value="Conflict" {{ $user->stutes == 'Conflict' ? 'selected' : '' }}>Conflict</option>
                </select>
            </div>
        </div>

        <div class="row">
            <div class="d-grid">
                <button class="btn btn-warning">Update</button>
            </div>
        </div>
    </form>
@endsection
