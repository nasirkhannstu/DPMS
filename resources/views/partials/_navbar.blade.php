<nav class="navbar">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
            <a class="navbar-brand" href="/">DPMS - Doctor Patient Management System</a>
        </div>
        <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                        <i class="material-icons">menu</i>
                    </a>
                    <ul class="dropdown-menu pull-right">
                @if(Sentinel::check())
                    <li>
                        @if(Sentinel::getUser()->roles()->first()->slug == 'doctor')
                        <a href="{{url('/doctor')}}">HOME</a>
                        @elseif(Sentinel::getUser()->roles()->first()->slug == 'patient')
                        <a href="{{url('/patient')}}">HOME</a>
                        @elseif(Sentinel::getUser()->roles()->first()->slug == 'store')
                        <a href="{{url('/pharmacy')}}">HOME</a>
                        @endif
                    </li>
                    <li>
                        <a href="#"
                            onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                            Sign Out
                        </a>

                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                @else
                    <li><a href="/login">Login</a></li>
                    <li><a href="/register">Register</a></li>
                @endif
                </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>