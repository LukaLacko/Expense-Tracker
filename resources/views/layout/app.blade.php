<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/carousel.css') }}" rel="stylesheet">

    <style>
      .fade-in {
          opacity: 0;
          transform: translateY(20px);
          transition: opacity 0.6s ease, transform 0.6s ease;
      }
      .fade-in.visible {
          opacity: 1;
          transform: translateY(0);
      }
  </style>
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

    <script>
      document.addEventListener('DOMContentLoaded', () => {
  
          document.querySelectorAll('.fade-group').forEach(group => {
              group.querySelectorAll('.fade-in').forEach((el, index) => {
                  el.style.transitionDelay = `${index * 0.15}s`;
              });
          });
  
          const observer = new IntersectionObserver((entries) => {
              entries.forEach(entry => {
                  if (entry.isIntersecting) {
                      entry.target.classList.add('visible');
                  }
              });
          }, { threshold: 0.1 });
  
          document.querySelectorAll('.fade-in').forEach(el => observer.observe(el));
  
      });
  </script>
</body>
</html>