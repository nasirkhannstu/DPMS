<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <link href="{{ url('plugins/bootstrap/css/bootstrap.css') }}" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="page-header">
                  <h1>DPMS <small>Doctor Patient Management System</small></h1>
                    <div class="btn-group" role="group" aria-label="...">
                        <a href="{{url('/login')}}"><button type="button" class="btn btn-success">Doctor Login</button></a>
                        <a href="{{url('/login')}}"></a>
                        <a href="{{url('/login')}}"><button type="button" class="btn btn-success">Patient Login</button></a>
                        <a href="{{url('/login')}}"></a>
                        <a href="{{url('/login')}}"><button type="button" class="btn btn-success">Store Login</button></a>
                        <a href="{{url('/register')}}"><button type="button" class="btn btn-success btn-lg">Register</button></a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="alert alert-success" role="alert">
                            <strong>Doctor Ashraful islam</strong><br>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse.
                        </div>
                        <div class="alert alert-success" role="alert">
                            <strong>Doctor Monirul Islam</strong><br>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
                        </div>
                        <div class="alert alert-success" role="alert">
                            <strong>Doctor Ahnaf Arsalam</strong><br>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
                        </div>
                        <div class="alert alert-success" role="alert">
                            <strong>Doctor Ashraful islam</strong><br>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse.
                        </div>
                    </div>
                    <div class="col-md-6">
                        <button class="btn btn-danger btn-block" type="button">
                          Complains <span class="badge">4</span>
                        </button>
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="panel panel-danger">
                                    <div class="panel-heading"> 
                                        <h3 class="panel-title">User Name 4</h3> 
                                    </div> 
                                    <div class="panel-body"> 
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                        
                                    </div> 
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="panel panel-danger">
                                    <div class="panel-heading"> 
                                        <h3 class="panel-title">User Name 3</h3> 
                                    </div> 
                                    <div class="panel-body"> 
                                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                    </div> 
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="panel panel-danger">
                                    <div class="panel-heading"> 
                                        <h3 class="panel-title">User Name 2</h3> 
                                    </div> 
                                    <div class="panel-body"> 
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                        
                                    </div> 
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="panel panel-danger">
                                    <div class="panel-heading"> 
                                        <h3 class="panel-title">User Name 1</h3> 
                                    </div> 
                                    <div class="panel-body"> 
                                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
