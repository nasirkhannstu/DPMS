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
                        <h2>Update Info: {{$medicine->name}}</h2>
                    </div>
                    <hr>
                    <div class="body">
                        @include ('partials._message')
                        <form action="{{route('medicine.updatemed', $medicine->id)}}" method="POST">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-12">
                                <input type="text" name="name" class="form-control" placeholder="Medicine Name" value="{{$medicine->name}}"><br>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" name="brand" class="form-control" placeholder="Brand Name" value="{{$medicine->brand}}"><br>
                            </div>
                            <div class="col-md-6">
                                <input type="number" name="price" class="form-control" placeholder="Price" value="{{$medicine->price}}"><br>
                            </div>
                        </div>
                           <input type="submit" value="Update" class="btn btn-success pull-left btn-block">
                        </form>
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