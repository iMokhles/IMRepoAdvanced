<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    @include('user.inc.head')
</head>
<body class="hold-transition @yield('body_attributes')">

@yield('login-box')

@include('user.inc.footer_guest')

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