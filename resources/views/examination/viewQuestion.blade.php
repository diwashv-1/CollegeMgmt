@extends('layouts.master')

@section('title')
    <title> Examination </title>
@endsection


@section('content')

    <div class="container mt-3" >

        <div class="row"  >

            <div class="col-md-12 container-fluid"  id="conten" >
                @php ($sn =1)
                @foreach($question as $key=>$value)
                    <div class="card" >
                        <div class="card-header bg-info">
                            <span class="">{{"QN." . ' ' .  $sn++}}</span>
                        </div>

                        <div class="card-body " >

                            <div class="row">

                                <div class="col-md-2">
                                    <label class="mt-2">Question:</label>
                                </div>
                                <div class="col-md-10">
                                <textarea type="text" class="form-control h-100" disabled>{{$value->question}}
                                        </textarea>
                                </div>
                                <div class="col-md-6 mt-2">
                                    <div class="col-md-3">
                                        <label for="">Option 1:</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" disabled value="{{$value->option1}}">
                                    </div>
                                </div>

                                <div class="col-md-6 mt-2">
                                    <div class="col-md-3">
                                        <label for="">Option 2:</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" disabled value="{{$value->option2}}">
                                    </div>
                                </div>

                                <div class="col-md-6 mt-2">
                                    <div class="col-md-3">
                                        <label for="">Option 3:</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" disabled value="{{$value->option3}}">
                                    </div>
                                </div>

                                <div class="col-md-6 mt-2">
                                    <div class="col-md-3">
                                        <label for="">Option 4:</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" disabled value="{{$value->option4}}">
                                    </div>
                                </div>
                                <div class="col-md-2 mt-3 ml-auto">
                                    <button class="btn-success btn-sm form-control appBtn" id=""
                                            data="{{$value->question_id}} "><i class="fas fa-check-circle"></i> Approve
                                    </button>
                                </div>


                            </div>
                        </div>
                    </div>

                @endforeach
            </div>

        </div>


    </div>





@endsection




@section('scripts')

<script>
    $('.appBtn').on('click', function(){
    var idd = $(this).attr('data');

        $.ajax({
           url:'/savequestionAppr',
           method: 'post',
           type: 'json',
           data:{
               "_token": "{{ csrf_token() }}",
                id: idd,
           },


            success:function(response){
               alert(response.msg);

                $("#conten").load('#conten');
            }



        });




    });

</script>





@endsection