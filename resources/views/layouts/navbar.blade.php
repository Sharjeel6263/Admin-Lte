<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{route('home')}}" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ms-auto" style="margin-left: 470px">
        <!-- Authentication Links -->
        @guest
            @if (Route::has('login'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
            @endif

            @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
            @endif
        @else
        <li>
            <a class="nav-link" href="{{ route('bookings.index')}}">Manage Bookings</a>
        </li>
        @canany(['role-create', 'role-list', 'role-edit', 'role-delete'])
            <li>
                <a class="nav-link" href="{{ route('roles.index')}}">Manage Roles</a>
            </li>
        @endcanany

        @canany(['user-create', 'user-list', 'user-edit', 'user-delete'])
        <li>
            <a  class="nav-link" href="{{ route('users.index')}}">Manage Users</a>
        </li>
        @endcanany
        @canany(['product-create', 'product-list', 'product-edit', 'product-delete'])
        <li>
            <a  class="nav-link" href="{{ route('products.index')}}">Manage Products</a>
        </li>
        @endcanany
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-user"></i> {{ Auth::user()->name }}
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}
                    </a>
                </li>
            </ul>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>

        @endguest
    </ul>
  </nav>
