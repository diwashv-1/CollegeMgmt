@extends('layouts.Student')

@section('headSection')


    <div class="content-header">
        <div class="container-fluid">
            <div class="row bg-dark-gradient">
                <div class="col-sm-12">

                </div><!-- /.col -->
                <div class="col-sm-12 bg-dark-gradient ">
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Subjects</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

@endsection

@section('content')
    <div class="row container-fluid bg-dark-gradient">

        <div class="col-md-3 mt-3 ">
            <a href="" class=" list-group-item list-group-item-action active" id="$value->id">Semester 1</a>

            @foreach($course as $key=> $value)

                @if($value->semester ==1)
                    <a href="{{route('startExam',$value->id)}}" class="form-control list-group-item list-group-item-action"
                       id="$value->id">{{$value->subjectName}}</a>

                @endif

            @endforeach


        </div>
        <div class="col-md-3  mt-3 ">
            <a href="" class=" list-group-item list-group-item-action bg-success" id="$value->id">Semester 2</a>

            @foreach($course as $key=> $value)

                @if($value->semester ==2)
                    <a href="{{route('startExam',$value->id)}}" class=" list-group-item list-group-item-action"
                       id="$value->id">{{$value->subjectName}}</a>

                @endif

            @endforeach

        </div>
        <div class="col-md-3 mt-3 ">
            <a href="" class=" list-group-item list-group-item-action bg-warning" id="$value->id">Semester 3</a>

            @foreach($course as $key=> $value)

                @if($value->semester ==3)
                    <a href="{{route('startExam',$value->id)}}" class="list-group-item list-group-item-action"
                       id="$value->id">{{$value->subjectName}}</a>

                @endif

            @endforeach

        </div>
        <div class="col-md-3 mt-3 ">
            <a href="" class=" list-group-item list-group-item-action active" id="$value->id">Semester 4</a>

            @foreach($course as $key=> $value)

                @if($value->semester ==4)
                    <a href="{{route('startExam',$value->id)}}" class="list-group-item list-group-item-action"
                       id="$value->id">{{$value->subjectName}}</a>

                @endif

            @endforeach

        </div>


        <div class="col-md-3 mt-3 ">
            <a href="" class=" list-group-item list-group-item-action bg-info" id="$value->id">Semester 5</a>

            @foreach($course as $key=> $value)

                @if($value->semester ==5)
                    <a href="{{route('startExam',$value->id)}}" class="list-group-item list-group-item-action"
                       id="$value->id">{{$value->subjectName}}</a>

                @endif

            @endforeach

        </div>
        <div class="col-md-3 mt-3">
            <a href="" class=" list-group-item list-group-item-action bg-warning" id="$value->id">Semester 6</a>

            @foreach($course as $key=> $value)

                @if($value->semester ==6)
                    <a href="{{route('startExam',$value->id)}}" class="list-group-item list-group-item-action"
                       id="$value->id">{{$value->subjectName}}</a>

                @endif

            @endforeach

        </div>
        <div class="col-md-3 mt-3 ">
            <a href="" class=" list-group-item list-group-item-action bg-danger" id="$value->id">Semester 7</a>

            @foreach($course as $key=> $value)

                @if($value->semester == 7)
                    <a href="{{route('startExam',$value->id)}}" class="list-group-item list-group-item-action"
                       id="">{{$value->subjectName}}</a>

                @endif

            @endforeach

        </div>
        <div class="col-md-3 mt-3 ">
            <a href="" class=" list-group-item list-group-item-action bg-success" id="$value->id">Semester 8</a>

            @foreach($course as $key=> $value)

                <a href="{{route('startExam',$value->id)}}" class="list-group-item list-group-item-action"
                   id="">{{$value->subjectName}}</a>


            @endforeach

        </div>

    </div>


@endsection

@section('scripts')
    <script type="text/javascript">

        $(document).ready(function () {
            $("#data-table").DataTable();
        });


    </script>

@endsection