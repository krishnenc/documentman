<ul class="nav navbar-nav">
  @if (Auth::check())
    <li @if (Request::is('admin/companies*')) class="active" @endif>
      <a href="/admin/companies">Companies</a>
    </li>
    @if (Auth::user()->role()->getResults()->role_name === 'admin')
      <li @if (Request::is('admin/users*')) class="active" @endif>
        <a href="/admin/users">Users</a>
      </li>
    @endif
  @endif
</ul>

<ul class="nav navbar-nav navbar-right">
  @if (Auth::guest())
    <li><a href="/auth/login">Login</a></li>
  @else
    <li class="dropdown">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
         aria-expanded="false">{{ Auth::user()->name }}
        <span class="caret"></span>
      </a>
      <ul class="dropdown-menu" role="menu">
        <li><a href="/auth/logout">Logout</a></li>
      </ul>
    </li>
  @endif
</ul>
