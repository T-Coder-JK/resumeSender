@extends('layouts.app')
{{--show email template in an iframe element--}}
@section('content')
    <div class="container">
        <div id="htmlEditor" data-content="{{$template->content}}" data-id="{{$template->id}}"></div>
    </div>
@stop



