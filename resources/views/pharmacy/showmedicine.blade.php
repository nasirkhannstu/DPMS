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
                <div class="col-md-8 col-md-offset-2" >
                <div class="card">
                    <div class="header">
                        <strong><a href="{{route('medicine.index')}}"><< Back to index</a></strong>
                    </div>
                    <hr>
                    <div class="body">
                        @include ('partials._message')
                        <div class="row">
                            <div class="col-md-12">
                                <h4>Name: {{$medicine->name}}</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                               <h5>Brand: {{$medicine->brand}}</h5>
                            </div>
                            <div class="col-md-6">
                                <h5>Price: {{$medicine->price}}</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <h6>Quantity: {{$medicine->qty}}</h6>
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