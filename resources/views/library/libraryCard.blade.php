@extends('layouts.master')

@section('content')


    <div class="container-fluid mt-3">

        <div class="form-row">
            <div class="col-sm-1">
                <label class="mt-2">Enrolled Date:</label>
            </div>
            <div class="col-2">
                <select class="form-control" id="enrDate">
                    <option value="">
                        SELECT DATE
                    </option>
                    @foreach($result as $res)
                        <option value="">
                            {{$res->enrolledDate}}
                        </option>
                    @endforeach

                </select>
            </div>

            <div class="col-sm-1 ml-2">
                <label class="mt-2">Select Faculty:</label>
            </div>

            <div class="col-2">
                <select id="facultySelect" disabled class="form-control">
                    <option value="">
                        SELECT FACULTY
                    </option>
                </select>
            </div>

            <div class="col-sm-1 ml-2">
                <label class="mt-2">Select Course:</label>
            </div>

            <div class="col-2">
                <select id="courseSelect" disabled class="form-control">
                    <option value="">
                        SELECT Course
                    </option>
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

            $.ajax({
                url: 'fetchAjaxFaculty',
                method: 'get',
                type: 'json',
                data: {
                    "_token": "{{ csrf_token() }}"
                },
                success: function (response) {
                    $.each(response.result, function (k, v) {
                        option += '<option value= "' + v.id + ' " >' + v.facultyName + '</option>';

                    });
                    $('#facultySelect').append(option);
                }
            });
        });


        //fetch COurse
        $('#facultySelect').change(function () {
            $('#courseSelect').attr('disabled', false);

            var option;

            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url: 'fetchAjaxCourse',
                method: 'post',
                type: 'json',
                data: {
                    "_token": "{{ csrf_token() }}",
                    id: $('#facultySelect').val()
                },
                success: function (response) {
                    $.each(response.res, function (k, v) {
                        option += '<option value= "' + v.id + ' " >' + v.courseName + '</option>';
                    });

                    $('#courseSelect').append(option);

                }
            });

        });

        //fetch Student
        $('#courseSelect').change(function () {

            var tableData;
            $.ajax({
                url: 'fetchAjaxStudent',
                method: 'post',
                type: 'json',
                data: {
                    "_token": "{{ csrf_token() }}",
                    facId: $('#facultySelect').val(),
                    couId: $('#courseSelect').val()
                },
                cache: false,
                success: function (response) {
//                    console.log(response.result);
                    $.each(response.result, function (key, value) {
                        tableData += '<tr><td>' + value.studentName + '</td>';
                        tableData += '<td>' + value.enrolledyear + '</td>';
                        tableData += '<td>' + value.address + '</td>';
                        tableData += '<td>' + value.gender + '</td>';
                        tableData += '<td>' + value.fatherName + '</td>';
                        tableData += '<td>' + value.phoneNumber + '</td>';
                        tableData += '<td>' + value.facultyName + '</td>';
                        tableData += '<td>' + value.courseName + '</td>';
                        tableData += '<td>' + value.email + '</td></tr>';
                    });

                    $('#stdTable tbody').append(tableData);


                }
            });
        });


    </script>


@endsection