<link rel="stylesheet" type="text/css" href="css/app.css">

<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-success" style="margin-top:50px">
                <div class="panel-heading">
                    <h3 class="panel-title"> Register</h3>
                </div>
                <div class="panel-body">
                <form method="POST" action="/login">
                	{{ csrf_field() }}
                    <div class="msg">Sign in to start your session</div>

					@include ('partials._message')
                        	<input type="email" name="email" class="form-control" placeholder="example@example.com" required>
                            <br>
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                            <br>
                    <div class="row">
                        <div class="col-xs-8 p-t-5">
                            <input type="checkbox" id="rememberme"  name="remember_me" class="filled-in chk-col-pink">
                            <label for="rememberme">Remember Me</label>
                        </div>
                        <div class="col-xs-4">
                            <button class="btn btn-block bg-green waves-effect" type="submit">SIGN IN</button>
                        </div>
                    </div>
                    <hr>
                    <div class="row m-t-15 m-b--20">
                        <div class="col-xs-6">
                            <a href="/register">Register Now!</a>
                        </div>
                        <div class="col-xs-6 align-right">
                            <a href="/forgot-password">Forgot Password?</a>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>  
</div>
