@extends('layouts.Dashboard')
@section('content')
    <div id="dashboard-page">
        <div class="row">
            <div id="sideBar" class="col-xl-2 col-md-3 col-4"></div>
            <form method="POST" action="{{route('logout')}}" style="display: none" id="logout-form">@csrf</form>
            <div id="dashboard" class="container bg-light vh-100 col-xl-10 col-md-9 col-8">
                <div class="d-flex flex-row border-bottom">
                    <div class=" flex-column align-self-start">
                        <div class="font-italic h7">overview</div>
                        <div class="font-weight-bold h2">Dashboard</div>
                    </div>
                    <div class="align-self-center ml-auto mr-2">
                        <a class="p-2 btn btn-success text-white font-weight-bold" href="{{url('application/'.$user->id.'/create')}}">New Application</a>
                    </div>

                </div>

                {{--TODO: OTHER FUNCTIONS FOR USER DASHBOARD--}}
            </div>
        </div>
    </div>
@endsection
