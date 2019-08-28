@extends('layouts.master')

@section('title')
    <title> Examination </title>
@endsection


@section('content')

    <div class="row container ">

        <div class="col-md-5 mt-3">
            <div class="col-md-12">
                <label class=""> Exam Date :</label>
                <input type="date" id="examDate" name="examDate" class="form-control">
            </div>


            <div class="col-md-12 mt-3 ">
                <label class=""> course :</label>
                <select class="form-control" id="course" name="course">
                    <option value=""> !!! Select !!!</option>
                    @foreach($course as $key => $value)
                        <option value=" {{$value->id}}"> {{$value->courseName}}</option>
                    @endforeach

                </select>

            </div>


            <div class="col-md-12 mt-3">
                <label class=""> Subject :</label>
                <select class="form-control" id="subject" name="subject" disabled>
                </select>
            </div>

            <div class="col-md-12 mt-3">
                <label class=""> No of Question: </label>
                <input type="text" class="form-control" id="question" name="question">
            </div>

            <div class="col-md-12 mt-3">
                <label class=""> Full Marks: </label>
                <input type="text" class="form-control" id="markF" name="mark">
            </div>


            <div class="col-md-12 mt-3">
                <label class=""> Pass Marks: </label>
                <input type="text" class="form-control" id="markP" name="mark">
            </div>


            <div class="col-md-4 mt-3">
                <button type="button" class="form-control bg-info" id="addBtn"><i class="fas fa-plus-circle"></i> Add
                </button>
            </div>

        </div>


        <div class="col-md-6 offset-1">

            <div class="card bg-dark-gradient">
                <div class="card-header">

                </div>
                <div class="card-body">
                    <table class="table  table-striped mt-3" id="examTable">
                        <thead>
                        <tr>
                            <th>Exam Date</th>
                            <th>Course</th>
                            <th> Subject</th>
                            <th> No of Question</th>
                            <th> F.M</th>
                            <th> P.M</th>

                        </tr>
                        </thead>

                        <tbody>
                        </tbody>

                    </table>


                    <div class="col-md-4 mt-2 ml-auto">
                        <button class="form-control btn-success btn-sm" disabled id="saveData">
                            <i class="fas fa-check-circle"></i>Save
                        </button>

                    </div>
                </div>
            </div>


        </div>
    </div>



@endsection

@section('scripts')
    <script>
        $('#course').on('change', function () {
            $('#subject').find('option').remove();

            $('#subject').attr('disabled', false);
            $.ajax({
                url: '/fetchAjaxSubject',
                type: 'post',
                dataType: 'json',
                data: {
                    "_token": "{{ csrf_token() }}",
                    'id': $('#course').val(),
                },
                success: function (response) {

                    var option = '';
                    $.each(response.result, function (k, v) {

                        option += '<option value="' + v.id + '" data ="' + v.subjectName + '">' + v.subjectName + '</option>';
                    });

                    $('#subject').append(option);
                }
            });
        });

        $('#addBtn').on('click', function () {

            $('#saveData').attr('disabled', false);
            var tableData = '';
            tableData += '<tr><td>' + $('#examDate').val() + '</td>';
            tableData += '<td>' + $('#course option:selected').html() + '</td>';
            tableData += '<td>' + $('#subject option:selected').html() + '</td>';
            tableData += '<td>' + $('#question').val() + '</td>';
            tableData += '<td>' + $('#markF').val() + '</td>';
            tableData += '<td>' + $('#markP').val() + '</td><';
            tableData += '<td hidden>' + $('#course').val() + '</td>';
            tableData += '<td hidden>' + $('#subject').val() + '</td></tr>';

            $('#examTable').append(tableData);

            $('#subject').val('');
        });

        $('#saveData').on('click', function () {
            var tableArray = [];
            tableArray.length = 0;
            $('#examTable tbody tr').each(function () {

                tableArray.push({
                    date: $(this).find('td:eq(0)').html(),
                    course: $(this).find('td:eq(6)').html(),
                    subjectName: $(this).find('td:eq(2)').html(),
                    subject: $(this).find('td:eq(7)').html(),
                    question: $(this).find('td:eq(3)').html(),
                    markF: $(this).find('td:eq(4)').html(),
                    markP: $(this).find('td:eq(5)').html(),
                });
            });

            $.ajax({
                url: '/saveAjaxExam',
                type: 'post',
                dataType: 'json',
                data: {
                    "_token": "{{ csrf_token() }}",
                    data: tableArray,
                },
                success: function (response) {
location.reload();
                    alert();
                }
            });


        });


    </script>







@endsection