
<div class=" tab-pane active ml-3 mr-2 " id="student" >
<div> {{$errors->first('std_name')}}  </div>


    <form method="post" enctype="multipart/form-data" action="{{route('student.store')}}" id="studentDetail">
@csrf
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="">Full Name</label>
                <input type="text" class="form-control" id="std_name" placeholder="Full Name" name="std_name">
                <div class="text-danger"> {{$errors->first('std_name')}}  </div>

            </div>

            <div class="form-group col-md-6">
                <label for="inputAddress">Address</label>
                <input type="text" class="form-control" id="std_add"  name="std_add" placeholder="1234 Main St">
                <div class="text-danger"> {{$errors->first('std_add')}} </div>

            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="">Father's Name</label>
                <input type="text" class="form-control" id="std_fath" name="std_fath">
                <div class="text-danger"> {{$errors->first('std_fath')}}  </div>

            </div>

            <div class="form-group col-md-4">
                <label for="inputState">Student Image:</label>
                <input type="file" name="std_image" id="std_image" class="form-control ">
                <div class="text-danger"> {{$errors->first('std_image')}}  </div>

            </div>
            <div class="form-group col-md-4">
                <label for="inputZip">Phone Number:</label>
                <input type="number" class="form-control" name="std_num" id="std_num">
                <div class="text-danger"> {{$errors->first('std_num')}}  </div>

            </div>
        </div>

        <div class="form-row" >
            <div class="form-group col-md-6">
                <label > Faculty Slect:</label>
                <select id="fac" name="fac" class="form-control">
                    <option value="">~~~~SELECT~~~~</option>



                </select>

            </div>

            <div class="form-group col-md-6">
                <label > Course Select:</label>
                <select id="cou" name="cou" class="form-control" placeholder=" ">
                    <option value="" class="">~~~~~Select Course~~~~~</option>


                </select>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-2">
                <label> Enrolled Year:</label>
                <input type="date" name="std_enro" id="std_enro" class="form-control">
                <div class="text-danger"> {{$errors->first('std_enro')}}  </div>

            </div>
            <div class="col-md-2">
                <div class="form-check ">
                    <label>Gender:</label>
                    <div>
                        <input type="radio" name="std_gend" id="std_gend" value="male" class="form-input-check">Male
                    </div>
                    <div class="form-check ">
                        <input type="radio" name="std_gend" id="std_gend" value="female" class="form-input-check">FeMale

                    </div>
                    <div class="text-danger"> {{$errors->first('std_gend')}}  </div>

                </div>
            </div>

            <div class="form-group col-md-4">
                <label>  Email: </label>
                <input type="email" name="std_email" id="std_email" class="form-control">
                <div class="text-danger"> {{$errors->first('std_email')}}  </div>

            </div>


            <div class="form-group col-md-4">
                <label>  Password: </label>
                <input type="password" name="std_pwd" id="std_pwd" class="form-control">
                <div class="text-danger"> {{$errors->first('std_pwd')}}  </div>

            </div>
        </div>

        <div class="">

            <button type="submit" class="btn btn-primary" name="submit"> <i class="fa fa-plus-circle"> </i> Save </button>
        </div>

    </form>

</div>
