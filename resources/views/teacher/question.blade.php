@extends('layouts.teacher')

@section('title')

    <title> Question </title>

@endsection


@section('content')

    <div class="container ">

            <form method="post" action="" class="form-group">
                @csrf
                <div class=" form-row mt-2">

                    <div class="col-md-3 ">
                        <div class="col-md-12">

                            <label>Enter Set:</label>
                            <input type="text" id="set" name="set" class="form-control">
                        </div>

                    </div>
                    <div class="col-md-3">
                        <div class="col-md-12">
                            <label> No of Question: </label>

                            <input type="text" class="form-control" disabled id="addRow">

                            <button class="btn btn-info mt-2" disabled>
                                <i class="fas fa-plus-circle"></i> Add
                            </button>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="col-md-8">
                            <label>Add Row</label>

                            <button class="btn btn-success form-control ">
                                <i class="fas fa-plus-circle"></i> Add
                            </button>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="col-md-12">
                            <label>Subject:</label>
                            <select class="form-control">
                                <option> !!!!! SELECT !!!!</option>
                            </select>
                        </div>
                    </div>
                </div>

            </form>
        </div>




@endsection