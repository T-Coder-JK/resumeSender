@extends('layouts.app')
@section('content')
    <div class="container" id="emailTemplate-page">
        <div class="col-12 flex-center ">
            <section id="templates">
                <div class="wrapper">
                    <h1>Email Templates</h1>
                    <ui>
                        <li>
                            <div class="card text-center">
                                <div class="card-header card-back">Create New Template</div>
                                <a href="{{route('createEmailTemplate')}}">
                                    <div class="card-body">

                                        <img src="{{url('/images/SVG/add_new_template.svg')}}" alt = "Image">

                                    </div>
                                </a>
                            </div>
                        </li>
                        @if (sizeof($user->emailTemplate))
                            @foreach($user->emailTemplate as $emailTemplate)
                                <li>
                                    <div class="card text-center">
                                        <div class="card-header card-back">{{$emailTemplate->title}}</div>
                                        <a href="{{url('/emailTemplates/'.$emailTemplate->id.'/show')}}">
                                            <div class="card-body">
                                                <img src="{{url('/images/SVG/email_template.svg')}}" alt = "Image">
                                            </div>
                                        </a>
                                    </div>
                                </li>
                            @endforeach
                        @endif
                    </ui>
                </div>
            </section>
        </div>
    </div>
@stop
