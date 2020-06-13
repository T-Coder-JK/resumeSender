@extends('layouts.app')
@section('content')
<div id="dashboard" class="container bg-light vh-100">
    <div class="d-flex flex-row border-bottom">
        <div class=" flex-column align-self-start">
            <div class="font-italic h7">overview</div>
            <div class="font-weight-bold h2">Dashboard</div>
        </div>
        <div class="align-self-center ml-auto">
                <a class="p-2 btn btn-success text-white font-weight-bold" href="{{url('application/'.$user->id.'/create')}}">New Application</a>
        </div>

    </div>
</div>
@endsection
