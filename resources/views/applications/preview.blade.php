@extends('layouts.app')
@section('content')
    <div class="container" id="previewApplication">
        <div class="row">
            <div class="col-12">
                <iframe style="width: 100%; height: 1450px; border: none;" src="{{url('/emailTemplates/1/load')}}">
            </iframe>
        </div>
        </div>
    </div>
@stop
