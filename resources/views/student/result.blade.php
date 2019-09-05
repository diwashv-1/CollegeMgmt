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
                    <div class="col-md-12">
                        <table class="table table-striped table-sm">
                            <tr>
                                <th>Subject</th>
                                <th>Exam Date:</th>
                                <th>Total Question: </th>
                                <th> Attmept Quesion  </th>
                                <th>Correct Answer</th>
                                <th>Wrong Answer</th>
                            </tr>

                            @foreach($result as $result)
                            <tr>
                                <td>{{$result->examName}}</td>
                                <td>{{$result->created_at}}</td>
                                <td>{{$result->totalQsn}}</td>
                                <td>{{$result->totalQsn - $result->nonAttemptQsn}}</td>
                                <td>{{$result->correct}}</td>
                                <td>{{$result->wrong}}</td>
                            </tr>
                                @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection




@section('scripts')


@endsection