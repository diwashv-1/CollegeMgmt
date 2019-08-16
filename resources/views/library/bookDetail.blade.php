<div class="col-md-12">
    <table class=" c0l-md-12table table-striped container mt-4" id="dataTable">
        <thead>
        <tr>
            <th>#S.N</th>
            <th>Book Name</th>
            <th> publisher Name</th>
            <th> Author Name</th>
            <th> Book Code</th>
            <th>Book Type</th>
            <th>Availability</th>
            <th>ISBN Code</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Faculty</th>

            <td> Action</td>
        </tr>
        </thead>
        <tbody>

        <?php

        $sn=1;

        ?>

        @foreach($books as $row)
            <tr>
                <td>
                    <?php
                        echo($sn);
                        $sn++;
                    ?>
                </td>
                <td>{{$row->bookName}}</td>
                <td>{{$row->publisher}}</td>
                <td>{{$row->authorName}}  </td>
                <td> {{$row->bookCode  }} </td>
                <td> {{$row->bookType}} </td>
                <td class="">
                    {{--{{ $row->quantity !==  0 ?  'Available'  : 'Not Available'   }}
--}}
                    <?php
                    if ( $row->quantity != 0) {
                        $res = '<div class="badge badge-success w-100"> Available </div>' ;
                            echo ($res);
                        } else {
                        $res =  '<div class="badge badge-danger w-100">Not Available </div>' ;
                            echo ($res);
                    }
                    ?>
                </td>
                <td class="">  {{$row->isbnCode}}  </td>
                <td> {{$row->quantity}} </td>
                <td> {{$row->price}} </td>
                <td>{{$row->facultyId}}</td>
                <td class="">
                    <a href="#" class="btn btn-warning btn-sm w-100">Edit </a>
                    <a href="#" class="btn btn-danger btn-sm w-100">Delete</a>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>

</div>



@section('scripts')
    <script>

        $(document).ready(function () {

            $('#dataTable').DataTable();

        });


    </script>




@stop


