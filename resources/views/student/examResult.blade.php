@extends('layouts.Student')

@section('title')
    <title> Select Exam </title>

@endsection


@section('headSection')



@endsection


@section('content')

    <div class="container">


        <div class="card">
            <div class="card-header">
                Result
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        &emsp; Exam at : &emsp; {{$result->created_at}}
                        <br>
                        &emsp; Total Number of Question : &emsp; {{$result->totalQsn}}
                        <br>

                        &emsp; Total Attempted Question : &emsp; {{$result->totalQsn - $result->nonAttemptQsn}}
                        <br>
                        &emsp; Total Correct Answer : &emsp; {{$result->correct}}
                        <br>
                        &emsp; Total Wrong Answer :&emsp; {{$result->wrong}}
                    </div>


                    <div class="col-md-7 offset-1">
                        <table class="table table-striped table-sm">
                            <tr>
                                <th>Exam Date:</th>
                                <th>Total Question: </th>
                                <th> Attmept Quesion  </th>
                                <th>Correct Answer</th>
                                <th>Wrong Answer</th>
                            </tr>

                            <tr>
                                <td>{{$result->created_at}}</td>
                                <td>{{$result->totalQsn}}</td>
                                <td>{{$result->totalQsn - $result->nonAttemptQsn}}</td>
                                <td>{{$result->correct}}</td>
                                <td>{{$result->wrong}}</td>

                            </tr>
                        </table>

                    </div>
                </div>


            </div>
        </div>
    </div>



@endsection




@section('scripts')


@endsection