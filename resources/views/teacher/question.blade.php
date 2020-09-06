@extends('layouts.teacher')

@section('title')

    <title> Question </title>

@endsection


@section('content')

    <div class="container-fluid ">

        <form method="post" action="" id="questionForm" class="form-group">
            @csrf
            <div class=" row mt-2">

                <div class="col-md-3 ">
                    <div class="col-md-12">

                        <label>Enter Set:</label>
                        <input type="text" id="set" name="set" class="form-control ">
                    </div>

                </div>
                <div class="col-md-3">
                    <div class="col-md-12">
                        <label> No of Question: </label>

                        <input type="text" class="form-control" disabled id="queNo">

                        <button class="btn btn-info mt-2" disabled id="addRow" type="button">
                            <i class="fas fa-plus-circle"></i> Add
                        </button>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="col-md-8">
                        <label>Add Row</label>

                        <button class="btn btn-success btn-sm form-control" id="addRowSingle" type="button">
                            <i class="fas fa-plus-circle"></i> Add
                        </button>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="col-md-12">
                        <label>Subject:</label>
                        <select class="form-control" id="selectSubject">
                            <option> !!!!! SELECT !!!!</option>

                            @foreach($subject as $key => $value)

                                <option value="{{$value}}"> {{ $key }} </option>

                            @endforeach
                        </select>
                    </div>
                </div>
            </div>


            <div class="col-md-12 mt-3">
                <table class="table" id="questionTable">
                    <thead>
                    <tr>
                        <th class="w-25">Question:</th>
                        <th>Option 1</th>
                        <th>Option 2</th>
                        <th>Option 3</th>
                        <th>Option 4</th>
                        <th>correct</th>
                        <th>remove</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                            <textarea class="form-control" name="question" id="question"></textarea>
                        </td>
                        <td>
                            <input type="text" class="form-control" id="option1" name="option1">
                        </td>
                        <td>
                            <input type="text" class="form-control" id="option2" name="option2">
                        </td>
                        <td>
                            <input type="text" class="form-control" id="option3" name="option3">

                        </td>
                        <td>
                            <input type="text" class="form-control" id="option4" name="option4">

                        </td>
                        <td>
                            <input type="text" class="form-control" id="correct" name="correct">
                        </td>
                        <td>
                            <button class="btn btn-default btn-block form-control delete" type="button">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <textarea class="form-control" name="question" id="question"></textarea>
                        </td>
                        <td>
                            <input type="text" class="form-control" id="option1" name="option1">
                        </td>
                        <td>
                            <input type="text" class="form-control" id="option2" name="option2">
                        </td>
                        <td>
                            <input type="text" class="form-control" id="option3" name="option3">

                        </td>
                        <td>
                            <input type="text" class="form-control" id="option4" name="option4">

                        </td>
                        <td>
                            <input type="text" class="form-control" id="correct" name="correct">
                        </td>
                        <td>
                            <button class="btn btn-default btn-block form-control delete" type="button">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-1">
                <button class="btn btn-primary btn-sm form-control" id="saveBtn" type="button"><i
                            class="fas fa-check-circle"></i> Save
                </button>
            </div>
        </form>
    </div>


@endsection

@section('scripts')
    <script>
        //enable question text
        $('#set').on('keypress', function () {

            $('#queNo').attr('disabled', false);

        });

        //Enable Add button
        $('#queNo').on('keypress', function () {
            $('#addRow').attr('disabled', false);

        });

        $('#addRow').on('click', function () {

            var number = $('#queNo').val();

            var totalQsn = questionTotal(number);

            $('#questionTable tbody').append(totalQsn);

        });


        $('#addRowSingle').on('click', function () {

            var qsn = questionTotal(1);
            $('#questionTable tbody').append(qsn);

        });


        function questionTotal(no) {
            var tableRow = '';
            for (i = 0; i < no; i++) {

                tableRow += '<tr><td><textarea class="form-control" name="question" id="question"></textarea></td>'
                    + '<td><input type="text" class="form-control" id="option1" name="option1"></td>'
                    + '<td><input type="text" class="form-control" id="option2" name="option2"></td>'
                    + '<td><input type="text" class="form-control" id="option3" name="option3"></td>'
                    + '<td><input type="text" class="form-control" id="option4" name="option4"></td>'
                    + '<td><input type="text" class="form-control" id="correct" name="correct"></td>'
                    + '<td><button class=" delete btn btn-default btn-block form-control  "   type="button">' +
                    '<i class="fas fa-trash-alt"></i></button></td></tr>';

            }
            return tableRow;
        }

        $(document).on('click', '.delete', function () {
            $(this).closest('tr').remove();

        });

        $('#saveBtn').on('click', function (e) {
            e.preventDefault();
            var tableData = [];
            tableData.length = 0;
            $('#questionTable tbody tr').each(function () {
                tableData.push({
                    question: $(this).find('td:eq(0) textarea').val(),
                    option1: $(this).find('td:eq(1) input').val(),
                    option2: $(this).find('td:eq(2) input').val(),
                    option3: $(this).find('td:eq(3) input').val(),
                    option4: $(this).find('td:eq(4) input').val(),
                    correct: $(this).find('td:eq(5) input').val(),

                });
            });


                $.ajax({
                   url:'saveAjaxQuestion',
                   type: 'post',
                    dataType: 'json',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        tableData : tableData,
                        set : $('#set').val(),
                        subject : $('#selectSubject').val(),
                    },
                    success:function () {

                    $('#questionForm')[0].reset();

                    }

                });
        });


    </script>

@endsection
