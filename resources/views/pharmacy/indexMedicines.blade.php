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
                        <h2>Medicines ({{ $medicines->total() }})</h2>
                        <h4><a href="{{route('medicine.create')}}"> + Add Medicine</a></h4>
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
                                    @foreach($medicines as $medicine)
                                        <tr>
                                            <td>{{$medicine->name}}</td>
                                            <td>{{$medicine->brand}}</td>
                                            <td>{{$medicine->price}}</td>
                                            <td>{{$medicine->qty}}</td>
                                            <td>
                                                <a href="{{route('medicine.show', $medicine->id)}}"><button class="btn btn-info btn-sm">Show</button></a>
                                                <a href="{{route('medicine.edit', $medicine->id)}}"><button class="btn btn-info btn-sm">Edit</button></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="row">
                                <div class="col.md.12">
                                    <div class="text-center">
                                        {!! $medicines->links() !!}
                                    </div>
                                </div>
                            </div>
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