@extends('app')
@section('title', 'Control Panel')
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row clearfix">
        <div class="col-md-8 col-md-offset-2">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
                <div class="card">
                  <a class="btn btn-info" href="javascript:void(0);" id="printButton">Print</a> 
                  @include ('partials._message')
                    <div class="body printableArea">
                      <div class="row">
                        <div class="col-md-6">
                          <h4>Doctor Information</h4>
                          <hr>
                          Name: <strong>{{$pre->doctor->user->first_name}} {{$pre->doctor->user->first_name}}</strong><br>
                          Speciality: <strong>{{$pre->doctor->speciality}}</strong><br>
                          E-mail: <strong>{{$pre->doctor->user->email}}</strong>
                        </div>
                        <div class="col-md-6">
                          <h4>Patient Information</h4>
                          <hr>
                          Name: <strong>{{$pre->patient->first_name}} {{$pre->patient->first_name}}</strong><br>
                          Age: <strong>{{$pre->patient->information->age}}</strong> &nbsp &nbsp Gender: <strong>{{$pre->patient->information->gender}}</strong><br>
                          E-mail: <strong>{{$pre->patient->email}}</strong>
                        </div>
                      </div>
                      <br><br>
                      <h3>Medications</h3>
                      <div class="table-responsive">
                          <table class="table table-hover dashboard-task-infos">
                              <thead>
                                  <tr>
                                      <th>Name</th>
                                      <th>Amount</th>
                                      <th>Remaining</th>
                                  </tr>
                              </thead>
                              <tbody>
                                @foreach($medics as $medic)
                                  <tr>
                                    <td>
                                    {{$medic['item']['name']}}
                                    </td>
                                    <td>
                                      {{ $medic['qty']}}
                                    </td>
                                    <td>
                                      {{ $medic['remaining']}}
                                    </td>
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
<script src="{{url('js/prscript.js')}}"></script>
<script>
    $("#printButton").click(function(){
        var mode = 'iframe'; //popup
        var close = mode == "popup";
        var options = { mode : mode, popClose : close};
        $("div.printableArea").printArea( options );
    });
</script>
@endsection