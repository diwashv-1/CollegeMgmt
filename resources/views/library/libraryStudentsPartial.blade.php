@extends('layouts.master')

@section('content')




    <div class="container mt-5">
        <table class="table table-striped table-sm " id="stdTable">

            <thead>
            <tr>
                <th>Student Name</th>
                <th>Student Code</th>
                <th> Address</th>
                <th> Faculty</th>
                <th>Book Count</th>
                <th>Black List</th>
                <th>Action</th>

            </tr>
            </thead>
            <tbody>
            @foreach($student as $student)
                <tr>
                    <td>{{$student->studentName}}</td>
                    <td>{{$student->studentCode}}</td>
                    <td>{{$student->address}}</td>
                    <td>{{$student->facultyName}}</td>
                    <td>{{$student->countBook}}</td>
                    <td>{{$student->blackList}}</td>
                    <td>
                        <a href="{{ route('fetchLibraryDetail', $student->id)}}" class="btn btn-primary btn-sm"><i class="fas fa-wrench"></i> Action</a>

                    </td>
                </tr>
            @endforeach

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