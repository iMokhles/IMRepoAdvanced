<div class="user-panel">
  <a class="pull-left image" href="{{ route('user.account.info') }}">
    <img src="{{ backpack_avatar_url(Auth::guard('user')->user()) }}" class="img-circle" alt="User Image">
  </a>
  <div class="pull-left info">
    <p><a href="{{ route('user.account.info') }}">{{ Auth::guard('user')->user()->name }}</a></p>
    <small><small><a href="{{ route('user.account.info') }}"><span><i class="fa fa-user-circle-o"></i> {{ trans('backpack::base.my_account') }}</span></a> &nbsp;  &nbsp; <a href="{{ route('user.logout') }}"><i class="fa fa-sign-out"></i> <span>{{ trans('backpack::base.logout') }}</span></a></small></small>
  </div>
</div>