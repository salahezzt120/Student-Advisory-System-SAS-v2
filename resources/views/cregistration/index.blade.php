@extends('layouts.app')

@section('title', 'Registration')

@section('contents')
     <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">Registration</h1>
    <a href="{{ route('cregistration.create') }}" class="btn btn-primary">Registration</a>
    </div>
    <hr />

    <!-- Card to display user's problem -->
    <div class="card">
        <div class="card-header">
            User's Note
        </div>
        <div class="card-body">
            @if($user->problem)
                <p>{{ $user->problem }}</p>
            @else
                <p>No problem submitted yet.</p>
            @endif
        </div>
    </div>

@endsection
