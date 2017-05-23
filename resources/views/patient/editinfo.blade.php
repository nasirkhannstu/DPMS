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
        <div class="col-md-8 col-md-offset-2">
            <div class="login-box">
                <div class="panel panel-info" style="padding:10px">
                    <div class="panel-heading">
                        <h3 class="panel-title">Account Info</h3> 
                    </div>
                    <form method="POST" action="{{route('postPersonalInfo')}}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <h1>Professional Info</h1><br>
                                Gender <br>
                                <select name="gender" class="form-control">
                                    <option value="Male">Male</option>
                                    <option value="Femail">Femail</option>
                                </select>
                        <br>
                                <label>Address</label>
                                <textarea class="form-control" name="address" placeholder="Work Place" required>@if($patient){{ $patient->address }} @endif </textarea>
                          
                        <br>
                                <label>Parmanent Address</label>
                                <textarea class="form-control" name="paddress" placeholder="Work Place" required>@if($patient){{ $patient->paddress }} @endif </textarea>
                          
                        <br>
                            
                                <label>Profession</label>
                                
                                    <input type="text" name="profession" class="form-control" value="@if($patient){{ $patient->profession }} @endif " required>
                               
                        <br>
                        
                            
                                <label>Phone</label>
                                
                                <input type="text" name="phone" class="form-control" value="@if($patient){{ $patient->phone }} @endif " required>
                            
                            
                        
                        <br>

                            
                                <label>National Id Number</label>
                                
                                <input type="text" name="nid" class="form-control" value="@if($patient){{ $patient->nid }} @endif " required max="11">
                            
                            
                        
                        <br>

                            
                                <label>Age</label>
                                
                                <input type="text" name="age" class="form-control" value="@if($patient){{ $patient->age }} @endif " required>
                            
                            
                        
                        <br>
                        <div class="input-group">
                            <input type="file" name="photo" accept="image/*">
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