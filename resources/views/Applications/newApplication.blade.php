@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-10 col-sm-8 m-auto">
            <div class="title h1"> New Job Application</div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-10 col-sm-8 m-auto rounded border-danger">
            <form action="" method="POST" enctype="multipart/form-data">
                @csrf
                {{--company name input--}}
                <div class="form-group row m-auto pb-4 align-items-center">
                    <label for="company" class="col-form-label col-2 font-weight-bold">Company:</label>
                    <div class="col-10">
                        <input id="company" type="text" class="form-control @error('company') is-invalid @enderror" name="company" value="{{ old('company') }}" required autocomplete="company" autofocus placeholder="Company Name">

                        @error('company')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>
                </div>

                {{--job position input--}}
                <div class="form-group row m-auto pb-4 align-items-center">
                    <label for="position" class="col-form-label col-2 font-weight-bold">Position:</label>
                    <div class="col-10">
                        <input id="position" type="text" class="form-control @error('position') is-invalid @enderror" name="position" value="{{ old('position') }}" required autocomplete="position" autofocus placeholder="Job Position">

                        @error('position')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>
                </div>

                {{--company address input--}}
                <div class="form-group row m-auto pb-4 align-items-center">
                    <label for="address" class="col-form-label col-2 font-weight-bold">Address:</label>
                    <div class="col-10">
                        <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus placeholder="Company Address">

                        @error('address')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>
                </div>

                {{--application email address input--}}
                <div class="form-group row m-auto pb-4 align-items-center">
                    <label for="email" class="col-form-label col-2 font-weight-bold">Email:</label>
                    <div class="col-10">
                        <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Company Email">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>
                </div>

                {{--select email template input--}}
                <div class="form-group row m-auto pb-4 align-items-center">
                    <label for="emailTemplate" class="col-form-label col-2 font-weight-bold"> Email Template:</label>
                    <div class="col-10">
                        <select id="emailTemplate" type="text" class="form-control @error('emailTemplate') is-invalid @enderror" name="emailTemplate" value="{{ old('emailTemplate') }}" required autocomplete="emailTemplate" autofocus placeholder="Company Email">
                            <option value="">Please Select a Email Template</option>
                            @foreach($user->emailTemplate as $template)
                                <option value="{{$template->id}}">{{$template->title}}</option>
                            @endforeach
                        </select>

                        @error('emailTemplate')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>




@stop
