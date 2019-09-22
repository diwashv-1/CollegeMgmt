@extends('layouts.Student')

@section('title')
    <title> View Attendance </title>
@endsection


@section('content')

    <div class="col-sm-12 ">
        <ol class="breadcrumb mt-3 ">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">View Attendance</li>
        </ol>
    </div>
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">

                <div class="row">
                    <div class="col-md-4 form-inline">
                        <label for="Select Month" class=""> Select Month:</label>
                        <input type="month" class="form-control ml-5" id="date">
                    </div>

                    <div class="col-md-3 form-inline hideF" style="display: none">
                        <label for="Select Semester" class=""> Select Semester:</label>
                        <select class="form-control ml-5 selectSem col-md-4" id="">
                            <option value="">....</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                        </select>
                    </div>
                    <div class="col-md-3 form-inline hideF" style="display: none">
                        <label for="Select Year" class=""> Select Year:</label>
                        <select class="form-control ml-5 selectYear col-md-4" id="">
                            <option value="">....</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <button type="button" class="btn btn-success hideF" id="btn" style="display: none">Okay</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class=" mt-4">
        <div class="container-fluid " id="attendance">


            <table class="table table-striped table-sm">
                <thead>
                <tr>
                    <th>Subject Name</th>
                    <th>1</th>
                    <th>2</th>
                    <th>3</th>
                    <th>4</th>
                    <th>5</th>
                    <th>6</th>
                    <th>7</th>
                    <th>8</th>
                    <th>9</th>
                    <th>10</th>
                    <th>11</th>
                    <th>12</th>
                    <th>13</th>
                    <th>14</th>
                    <th>15</th>
                    <th>16</th>
                    <th>17</th>
                    <th>18</th>
                    <th>19</th>
                    <th>20</th>
                    <th>21</th>
                    <th>22</th>
                    <th>23</th>
                    <th>24</th>
                    <th>25</th>
                    <th>26</th>
                    <th>27</th>
                    <th>28</th>
                    <th>29</th>
                    <th>30</th>
                    <th>31</th>
                    <th>32</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>xyc</td>
                    <td>p</td>
                    <td>p</td>
                    <td>p</td>

                </tr>

                </tbody>

            </table>
        </div>
    </div>

@stop
@section('scripts')
    <script>
        //$('#attendance').hide();
        $('#date').change(function () {
            $('.hideF').show(800);
        });


        $('#btn').click(function () {
                var date = $('#date').val();
                var sem = $('.selectSem').find(':selected').val();
                var year = $('.selectYear').val();
                $.ajax({
                        url: '/fetchAttendance',
                        type: 'post',
                        dataType: 'json',
                        data: {
                            "_token": "{{ csrf_token() }}",
                               date:date,
                            sem:sem,
                            year:year,
                        },
                        success: function (response) {
                            alert();
                        }
                });



        });


    </script>
@endsection
