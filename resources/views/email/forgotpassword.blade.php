<h1>Hello</h1>

<p>Please click the following link To reset your account
	<a href="{{ env('APP_URL') }}/reset/{{ $user->email }}/{{ $code }}">Reset Password</a>
</p>