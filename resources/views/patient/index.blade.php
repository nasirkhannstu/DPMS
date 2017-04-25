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
                <img class="activator" src="images/user.jpg">
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
                        <a href="{{route('getFindDoctor')}}" class="btn btn-primary waves-effect" role="button"><span class="glyphicon glyphicon-edit"></span> Find Doctor</a>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
                <div class="card">
                    @include ('partials._message')
                    <div class="header">
                        <h3>Your Prescriptions</h3>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-hover dashboard-task-infos">
                                <thead>
                                    <tr>
                                        <th>#ID</th>
                                        <th>Syntoms</th>
                                        <th>Medications</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($pres as $pre)
                                        @if(!empty($pre->syntoms))
                                        <tr>
                                            <td>{{$pre->id}}</td>
                                            <td>{{$pre->syntoms}}</td>
                                            <td><?php 
                                                $medic = $pre->medications;
                                                $medic = unserialize($medic);
                                                foreach($medic as $meds){
                                                    echo $meds['name']."(".$meds['qty']."), ";
                                                }
                                             ?></td>                               
                                            <td>
                                            <a href="{{route('pres.view', $pre->id)}}">View</a>
                                            <a href="{{route('patient.complain', $pre->doctor_id)}}">Complain</a>
                                            </td>
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