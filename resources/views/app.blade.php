<!DOCTYPE html>
<html>
<head>@include ('partials._head')</head><body class="theme-green">
    <!-- Top Bar -->@include ('partials._navbar')<!-- #Top Bar -->
    <section>
        <!-- Left Sidebar@include ('partials._leftbar') #END# Left Sidebar -->
        <!-- Right Sidebar @include ('partials._rightbar') #END# Right Sidebar -->
    </section>
    @yield('content')
    @include ('partials._javascript')
</body></html>