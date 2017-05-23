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
                <div class="caption">
                    <p>
                        <a href="{{route('patient.index')}}" class="btn btn-primary waves-effect" role="button">Personal Details</a>
                    </p>
                    <p>
                        <a href="{{route('medication.history')}}" class="btn btn-primary waves-effect" role="button">Medication history</a>
                    </p>
                    <p>
                        <a href="{{route('getFindDoctor')}}" class="btn btn-primary waves-effect" role="button"> Find Doctor</a>
                    </p>
                    <p>
                        <a href="" class="btn btn-primary waves-effect" role="button">Lab Text report</a>
                    </p>
                    <p>
                        <a href="{{route('edit.Patient.Info')}}" class="btn btn-primary waves-effect" role="button">Edit Information</a>
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
                        <h3>Disease and medication history</h3>
                    </div>
                    <hr>
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
                                            <a href="{{route('pres.view', $pre->id)}}">View</a> |
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