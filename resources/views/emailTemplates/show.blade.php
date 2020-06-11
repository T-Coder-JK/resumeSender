@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <iframe style="width: 100%; height: 1450px; border: none;" src="{{url("/emailTemplates/".$template->id."/load")}}" >
            </iframe>
        </div>
    </div>
@stop



