@extends('layouts.app')
@section('content')

<div class="container" id="newApplication-page">
    <div class="row">
        <div class="col-10 col-sm-8 m-auto">
            <div class="title h1"> New Job Application</div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-10 col-sm-8 m-auto rounded border-danger">
            <form action="{{route('createNewApplication')}}" method="POST" enctype="multipart/form-data">
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

                {{--company contact number input--}}
                <div class="form-group row m-auto pb-4 align-items-center">
                    <label for="contact" class="col-form-label col-2 font-weight-bold">Contact:</label>
                    <div class="col-10">
                        <input id="contact" type="text" class="form-control @error('contact') is-invalid @enderror" name="contact" value="{{ old('contact') }}" autocomplete="contact" autofocus placeholder="Contact Phone Number">

                        @error('contact')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>
                </div>

                {{--Job ads from input--}}
                <div class="form-group row m-auto pb-4 align-items-center">
                    <label for="job_ad" class="col-form-label col-2 font-weight-bold">Ad From:</label>
                    <div class="col-10">
                        <input id="job_ad" type="text" class="form-control @error('job_ad') is-invalid @enderror" name="job_ad" value="{{ old('job_ad') }}" autocomplete="job_ad" autofocus placeholder="Job Advertisement URL">

                        @error('job_ad')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>
                </div>

                {{--salary input--}}
                <div class="form-group row m-auto pb-4 align-items-center">
                    <label for="salary" class="col-form-label col-2 font-weight-bold">Salary:</label>
                    <div class="col-10">
                        <input id="salary" type="text" class="form-control @error('salary') is-invalid @enderror" name="salary" value="{{ old('salary') }}"  autocomplete="salary" autofocus placeholder="Salary">

                        @error('salary')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>
                </div>

                {{--select email template input--}}
                <div class="form-group row m-auto pb-4 align-items-center">
                    <label for="emailTemplate" class="col-form-label col-2 font-weight-bold">Email Template:</label>
                    <div class="col-10">
                        <select id="emailTemplate" type="text" class="form-control selectpicker @error('emailTemplate') is-invalid @enderror" name="emailTemplate" autocomplete="emailTemplate" autofocus required>
                            <option value="">Please Select a Email Template</option>
                            @foreach($user->emailTemplate as $template)
                                <option value="{{$template->id}}" {{old('emailTemplate') == $template->id ? 'selected':''}}>{{$template->title}}</option>
                            @endforeach
                        </select>

                        @error('emailTemplate')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>
                </div>
                {{--TODO: MODIFY THE SELECT ELEMENT FRONTEND AND OLD DATA FUNCTION--}}
                {{--select job type input--}}
                <div class="form-group row m-auto pb-4 align-items-center">
                    <label for="job_type" class="col-form-label col-2 font-weight-bold">Job Type:</label>
                    <div class="col-10">
                        <select id="job_type" class="form-control selectpicker @error('job_type') is-invalid @enderror" name="job_type" autocomplete="job_type" autofocus required>
                            <option value="">Job Type</option>
                            <option value="full_time" {{old('job_type') == 'full_time' ? 'selected':''}}>Full Time</option>
                            <option value="part_time" {{old('job_type') == 'part_time' ? 'selected':''}}>Part Time</option>
                            <option value="contract" {{old('job_type') == 'contract' ? 'selected':''}}>Contract</option>
                            <option value="casual" {{old('job_type') == 'casual' ? 'selected':''}}>Casual</option>
                        </select>

                        @error('job_type')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>
                </div>

                {{--select personal rank input--}}
                <div class="form-group row m-auto pb-4 align-items-center">
                    <label for="personal_rank" class="col-form-label col-2 font-weight-bold">Personal Rank:</label>
                    <div class="col-10">
                        <select id="personal_rank" type="text" class="form-control selectpicker @error('personal_rank') is-invalid @enderror" name="personal_rank" autocomplete="personal_rank" required autofocus>
                            <option value="">Personal Rank</option>
                            @for ($i = 1; $i < 11; $i++)
                               <option value="{{$i}}" {{old('personal_rank') == $i ? 'selected':''}}>{{$i}}</option>
                            @endfor
                        </select>

                        @error('personal_rank')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>
                </div>

                {{--select possibility input--}}
                <div class="form-group row m-auto pb-4 align-items-center">
                    <label for="possibility" class="col-form-label col-2 font-weight-bold">Possibility:</label>
                    <div class="col-10">
                        <select id="possibility" type="text" class="form-control selectpicker @error('possibility') is-invalid @enderror" name="possibility" autocomplete="possibility" required autofocus>
                            <option value="">Possibility</option>
                            @for ($i = 1; $i < 11; $i++)
                                <option value="{{$i}}" {{old('possibility') == $i ? 'selected':''}}>{{$i}}</option>
                            @endfor
                        </select>

                        @error('possibility')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>
                </div>
                {{--addition description input--}}
                <div class="form-group row m-auto pb-4 align-items-center">
                    <label for="description" class="col-form-label col-2 font-weight-bold">Addition Description:</label>
                    <div class="col-10">
                        <textarea id="description" type="text" style="height: 180px" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" autocomplete="description" autofocus placeholder="Addition Description"></textarea>

                        @error('description')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row m-auto align-items-center justify-content-end">
                    <button class="btn-primary mr-3 pt-1 pb-1 pr-3 pl-3 rounded">Preview</button>
                </div>
            </form>

        </div>
    </div>
</div>


@stop
