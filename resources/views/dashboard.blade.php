@extends('layouts.adminLayout')
@section('title','Admin Dashboard')
@section('pageHeader','Dashboard')

@section('content')
<div class="row">
   @if(Session::has('roleid'))
    <h1>Welcome Back {{session('admin')}}</h1>
   @endif
</div>
@endsection