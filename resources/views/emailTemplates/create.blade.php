@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8 offset-2">


               <form method="POST" enctype="multipart/form-data" action="/emailTemplates">
                   @csrf
                   <div class="form-group-inline">
                       <label for="title" class="pl-2">Template Title</label>
                       <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus placeholder="Email Template Title">

                       @error('title')
                       <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                    </span>
                       @enderror
                   </div>



                   <div class="input-group mt-5">
                       <div class="input-group-prepend">
                           <span class="input-group-text">Template HTML Content</span>
                       </div>
                       <textarea id="content" type="textarea" class="form-control @error('content') is-invalid @enderror vh-100" name="content" value="{{ old('content') }}" required autofocus placeholder="Email Template Html Content"></textarea>

                       @error('content')
                       <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                    </span>
                       @enderror
                   </div>


                   <div class="row pt-4 pr-3 justify-content-end">

                       <button class="btn-primary h4 rounded pt-2 pl-7 pr-7 pb-2">Add New Template</button>

                   </div>

               </form>


            </div>
        </div>
    </div>
@stop
