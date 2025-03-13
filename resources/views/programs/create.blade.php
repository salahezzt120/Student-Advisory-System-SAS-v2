@extends('layouts.app')

@section('title', 'Create Program')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

@section('contents')
    <h1 class="mb-0">Add Program</h1>
    <hr />
    <form action="{{ route('programs.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            {{-- <div class="col">
                <input type="text" name="id" class="form-control" placeholder="ID">
            </div> --}}
           <div class="col">
                <input type="text" name="pname" class="form-control" placeholder="Program Name">
            </div>
        </div>
        <div class="row mb-3">


        </div>


        <div class="row">
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>


       
    </form>

@endsection
