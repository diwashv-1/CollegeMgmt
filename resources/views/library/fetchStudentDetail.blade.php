@extends('layouts.master')

@section('content')


    <div class="container mt-4">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <td>#</td>
                <td> Student Name</td>
                <td> issued Date</td>
                <td> Expired Date</td>
                <td> Recieved</td>
                <td> Book Name</td>
                <td> Recieved Date</td>

            </tr>

            </thead>
            <tbody>
            @php ($sn =1)
            @foreach($result as $result)

                <tr>
                    <td>{{$sn++}}</td>
                    <td> {{$result->studentName}} </td>
                    <?php
                          $val =  substr($result->created_at,0,10);
                    ?>
                    <td>
                        {{$val}}
                    </td>
                    <td>{{$result->expire_Date}}</td>
                    @if($result->recieved == 1)
                        <td class="badge badge-success badge-sm w-75"> Recieved</td>
                    @else
                        <td class="badge badge-warning  badge-sm w-75"> Pending</td>
                    @endif
                    <td> {{$result->bookName}}</td>
                    <td>{{$result->returnedDate}}</td>
                </tr>
                @php ($sn+1 )
            @endforeach

            </tbody>
        </table>

    </div>


@stop


@section('scripts')



@endsection