@extends('app')
@section('title', 'Control Panel')
@section('content')
<section class="content">
    <div class="container-fluid">
        <!-- <div class="block-header">
            <h2>DASHBOARD</h2>
        </div> -->
        <div class="row clearfix">
        <div class="col-md-8 col-md-offset-2">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
                <div class="card">
                    <div class="header">
                        <h2>Prescription's</h2>
                    </div>
                    <div class="body">
                      <div class="row">
                        <div class="col-md-6">
                          
                        </div>
                        <div class="col-md-6">
                          
                        </div>
                      </div>
                      <div class="table-responsive">
                          <table class="table table-hover dashboard-task-infos">
                              <thead>
                                  <tr>
                                      <th>Name</th>
                                      <th>Amount</th>
                                      <th>Price</th>
                                      <th><span id="amount" class="amount">Amount</span></th>
                                  </tr>
                              </thead>
                              <tbody>
                                @foreach($medics as $key => $medic)
                                  <tr>
                                    <td>{{ $medic['item']['name'] }}</td>
                                    <td>
                                      <input type="number" value="{{ $medic['qty']}}" class="qty">
                                    </td>
                                    <td>
                                      <span id="price" class="price">{{ $medic['item']['price'] }}</span>
                                    </td>
                                    <td align="center"><span id="amount" class="amount">0</span>    Taka
                                    </td>
                                  </tr>
                                @endforeach
                                <tr>
                                  <td colspan="2"></td>
                                  <td align="right">Total: </td>
                                  <td align="center"><span id="total" class="total">TOTAL</span>Taka 
                                  </td> 
                                </tr>
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