@extends('layouts.Dashboard')
@section('content')
    <div id="dashboard-page">
        <div class="row p-0 m-0">
            <div id="sideBar"></div>
            <form method="POST" action="{{route('logout')}}" style="display: none" id="logout-form">@csrf</form>
            <div id="dashboard" class="bg-light vh-100 ">
                <div class="d-flex flex-row border-bottom sticky-top bg-light">
                    <div class=" flex-column align-self-start pl-2">
                        <div class="font-italic h7">overview</div>
                        <div class="font-weight-bold h2">Dashboard</div>
                    </div>
                    <div class="align-self-center ml-auto mr-2">
                        <a class="p-2 btn btn-success text-white font-weight-bold" href="{{url('application/'.$user->id.'/create')}}">New Application</a>
                    </div>
                </div>
                <div id="card-section"></div>
            </div>
        </div>
    </div>
@endsection
