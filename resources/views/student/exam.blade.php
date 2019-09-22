@extends('layouts.Student')

@section('title')
    <title> Select Exam </title>

@endsection
@section('headSection')

@endsection

<div class="card">
    <div class="card-body">


    </div>


</div>



@section('content')
<body onload="timeOut()">
    <div class="container-fluid">


        <form method="post" id="examForm" action="{{route('saveAns')}}">
            @csrf

            <input type="text" name="examId" value="{{$exam->id}}" style="display:none;">
            @php($k=1)
            @if($true ==2)
                {{$msg}}
            @elseif($true == 0 )
                {{ 'The exam is Scheduled to begin at '. $exam->examDate . '  at  '. $exam->time .'. Please come back Later.'  }}
            @elseif($true == 1)

                <div id="time" class="mb-3 text-danger ml-auto">
                    <h1>Remaining Time:</h1>
                </div>
                @foreach($qsn as $qsn)
                    <div class="card">
                        <div class="card-header">
                            <h5 class="text-success">{{$k++. '.  ' . $qsn->question}}</h5>
                        </div>
                        @php($i = 1)
                        <div class="card-body container">
                            &nbsp; {{$i++}} &emsp; <input type="radio" class="" name="{{$qsn->id}}"
                                                          value="{{  $qsn->option1}}">{{  $qsn->option1}} <br>
                            &nbsp; {{$i++}}&emsp; <input type="radio" class="" name="{{$qsn->id}}"
                                                         value="{{  $qsn->option2}}"> {{ $qsn->option2}} <br>
                            &nbsp; {{$i++}} &emsp; <input type="radio" class="" name="{{$qsn->id}}"
                                                          value="{{  $qsn->option3}}"> {{$qsn->option3}} <br>
                            &nbsp; {{$i++}} &emsp; <input type="radio" class="" name="{{$qsn->id}}"
                                                          value="{{  $qsn->option4}}"> {{ $qsn->option4}}
                            <input type="radio" style="display: none" checked="checked" name="{{$qsn->id}}" value="a">
                        </div>
                    </div>
                @endforeach


                <div class="col-md-2">
                    <button class="btn btn-info btn-sm">Submit</button>

                </div>
            @endif()

        </form>
    </div>




@endsection




@section('scripts')
    <script type="text/javascript">

        var timeLeft = 1 * 60;
        function timeOut() {
            var minute = Math.floor(timeLeft / 60);
            var second = timeLeft %60;
            var mint = checkTime(minute);
            var sec = checkTime(second);

            if(timeLeft <=0){
                clearTimeout(tm);
                $("#examForm").submit();
            }
            else{
                $('#time').html(mint+ ":" + sec);
            }
            timeLeft --;
            var tm =setTimeout(function (){timeOut()}, 1000);
        }

        function checkTime(msg) {

            if(msg<10){

                msg = "0"+msg;
            }
            return msg;
        }


    </script>

@endsection
