<div class="tab-pane" id="staff" role="tabpanel" aria-labelledby="staff-tab">
    <div class="container ">

        <form id="staff_detail" method="post" action="{{route('staff.store')}}" enctype="multipart/form-data">
            @csrf
            <div id="add-student-messages">
                <?php
                ?>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6" style="">
                    <label for="">Full Name:</label>
                    <input type="text" class="form-control" id="sta_name" placeholder="Full Name"
                           name="sta_name">
                </div>

                <div class="form-group col-md-6">
                    <label for="inputAddress">Address:</label>
                    <input type="text" class="form-control" id="sta_add" name="sta_add"
                           placeholder="1234 Main St">
                </div>
            </div>

            <div class="form-group col-lg-7">
                <label for="inputState">Student Image:</label>
                <input type="file" name="sta_image" id="sta_image" class="form-control ">
            </div>

            <div class="form-group col-lg-7">
                <label for="inputZip">Phone Number:</label>
                <input type="number" class="form-control" name="sta_num" id="sta_num">
            </div>
            <div class="form-group col-lg-5">
                <label> Enrolled Year:</label>
                <input type="date" name="sta_enro" id="sta_enro" class="form-control">
            </div>

            <div class="form-group col-lg-4">
                <div class=" form-check form-check-inline ">
                    <label>Gender:</label>
                    <div>
                        <input type="radio" name="sta_gend" id="sta_gend" value="male" class="form-check-input">
                        Male
                    </div>
                    <div class="form-check  form-check-inline ">
                        <input type="radio" name="sta_gend" id="sta_gend" value="female"
                               class="form-check-input"> FeMale
                    </div>
                </div>
            </div>

            <div class="col-md-3" style="margin-top: 10px;">
                <button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-plus-circle"> </i>
                    Save Changes
                </button>
            </div>
    </div>

    </form>

</div>
</div>