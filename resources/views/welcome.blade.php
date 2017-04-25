<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <link href="{{ url('plugins/bootstrap/css/bootstrap.css') }}" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="page-header">
                  <h1>DPMS <small>Doctor Patient Management System</small></h1>
                    @if(Sentinel::getUser())
                    <div class="btn-group">
                        @if(Sentinel::getUser()->roles()->first()->slug == 'doctor')
                        <a href="{{url('/doctor')}}"><button type="button" class="btn btn-success">HOME</button></a>
                        @elseif(Sentinel::getUser()->roles()->first()->slug == 'patient')
                        <a href="{{url('/patient')}}"><button type="button" class="btn btn-success">HOME</button></a>
                        @elseif(Sentinel::getUser()->roles()->first()->slug == 'store')
                        <a href="{{url('/pharmacy')}}"><button type="button" class="btn btn-success">HOME</button></a>
                        @endif
                    </div>
                    @else
                    <div class="btn-group" role="group" aria-label="...">
                        <a href="{{url('/login')}}"><button type="button" class="btn btn-success">Doctor Login</button></a>
                        <a href="{{url('/login')}}"></a>
                        <a href="{{url('/login')}}"><button type="button" class="btn btn-success">Patient Login</button></a>
                        <a href="{{url('/login')}}"></a>
                        <a href="{{url('/login')}}"><button type="button" class="btn btn-success">Store Login</button></a>
                        <a href="{{url('/register')}}"><button type="button" class="btn btn-success btn-lg">Register</button></a>
                    </div>
                    @endif
                </div>
                <div class="row">
                    <div class="col-md-6">
                    </div>
                    <div class="col-md-6">
                        <button class="btn btn-danger btn-block" type="button">
                          Complains <span class="badge">{{count($complains)}}</span>
                        </button>
                        <br>
                        <div class="row">
                            @foreach ($complains as $co)
                            <div class="col-md-6">
                                <div class="panel panel-danger">
                                    <div class="panel-heading"> 
                                        <h3 class="panel-title">Patient <strong>{{$co['patient']['first_name']}} {{$co['patient']['last_name']}}</strong> Complained to Doctor <strong>{{$co['doctor']['first_name']}} {{$co['doctor']['last_name']}}</strong></h3> 
                                    </div> 
                                    <div class="panel-body"> 
                                        {{$co['complain']}}
                                    </div> 
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
