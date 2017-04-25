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
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-hover dashboard-task-infos">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Brand</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($store as $str)
                                        <tr>
                                            <td>{{$str['item']['name']}}</td>
                                            <td>{{$str['item']['brand']}}</td>
                                            <td>{{$str['item']['price']}}</td>
                                            <form action="{{route('store.update', $str['id'])}}" method="post">
                                            {{csrf_field()}}
                                            <td>
                                                <input type="number" name="qty" value="{{$str['qty']}}" style="width:50px;border:0px; border-bottom:2px solid;text-align:center">
                                            </td>
                                            <td>
                                                <input type="submit" value="Update Quantity" class="btn btn-success">
                                            </td>
                                            </form>
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