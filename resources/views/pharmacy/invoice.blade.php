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
                  @include ('partials._message')
                    <div class="header">
                        <h2>Invoice</h2>
                    </div>
                    <div class="body">
                      <div class="row">
                        <div class="col-md-6">
                          
                        </div>
                        <div class="col-md-6">
                          
                        </div>
                      </div>
                      <div class="table-responsive">
                        <form action="{{route('sell', $id)}}" method="POST">
                          {{ csrf_field() }}
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
                                @foreach($medics as $medic)
                                  <tr>
                                    <td>
                                    <input type="text" name="mdcns[id][]" value="{{$medic['item']['name']}}">
                                    </td>
                                    <td>
                                      <input type="number" name="mdcns[qty][]" value="{{ $medic['qty']}}" class="qty">({{ $medic['item']['qty'] }})
                                    </td>
                                    <td>
                                      <span id="price" class="price">{{ $medic['item']['price'] }}</span>
                                    </td>
                                    <td align="center"><span id="amount" class="amount">0</span> Taka
                                    </td>
                                  </tr>
                                @endforeach
                                <tr>
                                  <td colspan="2"></td>
                                  <td align="right">Total: </td>
                                  <td align="center"><u>
                                  <input type="text" name="total" value="0" id="total" class="total" desebaled> Taka
                                  </td> 
                                </tr>
                              </tbody>
                          </table>
                          <input type="submit" class="btn btn-success" value="Sell">
                        </form>
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
<script type="text/javascript">
    function calculator() {
        var amt = $('.amount:gt(0)'),
            tot = $('#total');
        amt.text(function () {
            var tr = $(this).closest('tr');
            var qty = tr.find('.qty').val();
            var price = tr.find('.price').html();
            return parseFloat(qty) * parseFloat(price);
        });
        tot.val(function () {
            var sum = 0;
            amt.each(function () {
                sum += parseFloat($(this).text())
            });
            return sum;
        });
    }
    calculator();
    $('.qty,.price').change(calculator);
</script>
@endsection