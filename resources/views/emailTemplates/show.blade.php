@extends('layouts.app')
{{--show email template in an iframe element--}}
@section('content')
    <div class="container">
        <div id="htmlEditor" data-content="{{$template->content}}"></div>
    </div>
@stop



