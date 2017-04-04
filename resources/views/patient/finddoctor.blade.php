@extends('app')
@section('title', 'Control Panel')
@section('content')
<section class="content">
    <div class="container-fluid">
        <!-- <div class="block-header">
            <h2>DASHBOARD</h2>
        </div> -->
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
                        <a href="{{route('editInfo')}}" class="btn btn-primary waves-effect" role="button"><span class="glyphicon glyphicon-edit"></span> Edit Profile</a>
                    </p>
                    <p>
                        <a href="{{route('getFindDoctor')}}" class="btn btn-primary waves-effect" role="button"><span class="glyphicon glyphicon-edit"></span> Find Doctor</a>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
                <div class="card">
                    <div class="header">
                        <h3>Doctors</h3>
                    </div>
                    <div class="search" style="margin-top:10px">
                        <form action="{{route('postFindDoctor')}}" method="POST">
                            {{ csrf_field() }}
                        <div class="row control-group">
                            <div class="col-md-6 col-md-offset-3">
                                <div class="input-group">
                                        <input type="text" name="search" class="form-control searchname" style="height:50px" placeholder="Search...">
                                    
                                    <span class="input-group-addon">
                                        <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-search"></span></button>
                                    </span>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-hover dashboard-task-infos">
                                <thead>
                                    <tr>
                                        <th>#ID</th>
                                        <th>Doctor Name</th>
                                        <th>Work Place</th>
                                        <th>Spciality</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($doctors as $doc)
                                    <tr>
                                        <td>{{$doc->id}}</td>
                                        <td>{{$doc->first_name }} {{ $doc->last_name}}</td>
                                        <td>{{@$doc->doctor->workplace}}</td>
                                        <td>{{@$doc->doctor->speciality}}</td>
                                        <td class="btn btn-default"><a href="{{route('messageDoctor', $doc->id) }}">Message</a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="text-center">
                                {!! $doctors->links() !!}
                            </div>
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