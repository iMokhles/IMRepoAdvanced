<div class="user-panel">
  <a class="pull-left image" href="{{ route('admin.account.info') }}">
    <img src="{{ backpack_avatar_url(Auth::guard('admin')->user()) }}" class="img-circle" alt="User Image">
  </a>
  <div class="pull-left info">
    <p><a href="{{ route('admin.account.info') }}">{{ Auth::guard('admin')->user()->name }}</a></p>
    <small><small><a href="{{ route('admin.account.info') }}"><span><i class="fa fa-user-circle-o"></i> {{ trans('backpack::base.my_account') }}</span></a> &nbsp;  &nbsp; <a href="{{ route('admin.logout') }}"><i class="fa fa-sign-out"></i> <span>{{ trans('backpack::base.logout') }}</span></a></small></small>
  </div>
</div>