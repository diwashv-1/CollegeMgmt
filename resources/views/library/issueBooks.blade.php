@extends('layouts.master')


@section('title')

    <title>Issue Books</title>
@endsection


@section('content')

    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#issue" role="tab"
               aria-controls="nav-home" aria-selected="true">Issue</a>
            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#recieve" role="tab"
               aria-controls="nav-profile" aria-selected="false">Recieve</a>
        </div>


    </nav>

    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="issue" role="tabpanel" aria-labelledby="nav-home-tab">
            <div class="container mt-5">
                <div class="" id="messagePopUp"></div>
                <div class="row">

                    <div class="col-md-6 mt-3">
                        @csrf
                        <div class="form-group row">
                            <label for="Student Name" class="col-sm-3 col-form-label">Student Name :</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="stdName" placeholder="Student Name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Student Code" class="col-sm-3 col-form-label">Studetn Code :</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="StdCode" placeholder="Student Code">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Book Code" class="col-sm-3 col-form-label">Book Code :</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="bookCode" placeholder="Book Code">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Isbn Code" class="col-sm-3 col-form-label">ISBN Code :</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="isbnCOde" placeholder="ISBN Code">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Isbn Code" class="col-sm-3 col-form-label">Issued date :</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" id="issueDate" placeholder="">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Expire date" class="col-sm-3 col-form-label">Expiry date :</label>
                            <div class="col-sm-9">
                                <input type="date" disabled class="form-control" id="expireDate" placeholder="">
                            </div>
                        </div>

                        <div>
                            <button class="btn btn-sm btn-info float-right" id="addBtn" disabled><span> <i
                                            class="fas fa-plus-circle"></i> Add </span></button>
                        </div>

                    </div>

                    <div class="col-md-5 offset-1 mt-3 container">

                        <div class="card">
                            <div class="card-header bg-default h-70">
                            </div>
                            <div class="card-body bg-info h-50" id="cardBody1">


                            </div>
                            <div class="card-body bg-success h-75" id="cardBody2">

                            </div>
                            <div class="card-body bg-warning h-100" id="cardBody3">

                            </div>

                        </div>
                    </div>


                    <div class="col-md-8 container mt-5">

                    </div>
                </div>
            </div>
        </div>

        <div class="tab-pane fade" id="recieve" role="tabpanel" aria-labelledby="nav-profile-tab">

            <div class="container-fluid mt-5">
                <div class="" id="messagePopUp"></div>
                <div class="row">

                    @csrf

                    <div class="form-group row col-sm-4">
                        <label for="Student Code" class="col-sm-4 col-form-label">Student Code :</label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control" id="rcvStdCode" placeholder="Student Code">
                        </div>
                    </div>

                    <div class="form-group row col-sm-4">
                        <label for="Book Code" class="col-sm-4 col-form-label">Book Code :</label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control" id="rcvBookCode" placeholder="Book Code">
                        </div>
                    </div>
                    <div class="form-group row col-sm-4">
                        <label for="Isbn Code" class="col-sm-4 col-form-label">ISBN Code :</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="rcvIsbnCOde" placeholder="ISBN Code">
                        </div>
                    </div>
                    <div>
                        <button class="btn btn-sm btn-info float-right" id="addRcvBtn"><span> <i
                                        class="fas fa-plus-circle"></i> Add </span></button>
                    </div>

                </div>

                <div class="col-md-8 container mt-5">

                </div>
            </div>
        </div>


    </div>
    </div>
@endsection

@section('scripts')


    <script>

        $('#issueDate').change(function () {
            var issueDate = $('#issueDate').val();
//            alert(issueDate);
            $('#addBtn').attr('disabled', false);
        });


        $('#studentCode').keypress(function () {


        });


        $('#addBtn').click(function () {
            var data;
            alert();
            var studentCode = $('#StdCode').val();
            var bookCode = $('#bookCode').val();
            if (studentCode == "" || bookCode == "") {
                alert('please Enter Student Code or Book Code');

            }
            if (studentCode && bookCode) {
                $.ajax({
                    url: 'saveIssuedBooksAjax',
                    method: 'post',
                    type: 'json',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        stdCode: $('#StdCode').val(),
                        bookCode: $('#bookCode').val()
                    },
                    success: function () {
                        $('#bookCode').val('');
                    },


                    error: function () {
                        $.each(errors, function (k, v) {
                            $.each(v.errors, function (k, v) {
                                console.log(k);
                                alert(v);
                            });


                        });
                    }
                });
                //bootstrap Alert;
            }

        });


        $('#StdCode').keypress(function () {
            var keycode = (event.keyCode ? event.keyCode : event.which);
            if (keycode == '13') {
                var code = $('#StdCode').val();

                $.ajax({
                    url: '/fetchAjaxStudentBookDetail',
                    type: 'post',
                    dataType: 'json',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        data: code
                    },
                    success: function (response) {


                    }

                });


            }
        });


        $('#rcvStdCode').keypress(function () {
            var keycode = (event.keyCode ? event.keyCode : event.which);
            if (keycode == '13') {
                var code = $('#rcvStdCode').val();

                $.ajax({
                    url: '/fetchAjaxStudentBookDetail',
                    type: 'post',
                    dataType: 'json',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        data: code
                    },
                    success: function (response) {


                    }

                });


            }
        });

        $('#addRcvBtn').click(function () {
            var data;
            alert();
            var studentCode = $('#rcvStdCode').val();
            var bookCode = $('#rcvBookCode').val();
            if (studentCode == "" || bookCode == "") {
                alert('please Enter Student Code or Book Code');

            }
            if (studentCode && bookCode) {
                $.ajax({
                    url: 'saveRecievedBooksAjax',
                    method: 'post',
                    type: 'json',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        stdCode: $('#rcvStdCode').val(),
                        bookCode: $('#rcvBookCode').val()
                    },
                    success: function () {


                        //$('#bookCode').val('');
                    },
                    error: function () {

                        $.each(errors, function (k, v) {
                            $.each(v.errors, function (k, v) {
                                console.log(k);
                                alert(v);
                            });

                        });


                    }
                });
                //bootstrap Alert;
            }

        });


    </script>

@endsection