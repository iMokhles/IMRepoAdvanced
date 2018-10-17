@extends('user.layouts.layout_guest')

@section('body_attributes')
    login-page
@endsection

@section('login-box')

    <div class="login-box">
        <div class="login-logo">
            <a href="{{ url('') }}">{!! config('backpack.base.logo_lg') !!}</a>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            @if (session('resent'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-check"></i> {{ __('A fresh verification link has been sent to your email address.') }}!</h4>
                </div>
            @endif

            <p class="login-box-msg">{{ __('Before proceeding, please check your email for a verification link.') }}, {{ __('If you did not receive the email') }}, </p>
            <div class="auth-links">
                <a href="{{ route('user.verification.resend') }}" class="text-center">{{ __('click here to request another') }}</a>
            </div>
        </div>
    </div>
@endsection

