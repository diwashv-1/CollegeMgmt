@extends('layouts.Student')

@section('title')
    <title> Select Exam </title>

@endsection


@section('headSection')


    <div class="content-header">
        <div class="container-fluid ">
            <div class="row">
                <div class="col-sm-12">

                </div><!-- /.col -->
                <div class="col-sm-12 ">
                    <ol class="breadcrumb mt-3 float-right">
                        <li class="breadcrumb-item"><a href="{{route('examDashboardS')}}">Home</a></li>
                        <li class="breadcrumb-item active">Select Exam</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('content')

    <table class="table table-striped container-fluid">
        <thead>
        <tr>
            <th>ExamName</th>
            <th>Exam Date</th>
            <th>Start Time</th>
            <th> Total Question</th>
            <th> Full Mark</th>
            <th> Pass Mark</th>
            <th> Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($exam as $key=>$value)
            <tr>
                <td>{{$value->examName}}</td>
                <td>{{$value->examDate}}</td>
                <td>{{$value->time}}</td>
                <td>{{$value->questionT}}</td>
                <td>{{$value->fm}}</td>
                <td>{{$value->pm}}</td>
                <td>
                    <a  href="{{route('start', $value->id)}}" class="btn btn-info btn-sm">Start Exam</a>
                </td>

            </tr>
        @endforeach

        </tbody>

    </table>




@endsection




@section('scripts')
    <script type="text/javascript">

        $('.table').DataTable();



        $(document).ready(function () {
            $("#data-table").DataTable();
        });


    </script>

@endsection