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
                        <div class="row">
                            <div class="col-md-4">
                                <h2>Your Prescriptions</h2>
                            </div>
                            <div class="col-md-8">
                                <br>
                                <form action="{{route('docPresSearch')}}" method="POST">
                                    {{ csrf_field() }}
                                    <div class="input-group">
                                        <input type="number" name="search" class="form-control" placeholder="Search with #ID">
                                    <span class="input-group-addon">
                                        <button type="submit"><span class="glyphicon glyphicon-search"></span></button>
                                    </span>
                                </div>
                                </form>
                            </div>
                        </div>
                        <br>
                        @include('partials._message')
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-hover dashboard-task-infos">
                                <thead>
                                    <tr>
                                        <th>#PRESCRIPTION ID</th>
                                        <th>#PATIENT_ID</th>
                                        <th>Name</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($pres as $pre)
                                        @if($pre->medications)
                                        <tr>
                                            <td>{{$pre->id}}</td>
                                            <td>{{$pre->patient_id}}</td>
                                            <td>{{@$pre->patient->first_name}} {{@$pre->patient->last_name}}</td>
                                            <td>{{$pre->created_at}}</td>
                                        </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
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