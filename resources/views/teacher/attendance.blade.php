@extends('layouts.teacher')
@section('title')
    <title> Attendance</title>

@endsection

@section('content')
    <div class="container mt-lg-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header h-100">
                        <h5>Attendance</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @foreach ($subject as $key=>$val)

                                <div class="col-md-4">
                                    <button type="button"
                                            class="col-md-12 list-group-item list-group-item-action subjectBtn"
                                            value={{$val}} >{{$key}}
                                    </button>
                                    </br>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12" id="students" style="display: none">


                <div class="card">
                    <div class="card-header">
                        <h5>Attendance </h5>
                    </div>
                    <div class="card-body">
                        <form action="{{route('saveAttendance')}}" method="post" id="saveAtt">
                            @csrf
                        <table class="table table-bordered" id="studentTable">
                            <thead>
                            <tr>
                                <th class="w-10">Student Code</th>
                                <th class="w-25">Student Name</th>
                                <th class="w-25">remarks</th>
                                <th><input type="checkbox" value="" class="form-check w-25" id="checkAll">Check All
                                </th>
                            </tr>
                            </thead>
                                <tbody>

                                </tbody>
                        </table>
                        <button type="button" class="btn btn-info" id="saveAttendance">Save</button>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>




@endsection

@section('scripts')
    <script>

/*
        $('#saveAttendance').on('click', function () {
            $('#saveAtt').submit();
        });
*/

        $('.subjectBtn').on('click', function () {
             id = null;
            $('.subjectBtn').attr('disabled', true);
             id = $(this).val();
            $.ajax({
                url: '/fetchStudent',
                method: 'post',
                type: 'json',
                data: {
                    "_token": "{{ csrf_token() }}",
                    id: id,
                },
                cache: false,
                success: function (response) {
                    console.log(response.students);
                    var tableData = '';
                    $.each(response.students, function (k, v) {
                        tableData += '  <tr><td>' + v.studentCode + '</td>';
                        tableData += '<td>' + v.studentName + '</td>';
                        tableData += '<td><input type="text" name="remark" class="form-control-sm"></td>';
                        tableData += '<td><input type="checkbox" class="checkbox form-check"  value="1" data="' + v.student_id + '"></td></tr>';
                    });
                    $('.table tbody ').append(tableData);
                    $('#students').show('slow');
                }
            });
            saveAttendance(id);
            });

        function saveAttendance(sub_id){
            var studentPresent =[];
            var studentAbsent = [];

            $('#saveAttendance').unbind('click').bind('click', function(e){
                e.preventDefault();
            studentAbsent.length = 0;
            studentPresent.length = 0;

            $('#studentTable tbody tr').each(function () {
                if($(this).find('.checkbox').prop('checked')){
                    studentPresent.push({
                    std_id : $(this).find('td:eq(3) input').attr('data'),
                    val : $(this).find('td:eq(3) input').val()
               });
                }
                else{
                    studentAbsent.push({
                        std_id : $(this).find('td:eq(3) input').attr('data'),
                        val : $(this).find('td:eq(3) input').val(),
                        remarks : $(this).find('td:eq(2) input').val()
                    });
                }
            });

            $.ajax({
                url: '/Attendance',
                method: 'post',
                type: 'json',
                data: {
                    "_token": "{{ csrf_token() }}",
                    studentPresent : studentPresent,
                    studentAbsent : studentAbsent,
                    subId : sub_id,
                },
                cache: false,
                success: function (response) {
                    alert(response.msg);
                    $('#students').hide('slow');
                    $('.subjectBtn').attr('disabled', false);
                    $('.table tbody').find('tr').remove();
                }
            });
            });
        }
        $('#checkAll').click(function () {
            if (this.checked) {
                $('.checkbox').each(function () {
                    this.checked = true;
                });
            } else {
                $('.checkbox').each(function () {
                    this.checked = false;
                });
            }
        });
    </script>
@endsection
