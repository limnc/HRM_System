@extends('layouts.adminLayout')
@section('title','Employee')
@section('pageHeader','Employee')
@section('content')


  <div class="text-left">
    <a href="{{url('department')}}" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Back</a>
  </div>

    <div class="text-right">
        <a href="{{url('addEmployee')}}" class="btn btn-primary"><i class="bi bi-plus"></i>Add Employee</a>
    </div>


<br>

<div class="card">

    <div class="card-body">

        <br>


        <table class="table table-bordered datatable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach($employees as $key=>$emp)
                <tr>
                    <td>{{++$key}}</td>
                    <td>{{$emp['name']}}</td>
                    <td>{{$emp['department']}}</td>
                    <td>
                        <a href="{{url('viewEmployee/'.$emp['id'])}}"><i class="bi bi-eye"> </i></a>
                        <a href="{{url('editEmployee/'.$emp['id'])}}"><i class="bi bi-pencil"> </i></a>
                    </td>
                </tr>

                @endforeach
                <!-- <tr>
                    <td>1.</td>
                    <td>XXX</td>
                    <td>XXX</td>
                    <td>
                        <a href="{{url('viewEmployee')}}"><i class="bi bi-pencil">View</i></a>
                    </td>

                </tr> -->

            </tbody>
        </table>
    </div>
</div>

<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('.table').dataTable();
    });

    //modal 


    //description
    // ajax-filter 

</script>
@endsection
