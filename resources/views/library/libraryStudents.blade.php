@extends('layouts.master')

@section('content')


    <div class="container-fluid mt-3">
        <div class="form-row">
            <div class="col-sm-2">
                <label class="mt-2">Enrolled Date:</label>
            </div>
            <div class="col-sm-2  ">
                <select class="form-control" id="enrDate">
                    <option value="">
                        SELECT DATE
                    </option>
                    @foreach($result as $res)
                        <option value=" {{$res->enrolledDate}}">
                            {{$res->enrolledDate}}
                        </option>
                    @endforeach

                </select>
            </div>

            <div class="col-sm-2 ml-1">
                <label class="mt-2">Select Faculty:</label>
            </div>

            <div class="col-sm-mr-1">
                <select id="facultySelect" disabled class="form-control">
                    <option value="">
                        SELECT FACULTY
                    </option>
                    @foreach($faculty as $fac)
                        <option value="{{$fac->id}}">{{$fac->facultyName}}</option>
                    @endforeach

                </select>

            </div>

            <div class="col-sm-2 ">
                <label class="mt-2">Select Course:</label>
            </div>

            <div class="col-sm-2 mr-1">
                <select id="courseSelect" disabled class="form-control">
                    <option value="">
                        SELECT Course
                    </option>
                    @foreach($course as $courses)
                        <option value="{{$courses->id}}">{{$courses->courseName}}</option>
                    @endforeach
                </select>
            </div>
        </div>


    </div>


    <div class="container mt-5">
        <table class="table table-striped table-sm table-responsive mt-3" id="stdTable">

            <thead>
            <tr>
                <th>Student Name</th>
                <th>Enrolled year</th>
                <th> Address</th>
                <th> Gender</th>
                <th> Father Name</th>
                <th>Phone Number</th>
                <th> Faculty</th>
                <th>Course</th>
                <th>email</th>
            </tr>
            </thead>
            <tbody>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>


            </tbody>


        </table>

    </div>




@stop


@section('scripts')

    <script>
        var manageDataTable = $('#stdTable').DataTable();


        //fetch Faculty
        $('#enrDate').change(function () {
            $('#facultySelect').attr('disabled', false);
            var option;

        });


        //fetch COurse
        $('#facultySelect').change(function () {
            $('#courseSelect').attr('disabled', false);

        });

        //fetch Student

        $('#courseSelect').change(function () {

            var tableData;
            var enrYear = $('#enrDate').val();


        });

    </script>


@endsection