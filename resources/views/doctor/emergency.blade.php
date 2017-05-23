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
                @if(Sentinel::getUser()->doctor->pp)
                <img class="activator" src="{{url('uploads/pp/'.Sentinel::getUser()->doctor->pp)}}">
                @endif
                <div class="caption">
                    <h3 style="color:#73879C">
                        <span class="glyphicon glyphicon-user"></span>
                        Doctor {{ Sentinel::getUser()->first_name }} {{ Sentinel::getUser()->last_name }}
                    </h3>
                    <p style="color:#73879C">
                        <span class="glyphicon glyphicon-envelope"></span>
                        {{ Sentinel::getUser()->email }}
                    </p>
                    <p style="color:#73879C">
                        VNBC number: {{ Sentinel::getUser()->doctor->vnbc }}
                    </p>
                    <p style="color:#73879C">
                        Speciality: {{ Sentinel::getUser()->doctor->speciality }}
                    </p>
                    <p style="color:#73879C">
                        Your Id: <strong>#{{ Sentinel::getUser()->id }}</strong>
                    </p>
                    <p>
                        <a href="{{route('editInfo')}}" class="btn btn-primary waves-effect" role="button"><span class="glyphicon glyphicon-edit"></span> Edit Profile</a>
                    </p>
                    <p>
                        <a href="{{route('getPrescription')}}" class="btn btn-primary waves-effect" role="button"><span class="glyphicon glyphicon-edit"></span> New Prescription</a>
                    </p>
                    <p>
                        <a href="{{route('messages')}}" class="btn btn-primary waves-effect" role="button"><span class="glyphicon glyphicon-edit"></span> Messages</a>
                    </p>
                    <p>
                        <a href="{{route('emergency')}}" class="btn btn-primary waves-effect" role="button"><span class="glyphicon glyphicon-edit"></span> Emergency Patient</a>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
                <div class="card">
                    <div class="header">
                        <h2>Emergency Patient</h2>
                    </div>
                    <div class="body">
                    @include('partials._message')
                    <form action="{{route('postEmergency')}}" method="POST">
                        {{csrf_field()}}
                        <div class="row">
                            <br><br>
                            <div class="col-md-6">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control">
                                <br>
                                <label>National ID</label>
                                <input type="number" name="nid" class="form-control">
                                <br>
                                <label>Age</label>
                                <input type="number" name="age" class="form-control">
                                <br>
                                <input type="submit" value="submit" class="btn btn-success btn-block">
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
</section>
@endsection
@section('script')

@endsection