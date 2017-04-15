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
                    <a href="{{route('medicine.index')}}"><button class="btn btn-info">Store</button></a>
                    <div class="header">
                        <h2>Prescription</h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-hover dashboard-task-infos">
                                <thead>
                                    <tr>
                                        <th>#ID</th>
                                        <th>Doctor Name</th>
                                        <th>Patent Name</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($pres as $pre)
                                        @if($pre->medications != null)
                                        <tr>
                                            <td>#{{$pre->id}}</td>
                                            <td>{{$pre->doctor->user->first_name}} {{$pre->doctor->user->last_name}}</td>
                                            <td>{{$pre->patient->first_name}} {{$pre->patient->last_name}}</td>
                                            <td><a href="{{route('invoice', $pre->id)}}"><button class="btn btn-info">Sell</button></a></td>
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
        tot.text(function () {
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