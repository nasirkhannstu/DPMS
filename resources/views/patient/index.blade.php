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
                        <h3>Personal Information</h3>
                    </div>
                    <div class="body">
                        @if(isset(Sentinel::getUser()->information))
                        <img class="activator" src="{{url('uploads/pp/'.Sentinel::getUser()->information->photo)}}" style="width:200px">
                        <br><br>
                        <strong>Your Id: #{{ Sentinel::getUser()->id }}</strong>
                        <br>
                        Name:{{ Sentinel::getUser()->first_name }} {{ Sentinel::getUser()->last_name }}
                        <br>
                        Sex: {{ Sentinel::getUser()->information->gender}}
                        <br>
                        Age: {{ Sentinel::getUser()->information->age}}
                        <br>
                        Present Address: {{ Sentinel::getUser()->information->address}}
                        <br>
                        Parmanent Address: {{ Sentinel::getUser()->information->paddress}}
                        <br>
                        NID: {{ Sentinel::getUser()->information->nid}}
                        @endif
                    </div>
                    <hr>
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