@extends('layouts.master')

@section('title')
    <title> Examination </title>
@endsection


@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 h-25">
                <ul class="list-group">
                    @foreach($subject as $sub)
                        <a href="{{ route('viewQuestion', $sub->id) }}"
                           class="list-group-item d-flex justify-content-between align-items-center">{{$sub->subjectName}}
                            <span class="badge badge-warning badge-pill float-right">{{$sub->questionId}}</span>
                        </a>
                    @endforeach
                    {{$subject->links()}}

                </ul>
            </div>
        </div>


        <div class="col-md-9" id="viewQuestionRender">

        </div>

    </div>




@endsection




@section('scripts')


@endsection