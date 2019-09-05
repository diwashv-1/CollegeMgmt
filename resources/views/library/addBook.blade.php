@extends('layouts.master')



@section('content')
    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#add" role="tab"
               aria-controls="nav-home" aria-selected="true">Add Books </a>
            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#manage" role="tab"
               aria-controls="nav-profile" aria-selected="false">Manage</a>
        </div>
    </nav>


    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="add" role="tabpanel" aria-labelledby="nav-home-tab">
            <div class="card card-default container mt-5">
                <div class="card-body">
                    @if(session()->has('success'))
                        <div class="alert alert-info alert-dismissible fade show" role="alert">
                            {{session()->get('success')}}
                            <button type="button" class=" btn btn-danger close" data-dismiss="alert"
                                    aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                    @endif
                    <form action="{{route('Books.store')}}" class=" mt-2 " method="post"
                          enctype="multipart/form-data">
                        @csrf

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="">Book Name</label>
                                <input type="text" class="form-control" id="bookName" placeholder="Book Name"
                                       name="bookName">
                                <div class="text-danger">{{$errors->first('bookName')}} </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="inputAddress">Select Faculty</label>
                                <select id="selectFac" name="selectFac" class="form-control">
                                    <option value="">~~~~~~~SELECT~~~~~~</option>
                                    <option value="1"> Management</option>
                                    <option value="2"> Science</option>

                                </select>
                                <div class="text-danger"> {{$errors->first('selectFac')}}  </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="inputAddress">Author Name</label>
                                <input type="text" class="form-control" id="authorName" name="authorName"
                                       placeholder="Author Name">
                                <div class="text-danger">{{$errors->first('authorName')}} </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="inputAddress">Publisher</label>
                                <input type="text" class="form-control" id="publisher" name="publisher"
                                       placeholder="Publisher">
                                <div class="text-danger"> {{$errors->first('publisher')}} </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputAddress">Entry Date</label>
                                <input type="date" class="form-control" id="entryDate" name="entryDate"
                                       placeholder="Enter Date">
                                <div class="text-danger">{{$errors->first('entryDate')}} </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputAddress">Quantity</label>
                                <input type="number" class="form-control" id="quantity" name="quantity"
                                       placeholder="Quantity">
                                <div class="text-danger">{{$errors->first('quantity')}} </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="inputAddress">Price</label>
                                <input type="number" class="form-control" id="price" name="price"
                                       placeholder="Price">
                                <div class="text-danger">{{$errors->first('price')}} </div>
                            </div>


                            <div class="form-group col-md-6">
                                <label for="inputAddress">Book Code</label>
                                <input type="text" class="form-control" id="bookCode" name="bookCode"
                                       placeholder="Book Code">
                                <div class="text-danger">{{$errors->first('bookCode')}}</div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="inputAddress">Book Type</label>
                                <select id="bookType" name="bookType" class="form-control">
                                    <option class="align-content-center"> !!!!SELECT!!!!</option>
                                    <option value="1">Course Book</option>
                                    <option value="2">General</option>
                                    <option></option>
                                </select>
                                <div class="text-danger">{{$errors->first('bookType')}}</div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="inputAddress">ISBN Code</label>
                                <input type="text" class="form-control" id="bookCodeIsbn" name="isbnCode"
                                       placeholder="ISBN Code">
                                <div class="text-danger">{{$errors->first('isbnCode')}}</div>
                            </div>
                        </div>

                        <div class="col-md-1 ml-auto">
                            <input type="Submit" class=" btn btn-info btn-sm form-control" value="submit"
                                   name="submit">
                        </div>


                    </form>

                </div>
            </div>

        </div>

        <div class="tab-pane fade" id="manage" role="tabpanel" aria-labelledby="nav-manage-tab">

            <div class="container-fluid ">

                <table class="table table-striped table-responsive-sm mt-3">

                    <thead>

                    <tr>
                        <th>Book Name</th>
                        <th> Author Name</th>
                        <th> Publisher</th>
                        <th> Price</th>
                        <th> Date</th>
                        <th> Total quantity</th>
                        <th> Available quantity</th>
                        <th> Action</th>
                    </tr>
                    </thead>

                    <tbody>

                    @foreach($result as $res)
                        <tr>
                            <td> {{$res->bookName}} </td>
                            <td> {{$res->authorName}} </td>
                            <td> {{$res->publisher}}</td>
                            <td>{{$res->price}}</td>
                            <td>{{ $res->entryDate}}</td>
                            <td></td>
                            <td>{{$res->quantity}}</td>
                            <td>
                                <button type="button" class="btn btn-info bookBtn" data="{{$res->id}}"
                                        data-toggle="modal" id="bookBtn"
                                        data-target=".bd-example-modal-lg"><i
                                            class="fas fa-plus-circle"></i> Issue
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>


                {{-- addFurtherBook's Modal--}}

                @include ('library.addFurtherBookModal')


            </div>

        </div>

    </div>


@endsection



@section('scripts')

    <script>

        $('#myModal').on('hidden.bs.modal', function () {
            location.reload();
        });
        $('#xx').on('hidden.bs.modal', function () {
            location.reload();
        });
        $('#clos').on('hidden.bs.modal', function () {
            location.reload();
        });


        $('.bookBtn').click(function () {
            var id = $(this).attr('data');
            var name = $(this).closest('tr').find("td:eq(0)").text();

            $('#BookCode').val(name);
            $('#BookCode').attr('data', id);

            // window.location.reload(true);


            $.ajax({
                url: 'fetchBookCode',
                type: 'post',
                dataType: 'json',
                data: {
                    "_token": "{{ csrf_token() }}",
                    book_id: id
                },
                cache: false,
                success: function (response) {
                    var sn = 1;
                    var tableData;

                    $.each(response.result, function (k, v) {

                        tableData += '<tr> <td>' + sn + '</td>';
                        tableData += '<td>' + name + '</td>';
                        tableData += ' <td>' + v.code + '</td>';
                        tableData += ' <td>' + v.issue + '</tr></td>';
                        sn++;
                    });
                    $('#addBookTable tbody').append(tableData);
                    $('#addBookTable').dataTable({
                        responsive: true
                    });
                },


            });
        });

        $('#addfutherBtn').click(function () {

            var id = $('#BookCode').attr('data');
            var issueCode = $('#issueCode').val();

            if (issueCode != '') {
                $.ajax({
                    url: 'saveFurtherBook',
                    type: 'post',
                    dataType: 'json',
                    cache: false,
                    data: {

                        "_token": "{{ csrf_token() }}",
                        bookId: id,
                        code: issueCode
                    },
                    success: function (result) {
                        alert(result.success);
                        $('#issueCode').val('');

                    },

                    error: function (errors) {
                        $.each(errors, function (k, v) {
                            $.each(v.errors, function (k, v) {
                                alert(v.errorMsg);
                            });

                        });


                    }
                })
                ;

            } else {
                alert('Issue Code is required');
            }


        });


    </script>




@endsection
