<h1>Hello</h1>

<p>Please click the following link To active your account
<a href="{{ env('APP_URL') }}/activation/{{ $user->email }}/{{ $code }}">Activate Account</a>
</p>