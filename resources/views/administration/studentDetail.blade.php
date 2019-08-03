@extends('layouts.master')

@section('content')
    <div class="card container mt-5">
        <div class="card-header">
            <h3 class="card-title">Data Table With Full Features</h3>
        </div>
        <table id="data-table" class="table table-bordered table-responsive" >

            <thead>
            <tr>
                <th class="w-25 p-2">Student Image</th>
                <th>Student Name</th>
                <th>Father Name</th>
                <th>Mother Name</th>
                <th>Contact Number</th>
                <th>Faculty</th>
                <th>Course</th>
                <th>Enroller Year</th>
                <th>Email</th>

            </tr>
            </thead>
            <tbody>
            @foreach ($student as $students)
                <tr>
                    <td>
                        <img src="{{asset('storage/'. $students->studentImage)}}" alt="" class="w-25">
                    </td>
                    <td>{{$students->studentName}}</td>
                    <td>{{$students->fatherName}}</td>
                    <td>{{$students->motherName}}</td>
                    <td>{{$students->phoneNumber}}</td>
                    <td>{{$students->facultyId}}</td>
                    <td>{{$students->courseId}}</td>
                    <td>{{$students->enrolledyear}}</td>
                    <td>{{$students->email}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

            </div>


@endsection


@section('scripts')
    <script>
        $(document).ready(function () {

            $('#data-table').DataTable();

        });


    </script>



@stop