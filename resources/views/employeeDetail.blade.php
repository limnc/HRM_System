@extends('layouts.adminLayout')
@section('title','Employee Details')
@section('pageHeader','Employee Details')
@section('content')
<style>
    th {
        width: 30%;
    }

    .imageBox img {
        width: 150px;
        height: 150px;
    }

</style>
<meta name="csrf-token" content="{{ csrf_token() }}">

<div class="card">
    <div class="card-header">
        <div class="card-body">
            <div class="text-center">
                <div class="imageBox">
                    <img src="{{asset('employee/'.$emp['profilePic'])}}" alt="">
                    <br>

                </div>
            </div>
            <br><br>
            <table class="table table-bordered">
                <h4>Employee Details</h4>

                <tbody>
                    <tr>
                        <th>Employee ID :</th>
                        <td><span id="empid">{{$emp['id']}}</span></td>
                    </tr>
                    <tr>
                        <th>Name :</th>
                        <td>
                            {{$emp['name']}}
                        </td>
                    </tr>
                    <tr>
                        <th>Department :</th>
                        <td>{{$emp['department']}}</td>
                    </tr>

                    <tr>
                        <th>Position :</th>
                        <td>{{$emp['position']}}</td>
                    </tr>

                    <tr>
                        <th>Job Title</th>
                        <td>{{$emp['job_title']}}</td>
                    </tr>

                    <tr>
                        <th>Joined Date :</th>
                        <td>{{$emp['joined_date']}}</td>
                    </tr>

                    <tr>
                        <th>Pay Grade :</th>
                        <td>{{$emp['pay_grade']}}</td>
                    </tr>

                    <tr>
                        <th>Performance : </th>
                        <td>
                            <h4 id="performanceValue"></h4>
                            <br>
                            <input type="range" class="form-control-range slider" id="performance" min="0" max="100" step="1">
                        </td>
                    </tr>
                </tbody>



            </table>
            <br>

        </div>
    </div>
</div>




<script>
    $(document).ready(function () {
        $('#performanceValue').html($('#performance').val());
        let empid = $('#empid').html();
        $('.alert').hide()
        $(document).on("change", "#performance", function () {
            // alert($(this).val());
            //$('.alert').fadeIn('slow')
            // setTimeout(function () {
            //     $('.alert').fadeOut('slow')
            // }, 3000);
            $('#performanceValue').html($(this).val());
        })


    })

</script>
@endsection
