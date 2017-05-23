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
                        <h2>Add Medicines</h2>
                    </div>
                    <div class="body">
                        <form action="{{route('medicine.store')}}" method="POST">
                        {{ csrf_field() }}
                        @include ('partials._message')
                        <div class="row">
                            <div class="col-md-12">
                                <input type="text" name="name" class="form-control" placeholder="Medicine Name"><br>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" name="brand" class="form-control" placeholder="Brand Name"><br>
                            </div>
                            <div class="col-md-6">
                                <input type="number" name="price" class="form-control" placeholder="Price"><br>
                            </div>
                        </div>
                           <input type="submit" name="addmedicine" value="+ Add" class="btn btn-success pull-left btn-block">
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