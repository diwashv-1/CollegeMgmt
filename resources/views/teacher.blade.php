@extends('layouts.teacher')

@section('headSection')


    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">

                    <h1 class="m-0 text-warning">Teacher Home</h1>


                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Teacher Home</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    @endsection




@section('content')

    <div>



    </div>


    <div class="container">
<div class="card">
    <div class="card-body">




    </div>


</div>
    </div>


@endsection

@section('scripts')
<script type="text/javascript">

    $(document).ready(function(){
        $("#data-table").DataTable();
    });



</script>

    @endsection