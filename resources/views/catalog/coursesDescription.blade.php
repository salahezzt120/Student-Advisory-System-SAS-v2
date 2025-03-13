@extends('layouts.app')

@section('title', 'AIU Catalog')

@section('contents')
    <h1 class="mb-0">CSE Course Description</h1>
    <hr />
    <div class="mb-3">
        <a href="/pdfs/CSE_CoursesDescription.pdf" class="btn btn-secondary" target="_blank">Open in New Tab</a>
    </div>
    <br>
    
    <div class="mb-3">
        <iframe src="/pdfs/CSE_CoursesDescription.pdf" style="width: 100%; height: 450px;"></iframe>
    </div>

@endsection
