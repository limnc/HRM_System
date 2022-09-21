@extends('layouts.adminLayout')
@section('pageHeader','Choose Department')
@section('title','Department')

@section('content')
<div class="row">
    <div class="col-3">
        <div class="card">
            <div class="card-header">
                <h1><i class="bi bi-pc-display-horizontal"></i></h1>
                <br>
                <h3>IT </h3>
            </div>
            <div class="card-body">
                <div class="text-right">
                    <a href="{{url('employees/IT')}}">See More</a>
                </div>

            </div>
        </div>
    </div>

    <div class="col-3">
        <div class="card">
            <div class="card-header">
                <h1><i class="bi bi-people-fill"></i></h1>
                <br>
                <h3>Human Resource </h3>
            </div>
            <div class="card-body">
                <div class="text-right">
                    <a href="{{url('employees/HR')}}">See More</a>
                </div>

            </div>
        </div>
    </div>

    <div class="col-3">
        <div class="card">
            <div class="card-header">
                <h1><i class="bi bi-shop"></i></h1>
                <br>
                <h3>Marketing </h3>
            </div>
            <div class="card-body">
                <div class="text-right">
                    <a href="{{url('employees/Marketing')}}">See More</a>
                </div>

            </div>
        </div>
    </div>

    <div class="col-3">
        <div class="card">
            <div class="card-header">
                <h1><i class="bi bi-receipt"></i></h1>
                <br>
                <h3>Accounting </h3>
            </div>
            <div class="card-body">
                <div class="text-right">
                    <a href="{{url('employees/Accounting')}}">See More</a>
                </div>

            </div>
        </div>
    </div>
</div>
</div>
@endsection
