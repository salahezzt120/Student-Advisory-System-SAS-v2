@extends('layouts.app')

@section('title', 'Profile')

@section('contents')
    <h1 class="mb-0">Profile</h1>
    <hr />

    <form action="{{ route('Students.store') }}" method="POST" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-12 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Profile Settings</h4>
                    </div>
                    <div class="row" id="res"></div>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <label class="labels">Name</label>
                            <input type="text" name="name" disabled class="form-control" placeholder="First Name" value="{{ $user->name }}">
                        </div>
                        <div class="col-md-6">
                            <label class="labels">Email</label>
                            <input type="text" name="email" disabled class="form-control" value="{{ $user->email }}" placeholder="Email">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <label class="labels">ID</label>
                            <input type="text" name="AIUId" id="AIUId" disabled class="form-control" placeholder="ID" value={{ $user->AIU_ID }}>
                        </div>
                        <div class="col-md-6">
                            <label class="labels">CGPA</label>
                            <input type="text" name="gpa" id="gpa" disabled class="form-control" value={{ $user->gpa }} placeholder="CGPA">
                        </div>
                    </div>

                    <div class="mt-5 text-center"><button id="btn"  class="btn btn-primary profile-button" type="submit">Save Profile</button></div>
                </div>
            </div>
        </div>
    </form>
@endsection
