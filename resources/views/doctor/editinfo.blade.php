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
                <div class="panel panel-info" style="padding:10px">
                    <div class="panel-heading">
                        <h3 class="panel-title">Account Info</h3>
                    </div>
                    <form method="POST" action="{{route('postAccountInfo')}}">
                        {{ csrf_field() }}
                        <br>
                        <h4><b>Email: </b>{{Sentinel::getUser()->email}}</h4>
                        <br>
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
                                <button class="btn btn-block btn-info" type="submit">Update Info</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="login-box">
                <div class="panel panel-info" style="padding:10px">
                    <div class="panel-heading">
                        <h3 class="panel-title">Account Info</h3> 
                    </div>
                    <form method="POST" action="{{route('postProfessionalInfo')}}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <h1>Professional Info</h1><br>
                        <div class="input-group">
                            <div class="form-line">
                                <label>Speciality</label>
                                <input type="text" name="speciality" 
                                @if($doctor)
                                Value="{{ $doctor->speciality }}"
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
                        <br>
                        <div class="input-group">
                            <div class="form-line">
                                <label>VNBC Number</label>
                                <input type="text" name="vnbc" 
                                @if($doctor)
                                Value="{{ $doctor->vnbc }}"
                                @endif
                                class="form-control" placeholder="VNBC number" required>
                            </div>
                        </div>
                        <br>
                        <div class="input-group">
                            <input type="file" name="avatar" accept="image/*">
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-xs-4">
                                <button class="btn btn-block btn-info" type="submit">Add/Edit Profession</button>
                            </div>
                        </div>
                    </form>
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