<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/carousel.css') }}" rel="stylesheet">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <div class="container-fluid">
              <a class="navbar-brand" href="{{ route("homepage") }}">Home</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                  @guest
                  <li class="nav-item">
                    <a class="nav-link {{ Route::is('about-us') ? 'active' : '' }}" aria-current="page" href="{{ route("about-us") }}">About Us</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link {{ Route::is(patterns: 'login') ? 'active' : '' }}" href="{{ route("login") }}">Login</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link {{ Route::is('register') ? 'active' : '' }}" href="{{ route("register") }}">Register</a>
                  </li>
                  @endguest
                  @auth
                    <li>
                      <a class="nav-link {{ Route::is('loggedin.dashboard') ? 'active' : '' }}" href="{{ route("loggedin.dashboard") }}">Dashboard</a>
                    </li>
                    <li>
                      <a class="nav-link {{ Route::is('loggedin.income') ? 'active' : '' }}" href="{{ route("loggedin.income") }}">Income</a>
                    </li>
                    <li>
                      <a class="nav-link {{ Route::is('loggedin.expenses') ? 'active' : '' }}" href="{{ route("loggedin.expenses") }}">Expenses</a>
                    </li>
                    <li>
                      <a class="nav-link {{ Route::is('loggedin.budget') ? 'active' : '' }}" href="{{ route("loggedin.budget") }}">Budgets</a>
                    </li>
                    <li>
                      <a class="nav-link {{ Route::is('loggedin.exchange') ? 'active' : '' }}" href="{{ route("loggedin.exchange") }}">Currency Converter</a>
                    </li>
                    <li>
                      <a class="nav-link {{ Route::is('loggedin.reports') ? 'active' : '' }}" href="{{ route("loggedin.reports") }}">Reports</a>
                    </li>
                    <li>
                      <a class="nav-link" href="{{ route("logout") }}">Logout</a>
                    </li>
                  @endauth
                </ul>
              </div>
            </div>
          </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"></script>

    @stack('scripts') 
</body>
</html>