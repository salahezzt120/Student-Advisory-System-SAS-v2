@extends('layouts.app')

@section('title', 'HIM Catalog')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>


@section('contents')
<div class="d-flex align-items-center justify-content-between">
    <h1 class="mb-0">Study Plans</h1>
    <a href="{{ route('catalog.coursesDescription') }}" class="btn btn-secondary btn-lg">Course Description</a>
</div>

    <hr />


    <div class="row mb-3">
        <div class="col">
            <select id="programSelect" class="form-control">
                <option value="">-- Select Program --</option>
                <option value="AIE">AIE</option>
                <option value="AIS">AIS</option>
                <option value="CyberSecurity">Cyber Security</option>
                <option value="SWE">SWE</option>
            </select>
        </div>
    </div>

    <div id="pdfContainer" class="mb-3" style="display: none;">
        <iframe id="pdfViewer" src="" style="width: 100%; height: 500px;"></iframe>
    </div>

    <script>
        function showPdf(program) {
            var pdfUrl = '/pdfs/' + program + '.pdf'; 
            $('#pdfViewer').attr('src', pdfUrl);
            $('#pdfContainer').show();
        }

        $('#programSelect').change(function() {
            var selectedProgram = $(this).val();
            if (selectedProgram) {
                showPdf(selectedProgram);
            } else {
                $('#pdfContainer').hide();
            }
        });
    </script>
@endsection
