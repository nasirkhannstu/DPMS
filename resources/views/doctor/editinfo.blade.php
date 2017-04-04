@extends('app')
@section('title', 'Edit Information')
@section('style')
<link href="{{url('plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet" />
	<style></style>
@endsection
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
        @include ('partials._message')
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="login-box">
                <div class="panel panel-danger" style="padding:10px">
                    <div class="panel-heading">
                        <h3 class="panel-title">Account Info</h3> 
                    </div>
                    <form method="POST" action="{{route('postAccountInfo')}}">
                        {{ csrf_field() }}
                        <h4><b>Email: </b>{{Sentinel::getUser()->email}}</h4>
                        <div class="input-group">
                            <div class="form-line">
                                <input type="text" name="first_name" class="form-control" value="{{Sentinel::getUser()->first_name}}" required>
                            </div>
                        </div>
                        <br>
                        <div class="input-group">
                            <div class="form-line">
                                <input type="text" name="last_name" class="form-control" value="{{Sentinel::getUser()->last_name}}" required>
                            </div>
                        </div>
                        <!-- <h4><b>Password: </b><a href="/forgot-password">Reset Password</a></h4> -->
                        <br>
                        <div class="row">
                            <div class="col-xs-4">
                                <button class="btn btn-block bg-green waves-effect" type="submit">Update Info</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="login-box">
                <div class="panel panel-danger" style="padding:10px">
                    <div class="panel-heading">
                        <h3 class="panel-title">Account Info</h3> 
                    </div>
                    <form method="POST" action="{{route('postProfessionalInfo')}}">
                        {{ csrf_field() }}
                        <h1>Professional Info</h1><br>
                        <div class="input-group">
                            <div class="form-line">
                                <label>Speciality</label>
                                <input type="text" name="speciality" 
                                @if($doctor)
                                Value="{!! $doctor->speciality !!}"
                                @endif
                                class="form-control" placeholder="Epeciality" required>
                            </div>
                        </div>
                        <br>
                        <div class="input-group">
                            <div class="form-line">
                                <label>Work Place</label>
                                <textarea class="form-control" name="workplace" placeholder="Work Place" required>@if($doctor){{ $doctor->workplace }} @endif </textarea>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-xs-4">
                                <button class="btn btn-block bg-green waves-effect" type="submit">Add/Edit Profession</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 col-lg-offset-2 col-md-offset-2 col-sm-offset-2">
            <div class="login-box">
                <div class="card">
                    <div class="body">
                        <form method="POST" action="{{route('postPersonalInfo')}}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <h1>Personal Info</h1><br>
                            <div class="input-group">
                                <label>Gender</label>
                                <select class="form-control show-tick" name="gender">
                                    <option value="">-- Please select --</option>
                                    <option value="Male" 
                                        @if($docinfo)
                                            @if($docinfo->gender == 'Male')
                                                selected 
                                            @endif
                                        @endif 
                                        >Male</option>
                                    <option value="Female"
                                        @if($docinfo)
                                            @if($docinfo->gender == 'Female')
                                                selected 
                                            @endif
                                        @endif 
                                    >Female</option>
                                </select>
                            </div>
                            <div class="input-group">
                                <label>Permanent Address</label>
                                <div class="form-line">
                                    <textarea class="form-control" name="address" placeholder="Address" required>@if($docinfo) {!! $docinfo->address !!} @endif </textarea>
                                </div>
                            </div>
                            <div class="input-group">
                                <label>Present Address</label>
                                <div class="form-line">
                                    <textarea class="form-control" name="paddress" placeholder="Present Address" required>@if($docinfo){{ $docinfo->paddress }} @endif </textarea>
                                </div>
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">profession</i>
                                </span>
                                <div class="form-line">
                                    <label>Profession</label>
                                    <input type="text" name="profession" 
                                    @if($docinfo)
                                    Value="{!! $docinfo->profession !!}"
                                    @endif
                                    class="form-control" required>
                                </div>
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">phone</i>
                                </span>
                                <div class="form-line">
                                    <label>Phone No</label>
                                    <input type="text" name="phone" 
                                    @if($docinfo)
                                    Value="{!! $docinfo->phone !!}"
                                    @endif
                                    class="form-control" required>
                                </div>
                            </div>
                            <div class="input-group">
                                <label>Profile Picture</label>
                                <input type="file" name="photo" class="form-control">
                            </div>
                            <div class="row">
                                <div class="col-xs-4">
                                    <button class="btn btn-block bg-green waves-effect" type="submit">Add/Edit Information</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</section>
@endsection
@section('script')
<script src="{{url('js/pages/forms/basic-form-elements.js')}}"></script>
@endsection