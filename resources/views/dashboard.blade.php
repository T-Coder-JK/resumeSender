@extends('layouts.dashboard')
@section('content')
    <div id="dashboard-page">
        <div class="row p-0 m-0">
            <div id="sideBar" user-name="{{$user->name}}" user-id="{{$user->id}}"></div>
            <form method="POST" action="{{route('logout')}}" style="display: none" id="logout-form">@csrf</form>
            <div id="dashboard" class="bg-light vh-100 ">
                <div id="content" user-id="{{$user->id}}"></div>
            </div>
        </div>
    </div>
@endsection
