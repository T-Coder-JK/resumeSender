@extends('layouts.Dashboard')
@section('content')
    <div id="dashboard-page">
        <div class="row">
            <div id="sideBar" class="col-xl-2 col-md-3 col-4">
                <div class="container sidebar-select py-5">
                    <div class="py-2 text-white" style="padding-left: 5px">
                        <div class="pl-md-4 pl-2">
                            <h4 class="font-weight-light nav-title">Control Panel</h4>
                        </div>
                    </div>
                    <div class="side-links py-2 text-white-50">
                        <div class="pl-md-4 pl-2">
                            <img src="{{url('/images/SVG/dashboard/dashboard_icon.svg')}}" alt="image"><a href="{{url('/')}}">Home Page</a>
                        </div>
                    </div>
                    <div class="side-links py-2 text-white-50">
                        <div class="pl-md-4 pl-2">
                            <img src="{{url('/images/SVG/dashboard/emailTemplate_icon.svg')}}"><a href="{{url('/emailTemplates')}}">Resume Template</a>
                        </div>
                    </div>
                    <div class="side-links py-2 text-white-50">
                        <div class="pl-md-4 pl-2">
                            <img src="{{url('/images/SVG/dashboard/logout_icon.svg')}}"><a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                            <form style="display: none" action="{{route('logout')}}" method="POST" id="logout-form">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div id="dashboard" class="container bg-light vh-100 col-xl-10 col-md-9 col-8">
                <div class="d-flex flex-row border-bottom">
                    <div class=" flex-column align-self-start">
                        <div class="font-italic h7">overview</div>
                        <div class="font-weight-bold h2">Dashboard</div>
                    </div>
                    <div class="align-self-center ml-auto">
                        <a class="p-2 btn btn-success text-white font-weight-bold" href="{{url('application/'.$user->id.'/create')}}">New Application</a>
                    </div>

                </div>

                {{--TODO: OTHER FUNCTIONS FOR USER DASHBOARD--}}
            </div>
        </div>
    </div>
@endsection
