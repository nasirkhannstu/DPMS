<!DOCTYPE html>
<html>
<head>@include ('partials._head')</head><body class="theme-green">
    <!-- Top Bar -->@include ('partials._navbar')<!-- #Top Bar -->
    <section>
    </section>
    @yield('content')
    @include ('partials._footer')
    @include ('partials._javascript')
</body></html>