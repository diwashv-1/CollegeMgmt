@extends('layouts.master')

@section('content')


    <div class="card container mt-5">
        <div class="card-header">
            <h3 class="card-title">Staff Detail Table</h3>
        </div>
        <!-- /.card-header -->
            <table id="example2" class="table-bordered table-responsive" >
                <thead>
                    <tr>
                        <th class="w-25 p-2">Image</th>
                        <th>Full Name</th>
                        <th>Adress</th>
                        <th>Contact Number</th>
                        <th>Enrolled Year</th>
                        <th>Gender</th>
                    </tr>
                </thead>

                <tbody>
                @foreach($staff as $staffs)
                    <tr>
                        <td>
                            <img src="{{asset('storage/'. $staffs->staffImage)}}" class="img-thumbnail w-25">
                            </td>
                        <td>{{$staffs->staffName}}</td>
                        <td>{{$staffs->staffAddress}}</td>
                        <td>{{$staffs->contactNumber}}</td>
                        <td>{{$staffs->enrolledYear}}</td>
                        <td>{{$staffs->staffGender}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
    </div>


@endsection


@section('scripts')
    <script>
        $(document).ready(function () {

            $('#example2').DataTable();

        });


    </script>



@stop