<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
  @include('notifi')
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @auth


                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>

                        @endauth

                        @auth('customer')

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                              Customer
                                {{ Auth::guard('customer')->user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ route('customers.logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('customers.logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>

                        @endauth

                        @if(!Auth::user() && !Auth::guard('customer')->user())
                        <li><a href="{{ route('login') }}">Login</a></li>
                        <li><a href="{{ route('customers.login') }}">Customer Login</a></li>
                        <li><a href="{{ route('register') }}">Register</a></li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

          <div class="container">
            <div class="row">
              <div class="col-md-4">
                  @admin
                    <ul class="list-group">
                      <li class="list-group-item list-group-item-success">
                        <a href="{{route('users.show')}}">Users</a>
                      </li>
                      <li class="list-group-item list-group-item-success">
                        <a href="{{route('users.create')}}">Create a new user</a>
                      </li>
                      <li class="list-group-item list-group-item-info">
                        <a href="{{route('category.show')}}">All Categories</a>
                      </li>
                      <li class="list-group-item list-group-item-info">
                        <a href="{{route('category.create')}}">Create Category</a>
                      </li>
                      <li class="list-group-item list-group-item-danger">
                        <a href="{{route('products.show')}}">All products (Users)</a>
                      </li>
                      <li class="list-group-item list-group-item-danger">
                        <a href="{{route('products.create')}}">Create product</a>
                      </li>
                      <li class="list-group-item list-group-item-warning">
                        <a href="{{route('customers.show')}}">All products</a>
                      </li>

                  @endadmin

                  @auth('customer')

                      <li class="list-group-item list-group-item-warning">
                        <a href="{{route('customers.show')}}">All products</a>
                      </li>
                  @endauth

                  @if (auth()->user() && !auth()->user()->is_admin)
                      <li class="list-group-item list-group-item-danger">
                        <a href="{{route('products.show')}}">All products (Users)</a>
                      </li>
                      <li class="list-group-item list-group-item-danger">
                        <a href="{{route('products.create')}}">Create product</a>
                      </li>
                  @endif
                </ul>
              </div>
              <div class="col-md-8">
                @yield('content')
              </div>
            </div>
          </div>


    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
