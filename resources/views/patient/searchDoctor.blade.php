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
                    <div class="header">
                        <h3>Doctors</h3>
                    </div>
                    <div class="search" style="margin-top:10px">
                        <form action="{{route('postFindDoctor')}}" method="POST">
                            {{ csrf_field() }}
                        <div class="row control-group">
                            <div class="col-md-6 col-md-offset-3">
                                <div class="input-group">
                                    <div class="form-line">
                                        <input type="text" name="search" class="form-control searchname" style="height:50px"  placeholder="Search...">
                                    </div>
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
                                        <td><span class="label bg-green">{{$doc->user->id}}</span></td>
                                        <td>{{$doc->user->first_name }} {{ $doc->user->last_name}}</td>
                                        <td>{{@$doc->workplace}}</td>
                                        <td>{{@$doc->speciality}}</td>
                                        <td class="btn btn-default"><a href="{{route('messageDoctor', $doc->user->id) }}">Message</a></td>
                                    </tr>
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