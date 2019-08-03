@extends('layouts.master')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="ml-2 ">


        <ol class="breadcrumb mt-3">
            <li class="breadcrumb-item" aria-current="page"><a href="/home"><i class="fas fa-dashboard"></i> Home</a>
            </li>
            <li class=" breadcrumb-item" aria-current="page">Dashboard</li>
        </ol>
    </section>


    <div class="col-md-12">
        @if(session()->has('success'))

            <div class="alert alert-info alert-dismissible fade show" role="alert"">
            {{session()->get('success')}}
            <button type="button" class=" btn btn-danger close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
    </div>
    </div>
    <section class="mt-2">
        @endif


        <ul class="nav nav-tabs mt-2" id="myTab" role="tablist">
            <li class="mr-auto ml-3 "><i class="fas fa-plus-circle"></i> ADD</li>

            <li class="nav-item">
                <a class="nav-link active h-25" id="student-tab" data-toggle="tab" href="#student" role="tab"
                   aria-controls="student" aria-selected="true">Student</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="course-tab" data-toggle="tab" href="#course" role="tab" aria-controls="course"
                   aria-selected="false">Course</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="staff-tab" data-toggle="tab" href="#staff" role="tab" aria-controls="staff"
                   aria-selected="false">Staff</a>
            </li>
        </ul>


        <div class="tab-content" id="myTabContent">

            @include('administration.manageStudentForm')


            <div class="tab-pane" id="course" role="tabpanel">
                <div class="container">
                    <form id="courseDetail" method="post" action="addCourse">
                        @csrf
                        <div id="add-course-messages"></div>

                        <div class="form-group row col-lg-7">
                            <label for="inputEmail3" class=" col-form-label">Course Name:</label>
                            <input type="text" class="form-control" id="courseName" placeholder="Course Name"
                                   name="courseName">
                        </div>
                        <div class="form-group row col-lg-7">
                            <label for="" class=" col-form-label">Course code:</label>
                            <input type="text" class="form-control" id="courseCode" placeholder="Course Code"
                                   name="courseCode">
                        </div>

                        <div class="form-group row col-lg-7">
                            <label for="inputPassword3" class="">Faculty Select:</label>
                            <select id="selectFac" name="selectFac" class="form-control">
                                <option> ~~~~SELECT~~~~</option>
                                <option value="1"> science</option>
                                <option value="2"> mgmt</option>


                            </select>


                            </option>
                            <br>
                            <div class="">

                                <button type="submit" name="submit" class="btn btn-primary"><i
                                            class="fa fa-plus-circle"> </i> Save Course
                                </button>
                            </div>

                    </form>
                </div>
            </div>
        </div>

        @include('administration.manageStaffForm')

        </div>
        </div>
        </div>


    </section>

@endsection




@section('scripts')
    <script type="text/javascript">

        $(document).ready(function () {
            $("#data-table").DataTable();
        });


    </script>

@endsection