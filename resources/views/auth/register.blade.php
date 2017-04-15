<link rel="stylesheet" type="text/css" href="css/app.css">

<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="panel panel-success" style="margin-top:50px">
				<div class="panel-heading">
					<h3 class="panel-title"> Register</h3>
				</div>
				<div class="panel-body">
					<form action="/register" method="POST">
						{{ csrf_field() }}
						@include ('partials._message')
						<div class="form-group">
							<select name="type" class="form-control">
								<option value="doctor">Doctor</option>
								<option value="patient">Patient</option>
								<option value="store">Store</option>
							</select>
						</div>
						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-envelope"></i> </span>
								<input type="email" name="email" class="form-control" placeholder="example@example.com">
							</div>
						</div>
						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-envelope"></i> </span>
								<input type="text" name="first_name" class="form-control" placeholder="First Name">
							</div>
						</div>
						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-envelope"></i> </span>
								<input type="text" name="last_name" class="form-control" placeholder="Last Name">
							</div>
						</div>
						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-envelope"></i> </span>
								<input type="password" name="password" class="form-control" placeholder="Password">
							</div>
						</div>
						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-envelope"></i> </span>
								<input type="password" name="password_confirmation" class="form-control" placeholder="Password Confirmation">
							</div>
						</div>
						<div class="form-group">
							<div class="input-group">
								<input type="submit" name="register" value="Register" class="btn btn-success pull-left">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>	
</div>
