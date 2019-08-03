@extends('layouts.master')

@section('headSection')


    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">

                    <h1 class="m-0 text-dark">Starter Page</h1>


                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Starter Page</li>
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
        <table class="table " id="data-table">
            <thead>
            <tr>
                <th>Name</th>
                <th>address</th>
                <th>phn no</th>
                <th>home</th>
                <th>new</th>
            </tr>
            </thead>

            <tbody>

            <tr>
                <td>roshan</td>
                <td>ngt</td>
                <td>5132</td>
                <td>dsdsd</td>
                <td>ddd</td>
            </tr>
            <tr>
                <td>roshan</td>
                <td>ngt</td>
                <td>5132</td>
                <td>dsdsd</td>
                <td>ddd</td>
            </tr> <tr>
                <td>roshan</td>
                <td>ngt</td>
                <td>5132</td>
                <td>dsdsd</td>
                <td>ddd</td>
            </tr> <tr>
                <td>roshan</td>
                <td>ngt</td>
                <td>5132</td>
                <td>dsdsd</td>
                <td>ddd</td>
            </tr> <tr>
                <td>roshan</td>
                <td>ngt</td>
                <td>5132</td>
                <td>dsdsd</td>
                <td>ddd</td>
            </tr> <tr>
                <td>roshan</td>
                <td>ngt</td>
                <td>5132</td>
                <td>dsdsd</td>
                <td>ddd</td>
            </tr> <tr>
                <td>roshan</td>
                <td>ngt</td>
                <td>5132</td>
                <td>dsdsd</td>
                <td>ddd</td>
            </tr> <tr>
                <td>roshan</td>
                <td>ngt</td>
                <td>5132</td>
                <td>dsdsd</td>
                <td>ddd</td>
            </tr> <tr>
                <td>roshan</td>
                <td>ngt</td>
                <td>5132</td>
                <td>dsdsd</td>
                <td>ddd</td>
            </tr>
            <tr>
                <td>roshan</td>
                <td>sds</td>
                <td>513dsds2</td>
                <td>dsddssd</td>
                <td>addaa</td>
            </tr>


            <tr>
                <td>1roshan</td>
                <td>asdngt</td>
                <td>25132</td>
                <td>adaasdsdsd</td>
                <td>ddd</td>
            </tr>

            <tr>
                <td>roshan</td>
                <td>ngt</td>
                <td>5132</td>
                <td>dsdsd</td>
                <td>ddd</td>
            </tr>
            <tr>
                <td>roshan</td>
                <td>ngt</td>
                <td>5132</td>
                <td>dsdsd</td>
                <td>ddd</td>
            </tr>
            <tr>
                <td>roshan</td>
                <td>ngt</td>
                <td>5132</td>
                <td>dsdsd</td>
                <td>ddd</td>
            </tr>
            </tbody>

        </table>

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