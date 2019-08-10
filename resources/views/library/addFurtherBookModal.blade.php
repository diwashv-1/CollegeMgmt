<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
     aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header h-25">
                <h4 class="text-primary">Add Book's Code</h4>
                <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="col-md-12">

                            <label for="Book Name">BookName:</label>
                            <input type="text" class="form-control" data ="" id="BookCode" disabled>
                        </div>
                        <div class="col-md-12 mt-4">
                            <label for="pwd" class="ml-1">Issue Code</label>
                            <input type="text" class="form-control" id="issueCode">
                        </div>

                        <div class="mt-4 ml-1 col-md-4">
                            <button type="submit" class="btn btn-primary btn-sm" id="addfutherBtn"><i class="fas fa-plus"></i> Add
                            </button>
                        </div>
                    </div>

                    <div class="col-md-7 offset-1 ">
                        <table class="table-striped table-sm container" id="addBookTable">
                            <thead>
                            <tr>
                                <th>SN</th>
                                <th>Name</th>
                                <th>Code</th>
                                <th>Issued</th>
                            </tr>
                            </thead>

                            <tbody>
                            </tbody>
                        </table>
                    </div>


                </div>


            </div>


        </div>
    </div>
</div>