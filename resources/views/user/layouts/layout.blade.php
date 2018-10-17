<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    @include('user.inc.head')
</head>
<body class="hold-transition {{ config('backpack.base.skin') }} sidebar-mini">

<script type="text/javascript">
    /* Recover sidebar state */
    (function () {
        if (Boolean(sessionStorage.getItem('sidebar-toggle-collapsed'))) {
            var body = document.getElementsByTagName('body')[0];
            body.className = body.className + ' sidebar-collapse';
        }
    })();
</script>
<!-- Site wrapper -->
<div class="wrapper">

@include('user.inc.main_header')

<!-- =============================================== -->

@include('user.inc.sidebar')

<!-- =============================================== -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @yield('header')

    <!-- Main content -->
        <section class="content">

            @yield('content')

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    @include('user.inc.footer')
</div>
<!-- ./wrapper -->

@yield('before_scripts')
@stack('before_scripts')

@include('user.inc.scripts')

@include('user.inc.alerts')

@yield('after_scripts')
@stack('after_scripts')

<!-- JavaScripts -->
{{-- <script src="{{ mix('js/app.js') }}"></script> --}}

</body>
</html>
