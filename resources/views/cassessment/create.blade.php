@extends('layouts.app')

@section('title', 'Add Student')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

@section('contents')
    <h1 class="mb-0">Add Students</h1>
    <hr />
    <form action="{{ route('cassessments.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            <div class="row" style="box-sizing: border-box; margin: 10px 12px">
                    <div class="input-group">
                        <table class="table table-bordered" id="table" name="table">





                            <tr>


                                <td><select name="inputs[0]['students']" id="students" class="input-group-text" id="grid-state">
                                        <option value="">--Select Student--</option>
                                    {{-- <option value="">--Select Program--</option>
                                    @foreach ($programs as $program)
                                        <option value="{{ $program->id }}">{{ $program->pname }}</option>
                                    @endforeach --}}
          
                                    </select></td>

            
             
                                <td><button type="button" name="add" id="add" class="btn btn-success"
                                        onclick="addmore()">Add More</button></td>

                            </tr>
                        </table>


                    </div>


        <div class="row">
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>


       
    </form>






        <script type="text/javascript">


        $(document).ready(function () {
            $('#add').click(function () {
                var i = '';
             

                i += `<tr>`;
                i += `<td><select id="" name="[students]" class="input-group-text" id="grid-state">
                        <option value="">--Select Student--</option>
                    </select></td>`;
                i +=
                    `<td><button type="button" class="btn btn-danger remove-table-row">remove</button></td>`;
                i += ` </tr>`;
                $('#table').append(i);
            })
        });

        $(document).on('click', '.remove-table-row', function() {
            $(this).parents('tr').remove();
        });
    </script>

@endsection
