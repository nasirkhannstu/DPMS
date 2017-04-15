@extends('app')
@section('title', 'Control Panel')
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row clearfix">
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
            <div class="thumbnail">
                <img class="activator" src="{{url('images/user.jpg')}}">
                <div class="caption">
                    <h3 style="color:#73879C">
                        <span class="glyphicon glyphicon-user"></span>
                        Patient {{ Sentinel::getUser()->first_name }} {{ Sentinel::getUser()->last_name }}
                    </h3>
                    <p style="color:#73879C">
                        <span class="glyphicon glyphicon-envelope"></span>
                        {{ Sentinel::getUser()->email }}
                    </p>
                    <p>
                        <a href="{{route('getFindDoctor')}}" class="btn btn-primary waves-effect" role="button"><span class="glyphicon glyphicon-search"></span> Find Doctor</a>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
                <div class="card">
                    <div class="header">
                        <h3>Send Message to ({{$user->first_name}} {{$user->last_name}})</h3>
                    </div>
                    <hr>
                    <div class="body">
                        <br>
                        <div class="search" style="margin-top:10px">
                            <form action="{{route('postMessageDoctor', $user->id)}}" method="POST">
                                {{ csrf_field() }}
                            <div class="row control-group">
                                <div class="col-md-6 col-md-offset-2">
                                    <div class="input-group">
                                        <textarea class="form-control" name="message" placeholder="Write Message" style="width:400px;height:150px" required></textarea>
                                    </div>
                                    <br>
                                    <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-edit"></span> Send Message</button>
                                    <br>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</section>
@endsection
@section('script')

@endsection