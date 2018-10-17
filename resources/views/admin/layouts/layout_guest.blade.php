<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    @include('admin.inc.head')
</head>
<body class="hold-transition @yield('body_attributes')">

@yield('login-box')

@include('admin.inc.footer_guest')

@yield('before_scripts')
@stack('before_scripts')

@include('admin.inc.scripts')

@include('admin.inc.alerts')

@yield('after_scripts')
@stack('after_scripts')

<!-- JavaScripts -->
{{-- <script src="{{ mix('js/app.js') }}"></script> --}}

</body>
</html>