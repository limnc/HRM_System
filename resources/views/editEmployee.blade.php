@extends('layouts.adminLayout')
@section('pageHeader','Edit Employee')
@section('content')
<style>
    .image_container {
        width: 300px;
        height: 300px;
        border: 2px;
        background-position: center;
        background-size: cover;
    }

    #display-image {
        width: 400px;
        height: 225px;
        border: 1px solid black;
        background-position: center;
        background-size: cover;
    }

    .imageBox img {
        width: 150px;
        height: 150px;
    }

</style>
<meta name="csrf-token" content="{{ csrf_token() }}">

<div class="row">
    <div class="col-12">


        <div class="card">
            <div class="card-body">
                @if(Session::has('success'))
                <div class="alert alert-success">{{session('success')}} </div>
                @endif

                @if(Session::has('fail'))
                <div class="alert alert-danger">{{session('fail')}}</div>
                @endif


                <div class="text-center">
                    <div class="imageBox">
                        <img src="{{asset('employee/'.$emp['profilePic'])}}" alt="">
                        <br>

                    </div>
                </div>

                <br><br>



                <form action="{{url('editEmployee/edit')}}" method="post" autocomplete="off"
                    enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="row">

                        <div class="col-2"></div>
                        <div class="col-8">
                            <!--Basic Info-->
                            <h2>Basic Information</h2>
                            <br>
                            <div class="mb-3 row">
                                <label for="name" class="col-sm-4 col-form-label">Employee ID : </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="empid" name="empid" value="{{$emp['id']}}" readOnly>

                                </div>
                            </div>
                            <br>
                            <div class="mb-3 row">
                                <label for="name" class="col-sm-4 col-form-label">Employee Name : </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="name" name="empName">
                                    @error('name')
                                    <li class="text-danger"><i class="bi bi-exclamation"></i>{{$message}}</li>
                                    @enderror
                                </div>
                            </div>
                            <br>

                            <div class="mb-3 row">
                                <label for="nationality" class="col-sm-4 col-form-label">Nationality : </label>
                                <div class="col-sm-8">
                                    <select name="nationality" id="nationality" class="form-control">
                                        <option value="">Select Nationality</option>
                                        <option value="Local">Local</option>
                                        <option value="Foreign">Foreign</option>
                                    </select>
                                    @error('nationality')
                                    <li class="text-danger"><i class="bi bi-exclamation"></i>{{$message}}</li>
                                    @enderror
                                </div>
                            </div>
                            <br>

                            <div class="mb-3 row">
                                <label for="gender" class="col-sm-4 col-form-label">Gender : </label>
                                <div class="col-sm-8">
                                    <select name="gender" id="gender" class="form-control">
                                        <option value="">Select Gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                    @error('gender')
                                    <li class="text-danger"><i class="bi bi-exclamation"></i>{{$message}}</li>
                                    @enderror
                                </div>
                            </div>
                            <br>

                            <div class="mb-3 row">
                                <label for="race" class="col-sm-4 col-form-label">Race :</label>
                                <div class="col-sm-8">
                                    <select name="race" id="race" class="form-control">
                                        <option value="">Select Race</option>
                                        <option value="Malay">Malay</option>
                                        <option value="Chinese">Chinese</option>
                                        <option value="Indian">Indian</option>
                                    </select>
                                    @error('race')
                                    <li class="text-danger"><i class="bi bi-exclamation"></i>{{$message}}</li>
                                    @enderror
                                </div>
                            </div>
                            <br>

                            <div class="mb-3 row">
                                <label for="birthdate" class="col-sm-4 col-form-label">Birthdate : </label>
                                <div class="col-sm-8">
                                    <input type="date" name="birthdate" id="birthdate" class="form-control">
                                </div>
                            </div>
                            <br>

                            <div class="mb-3 row">
                                <label for="contactNum" class="col-sm-4 col-form-label">Contact Number : </label>
                                <div class="col-sm-8">
                                    <input type="text" name="contactNum" id="contactNum" class="form-control">
                                </div>
                            </div>
                            <br>

                            <div class="mb-3 row">
                                <label for="address" class="col-sm-4 col-form-label">Address : </label>
                                <div class="col-sm-8">
                                    <input type="text" name="address" id="address" class="form-control">
                                </div>
                            </div>
                            <br>

                            <div class="mb-3 row">
                                <label for="maritalStat" class="col-sm-4 col-form-label">Marital Status :</label>
                                <div class="col-sm-8">
                                    <select name="marialStat" id="marialStat" class="form-control">
                                        <option value="">Select Status</option>
                                        <option value="Single">Single</option>
                                        <option value="Married">Married</option>
                                        <option value="Divorced">Divorced</option>
                                        <option value="Widowed">Widowed</option>
                                    </select>
                                </div>
                            </div>
                            <br>




                            <!--ENd Basic Info-->
                            <br>
                            <hr>
                            <br>
                            <h2>Qualifications</h2>
                            <br>
                            <div class="mb-3 row">
                                <label for="educationLevel" class="col-sm-4 col-form-label">Highest Education Level :
                                </label>
                                <div class="col-sm-8">
                                    <select name="educationLevel" id="educationLevel" class="form-control">
                                        <option value="">Please Select</option>
                                        <option value="PhD">Philosophy</option>
                                        <option value="MS">Master Degree</option>
                                        <option value="BD">Bachelor Degree</option>
                                        <option value="DP">Diploma</option>
                                        <option value="spm">SPM</option>
                                    </select>

                                </div>
                            </div>
                            <br>
                            <div class="mb-3 row">
                                <label for="institution" class="col-sm-4 col-form-label">Institution : </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="institution" name="institution"
                                        placeholder="Enter Institution">
                                </div>
                            </div>
                            <br>

                            <div class="mb-3 row">
                                <label for="professional" class="col-sm-4 col-form-label">Professional : </label>
                                <div class="col-sm-8">
                                    <select name="professional" id="professional" class="form-control">
                                        <option value="">Select Professional</option>
                                        @foreach($professions as $profession)
                                        <option value="{{$profession}}">{{$profession}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <br>

                            <!-- Job Info-->
                            <br>
                            <hr>
                            <br>
                            <h2>Job Details</h2>
                            <br>
                            <div class="mb-3 row">
                                <label for="department" class="col-sm-4 col-form-label">Department : </label>
                                <div class="col-sm-8">
                                    <select name="department" id="department" class="form-control">
                                        <option value="">Please Select</option>
                                        @foreach($department as $d)
                                        <option value="{{$d}}">{{$d}}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                            <br>


                            <div class="mb-3 row">
                                <label for="jobTitle" class="col-sm-4 col-form-label">Job Title</label>
                                <div class="col-sm-8">
                                    <select name="jobTitle" id="jobTitle" class="form-control">
                                        <option value="">Select Job Title</option>





                                    </select>
                                </div>
                            </div>

                            <br>

                            <div class="mb-3 row">
                                <label for="position" class="col-sm-4 col-form-label">Position</label>
                                <div class="col-sm-8">
                                    <select name="position" id="position" class="form-control">
                                        <option value="">Select Position</option>
                                        @foreach($positions as $position)

                                        <option value="{{$position}}">{{$position}}</option>

                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <br>

                            <div class="mb-3 row">
                                <label for="joinedDate" class="col-sm-4 col-form-label">Joined Date : </label>
                                <div class="col-sm-8">
                                    <input type="date" name="joinedDate" id="joinedDate" class="form-control">
                                </div>
                            </div>
                            <br>
                            <div class="mb-3 row">
                                <label for="confirmDate" class="col-sm-4 col-form-label">Confirmation Date : </label>
                                <div class="col-sm-8">
                                    <input type="date" name="confirmDate" id="confirmDate" class="form-control">
                                </div>
                            </div>
                            <br>


                            <div class="mb-3 row">
                                <label for="payGrade" class="col-sm-4 col-form-label">Pay Grade : </label>
                                <div class="col-sm-8">
                                    <select name="paygrade" id="paygrade" class="form-control">
                                        <option value="">Select Pay Grade</option>
                                        <option value="A">Class A</option>
                                        <option value="B">Class B</option>
                                        <option value="C">Class C</option>
                                    </select>
                                </div>
                            </div>
                            <br>
                            <!--end job info-->
                            <br>
                            <hr>
                            <br>
                            <h2>Profile</h2>
                            <br>
                            <div class="mb-3 row">
                                <label for="profilePic" class="col-sm-4 col-form-label">Profile Image: </label>
                                <div class="col-sm-8">
                                    <input type="file" name="profilePic" id="profilePic" class="collapse"
                                        onchange="image_select()">
                                    <a href="#" id="browseFile" class="btn btn-outline-primary"
                                        onclick="browse();">Browse</a> &emsp;
                                    <label for="browseFile" id="filename">Choose file</label>
                                    <br><br>
                                    <div id="image-container">
                                        <div class="image_container d-flex justify-content-center position-relative text-center border border-primary"
                                            id="imageCon">

                                        </div>


                                    </div>
                                </div>
                            </div>
                            <br>






                        </div>
                    </div>

                    <div class="text-center">
                        <button class="btn btn-primary">Save Changes</button>
                    </div>

                </form>




            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $.ajaxSetup({

            headers: {

                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

            }

        });

        $('#department').on('change', function () {
            var department = $(this).val();
            fetchJobTitle(department);

        })


        fetchEmployeeDetails();

    });

    function fetchJobTitle(department) {
        var _token = $('input[name="_token"]').val();
        var dropdown = '<option value="">Select Job Title</option>';

        if (!department == "") {
            $.ajax({
                url: "http://localhost:8000/api/fetchJobTitle",
                method: "POST",
                data: {
                    department: department
                },
                dataType: 'json',
                success: function (data) {
                    for (var i = 0; i < data.length; i++) {
                        console.log(data[i]);
                        dropdown += '<option value ="' + data[i] + '">' + data[i] +
                            '</option>';
                    }
                    $('#jobTitle').html(dropdown);
                }
            })
        }
    }



    function fetchEmployeeDetails() {
        var empID = $('#empid').val();
        $.ajax({
            url: "http://localhost:8000/api/fetchEmployee",
            method: "POST",
            data: {
                empID: empID
            },
            dataType: 'json',
            success: function (data) {
                $('#name').val(data['name']);
                $('#nationality').val(data['nationality']);
                $('#gender').val(data['gender']);
                $('#race').val(data['race']);
                $('#birthdate').val(data['birthdate']);
                $('#contactNum').val(data['contactNum']);
                $('#address').val(data['address']);
                $('#marialStat').val(data['marialStat']);
                $('#educationLevel').val(data['education_level']);
                $('#institution').val(data['institution']);
                $('#professional').val(data['professional']);
                $('#department').val(data['department']);
                $('#jobTitle').html('<option value="' + data['job_title'] + '">' + data['job_title'] +
                    '</option>');
                $('#position').val(data['position']);
                $('#joinedDate').val(data['joined_date']);
                $('#confirmDate').val(data['confirmation_date']);
                $('#paygrade').val(data['pay_grade']);
                

            }

        })
    }

    function browse() {
        document.getElementById("profilePic").click();

    }



    const image_input = document.querySelector("#profilePic");
    image_input.addEventListener("change", function () {
        const reader = new FileReader();
        reader.addEventListener("load", () => {
            const uploaded_image = reader.result;
            //document.querySelector("#display-image").style.backgroundImage = `url(${uploaded_image})`;
            document.querySelector(".image_container").style.backgroundImage = `url(${uploaded_image})`;
        });
        reader.readAsDataURL(this.files[0]);
    });

</script>

@endsection
